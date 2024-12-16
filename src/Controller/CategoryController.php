<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(EntityManagerInterface $entityManager, SerializerInterface $serializer): JsonResponse
    {
        $categories = $entityManager->getRepository(Category::class)->findAll();
        // print_r($categories);
        // If you're using Doctrine ORM entities, you may need to convert them to arrays
        
        $categoryData = [];
        foreach ($categories as $category) {
            // Assuming Category entity has a method that returns its data as an array
            $categoryData[] = [
                'id' => $category->getId(),
                'category_name' => $category->getCategoryName(),
                'category_desc' => $category->getCategoryDesc(),
                'category_discount' => $category->getCategoryDiscount(),
                'category_status' => $category->isCategoryStatus(),
            ];
        }

        // Now return the data in JSON format
        // return new JsonResponse($categoryData);
        return new JsonResponse($categoryData, 200);
        /*
         // Use Symfony's serializer to convert the objects to an array or JSON
         $categoryData = $serializer->serialize($categories, 'json');

         // Return JSON response
         return new JsonResponse($categoryData, 200, [], true);
        */
    }

    #[Route('/addcategory', name: 'app_category_add', methods: ['POST'])]
    public function addCategory(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
    {
        // Parse the incoming JSON data
        $data = json_decode($request->getContent(), true);

        // Check if the necessary fields are provided in the request data
        // if (!isset($data['category_name']) || empty($data['category_name'])) {
        //     return new JsonResponse(['error' => 'Category name is required'], 400);
        // }

        // Create a new Category entity
        $category = new Category();
        $category->setCategoryName($data['category_name']); // Assuming 'name' is the field you want to populate
        $category->setCategoryStatus($data['category_status']);
        $category->setCategoryDesc($data['category_desc']);
        $category->setCategoryDiscount($data['category_discount']);

        // Manually check if a category with the same name already exists
        $existingCategory = $entityManager->getRepository(Category::class)->findOneBy(['category_name' => $category->getCategoryName(), 'category_status' => 1]);
        if ($existingCategory) {
            return new JsonResponse(['error' => 'Category name must be unique.'], 400);
        }

        // Validate the Category entity
        $errors = $validator->validate($category);

        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], 400);
        }

        // Optionally, you can set other properties if needed (e.g., description, etc.)
        // $category->setDescription($data['description']);

        // Persist the category to the database
        $entityManager->persist($category);
        $entityManager->flush();

        // Return a response with the newly created category (you can include more fields if needed)
        return new JsonResponse([
            'message' => 'Category created successfully',
            'data' => [
                'id' => $category->getId(),
                'category_name' => $category->getCategoryName(),
                'category_desc' => $category->getCategoryDesc(),
                'category_discount' => $category->getCategoryDiscount(),
                'category_status' => $category->isCategoryStatus(),
            ]
        ], 201); // HTTP 201 Created
    }

    #[Route('/category/{id}', name: 'app_category_get', methods: ['GET'])]
    public function getCategoryById(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        // Fetch the category from the database by ID
        $category = $entityManager->getRepository(Category::class)->find($id);

        // If category doesn't exist, return a 404 response
        if (!$category) {
            return new JsonResponse(['error' => 'Category not found.'], 404);
        }

        // Return the category data in the response
        return new JsonResponse([
            'message' => 'Category fetched successfully',
            'data' => [
                'id' => $category->getId(),
                'category_name' => $category->getCategoryName(),
                'category_desc' => $category->getCategoryDesc(),
                'category_discount' => $category->getCategoryDiscount(),
                'category_status' => $category->isCategoryStatus(),
            ]
        ]);
    }

    #[Route('/category/{id}', name: 'app_category_edit', methods: ['PUT'])]
    public function editCategory(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, int $id): JsonResponse
    {
        // Fetch the category from the database by ID
        $category = $entityManager->getRepository(Category::class)->find($id);

        // If category doesn't exist, return a 404 response
        if (!$category) {
            return new JsonResponse(['error' => 'Category not found.'], 404);
        }

        // Parse the incoming JSON data
        $data = json_decode($request->getContent(), true);

        // Check if we have the required fields, e.g., name
        if (isset($data['category_name']) && !empty($data['category_name'])) {
            $category->setCategoryName($data['category_name']);
        }

        $category->setCategoryStatus($data['category_status']);
        $category->setCategoryDesc($data['category_desc']);
        $category->setCategoryDiscount($data['category_discount']);
        // Validate the updated Category entity
        $errors = $validator->validate($category);

        // If validation errors exist, return them
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], 400);
        }

        // Check if the name is unique, to prevent duplicates
        $existingCategory = $entityManager->getRepository(Category::class)->findOneBy(['category_name' => $category->getCategoryName(), 'category_status' => 1]);
        if ($existingCategory && $existingCategory->getId() !== $category->getId()) {
            return new JsonResponse(['error' => 'Category name must be unique.'], 400);
        }

        // Persist the updated category to the database
        $entityManager->flush();

        // Return a response with the updated category data
        return new JsonResponse([
            'message' => 'Category updated successfully',
            'data' => [
                'id' => $category->getId(),
                'category_name' => $category->getCategoryName(),
                'category_desc' => $category->getCategoryDesc(),
                'category_discount' => $category->getCategoryDiscount(),
                'category_status' => $category->isCategoryStatus(),
            ]
        ], 200); // HTTP 200 OK
    }

    // Delete category by ID
    #[Route('/category/{id}', name: 'app_category_delete', methods: ['DELETE'])]
    public function deleteCategory(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        // Fetch the category from the database by ID
        $category = $entityManager->getRepository(Category::class)->find($id);

        // If category doesn't exist, return a 404 response
        if (!$category) {
            return new JsonResponse(['error' => 'Category not found.'], 404);
        }

        // Remove the category from the database
        $entityManager->remove($category);
        $entityManager->flush();

        // Return a success response
        return new JsonResponse(['message' => 'Category deleted successfully.'], 200);
    }
}
