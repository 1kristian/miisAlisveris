<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductGalleryUpdateRequest;
use App\Http\Requests\Admin\ProductGalleryStoreRequest;


use App\ProductGallery;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the Product Gallery.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


     }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created Product Gallery in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryStoreRequest $request)
    {
      $gallery = new ProductGallery;
      $gallery->product_id = $request->product_id;
      $gallery->rank = $request->rank;
      $gallery->image = $request->image;
      $gallery->status = ($request->status != "") ? 1 : 0;

      $gallery->save();

      if($gallery){
        \Session::flash('admin_flash_message_success','Gallery updated.');
        return redirect()->route('admin.productgallery.show', ['id' => $request->product_id]);
      }else{
         \Session::flash('admin_flash_message_error','Gallery not updated.');
          return redirect()->route('admin.productgallery.show', ['id' => $request->product_id]);
       }
    }

    /**
     * Display the specified Product Gallery.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product_galleries = ProductGallery::where('product_id', $id)->get();
      return view('admin/productgallery.index')
                      ->with('getID', $id)
                      ->with('product_galleries', $product_galleries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the Product Gallery in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryUpdateRequest $request, $id)
    {
        $gallery = ProductGallery::findOrFail($id);
        $gallery->rank = $request->rank;
        $gallery->image = $request->image;
        $gallery->status = ($request->status != NULL) ? $request->status : 0;
        $gallery->save();

        if($gallery){
          \Session::flash('admin_flash_message_success','Gallery updated.');
          return redirect()->route('admin.productgallery.show', ['id' => $request->product_id]);
        }else{
           \Session::flash('admin_flash_message_error','Gallery not updated.');
          return redirect()->route('admin.productgallery.show', ['id' => $request->product_id]);
         }
    }

    /**
     * Remove the specified Product Gallery from storage.
     *
     * @param  int  $id
     * @return \Laracasts\Flash\Flash
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $gallery = ProductGallery::destroy($id);
      if($gallery){
        \Session::flash('admin_flash_message_success','Gallery deleted.');
        return redirect()->back();
      }else{
        \Session::flash('admin_flash_message_error','Gallery not deleted.');
        return redirect()->back();
      }
    }
}
