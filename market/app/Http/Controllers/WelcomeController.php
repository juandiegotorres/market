<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class WelcomeController extends Controller
{
    public function welcome()

    {
    	return view('welcome');
    }
    
    public function show()
    {
        $products = Product::paginate(12);
        $categories = Category::has('products')->get();
    	return view('products')->with(compact('categories', 'products'));
    }
}
