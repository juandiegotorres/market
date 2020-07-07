<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
	public function index()
	{
		$products = Product::paginate(10);
		return view('admin.products.index')->with(compact('products'));
	}

	public function create()
	{
		return view('admin.products.create');
	}

	public function store(Request $request)
	{
		//validacion
		$messages = [
			'name.required' => 'El campo nombre no puede estar vacio.', 
			'name.min' => 'El nombre del producto debe tener mínimo 3 caracteres.',
			'description.required' => 'El campo descripción no puede estar vacio.',
			'description.max' => 'El campo descripción solo admite 200 caracteres.',
			'price.required' => 'El campo precio no puede estar vacio.',
			'price.numeric' => 'Ingrese un precio válido.',
			'price.min' => 'No se admiten valores negativos.'
		];

		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|max:200',
			'price' => 'required|numeric|min:0', 

		];
		$this->validate($request, $rules, $messages);

		//registrado del producto
		$product = new Product();
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save(); //INSERT

		return redirect('admin/products');
	}

	public function edit($id)
	{
		$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product'));
	}

	public function update(Request $request, $id)
	{
		$messages = [
			'name.required' => 'El campo nombre no puede estar vacio.', 
			'name.min' => 'El nombre del producto debe tener mínimo 3 caracteres.',
			'description.required' => 'El campo descripción no puede estar vacio.',
			'description.max' => 'El campo descripción solo admite 200 caracteres.',
			'price.required' => 'El campo precio no puede estar vacio.',
			'price.numeric' => 'Ingrese un precio válido.',
			'price.min' => 'No se admiten valores negativos.'
		];

		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|max:200',
			'price' => 'required|numeric|min:0', 

		];
		$this->validate($request, $rules, $messages);

		
		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
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
