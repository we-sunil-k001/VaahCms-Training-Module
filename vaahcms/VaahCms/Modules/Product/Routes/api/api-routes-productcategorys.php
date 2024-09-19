<?php
use VaahCms\Modules\Product\Http\Controllers\Backend\ProductCategorysController;
/*
 * API url will be: <base-url>/public/api/product/productcategorys
 */
Route::group(
    [
        'prefix' => 'product/productcategorys',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [ProductCategorysController::class, 'getAssets'])
        ->name('vh.backend.product.api.productcategorys.assets');
    /**
     * Get List
     */
    Route::get('/', [ProductCategorysController::class, 'getList'])
        ->name('vh.backend.product.api.productcategorys.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [ProductCategorysController::class, 'updateList'])
        ->name('vh.backend.product.api.productcategorys.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [ProductCategorysController::class, 'deleteList'])
        ->name('vh.backend.product.api.productcategorys.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [ProductCategorysController::class, 'createItem'])
        ->name('vh.backend.product.api.productcategorys.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [ProductCategorysController::class, 'getItem'])
        ->name('vh.backend.product.api.productcategorys.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [ProductCategorysController::class, 'updateItem'])
        ->name('vh.backend.product.api.productcategorys.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [ProductCategorysController::class, 'deleteItem'])
        ->name('vh.backend.product.api.productcategorys.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [ProductCategorysController::class, 'listAction'])
        ->name('vh.backend.product.api.productcategorys.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [ProductCategorysController::class, 'itemAction'])
        ->name('vh.backend.product.api.productcategorys.item.action');



});
