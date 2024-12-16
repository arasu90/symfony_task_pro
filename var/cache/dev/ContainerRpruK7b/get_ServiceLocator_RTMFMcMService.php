<?php

namespace ContainerRpruK7b;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_RTMFMcMService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.rTMFMcM' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.rTMFMcM'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\CartController::addToCart' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CartController::addToCart()', 'getCartControlleraddToCartService', true],
            'App\\Controller\\CartController::viewCart' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CartController::viewCart()', 'getCartControllerviewCartService', true],
            'App\\Controller\\CartController::removeCart' => ['privates', '.service_locator.egipcEH.App\\Controller\\CartController::removeCart()', 'getCartControllerremoveCartService', true],
            'App\\Controller\\CartController::placeOrder' => ['privates', '.service_locator.egipcEH.App\\Controller\\CartController::placeOrder()', 'getCartControllerplaceOrderService', true],
            'App\\Controller\\CartController::viewMyOrderList' => ['privates', '.service_locator.egipcEH.App\\Controller\\CartController::viewMyOrderList()', 'getCartControllerviewMyOrderListService', true],
            'App\\Controller\\CategoryController::index' => ['privates', '.service_locator.T1nRTja.App\\Controller\\CategoryController::index()', 'getCategoryControllerindexService', true],
            'App\\Controller\\CategoryController::addCategory' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CategoryController::addCategory()', 'getCategoryControlleraddCategoryService', true],
            'App\\Controller\\CategoryController::getCategoryById' => ['privates', '.service_locator.egipcEH.App\\Controller\\CategoryController::getCategoryById()', 'getCategoryControllergetCategoryByIdService', true],
            'App\\Controller\\CategoryController::editCategory' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CategoryController::editCategory()', 'getCategoryControllereditCategoryService', true],
            'App\\Controller\\CategoryController::deleteCategory' => ['privates', '.service_locator.egipcEH.App\\Controller\\CategoryController::deleteCategory()', 'getCategoryControllerdeleteCategoryService', true],
            'App\\Controller\\CustomerController::customerList' => ['privates', '.service_locator.egipcEH.App\\Controller\\CustomerController::customerList()', 'getCustomerControllercustomerListService', true],
            'App\\Controller\\CustomerController::addCustomer' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CustomerController::addCustomer()', 'getCustomerControlleraddCustomerService', true],
            'App\\Controller\\CustomerController::getCustomerById' => ['privates', '.service_locator.egipcEH.App\\Controller\\CustomerController::getCustomerById()', 'getCustomerControllergetCustomerByIdService', true],
            'App\\Controller\\CustomerController::editCustomer' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CustomerController::editCustomer()', 'getCustomerControllereditCustomerService', true],
            'App\\Controller\\CustomerController::deleteCustomer' => ['privates', '.service_locator.egipcEH.App\\Controller\\CustomerController::deleteCustomer()', 'getCustomerControllerdeleteCustomerService', true],
            'App\\Controller\\ErrorController::showErrorPage' => ['privates', '.service_locator.aMhho.e.App\\Controller\\ErrorController::showErrorPage()', 'getErrorControllershowErrorPageService', true],
            'App\\Controller\\ProductController::productList' => ['privates', '.service_locator.egipcEH.App\\Controller\\ProductController::productList()', 'getProductControllerproductListService', true],
            'App\\Controller\\ProductController::addProduct' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\ProductController::addProduct()', 'getProductControlleraddProductService', true],
            'App\\Controller\\ProductController::getProductById' => ['privates', '.service_locator.egipcEH.App\\Controller\\ProductController::getProductById()', 'getProductControllergetProductByIdService', true],
            'App\\Controller\\ProductController::editProduct' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\ProductController::editProduct()', 'getProductControllereditProductService', true],
            'App\\Controller\\ProductController::deleteProduct' => ['privates', '.service_locator.egipcEH.App\\Controller\\ProductController::deleteProduct()', 'getProductControllerdeleteProductService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\CartController:addToCart' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CartController::addToCart()', 'getCartControlleraddToCartService', true],
            'App\\Controller\\CartController:viewCart' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CartController::viewCart()', 'getCartControllerviewCartService', true],
            'App\\Controller\\CartController:removeCart' => ['privates', '.service_locator.egipcEH.App\\Controller\\CartController::removeCart()', 'getCartControllerremoveCartService', true],
            'App\\Controller\\CartController:placeOrder' => ['privates', '.service_locator.egipcEH.App\\Controller\\CartController::placeOrder()', 'getCartControllerplaceOrderService', true],
            'App\\Controller\\CartController:viewMyOrderList' => ['privates', '.service_locator.egipcEH.App\\Controller\\CartController::viewMyOrderList()', 'getCartControllerviewMyOrderListService', true],
            'App\\Controller\\CategoryController:index' => ['privates', '.service_locator.T1nRTja.App\\Controller\\CategoryController::index()', 'getCategoryControllerindexService', true],
            'App\\Controller\\CategoryController:addCategory' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CategoryController::addCategory()', 'getCategoryControlleraddCategoryService', true],
            'App\\Controller\\CategoryController:getCategoryById' => ['privates', '.service_locator.egipcEH.App\\Controller\\CategoryController::getCategoryById()', 'getCategoryControllergetCategoryByIdService', true],
            'App\\Controller\\CategoryController:editCategory' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CategoryController::editCategory()', 'getCategoryControllereditCategoryService', true],
            'App\\Controller\\CategoryController:deleteCategory' => ['privates', '.service_locator.egipcEH.App\\Controller\\CategoryController::deleteCategory()', 'getCategoryControllerdeleteCategoryService', true],
            'App\\Controller\\CustomerController:customerList' => ['privates', '.service_locator.egipcEH.App\\Controller\\CustomerController::customerList()', 'getCustomerControllercustomerListService', true],
            'App\\Controller\\CustomerController:addCustomer' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CustomerController::addCustomer()', 'getCustomerControlleraddCustomerService', true],
            'App\\Controller\\CustomerController:getCustomerById' => ['privates', '.service_locator.egipcEH.App\\Controller\\CustomerController::getCustomerById()', 'getCustomerControllergetCustomerByIdService', true],
            'App\\Controller\\CustomerController:editCustomer' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\CustomerController::editCustomer()', 'getCustomerControllereditCustomerService', true],
            'App\\Controller\\CustomerController:deleteCustomer' => ['privates', '.service_locator.egipcEH.App\\Controller\\CustomerController::deleteCustomer()', 'getCustomerControllerdeleteCustomerService', true],
            'App\\Controller\\ErrorController:showErrorPage' => ['privates', '.service_locator.aMhho.e.App\\Controller\\ErrorController::showErrorPage()', 'getErrorControllershowErrorPageService', true],
            'App\\Controller\\ProductController:productList' => ['privates', '.service_locator.egipcEH.App\\Controller\\ProductController::productList()', 'getProductControllerproductListService', true],
            'App\\Controller\\ProductController:addProduct' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\ProductController::addProduct()', 'getProductControlleraddProductService', true],
            'App\\Controller\\ProductController:getProductById' => ['privates', '.service_locator.egipcEH.App\\Controller\\ProductController::getProductById()', 'getProductControllergetProductByIdService', true],
            'App\\Controller\\ProductController:editProduct' => ['privates', '.service_locator.Pvsz2ki.App\\Controller\\ProductController::editProduct()', 'getProductControllereditProductService', true],
            'App\\Controller\\ProductController:deleteProduct' => ['privates', '.service_locator.egipcEH.App\\Controller\\ProductController::deleteProduct()', 'getProductControllerdeleteProductService', true],
        ], [
            'kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Controller\\CartController::addToCart' => '?',
            'App\\Controller\\CartController::viewCart' => '?',
            'App\\Controller\\CartController::removeCart' => '?',
            'App\\Controller\\CartController::placeOrder' => '?',
            'App\\Controller\\CartController::viewMyOrderList' => '?',
            'App\\Controller\\CategoryController::index' => '?',
            'App\\Controller\\CategoryController::addCategory' => '?',
            'App\\Controller\\CategoryController::getCategoryById' => '?',
            'App\\Controller\\CategoryController::editCategory' => '?',
            'App\\Controller\\CategoryController::deleteCategory' => '?',
            'App\\Controller\\CustomerController::customerList' => '?',
            'App\\Controller\\CustomerController::addCustomer' => '?',
            'App\\Controller\\CustomerController::getCustomerById' => '?',
            'App\\Controller\\CustomerController::editCustomer' => '?',
            'App\\Controller\\CustomerController::deleteCustomer' => '?',
            'App\\Controller\\ErrorController::showErrorPage' => '?',
            'App\\Controller\\ProductController::productList' => '?',
            'App\\Controller\\ProductController::addProduct' => '?',
            'App\\Controller\\ProductController::getProductById' => '?',
            'App\\Controller\\ProductController::editProduct' => '?',
            'App\\Controller\\ProductController::deleteProduct' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:loadRoutes' => '?',
            'App\\Controller\\CartController:addToCart' => '?',
            'App\\Controller\\CartController:viewCart' => '?',
            'App\\Controller\\CartController:removeCart' => '?',
            'App\\Controller\\CartController:placeOrder' => '?',
            'App\\Controller\\CartController:viewMyOrderList' => '?',
            'App\\Controller\\CategoryController:index' => '?',
            'App\\Controller\\CategoryController:addCategory' => '?',
            'App\\Controller\\CategoryController:getCategoryById' => '?',
            'App\\Controller\\CategoryController:editCategory' => '?',
            'App\\Controller\\CategoryController:deleteCategory' => '?',
            'App\\Controller\\CustomerController:customerList' => '?',
            'App\\Controller\\CustomerController:addCustomer' => '?',
            'App\\Controller\\CustomerController:getCustomerById' => '?',
            'App\\Controller\\CustomerController:editCustomer' => '?',
            'App\\Controller\\CustomerController:deleteCustomer' => '?',
            'App\\Controller\\ErrorController:showErrorPage' => '?',
            'App\\Controller\\ProductController:productList' => '?',
            'App\\Controller\\ProductController:addProduct' => '?',
            'App\\Controller\\ProductController:getProductById' => '?',
            'App\\Controller\\ProductController:editProduct' => '?',
            'App\\Controller\\ProductController:deleteProduct' => '?',
        ]);
    }
}