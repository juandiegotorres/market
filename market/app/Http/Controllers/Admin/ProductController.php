<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
	public function index()
	{
		$products = Product::orderBy('name')->paginate(10);
		return view('admin.products.index')->with(compact('products'));
	}

	public function create()
	{
		$categories = Category::orderBy('name')->get();
		return view('admin.products.create')->with(compact('categories'));//inyectar sobre la vista 
	}

	public function store(Request $request)
	{
		//validacion
		$this->validate($request, Product::$rules, Product::$messages);

		//registrado del producto
		$product = new Product();
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->category_id = $request->category_id;
		$product->long_description = $request->input('long_description');
		$product->save(); //INSERT

		return redirect('admin/products');
	}

	public function edit($id)
	{
		$categories = Category::orderBy('name')->get();
		$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product', 'categories'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, Product::$rules, Product::$messages);

		
		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->category_id = $request->category_id;
		$product->save(); //UPDATE

		return redirect('admin/products');
	}

	public function destroy($id)
	{
		
	 
	    $product = Product::find($id);
	    $product->delete(); // DELETE
	 
	    return back();
	}



}
