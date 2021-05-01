<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

use App\Product;
use App\Attribute;
use App\Mastercategory;

class Category extends Model
{
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

 	protected $guarded = [];
 	
    public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function product(){

		return $this->belongsToMany(Product::class);
	}

	public function attribute(){

		return $this->belongsToMany(Attribute::class);
	}

	public function mastercategories(){

		return $this->belongsToMany(Mastercategory::class);
	}


	public function childerns(){

		return $this->belongsToMany(Category::class,'category_parent','category_id','parent_id');
	}


	
}
