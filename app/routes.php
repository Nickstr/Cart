<?php

Route::get('/', function()
{
    // Product Creator
    $productCreator = App::make('Cart\Product\ProductCreator');

    // Create Product
    $product = $productCreator->create();

    // Set options on product
    $product->name = "Test Product";
    $product->setOptions(['color', 'size']);
    $product->save();

    // Variant creator
    $variantCreater = App::make('Cart\Product\VariantCreator');

    // Create first variant
    $variantOne = $variantCreater->create($product, [
        'color'     => 'red',
        'size'      => 'xl',
        'price'     => '12.00',
        'quantity'  => '10'
    ]);

    // Create second variant
    $variantTwo = $variantCreater->create($product, [
        'color'     => 'red',
        'size'      => 'l',
        'price'     => '12.00',
        'quantity'  => '5',
        'test'     => 'test'
    ]);

    // Return all product variants
    dd($product->getVariants());

    // Create new product renderer
    $productRenderer = new Cart\Product\ProductRenderer($product);

    // Render out options (color/size/etc)
    dd($productRenderer->renderOptions());
});
