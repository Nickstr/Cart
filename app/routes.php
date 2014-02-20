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
    // Product Creator
    $productCreator = App::make('Cart\Product\ProductCreator');

    // Create Product
    $product = $productCreator->createProduct();

    // Set options on product
    $product->setOptions(['color', 'size', 'price', 'quantity']);

    // Variant creator
    $variantCreater = App::make('Cart\Product\VariantCreator');

    // Create first variant
    $variantOne = $variantCreater->createVariant($product, [
        'color'     => 'red',
        'size'      => 'xl',
        'price'     => '12.00',
        'quantity'  => '10'
    ]);

    // Create second variant
    $variantTwo = $variantCreater->createVariant($product, [
        'color'     => 'red',
        'size'      => 'l',
        'price'     => '12.00',
        'quantity'  => '5',
        'penis'     => 'test'
    ]);

    // Add variants to product
    $product->addVariant($variantOne);
    $product->addVariant($variantTwo);

    // Return all product variants
    $product->getVariants();

    // Create new product renderer
    $productRenderer = new Cart\Product\ProductRenderer($product);

    // Render out options (color/size/etc)
    $productRenderer->renderOptions();

});
