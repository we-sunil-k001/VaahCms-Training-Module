<?php

use VaahCms\Modules\Product\Http\Controllers\Backend\PricesController;

Route::group(
    [
        'prefix' => 'backend/product/prices',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [PricesController::class, 'getAssets'])
        ->name('vh.backend.product.prices.assets');
    /**
     * Get List
     */
    Route::get('/', [PricesController::class, 'getList'])
        ->name('vh.backend.product.prices.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [PricesController::class, 'updateList'])
        ->name('vh.backend.product.prices.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [PricesController::class, 'deleteList'])
        ->name('vh.backend.product.prices.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [PricesController::class, 'fillItem'])
        ->name('vh.backend.product.prices.fill');

    /**
     * Create Item
     */
    Route::post('/', [PricesController::class, 'createItem'])
        ->name('vh.backend.product.prices.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [PricesController::class, 'getItem'])
        ->name('vh.backend.product.prices.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [PricesController::class, 'updateItem'])
        ->name('vh.backend.product.prices.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [PricesController::class, 'deleteItem'])
        ->name('vh.backend.product.prices.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [PricesController::class, 'listAction'])
        ->name('vh.backend.product.prices.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [PricesController::class, 'itemAction'])
        ->name('vh.backend.product.prices.item.action');

    //---------------------------------------------------------

});
