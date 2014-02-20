<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    $variantOne = [
        'color'     => 'red',
        'size'      => 'xl',
        'price'     => '12.00',
        'quantity'  => '10'
    ];

    $variantTwo = [
        'color'     => 'red',
        'size'      => 'l',
        'price'     => '11.50',
        'quantity'  => '5'
    ];

    $productCreator = App::make('Cart\Product\ProductCreator');
    $product = $productCreator->createProduct();
    $product->setOptions(['color', 'size', 'price', 'quantity']);

    $variantCreater = App::make('Cart\Product\VariantCreator');

    $product->addVariant($variantCreater->createVariant($product, $variantOne));
    $product->addVariant($variantCreater->createVariant($product, $variantTwo));

    $productRenderer = new Cart\Product\ProductRenderer($product);

    dd($productRenderer->renderOptions());
});
