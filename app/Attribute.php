<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

use App\Category;
use App\Product;

class Attribute extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'attributs_table';

 	protected $guarded = [];


 	public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function category(){

		return $this->belongsToMany(Category::class);
	}

	public function products(){

		return $this->belongsToMany(Product::class);
	}
	



}
