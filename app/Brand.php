<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Brand extends Model
{
   

   protected $fillable = ['name', 'description', 'slug','logo'];

   public function getRouteKeyName()
	{
	    return 'slug';
	}


   public function products(){

		return $this->belongsToMany(Product::class);
	}

}
