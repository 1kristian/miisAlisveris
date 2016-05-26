<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;

use App\Category;
use Auth;
use Flash;

class CategoryController extends Controller
{

  /**
   * Check user role
   * @param int Auth::id();
   * @return \Illuminate\Http\Response
   */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $categories = Category::all()->toHierarchy();

      return view('admin/category.index')
                      ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories = Category::all()->toHierarchy();
      return view('admin/category.create')
                      ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
      $category = Category::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'content' => $request->content,
        'image' => $request->image,
      ]);

      if($request->parent_id > 0){
        $category->makeChildOf($request->parent_id);
      }

      if($category){
        Flash::success('Category created.');
        return redirect()->route('admin.category.create');
      }else{
        Flash::error('Category not created.');
        return redirect()->route('admin.category.create');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $categories = Category::all()->toHierarchy();
      $category = Category::find($id);
      return view('admin/category.edit')
                      ->with('category', $category)
                      ->with('categories', $categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
      $category = Category::findOrFail($id);
      $category->name = $request->name;
      $category->slug = $request->slug;
      $category->content = $request->content;
      $category->image = $request->image;
 
    if($request->parent_id){
         $category->makeChildOf($request->parent_id);
    }
    if($category->save()){
      Flash::success('Category updated.');
      return redirect()->route('admin.category.edit', ['id' => $id]);
    }else{
       Flash::error('Category not updated.');
        return redirect()->route('admin.category.edit', ['id' => $id]);
     }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::destroy($id);
        if($category){
          Flash::success('Category deleted.');
          return redirect()->route('admin.category.index');
        }else{
          Flash::error('Category not deleted.');
          return redirect()->route('admin.category.index');
        }
    }
}
