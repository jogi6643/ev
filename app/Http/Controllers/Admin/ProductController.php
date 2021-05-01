<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mastercategory;
use App\Category;
use App\Attribute;
use App\Brand;
use App\Product;
use App\Variance;
use App\State;
use DB;

class ProductController extends Controller
{
  
    public function index()
    {
       
        try{
        $categories = Category::all();
        $products = Product::where('parent_id','0')->orderBy('position', 'ASC')->get()->map(function($data){
            $data->productChild = $data->productChildren;
            return $data;
        });
    
        }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
        return view('admin/product/index', compact('categories','products'));
    }

    public function create()
    {
       try{
        $mastercategories = Mastercategory::all();
        $categories = Category::all();
        $attributes = Attribute::all();
        $brands = Brand::all();
        $products = Product::where('parent_id','0')->get();
        $state = State::where('status',1)->get();
        return view('admin/product/add-product', compact('categories', 'attributes', 'mastercategories', 'brands','products','state'));
         }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
    }


    public function store(Request $request)
    {
        // unset($arr[2]);
        

        // $vliadte = $request->validate([
        //     'name' => 'required',
        //     'roadprice' => 'required',
        //     'price' => 'required',
        //     'mastercategory_id' => 'required',
        //     'category_id' => 'required',
        //     'brand_id' => 'required',
        //     'description' => 'required'
        // ]);

  
        if($request->product_type == 'variance'){
          
            $product = Product::create([

                'parent_id' => $request->product_id,
                'name' => $request->name,
                'on_roadprice' => $request->roadprice,
                'price' => $request->price,
                'image' => json_encode($request->uploaded_image_name),
                'product_type' => $request->product_type,
                'description' => ($request->description)!=''? $request->description:'null',
                'product_type' => $request->product_type,
                
            ]);

            foreach($request->attributeId as $key => $value){

                DB::table('attribute_product')->insert([

                    'product_id' => $product->id,
                    'attribute_id' => $value,
                    'name' => $request->attribute_value[$key]
                ]);
            }

            $product->mastercategories()->attach($request->mastercategory_id);
            $product->categories()->attach($request->category_id);
            $product->brands()->attach($request->brand_id);
            Product::where('id',$product->id)->update(['states_id'=>$request->state_id]);
           
            return back()->with('message','Product variance created successfully..');

        }else{
            
           $product = Product::create([

                'parent_id' => '0',
                'name' => $request->name,
                'on_roadprice' => $request->roadprice,
                'price' => $request->price,
                'image' => json_encode($request->uploaded_image_name),
                'product_type' => 'product',
                'description' => ($request->description)!=''? $request->description:'null',
            ]); 

           foreach($request->attributeId as $key => $value){

                DB::table('attribute_product')->insert([

                    'product_id' => $product->id,
                    'attribute_id' => $value,
                    'name' => $request->attribute_value[$key]
                ]);
            }
            $product->mastercategories()->attach($request->mastercategory_id);
            $product->categories()->attach($request->category_id);
            $product->brands()->attach($request->brand_id);

            return back()->with('message','Product created successfully..');
        }   

    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        try
        {
        $productDetails = Product::findOrFail($id);
        $attributValue = DB::table('attribute_product')->where('product_id', $id)->get();
        $mastercategories = Mastercategory::all();
        $categories = Category::all();
        $attributes = Attribute::all();
        $branded = Brand::all();
        $products = Product::where('parent_id','0')->get();

        $state = State::where('status',1)->get();

        
        $tag_name = DB::table('tag_name')->get();
        
        return view('admin.product.edit', compact('categories', 'attributes', 'mastercategories', 'branded','products','productDetails','attributValue','state','tag_name'));

         }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
    }


    public function update(Request $request, $id)
    {

    // $vliadte = $request->validate([
    //         'name' => 'required',
    //         'roadprice' => 'required',
    //         'price' => 'required',
    //         'mastercategory_id' => 'required',
    //         'category_id' => 'required',
    //         'brand_id' => 'required',
    //         'description' => 'required',
    //         'state_id'=> 'required'
    //     ]);
    // dd($request->all());
        if($request->product_type == 'variance'){

            $product = Product::findOrFail($id);
            $productData = [
                'parent_id' => $request->product_id,
                'name' => $request->name,
                'on_roadprice' => $request->roadprice,
                'price' => $request->price,
                'image' => json_encode($request->uploaded_image_name),
                'product_type' => $request->product_type,
                'description' => ($request->description)!=''? $request->description:'null',
                'product_type' => $request->product_id,
                
                // 'state_id'=> $request->state_id
            ];
            $product->save($productData);

            $product->attributes()->detach();
            foreach($request->attributeId as $key => $value){

                 DB::table('attribute_product')->insert([

                    'product_id' => $product->id,
                    'attribute_id' => $value,
                    'name' => $request->attribute_value[$key]
                ]);
            }
            $product->mastercategories()->detach();
            $product->mastercategories()->attach($request->mastercategory_id);
            $product->categories()->detach();
            $product->categories()->attach($request->category_id);
            $product->brands()->detach();
            $product->brands()->attach($request->brand_id);
            Product::where('id',$id)->update(['parent_id' => $request->product_id,'name' => $request->name,'on_roadprice' => $request->roadprice,'price' => $request->price,'image' => json_encode($request->uploaded_image_name),'product_type' => $request->product_type,'description' => ($request->description)!=''? $request->description:'null','states_id'=>$request->state_id,'tag_name' => json_encode($request->tag_name)]);
            
            // Product::where('id',$id)->update(['states_id'=>$request->state_id]);
            return back()->with('message','Product variance update successfully..');

        }else{

           $product = Product::findOrFail($id);
           $productData = [
                'parent_id' => '0',
                'name' => $request->name,
                'on_roadprice' => $request->roadprice,
                'price' => $request->price,
                'image' => json_encode($request->uploaded_image_name),
                'product_type' => 'product',
                'description' => ($request->description)!=''? $request->description:'null',
            ]; 
           
            $product->save($productData);
            $product->attributes()->detach();
    
           foreach($request->attributeId as $key => $value){

                DB::table('attribute_product')->insert([

                    'product_id' => $product->id,
                    'attribute_id' => $value,
                    'name' => $request->attribute_value[$key]
                ]);
            }
            $product->mastercategories()->detach();
            $product->mastercategories()->attach($request->mastercategory_id);
            $product->categories()->detach();
            $product->categories()->attach($request->category_id);
            $product->brands()->detach();
            $product->brands()->attach($request->brand_id);
            Product::where('id',$id)->update(['parent_id' => '0','name' => $request->name,'on_roadprice' => $request->roadprice,'price' => $request->price,'image' => json_encode($request->uploaded_image_name),'product_type' => 'product','description' => ($request->description)!=''? $request->description:'null','states_id'=>0,'tag_name' => json_encode($request->tag_name)]);

            return back()->with('message','Product updated successfully..');
        } 
    }

    public function status(Request $request)
    {
        
        if($request->ajax()){

            Product::where('id',$request->prod_id)->update(['status'=>!$request->status]);
            return response()->json(['status'=>'done']);
        }
    }
    
    public function destroy($id)
    {
        //
    }

    
}
