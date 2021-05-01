<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mastercategory;
use App\User;
use Auth;
use App\Category;
use App\Attribute;
use App\Brand;
use App\Product;
use App\Variance;
use App\Category_Mastercategory;
use App\Category_Product;
use App\Attribute_Category;
use App\Attribute_Product;
use App\Brand_product;
use App\Mastercategory_product;

class AdminController extends Controller
{


    public function index(){

    	$total_brand = Brand::get()->count();
    	$total_popular_brand = Brand::where('featured',1)->get()->count();
		$mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
	    $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
	    $total_cars = Product::whereIn('id',$fetchproductids)->where('status',1)->get()->count();
    	return view('admin/dashbord',compact('total_brand','total_cars','total_popular_brand'));
    }

    public function active_status(Request $request){

    	if($request->ajax()){
    	if(isset($request)){

			$id = $request->id; 
	 		$dbname = ucfirst($request->dbname);

			$model = '\\App\\'. $dbname; 

	 		$getStatus = $model::where('id',$id)->first()->status;
	 		if($getStatus=='0'){

	 			$model::where('id',$id)->update([
	 				'status' => '1'
	 			]);
	 			return 'success';
	 		}else{
	 			$model::where('id',$id)->update([
	 				'status' => '0'
	 			]);
	 			return 'success';
	 		}
    
    	}
    	}

    	return 'Oop! not access the request';
    }

    public function position(Request $request){

    	if($request->ajax()){
    	if(isset($request)){

			if($request->update=='1'){

				foreach ($request->position as  $value) {
					
					$index = $value[0];
					$positionValue = $value[1];
					$dbname = ucfirst($value[2]);

					$model = '\\App\\'.$dbname;

					$model::where('id',$index)->update([
			 				'position' => $positionValue
			 			]);
				}
		 		
		 		return 'success';
	 		}		 			
    	}
    	}

    	return 'Oop! not access the request';
    }




    
}