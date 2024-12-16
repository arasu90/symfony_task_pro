<?php

namespace App\Controller;

use App\Entity\CartItems;
use App\Entity\CartMaster;
use App\Entity\Category;
use App\Entity\Customer;
use App\Entity\Product;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CartController extends AbstractController
{
    #[Route('/add_to_cart', name: 'addCart', methods: ['POST'])]
    public function addToCart(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        $customer = $entityManager->getRepository(Customer::class)->find($data['customer_id']);
        
        // Check if the customer exists
        if (!$customer) {
            return new JsonResponse(['error' => 'Invalid Customer ID'], 404);
        }

        $product = $entityManager->getRepository(Product::class)->find($data['product_id']);
        
        // Check if the product exists
        if (!$product) {
            return new JsonResponse(['error' => 'Invalid Product ID'], 404);
        }
        
        if($product->getProductQty() < $data['product_qty']){
            return new JsonResponse(['message' => 'Product out of stock'], 200);
        }

        $category = $entityManager->getRepository(Category::class)->find($product->getProductCategory());

        
        $cart_items = $entityManager->getRepository(CartItems::class)->findOneBy(['customer_id' => $customer->getId(), 'product_id' => $product->getId(), 'order_status' => 1]);
        if (!$cart_items) {
            $cart_items = new CartItems();
            $product_qty = $data['product_qty'];
        }else{
            $product_qty = $cart_items->getProductQty()+$data['product_qty'];
        }

        $cart_items->setCustomer($customer);
        $cart_items->setProduct($product);
        $cart_items->setProductQty($product_qty);
        $cart_items->setProductPrice($product->getProductPrice());

        $sub_total = $product_qty * $product->getProductPrice();
        $cart_items->setSubTotal($sub_total);

        $discount_per = $product->getProductDiscount() + $category->getCategoryDiscount();
        $cart_items->setDiscountPer($discount_per);

        $discount_amt = (($sub_total * $discount_per)/100);
        $cart_items->setDiscountAmt($discount_amt);

        $total_amt = $sub_total-$discount_amt;
        $cart_items->setTotalAmt($total_amt);

        $tax_per = $product->getProductTaxPer();
        $cart_items->setTaxPer($tax_per);
        
        $tax_amt = (($total_amt * $tax_per)/100);
        $cart_items->setTaxAmt($tax_amt);

        $net_total_amt = $total_amt+$tax_amt;
        $cart_items->setNetTotal($net_total_amt);
        
        $rand_num = random_int(1,999);
        $cart_items->setMasterId(0);
        $cart_items->setOrderStatus(1);
        
        $entityManager->persist($cart_items);
        $entityManager->flush();
        if($cart_items->getID()){
            $product->setProductQty($product->getProductQty()-$data['product_qty']);
            $entityManager->persist($product);
            $entityManager->flush();
        }
        return $this->json([
            'message' => "Your product added to cart "
        ]);
    }

    #[Route('/view_cart', name: 'viewCart', methods: ['POST'])]
    public function viewCart(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        $customer = $entityManager->getRepository(Customer::class)->find($data['customer_id']);
        
        // Check if the customer exists
        if (!$customer) {
            return new JsonResponse(['error' => 'Invalid Customer ID'], 404);
        }

        $cartItems = $entityManager->getRepository(CartItems::class)->findBy(['customer_id'=>$data['customer_id'],'order_status'=>1]);
        
        // Check if the customer exists
        if (!$cartItems) {
            return new JsonResponse(['message' => 'This Customer Cart is Empty'], 200);
        }

        $cartItemsData = [];
        foreach ($cartItems as $value) {
            // Assuming Category entity has a method that returns its data as an array
            $cartItemsData[] = [
                'cart_id' => $value->getId(),
                'product_name' => $value->getProduct()->getProductName(),
                'product_qty' => $value->getProductQty(),
                'product_price' => $value->getProductPrice(),
                'sub_total' => $value->getSubTotal(),
                'discount_per' => $value->getDiscountPer(),
                'discount_amt' => $value->getDiscountAmt(),
                'total_amt' => $value->getTotalAmt(),
                'tax_per' => $value->getTaxPer(),
                'tax_amt' => $value->getTaxAmt(),
                'net_total' => $value->getNetTotal(),
                'order_status' => $value->getOrderStatus()
            ];
        }

        
        return new JsonResponse([
            'message'=>"Available Cart Data",
            "data" => [
                'customer_name'=>$customer->getCustomerName(),
                'customer_id'=>$customer->getId(),
                'cart_data' => $cartItemsData
            ]
        ]);
    }

    #[Route('/remove_cart', name: 'removeCart', methods: ["DELETE"])]
    public function removeCart(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        $customer = $entityManager->getRepository(Customer::class)->find($data['customer_id']);
        
        // Check if the customer exists
        if (!$customer) {
            return new JsonResponse(['error' => 'Invalid Customer ID'], 404);
        }

        $cartCustomerItems = $entityManager->getRepository(CartItems::class)->findBy(['customer_id'=>$data['customer_id'],'id'=>$data['cart_id'],'order_status'=>1]);
        
        // Check if the customer exists
        if (!$cartCustomerItems) {
            return new JsonResponse(['message' => 'Invalid Customer ID and Cart ID'], 404);
        }

        $cartItems = $entityManager->getRepository(CartItems::class)->find($data['cart_id']);
        // Remove the Cart from the database
        $entityManager->remove($cartItems);
        $entityManager->flush();

        return new JsonResponse([
            'message'=>"Your cart data removed"
        ]);
    }

    #[Route('/place_order', name: 'PlaceOrder', methods: ['POST'])]
    public function placeOrder(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        $customer = $entityManager->getRepository(Customer::class)->find($data['customer_id']);
        
        // Check if the customer exists
        if (!$customer) {
            return new JsonResponse(['error' => 'Invalid Customer ID'], 404);
        }

        $cart_items = $entityManager->getRepository(CartItems::class)->findOneBy(['customer_id' => $customer->getId(), 'order_status' => 1]);
        if (!$cart_items) {
            return new JsonResponse(['message' => 'Your cart is empty'], 200);
        }

        $cart_items_data = $entityManager->getRepository(CartItems::class)->findBy(['customer_id' => $customer->getId(), 'order_status' => 1]);
        
        $rand_num = random_int(1,999);

        $sub_total = 0;
        $discount_amt = 0;
        $total_amt = 0;
        $total_tax_amt = 0;
        $net_total = 0;
        foreach($cart_items_data as $cartdata){
            $sub_total +=$cartdata->getSubTotal();
            $discount_amt +=$cartdata->getDiscountAmt();
            $total_amt +=$cartdata->getTotalAmt();
            $total_tax_amt +=$cartdata->getTaxAmt();
            $net_total +=$cartdata->getNetTotal();

            $cartdata->setMasterId($rand_num);
            $cartdata->setOrderStatus(2);
            
            $entityManager->persist($cartdata);
            $entityManager->flush();
        }
        

        $cartMaster = new CartMaster();
        $cartMaster->setMasterId($rand_num);
        $cartMaster->setPaymentMode($data["payment_mode"]);
        $cartMaster->setOrderStatus(2);
        $cartMaster->setSubTotal($sub_total);
        $cartMaster->setNetTotal($net_total);
        $cartMaster->setDiscountAmt($discount_amt);
        $cartMaster->setTotalTaxAmt($total_tax_amt);
        $cartMaster->setTotalAmt($total_amt);
        $cartMaster->setCustomerId($customer->getId());
        $orderdate = new DateTime(date("Y-m-d H:i:s"));
        $cartMaster->setOrderDate($orderdate);
        $created_at = new DateTimeImmutable(date("Y-m-d H:i:s"));
        $cartMaster->setCreatedAt($created_at);
        $updated_at = new DateTimeImmutable(date("Y-m-d H:i:s"));
        $cartMaster->setUpdatedAt($updated_at);
        $entityManager->persist($cartMaster);
        $entityManager->flush();
        // die();
        

        return $this->json([
            'message' => "Your order placed"
        ]);
    }

    #[Route('/view_my_order/{customer_id}', name: 'viewMyOrderList', methods: ['GET'])]
    public function viewMyOrderList(EntityManagerInterface $entityManager, int $customer_id): JsonResponse
    {
        $customer = $entityManager->getRepository(Customer::class)->find($customer_id);
        
        // Check if the customer exists
        if (!$customer) {
            return new JsonResponse(['error' => 'Invalid Customer ID'], 404);
        }

        $cartMaster = $entityManager->getRepository(CartMaster::class)->findBy(['customer_id' => $customer_id, 'order_status' => 2]);
        if (!$cartMaster) {
            return new JsonResponse(['message' => 'Your Order is empty'], 200);
        }
        $cartMasterData = [];
        foreach ($cartMaster as $value) {
            $masterId = $value->getMasterId();
            $cartItems = $entityManager->getRepository(CartItems::class)->findBy(['customer_id' => $customer_id, 'order_status' => 2, 'master_id' => $masterId]);
            if($cartItems){
                $cartItemsData = [];
                foreach ($cartItems as $cartItemsValue) {
                    $cartItemsData[] = [
                        'OrderId' => $cartItemsValue->getMasterId(),
                        'product_name' => $cartItemsValue->getProduct()->getProductName(),
                        'product_qty' => $cartItemsValue->getProductQty(),
                        'product_price' => $cartItemsValue->getProductPrice(),
                        'sub_total' => $cartItemsValue->getSubTotal(),
                        'discount_per' => $cartItemsValue->getDiscountPer(),
                        'discount_amt' => $cartItemsValue->getDiscountAmt(),
                        'total_amt' => $cartItemsValue->getTotalAmt(),
                        'tax_per' => $cartItemsValue->getTaxPer(),
                        'tax_amt' => $cartItemsValue->getTaxAmt(),
                        'net_total' => $cartItemsValue->getNetTotal(),
                    ];
                    $customer_name = $cartItemsValue->getCustomer()->getCustomerName();
                }
                $cartMasterData[] = [
                    'customer_name' => $customer_name,
                    'OrderId' => $masterId,
                    'sub_total' => $value->getSubTotal(),
                    'discount_amt' => $value->getDiscountAmt(),
                    'total_amt' => $value->getTotalAmt(),
                    'total_tax_amt' => $value->getTotalTaxAmt(),
                    'net_total' => $value->getNetTotal(),
                    "order_date" => $value->getOrderDate(),
                    "cart_items" => $cartItemsData,
                ];
            }
        }
        
        return new JsonResponse($cartMasterData, 200);
    }
}
