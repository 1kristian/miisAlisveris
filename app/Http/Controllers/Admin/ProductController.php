<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;

use App\Product;
use App\Category;
use App\ProductCategory;
use App\ProductGallery;

class ProductController extends Controller
{
    /**
     * Display a listing of the Products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('admin/product.index')
                      ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all()->toHierarchy();
      return view('admin/product.create')
                      ->with('categories', $categories);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

      $product = new Product;
      $product->name = $request->name;
      $product->slug = str_slug($request->slug);
      $product->content = $request->content;
      $product->image = $request->image;
      $product->price = $request->price;
      if($product->save()){
          // Add Categories
         foreach($request->multiSelect as $categories){
          $category = new ProductCategory;
          $category->product_id = $product->id;
          $category->category_id = $categories;
          $category->save();
           }
         \Session::flash('admin_flash_message_success','Product created.');
         return redirect()->route('admin.product.create');
       }else{
         \Session::flash('admin_flash_message_error','Product not created.');
         return redirect()->route('admin.product.create');
       }
    }

    /**
     * Display the specified Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $categories = Category::all()->toHierarchy();
      $product_categories = ProductCategory::where('product_id', $id)->lists('category_id')->all();

      $product = Product::find($id);
      return view('admin/product.edit')
                      ->with('product', $product)
                       ->with('product_categories', $product_categories)
                      ->with('categories', $categories);
    }

    /**
     * Update the Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
      $product = Product::find($id);
      $product->name = $request->name;
      $product->content = $request->content;
      $product->image = $request->image;
      $product->price = $request->price;
      if($product->save()){
         // Delete older records
        ProductCategory::where('product_id', $product->id)->delete();
         foreach($request->multiSelect as $categories){
           // Add new categories
          $category = new ProductCategory;
          $category->product_id = $product->id;
          $category->category_id = $categories;
          $category->save();
           }
           \Session::flash('admin_flash_message_success','Product updated.');
           return redirect()->route('admin.product.edit', ['id' => $id]);
         }else{
            \Session::flash('admin_flash_message_error','Product not updated.');
             return redirect()->route('admin.product.edit', ['id' => $id]);
          }
     }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int  $id
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::destroy($id);
      if($product){
        \Session::flash('admin_flash_message_success','Product deleted.');
        return redirect()->route('admin.product.index');
      }else{
        \Session::flash('admin_flash_message_error','Product not deleted.');
        return redirect()->route('admin.product.index');
      }
    }
}
