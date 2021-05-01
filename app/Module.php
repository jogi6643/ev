<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Module extends Model
{
	
    protected $table = 'module';
 	protected $guarded = [];

}
