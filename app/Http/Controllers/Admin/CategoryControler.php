<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("users.admin.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {$formFilled=$request->validated();
       Category::create($formFilled);
      return to_route("category.index")->with("success","create products is success"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
  {return view("users.admin.category.show",compact("category")); }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {      $categories = Category::all();
        return view("users.admin.category.edit", compact("categories"));  }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {$formFilled=$request->validated();
$category->fill($formFilled)->save();
 return to_route("category.index")->with("success","edit products is success");
   
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {$category->delete();
        return to_route("category.index");
    }
}
