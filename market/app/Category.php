<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public static $messages = [
        'name.required' => 'El campo nombre no puede estar vacio.', 
        'name.min' => 'El nombre de la categoría debe tener mínimo 3 caracteres.',
        'description.max' => 'El campo descripción solo admite 200 caracteres.',
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'max:200',

    ];

	protected $fillable = ['name', 'description'];

    // $category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image)
            return '/images/categories/'.$this->image;
        // else
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;

        return '/images/default.gif';
    }
}