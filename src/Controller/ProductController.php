<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product_list')]
    public function productList(EntityManagerInterface $entityManager): JsonResponse
    {
        $product = $entityManager->getRepository(Product::class)->findAll();
        
        $productData = [];
        foreach ($product as $value) {
            // Assuming Category entity has a method that returns its data as an array
            $productData[] = [
                'id' => $value->getId(),
                'product_name' => $value->getProductName(),
                'product_desc' => $value->getProductDesc(),
                'product_price' => $value->getProductPrice(),
                'product_qty' => $value->getProductQty(),
                'product_category' => $value->getProductCategory(),
                'product_discount' => $value->getProductDiscount(),
                'product_tax_per' => $value->getProductTaxPer(),
                'product_status' => $value->isProductStatus(),
            ];
        }

        // Now return the data in JSON format
        // return new JsonResponse($categoryData);
        return new JsonResponse($productData, 200);
    }

    #[Route('/addproduct', name: 'product_new', methods: ['POST'])]
    public function addProduct(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
    {
        // Parse the incoming JSON data
        $data = json_decode($request->getContent(), true);

        if (!isset($data['product_name']) || empty($data['product_name'])) {
            return new JsonResponse(['error' => 'Product name is required'], 400);
        }

        $product = new Product();
        $product->setProductName($data['product_name']);
        $product->setProductDesc($data['product_desc']);
        if (is_numeric($data['product_price'])) {
            $product->setProductPrice((float) $data['product_price']);
        } else {
            return new JsonResponse(['errors' => 'Invalid price type'], 400);
        }

        if (is_numeric($data['product_qty'])) {
            $product->setProductQty((float) $data['product_qty']);
        } else {
            return new JsonResponse(['errors' => 'Invalid qty type'], 400);
        }
        
        $category = $entityManager->getRepository(Category::class)->find($data['product_category']);
        
        // Check if the category exists
        if (!$category) {
            return new JsonResponse(['error' => 'Invalid Category ID'], 404);
        }
        
        $product->setProductCategory($data['product_category']);
        $product->setProductStatus($data['product_status']);
        $product->setProductDiscount($data['product_discount']);
        $product->setProductTaxPer($data['product_tax_per']);
        
        // Validate the Product entity
        $errors = $validator->validate($product);
        
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], 400);
        }
        
        // Manually check if a Product with the same name already exists
        $existingProduct = $entityManager->getRepository(Product::class)->findOneBy(['product_name' => $product->getProductName(), 'product_status' => 1]);
        if ($existingProduct) {
            return new JsonResponse(['error' => 'Product name must be unique.'], 400);
        }

        // Persist the category to the database
        $entityManager->persist($product);
        $entityManager->flush();

        // Return a response with the newly created Product
        return new JsonResponse([
            'message' => 'Product created successfully',
            'data' => [
                'id' => $product->getId(),
                'product_name' => $product->getProductName(),
                'product_desc' => $product->getProductDesc(),
                'product_price' => $product->getProductPrice(),
                'product_qty' => $product->getProductQty(),
                'product_category' => $product->getProductCategory(),
                'product_discount' => $product->getProductDiscount(),
                'product_tax_per' => $product->getProductTaxPer(),
                'product_status' => $product->isProductStatus(),
            ]
        ], 201); // HTTP 201 Created
    }

    #[Route('/product/{id}', name: 'product_get', methods: ['GET'])]
    public function getProductById(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        $product = $entityManager->getRepository(Product::class)->find($id);

        // If product doesn't exist, return a 404 response
        if (!$product) {
            return new JsonResponse(['error' => 'Product not found.'], 404);
        }

        // Return the category data in the response
        return new JsonResponse([
            'message' => 'Product fetched successfully',
            'data' => [
                'id' => $product->getId(),
                'product_name' => $product->getProductName(),
                'product_desc' => $product->getProductDesc(),
                'product_price' => $product->getProductPrice(),
                'product_qty' => $product->getProductQty(),
                'product_category' => $product->getProductCategory(),
                'product_discount' => $product->getProductDiscount(),
                'product_tax_per' => $product->getProductTaxPer(),
                'product_status' => $product->isProductStatus(),
            ]
        ]);
    }

    #[Route('/product/{id}', name: 'edit_product', methods: ['PUT'])]
    public function editProduct(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, int $id): JsonResponse
    {
        $product = $entityManager->getRepository(Product::class)->find($id);

        // If category doesn't exist, return a 404 response
        if (!$product) {
            return new JsonResponse(['error' => 'Product not found.'], 404);
        }

        // Parse the incoming JSON data
        $data = json_decode($request->getContent(), true);

        // $product = new Product();
        $product->setProductName($data['product_name']);
        $product->setProductDesc($data['product_desc']);
        if (is_numeric($data['product_price'])) {
            $product->setProductPrice((float) $data['product_price']);
        } else {
            return new JsonResponse(['errors' => 'Invalid price type'], 400);
        }
        
        if (is_numeric($data['product_qty'])) {
            $product->setProductQty((float) $data['product_qty']);
        } else {
            return new JsonResponse(['errors' => 'Invalid qty type'], 400);
        }
        
        $category = $entityManager->getRepository(Category::class)->find($data['product_category']);
        
        // Check if the category exists
        if (!$category) {
            return new JsonResponse(['error' => 'Invalid Category ID'], 404);
        }
        
        $product->setProductCategory($data['product_category']);
        $product->setProductStatus($data['product_status']);
        $product->setProductDiscount($data['product_discount']);
        $product->setProductTaxPer($data['product_tax_per']);
        
        // Validate the Product entity
        $errors = $validator->validate($product);
        
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], 400);
        }
        
        // Manually check if a Product with the same name already exists
        $existingProduct = $entityManager->getRepository(Product::class)->findOneBy(['product_name' => $product->getProductName(), 'product_status' => 1]);
        if ($existingProduct && $existingProduct->getId() !== $product->getId()) {
            return new JsonResponse(['error' => 'Product name must be unique.'], 400);
        }

        // Persist the category to the database
        $entityManager->persist($product);
        $entityManager->flush();

        // Return a response with the updated category data
        return new JsonResponse([
            'message' => 'Category updated successfully',
            'data' => [
                'id' => $product->getId(),
                'product_name' => $product->getProductName(),
                'product_desc' => $product->getProductDesc(),
                'product_price' => $product->getProductPrice(),
                'product_qty' => $product->getProductQty(),
                'product_category' => $product->getProductCategory(),
                'product_discount' => $product->getProductDiscount(),
                'product_tax_per' => $product->getProductTaxPer(),
                'product_status' => $product->isProductStatus(),
            ]
        ], 200); // HTTP 200 OK
    }

    // Delete Product by ID
    #[Route('/product/{id}', name: 'product_delete', methods: ['DELETE'])]
    public function deleteProduct(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        // Fetch the Product from the database by ID
        $product = $entityManager->getRepository(Product::class)->find($id);

        // If Product doesn't exist, return a 404 response
        if (!$product) {
            return new JsonResponse(['error' => 'Product not found.'], 404);
        }

        // Remove the Product from the database
        $entityManager->remove($product);
        $entityManager->flush();

        // Return a success response
        return new JsonResponse(['message' => 'Product deleted successfully.'], 200);
    }
}
