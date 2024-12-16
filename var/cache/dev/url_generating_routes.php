<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'app_category' => [[], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['text', '/category']], [], [], []],
    'app_category_add' => [[], ['_controller' => 'App\\Controller\\CategoryController::addCategory'], [], [['text', '/addcategory']], [], [], []],
    'app_category_get' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::getCategoryById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category']], [], [], []],
    'app_category_edit' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::editCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category']], [], [], []],
    'app_category_delete' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category']], [], [], []],
    'app_customer' => [[], ['_controller' => 'App\\Controller\\CustomerController::index'], [], [['text', '/customer']], [], [], []],
    'app_error' => [[], ['_controller' => 'App\\Controller\\ErrorController::showErrorPage'], [], [['text', '/error']], [], [], []],
    'product_list' => [[], ['_controller' => 'App\\Controller\\ProductController::productList'], [], [['text', '/product']], [], [], []],
    'product_new' => [[], ['_controller' => 'App\\Controller\\ProductController::addproduct'], [], [['text', '/addproduct']], [], [], []],
    'product_get' => [['id'], ['_controller' => 'App\\Controller\\ProductController::getProductById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'edit_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::edit_product'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'product_delete' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'App\Controller\CategoryController::index' => [[], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['text', '/category']], [], [], []],
    'App\Controller\CategoryController::addCategory' => [[], ['_controller' => 'App\\Controller\\CategoryController::addCategory'], [], [['text', '/addcategory']], [], [], []],
    'App\Controller\CategoryController::getCategoryById' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::getCategoryById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category']], [], [], []],
    'App\Controller\CategoryController::editCategory' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::editCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category']], [], [], []],
    'App\Controller\CategoryController::deleteCategory' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category']], [], [], []],
    'App\Controller\CustomerController::index' => [[], ['_controller' => 'App\\Controller\\CustomerController::index'], [], [['text', '/customer']], [], [], []],
    'App\Controller\ErrorController::showErrorPage' => [[], ['_controller' => 'App\\Controller\\ErrorController::showErrorPage'], [], [['text', '/error']], [], [], []],
    'App\Controller\ProductController::productList' => [[], ['_controller' => 'App\\Controller\\ProductController::productList'], [], [['text', '/product']], [], [], []],
    'App\Controller\ProductController::addproduct' => [[], ['_controller' => 'App\\Controller\\ProductController::addproduct'], [], [['text', '/addproduct']], [], [], []],
    'App\Controller\ProductController::getProductById' => [['id'], ['_controller' => 'App\\Controller\\ProductController::getProductById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'App\Controller\ProductController::edit_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::edit_product'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
    'App\Controller\ProductController::deleteCategory' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], [], []],
];
