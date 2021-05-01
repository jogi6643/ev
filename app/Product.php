<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

use App\Category;
use App\Attribute;
use App\Brand;
use App\Mastercategory;
use App\Variance;

class Product extends Model
{
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

 	protected $guarded = [];


 	public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function productChildren(){

		return $this->hasMany(Product::class, 'parent_id');
	}


	public function categories(){

		return $this->belongsToMany(Category::class);
	}

	public function getCategoryName(){
		return $this->categories()->first()->name;
	}


	public function attributes(){

		return $this->belongsToMany(Attribute::class);
	}

	public function brands(){

		return $this->belongsToMany(Brand::class);
	}

	public function getBrandName(){

		return $this->brands()->first()->name;
	}


	public function variances(){

		return $this->belongsToMany(Variance::class);
	}



	public function mastercategories(){

		return $this->belongsToMany(Mastercategory::class);
	}

	public function getMasterCategoryName(){

		return $this->mastercategories()->first()->name;
	}



}
