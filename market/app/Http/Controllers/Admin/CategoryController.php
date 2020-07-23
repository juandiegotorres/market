<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use File;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::orderBy('name')->paginate(10);
		return view('admin.categories.index')->with(compact('categories'));
	}

	public function create()
	{
		return view('admin.categories.create');
	}

	public function store(Request $request)
	{
		//validacion
		$this->validate($request, Category::$rules, Category::$messages);
		//registrado de la categoria
		$category = Category::create($request->only('name', 'description'));

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$path = public_path() . '/images/categories';
			$fileName = uniqid() . '-' . $file->getClientOriginalName();
			$moved = $file->move($path, $fileName);

			if ($moved) {
				$category->image = $fileName;
				$category->save(); //INSERT    		
			}
		}

		return redirect('admin/categories');
	}

	public function edit(Category $category)
	{
		return view('admin.categories.edit')->with(compact('category'));
	}

	public function update(Request $request, Category $category)
	{
		//actualizar categoria
		$this->validate($request, Category::$rules, Category::$messages);

		$category->update($request->only('name', 'description'));
		
		if ($request->hasFile('image')) {
			
			$file = $request->file('image');
			$path = public_path() . '/images/categories';
			$fileName = uniqid() . '-' . $file->getClientOriginalName();
			$moved = $file->move($path, $fileName);

			
			if ($moved) {
				$previousPath = $path. '/' . $category->image;
				$category->image = $fileName;
				$saved = $category->save(); //UPDATE    	
				
				if($saved)
					File::delete($previousPath);	
			}
		}

		return redirect('admin/categories');
	}

	public function destroy(Category $category)
	{

		$category->delete(); // DELETE

		return back();
	}
}
