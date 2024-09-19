<?php
use VaahCms\Modules\Product\Http\Controllers\Backend\ProductsController;
/*
 * API url will be: <base-url>/public/api/product/products
 */
Route::group(
    [
        'prefix' => 'product/products',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [ProductsController::class, 'getAssets'])
        ->name('vh.backend.product.api.products.assets');
    /**
     * Get List
     */
    Route::get('/', [ProductsController::class, 'getList'])
        ->name('vh.backend.product.api.products.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [ProductsController::class, 'updateList'])
        ->name('vh.backend.product.api.products.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [ProductsController::class, 'deleteList'])
        ->name('vh.backend.product.api.products.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [ProductsController::class, 'createItem'])
        ->name('vh.backend.product.api.products.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [ProductsController::class, 'getItem'])
        ->name('vh.backend.product.api.products.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [ProductsController::class, 'updateItem'])
        ->name('vh.backend.product.api.products.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [ProductsController::class, 'deleteItem'])
        ->name('vh.backend.product.api.products.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [ProductsController::class, 'listAction'])
        ->name('vh.backend.product.api.products.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [ProductsController::class, 'itemAction'])
        ->name('vh.backend.product.api.products.item.action');



});
