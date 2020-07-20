<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->get();
        $categories = Product::where('categories.name', 'like', "%$query%")->join('categories', 'categories.id', '=', "products.category_id")->select('products.id', 'products.name', 'products.description', 'products.long_description', 'products.price', 'products.category_id')->get();

        // $categories = Category::where('name', 'like', "%$query%")->get('id');
        // $products1 = Product::where('id', '=', "$categories");
        if ($products->count() == 1) {
            $id = $products->first()->id;
            return redirect("products/$id"); // 'products/'.$id
        }
        return view('search.show')->with(compact('products', 'query', 'categories'));
    }
    public function data()
    {
        $products = Product::pluck('name');
        return $products;
    }
}
