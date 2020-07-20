<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
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
		//registrado del producto
        Category::create($request->all());//asignacion masiva

		return redirect('admin/categories');
	}

	public function edit(Category $category)
	{
		return view('admin.categories.edit')->with(compact('category'));
	}

	public function update(Request $request, Category $category)
	{

		$this->validate($request, Category::$rules, Category::$messages);

		
        
        $category->update($request->all());

		return redirect('admin/categories');
	}

	public function destroy(Category $category)
	{
	 
	    $category->delete(); // DELETE
	 
	    return back();
	}


}
