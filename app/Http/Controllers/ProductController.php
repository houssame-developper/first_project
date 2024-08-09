<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Vtiful\Kernel\Format;

class ProductController extends Controller
{

    public function main(Request $request)
    {
        $name =($request->input("name"));
        $categoryId =($request->input("categories"));
       $min =($request->input("min"));
      $max =($request->input("max"));

        $productsQuery = Product::query()->with("category");
       // $minPrice=Product::query()->min("category");
       // $maxPrice=Product::query()->max("category");
        if (!empty($name)) {
            $productsQuery->where("name", "like", "%{$name}%")->orWhere("description", "like", "%{$name}%");
        }
        if (!empty($categoryId)) {
            $productsQuery->whereIn("category_id", $categoryId);
        }
        if (!empty($min)) {
            $productsQuery->where("prix", ">=", $min);
        }
        if (!empty($max)) {
            $productsQuery->where("prix", "<=",$max);
        }
        $products = $productsQuery->get();
        $prices=$products->pluck("prix")->all();
        $priceOptions=['minPrice'=>min($prices)??0,
    'maxPrice'=>max($prices)??0];
        $categories = Category::with("products")->has('products')->get();
        return view("main", compact("products", "categories","priceOptions"));
    }
    public function index()
    {
        $products = Product::paginate(2);
        return view("users.admin.product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("users.admin.product.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFilled = $request->validated();
        $formFilled['image'] = $request->file('image')->store("images", 'public');
        Product::create($formFilled);
        return to_route("product.index")->with("success", "create products is success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("users.admin.product.show", compact("product"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $categories = Category::all();
        return view("users.admin.product.edit", compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $formFilled = $request->validate([
            'name' => "required|min:5",
            'description' => "required|min:30",
            'quantity' => "required|numeric",
            'image' => 'image|mimes:png,jpeg,jpg,svg',
            'prix' => "required",
            'category_id' => ""
        ]);
        $formFilled['image'] = ($request->hasFile('image')) ? $request->file('image')->store("images", 'public') : $product->image;
        $product->fill($formFilled)->save();
        return to_route("product.index")->with("success", "edit products is success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route("product.destroy");
    }
}
