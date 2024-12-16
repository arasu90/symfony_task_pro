<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/add_to_cart' => [[['_route' => 'addCart', '_controller' => 'App\\Controller\\CartController::addToCart'], null, ['POST' => 0], null, false, false, null]],
        '/view_cart' => [[['_route' => 'viewCart', '_controller' => 'App\\Controller\\CartController::viewCart'], null, ['POST' => 0], null, false, false, null]],
        '/remove_cart' => [[['_route' => 'removeCart', '_controller' => 'App\\Controller\\CartController::removeCart'], null, ['DELETE' => 0], null, false, false, null]],
        '/place_order' => [[['_route' => 'PlaceOrder', '_controller' => 'App\\Controller\\CartController::placeOrder'], null, ['POST' => 0], null, false, false, null]],
        '/category' => [[['_route' => 'app_category', '_controller' => 'App\\Controller\\CategoryController::index'], null, null, null, false, false, null]],
        '/addcategory' => [[['_route' => 'app_category_add', '_controller' => 'App\\Controller\\CategoryController::addCategory'], null, ['POST' => 0], null, false, false, null]],
        '/customer' => [[['_route' => 'customer_list', '_controller' => 'App\\Controller\\CustomerController::customerList'], null, null, null, false, false, null]],
        '/addcustomer' => [[['_route' => 'customer_add', '_controller' => 'App\\Controller\\CustomerController::addCustomer'], null, ['POST' => 0], null, false, false, null]],
        '/error' => [[['_route' => 'app_error', '_controller' => 'App\\Controller\\ErrorController::showErrorPage'], null, null, null, false, false, null]],
        '/product' => [[['_route' => 'product_list', '_controller' => 'App\\Controller\\ProductController::productList'], null, null, null, false, false, null]],
        '/addproduct' => [[['_route' => 'product_new', '_controller' => 'App\\Controller\\ProductController::addProduct'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/view_my_order/([^/]++)(*:65)'
                .'|/c(?'
                    .'|ategory/([^/]++)(?'
                        .'|(*:96)'
                    .')'
                    .'|ustomer/([^/]++)(?'
                        .'|(*:123)'
                    .')'
                .')'
                .'|/product/([^/]++)(?'
                    .'|(*:153)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        65 => [[['_route' => 'viewMyOrderList', '_controller' => 'App\\Controller\\CartController::viewMyOrderList'], ['customer_id'], ['GET' => 0], null, false, true, null]],
        96 => [
            [['_route' => 'app_category_get', '_controller' => 'App\\Controller\\CategoryController::getCategoryById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_category_edit', '_controller' => 'App\\Controller\\CategoryController::editCategory'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_category_delete', '_controller' => 'App\\Controller\\CategoryController::deleteCategory'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        123 => [
            [['_route' => 'customer_get', '_controller' => 'App\\Controller\\CustomerController::getCustomerById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'customer_update', '_controller' => 'App\\Controller\\CustomerController::editCustomer'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'customer_delete', '_controller' => 'App\\Controller\\CustomerController::deleteCustomer'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        153 => [
            [['_route' => 'product_get', '_controller' => 'App\\Controller\\ProductController::getProductById'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'edit_product', '_controller' => 'App\\Controller\\ProductController::editProduct'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController::deleteProduct'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
