<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Home > Category > Category Name
Breadcrumbs::register('category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Category');
    $breadcrumbs->push($category->name, url('category', $category->slug));
});

// Home > Category > Category > .... > Product Name
Breadcrumbs::register('product', function($breadcrumbs, $product) {
    $breadcrumbs->parent('home');
    $product_categories = \App\ProductCategory::where('product_id', $product->id)->get();
    if($product_categories){
    foreach($product_categories as $product_category){
        $category_name = \App\Category::find($product_category->category_id);
        if($category_name){
        $breadcrumbs->push($category_name->name, url('category', $category_name->slug));
        }
    }
    }
    $breadcrumbs->push('Product '.$product->name, url('product', $product->slug));
 });



// Home > Profile
Breadcrumbs::register('profile', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Profile', url('profile'));
});
// Home > Profile > New Address
Breadcrumbs::register('profile.newaddress', function($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('New Address', url('profile/newAddress'));
});
// Home > Profile > Address ID > Update Address
Breadcrumbs::register('profile.showaddress', function($breadcrumbs, $address) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('Address ID '.$address->user_address_id, url('profile/showAddress', $address->user_address_id));
    $breadcrumbs->push('Update Address');
});



// Home > Cart
Breadcrumbs::register('cart', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cart', url('/cart'));
});

// Home > Cart > View Cart
Breadcrumbs::register('viewcart', function($breadcrumbs)
{
    $breadcrumbs->parent('cart');
    $breadcrumbs->push('Wiew Cart', url('/cart'));
});

// Home > Cart > Checkout > Payment & Shipping Information
Breadcrumbs::register('checkout', function($breadcrumbs)
{
    $breadcrumbs->parent('cart');
    $breadcrumbs->push('Checkout', url('/checkout'));
    $breadcrumbs->push('Payment & Shipping Information', url('/checkout'));
});
