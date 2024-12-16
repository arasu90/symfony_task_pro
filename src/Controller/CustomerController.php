<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class CustomerController extends AbstractController
{
    #[Route('/customer', name: 'customer_list')]
    public function customerList(EntityManagerInterface $entityManager): JsonResponse
    {
        $customer = $entityManager->getRepository(Customer::class)->findAll();
        
        $customerData = [];
        foreach ($customer as $value) {
            $customerData[] = [
                'id' => $value->getId(),
                'customer_name' => $value->getCustomerName(),
                'customer_email' => $value->getCustomerEmail(),
                'customer_address' => $value->getCustomerAddress(),
                'customer_mobile' => $value->getCustomerMobile(),
                'customer_status' => $value->isCategoryStatus(),
            ];
        }
        
        return new JsonResponse($customerData, 200);
    }

    #[Route('/addcustomer', name: 'customer_add', methods: ['POST'])]
    public function addCustomer(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
    {
        // Parse the incoming JSON data
        $data = json_decode($request->getContent(), true);

        $customer = new Customer();
        $customer->setCustomerName($data['customer_name']);
        $customer->setCustomerEmail($data['customer_email']);
        $customer->setCustomerAddress($data['customer_address']);
        $customer->setCustomerMobile($data['customer_mobile']);
        $customer->setCategoryStatus($data['customer_status']);
        // Validate the Customer entity
        $errors = $validator->validate($customer);
        
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], 400);
        }
        
        // Manually check if a Customer with the same name already exists
        $existingCustomer = $entityManager->getRepository(Customer::class)->findOneBy(['customer_email' => $customer->getCustomerEmail(), 'customer_status' => 1]);
        if ($existingCustomer) {
            return new JsonResponse(['error' => 'Customer Email Already Used'], 400);
        }
        // Manually check if a Customer with the same name already exists
        $existingCustomer = $entityManager->getRepository(Customer::class)->findOneBy(['customer_mobile' => $customer->getCustomerMobile(), 'customer_status' => 1]);
        if ($existingCustomer) {
            return new JsonResponse(['error' => 'Customer Mobile Already Used'], 400);
        }

        // Persist the category to the database
        $entityManager->persist($customer);
        $entityManager->flush();

        // Return a response with the newly created Customer
        return new JsonResponse([
            'message' => 'Customer created successfully',
            'data' => [
                'id' => $customer->getId(),
                'customer_name' => $customer->getCustomerName(),
                'customer_email' => $customer->getCustomerEmail(),
                'customer_address' => $customer->getCustomerAddress(),
                'customer_mobile' => $customer->getCustomerMobile(),
                'customer_status' => $customer->isCategoryStatus(),
            ]
        ], 201); // HTTP 201 Created
    }

    #[Route('/customer/{id}', name: 'customer_get', methods: ['GET'])]
    public function getCustomerById(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        $customer = $entityManager->getRepository(Customer::class)->find($id);

        // If customer doesn't exist, return a 404 response
        if (!$customer) {
            return new JsonResponse(['error' => 'Customer not found.'], 404);
        }

        // Return the category data in the response
        return new JsonResponse([
            'message' => 'Customer fetched successfully',
            'data' => [
                'id' => $customer->getId(),
                'customer_name' => $customer->getCustomerName(),
                'customer_email' => $customer->getCustomerEmail(),
                'customer_address' => $customer->getCustomerAddress(),
                'customer_mobile' => $customer->getCustomerMobile(),
                'customer_status' => $customer->isCategoryStatus(),
            ]
        ]);
    }

    #[Route('/customer/{id}', name: 'customer_update', methods: ['PUT'])]
    public function editCustomer(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, int $id): JsonResponse
    {
        $customer = $entityManager->getRepository(Customer::class)->find($id);

        // If category doesn't exist, return a 404 response
        if (!$customer) {
            return new JsonResponse(['error' => 'Customer not found.'], 404);
        }

        // Parse the incoming JSON data
        $data = json_decode($request->getContent(), true);

        $customer->setCustomerName($data['customer_name']);
        $customer->setCustomerEmail($data['customer_email']);
        $customer->setCustomerAddress($data['customer_address']);
        $customer->setCustomerMobile($data['customer_mobile']);
        $customer->setCategoryStatus($data['customer_status']);
        // Validate the Product entity
        $errors = $validator->validate($customer);
        
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], 400);
        }
        
        // Manually check if a Customer with the same name already exists
        $existingCustomer = $entityManager->getRepository(Customer::class)->findOneBy(['customer_email' => $customer->getCustomerEmail(), 'customer_status' => 1]);
        if ($existingCustomer && $existingCustomer->getId() !== $customer->getId()) {
            return new JsonResponse(['error' => 'Customer Email Already Used'], 400);
        }
        // Manually check if a Customer with the same name already exists
        $existingCustomer = $entityManager->getRepository(Customer::class)->findOneBy(['customer_mobile' => $customer->getCustomerMobile(), 'customer_status' => 1]);
        if ($existingCustomer && $existingCustomer->getId() !== $customer->getId()) {
            return new JsonResponse(['error' => 'Customer Mobile Already Used'], 400);
        }

        // Persist the category to the database
        $entityManager->persist($customer);
        $entityManager->flush();

        // Return a response with the updated category data
        return new JsonResponse([
            'message' => 'Customer updated successfully',
            'data' => [
                'id' => $customer->getId(),
                'customer_name' => $customer->getCustomerName(),
                'customer_email' => $customer->getCustomerEmail(),
                'customer_address' => $customer->getCustomerAddress(),
                'customer_mobile' => $customer->getCustomerMobile(),
                'customer_status' => $customer->isCategoryStatus(),
            ]
        ], 200); // HTTP 200 OK
    }

    // Delete Customer by ID
    #[Route('/customer/{id}', name: 'customer_delete', methods: ['DELETE'])]
    public function deleteCustomer(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        // Fetch the Customer from the database by ID
        $customer = $entityManager->getRepository(Customer::class)->find($id);

        // If Customer doesn't exist, return a 404 response
        if (!$customer) {
            return new JsonResponse(['error' => 'Customer not found.'], 404);
        }

        // Remove the Customer from the database
        $entityManager->remove($customer);
        $entityManager->flush();

        // Return a success response
        return new JsonResponse(['message' => 'Customer deleted successfully.'], 200);
    }
}
