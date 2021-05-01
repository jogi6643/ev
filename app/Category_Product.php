<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Category_Product extends Model
{
	
    protected $table = 'category_product';
 	protected $guarded = [];

}