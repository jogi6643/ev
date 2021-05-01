<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;

class Mastercategory extends Model
{
    protected $table = 'mastercategories';
    protected $guarded = [];

    public function categories(){

		return $this->belongsToMany(Category::class);
	}

	 public function products(){

		return $this->belongsToMany(Product::class);
	}
}
