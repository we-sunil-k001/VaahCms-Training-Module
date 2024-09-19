<?php

use VaahCms\Modules\Product\Http\Controllers\Backend\ProductCategorysController;

Route::group(
    [
        'prefix' => 'backend/product/productcategorys',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [ProductCategorysController::class, 'getAssets'])
        ->name('vh.backend.product.productcategorys.assets');
    /**
     * Get List
     */
    Route::get('/', [ProductCategorysController::class, 'getList'])
        ->name('vh.backend.product.productcategorys.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [ProductCategorysController::class, 'updateList'])
        ->name('vh.backend.product.productcategorys.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [ProductCategorysController::class, 'deleteList'])
        ->name('vh.backend.product.productcategorys.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [ProductCategorysController::class, 'fillItem'])
        ->name('vh.backend.product.productcategorys.fill');

    /**
     * Create Item
     */
    Route::post('/', [ProductCategorysController::class, 'createItem'])
        ->name('vh.backend.product.productcategorys.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [ProductCategorysController::class, 'getItem'])
        ->name('vh.backend.product.productcategorys.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [ProductCategorysController::class, 'updateItem'])
        ->name('vh.backend.product.productcategorys.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [ProductCategorysController::class, 'deleteItem'])
        ->name('vh.backend.product.productcategorys.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [ProductCategorysController::class, 'listAction'])
        ->name('vh.backend.product.productcategorys.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [ProductCategorysController::class, 'itemAction'])
        ->name('vh.backend.product.productcategorys.item.action');

    //---------------------------------------------------------

});
