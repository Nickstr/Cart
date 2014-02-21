<?php

Route::get('/', function()
{
    // Product Creator
    $productCreator = App::make('Cart\Product\ProductCreator');

    // Create Product
    $product = $productCreator->create(['color', 'size']);

    // Variant creator
    $variantCreator = App::make('Cart\Product\VariantCreator');

    // Create first variant
    $variantCreator->create($product, [
        'color'     => 'red',
        'size'      => 'xl',
        'price'     => '15.50',
        'quantity'  => '10'
    ]);

    // Create second variant
    $variantCreator->create($product, [
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


Route::get('/update/{id}', function($id)
{
    // Product Creator
    $productGetter = App::make('Cart\Product\ProductGetter');
    $product = $productGetter->get($id);

    $productUpdater = App::make('Cart\Product\ProductUpdater');
    $productUpdater->addOptions($product, ['height', 'width', 'whatever']);

    $variantUpdater = App::make('Cart\Product\VariantUpdater');

    foreach($product->variants as $variant) {
        $variantUpdater->update($variant, ['height' => '200', 'price' => '13.37']);
    }
});


