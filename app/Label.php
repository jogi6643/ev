<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Label extends Model
{
	
    protected $table = 'labels';
 	protected $guarded = [];

}
