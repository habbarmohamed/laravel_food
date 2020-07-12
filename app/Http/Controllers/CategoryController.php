<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
// use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function index()
    {
        //
        $categories = Category::all();
        
        return view('admin.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  
        $p =  Category::create($request->except('image'));
        $formInput = "";
        $image = $request->image;
        if($image) {
        $imageName = time() . $image->getClientOriginalName();
        $image->move('images/Logo', $imageName);
        $formInput = $imageName;
       }
       
       $p->image = $formInput;
       $p->save();

       return redirect('admin/categories')->with('success', ['Category Adding successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $Category = Category::all();
        $categories = Category::find($id);


            return view('admin.categories.edit',compact('Category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $categories = Category::find($id);
        $categories->update($request->except('image'));

        $formInput = "";
        $image = $request->image;
        if($image) {
        $imageName = time() . $image->getClientOriginalName();
        $image->move('images/Logo', $imageName);
        $formInput = $imageName;
       }
       
       $categories->image = $formInput;
       $categories->save();

            return redirect('admin/categories')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $categories = Category::find($id);
        $categories->delete();
            return redirect('admin/categories')->with('success', 'Category has been deleted Successfully');
    }
}
