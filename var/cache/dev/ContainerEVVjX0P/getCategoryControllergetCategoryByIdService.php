<?php

namespace ContainerEVVjX0P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategoryControllergetCategoryByIdService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.egipcEH.App\Controller\CategoryController::getCategoryById()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.egipcEH.App\\Controller\\CategoryController::getCategoryById()'] = ($container->privates['.service_locator.egipcEH'] ?? $container->load('get_ServiceLocator_EgipcEHService'))->withContext('App\\Controller\\CategoryController::getCategoryById()', $container);
    }
}
