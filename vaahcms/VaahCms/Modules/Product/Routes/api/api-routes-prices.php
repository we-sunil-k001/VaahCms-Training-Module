<?php
use VaahCms\Modules\Product\Http\Controllers\Backend\PricesController;
/*
 * API url will be: <base-url>/public/api/product/prices
 */
Route::group(
    [
        'prefix' => 'product/prices',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [PricesController::class, 'getAssets'])
        ->name('vh.backend.product.api.prices.assets');
    /**
     * Get List
     */
    Route::get('/', [PricesController::class, 'getList'])
        ->name('vh.backend.product.api.prices.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [PricesController::class, 'updateList'])
        ->name('vh.backend.product.api.prices.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [PricesController::class, 'deleteList'])
        ->name('vh.backend.product.api.prices.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [PricesController::class, 'createItem'])
        ->name('vh.backend.product.api.prices.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [PricesController::class, 'getItem'])
        ->name('vh.backend.product.api.prices.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [PricesController::class, 'updateItem'])
        ->name('vh.backend.product.api.prices.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [PricesController::class, 'deleteItem'])
        ->name('vh.backend.product.api.prices.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [PricesController::class, 'listAction'])
        ->name('vh.backend.product.api.prices.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [PricesController::class, 'itemAction'])
        ->name('vh.backend.product.api.prices.item.action');



});
