<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

class ErrorController extends AbstractController
{
    #[Route('/error', name: 'app_error')]
    public function showErrorPage(Throwable $exception, LoggerInterface $logger): JsonResponse
    {
        // print_r($exception);
        return new JsonResponse(['message'=>'Invalid Request'],500);
    }
}
