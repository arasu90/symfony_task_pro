<?php

namespace ContainerEVVjX0P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductControlleraddProductService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Pvsz2ki.App\Controller\ProductController::addProduct()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Pvsz2ki.App\\Controller\\ProductController::addProduct()'] = ($container->privates['.service_locator.Pvsz2ki'] ?? $container->load('get_ServiceLocator_Pvsz2kiService'))->withContext('App\\Controller\\ProductController::addProduct()', $container);
    }
}