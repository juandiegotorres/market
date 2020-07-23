<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	public static $messages = [
		'name.required' => 'El campo nombre no puede estar vacio.', 
		'name.min' => 'El nombre del producto debe tener mínimo 3 caracteres.',
		'description.required' => 'El campo descripción no puede estar vacio.',
		'description.max' => 'El campo descripción solo admite 200 caracteres.',
		'price.required' => 'El campo precio no puede estar vacio.',
		'price.numeric' => 'Ingrese un precio válido.',
		'price.min' => 'No se admiten valores negativos.'
	];

	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'required|max:200',
		'price' => 'required|numeric|min:0', 

	];
	
	// $product->category
	public function category()
	{
		return $this ->belongsTo(Category::class);
	}

	// $product->images
	public function images()
	{
		return $this->hasMany(ProductImage::class);
	}
	
	public function getFeaturedImageUrlAttribute()
	{
		$featuredImage = $this->images()->where('featured', '1')->first();
		if (!$featuredImage)
			$featuredImage = $this->images()->first();
		
		if ($featuredImage){
			return $featuredImage->url;
		}

		//devolver imagen por defecto
		return '/images/default.png';
	}

	public function getCategoryNameAttribute()
	{
		if ($this->category)
			return $this->category->name;
		
		return 'General';
	
	}
}