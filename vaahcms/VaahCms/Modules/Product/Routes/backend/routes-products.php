<?php

use VaahCms\Modules\Product\Http\Controllers\Backend\ProductsController;

Route::group(
    [
        'prefix' => 'backend/product/products',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [ProductsController::class, 'getAssets'])
        ->name('vh.backend.product.products.assets');
    /**
     * Get List
     */
    Route::get('/', [ProductsController::class, 'getList'])
        ->name('vh.backend.product.products.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [ProductsController::class, 'updateList'])
        ->name('vh.backend.product.products.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [ProductsController::class, 'deleteList'])
        ->name('vh.backend.product.products.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [ProductsController::class, 'fillItem'])
        ->name('vh.backend.product.products.fill');

    /**
     * Create Item
     */
    Route::post('/', [ProductsController::class, 'createItem'])
        ->name('vh.backend.product.products.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [ProductsController::class, 'getItem'])
        ->name('vh.backend.product.products.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [ProductsController::class, 'updateItem'])
        ->name('vh.backend.product.products.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [ProductsController::class, 'deleteItem'])
        ->name('vh.backend.product.products.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [ProductsController::class, 'listAction'])
        ->name('vh.backend.product.products.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [ProductsController::class, 'itemAction'])
        ->name('vh.backend.product.products.item.action');

    //---------------------------------------------------------

});
