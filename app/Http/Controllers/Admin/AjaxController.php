<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mastercategory;
use App\Category;


class AjaxController extends Controller
{

	public function selectCategory(Request $request)
    {
    	if($request->ajax()){
    		$getData = Mastercategory::where('id', $request->id)->first();
    		$selectData = $getData->categories;
            
    		$data = view('admin.selectAjax.select-category',compact('selectData'))->render();
    		return response()->json(['options'=>$data]);
    	}
    }

    public function selectAttribute(Request $request)
    {
    	if($request->ajax()){
    		$getData = Category::where('id', $request->id)->first();
    		$selectData = $getData->attribute;
    		$data = view('admin.selectAjax.select-attribute',compact('selectData'))->render();
    		return response()->json(['options'=>$data]);
    	}
    }

    public function selectProduct(Request $request)
    {
        if($request->ajax()){

            $data = view('admin.selectAjax.select-product')->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function selectProductOption(Request $request)
    {


            $data = view('admin.selectAjax.select-product-option')->render();
            return response()->json(['options'=>$data]);
    
    }
    


    
}
