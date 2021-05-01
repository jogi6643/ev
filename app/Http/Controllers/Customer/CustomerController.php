<?php

namespace App\Http\Controllers\Customer;

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
use URL;
class CustomerController extends Controller
{

// *******************************Top Search According to input ************************** 
    public function search_list(Request $request)
    {

      try{
        if(isset($request->brand_id) || isset($request->product_id) || isset($request->battery) || isset($request->speed) || isset($request->power))
         {
          $brandid = $request->brand_id;
          $brand_productid = $request->product_id;
          $betteryid = $request->battery;
          $speedid = $request->speed;
          $powerid = $request->power;
          if(isset($brandid) || isset($brand_productid) )
          {
            
          if(isset($brandid) && isset($brand_productid) )
          {
            // echo $brandid."=".$brand_productid.'brand id';
            // dd(1);
          $productIds = Brand_product::where('brand_id',$brandid)->where('product_id',$brand_productid)->get()->toArray();
           // dd($productIds);
          $productIds = array_column($productIds, 'product_id');
          // dd($productIds);
          }
          // elseif(isset($brand_productid))
          // {
          //   dd($brand_productid);
          //  $productIds = Brand_product::where('brand_id',$brand_productid)->get()->toArray();
          //  $productIds = array_column($productIds, 'product_id');
          // }
          else
          {

          $brand = Brand::where('id',$brandid)->get()->toArray();
          $brandIds = array_column($brand, 'id');
          $productIds = Brand_product::whereIn('brand_id',$brandIds)->get()->toArray();
          $productIds = array_column($productIds, 'product_id');

          }
          


          $mastercategory_fourwheelerid = Mastercategory_product::whereIn('product_id',$productIds)
                                          ->where('mastercategory_id',$request->vehicle_type)->get()->toArray();

          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $productdata = Product::whereIn('id',$fetchproductids)->where('product_type','product')->where('status',1)->get();
          $checkdata = $productdata->toArray();
          
          if($checkdata==null){
            
            $productdatas = Product::where('id',$brand_productid)->get()->toArray();
            $brandproductids = array_column($productdatas, 'id');
            // dd($brandproductids);
            $mastercategory_fourwheelid = Mastercategory_product::whereIn('product_id',$brandproductids)
                                          ->where('mastercategory_id','1')->get()->toArray();

            $fetchproductids = array_column($mastercategory_fourwheelid, 'product_id');
            $data = Product::whereIn('id',$fetchproductids)->where('status',1)->get();
            // dd($data);
          }else{
            $data = $productdata;
          }
          

          // latest car
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchbrandids = array_column($brand_product, 'brand_id');
          $brands = Brand::whereIn('id',$fetchbrandids)->get();
          $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds = array_column($brandhome, 'product_id');
          $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
          foreach ($data5 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==3)
                     {
                     $data5[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data5[$key]->home =0;                    
                   }
          }
            // dd($brandIds);
          }
          else
          {
            //echo $betteryid.",".$speedid.",".$powerid;
            // dd($request->speed);
            if(isset($request->speed) || isset($request->power))
            {
              if(isset($request->speed))
              {
              $speed = explode('-', $request->speed);
                $require = $betteryid.",".$speedid.",".$powerid;
            $require = explode(',', $require);
            // dd($require);
            $require_value = array_values(array_filter($require));
            // dd($require_value);
            $require = explode('-', $require_value[0]);
            // dd($require);
            $requirement_search = Attribute_Product::whereIn('name', $require_value)->get()->toArray();
              
             // dd($speed);
            $speed_range = Attribute_Product::where('attribute_id',8)->whereBetween('name', [$speed[0], $speed[1]])->get()->toArray();
            // dd($);
            $attributValue2 = array_merge($requirement_search,$speed_range);
            // dd($attributValue2);


              }
              elseif(isset($request->power))
              {
              $power = explode('-', $request->power);
                $require = $betteryid.",".$speedid.",".$powerid;
            $require = explode(',', $require);
            // dd($require);
            $require_value = array_values(array_filter($require));
            // dd($require_value);
            $require = explode('-', $require_value[0]);
            // dd($require);
            $requirement_search = Attribute_Product::whereIn('name', $require_value)->get()->toArray();
              
             // dd($speed);
            $power_range = Attribute_Product::where('attribute_id',22)->whereBetween('name', [$power[0], $power[1]])->get()->toArray();
            // dd($);
            $attributValue2 = array_merge($requirement_search,$power_range);
            // dd($attributValue2);


              }
              else
              {
                $speed = explode('-', $request->speed);
                $speed_range = Attribute_Product::where('attribute_id',8)->whereBetween('name', [$speed[0], $speed[1]])->get()->toArray();
                $power = explode('-', $request->power);
                $power_range = Attribute_Product::where('attribute_id',22)->whereBetween('name', [$power[0], $power[1]])->get()->toArray();
                $require = $betteryid.",".$speedid.",".$powerid;
            $require = explode(',', $require);
            // dd($require);
            $require_value = array_values(array_filter($require));
            $requirement_search = Attribute_Product::whereIn('name', $require_value)->get()->toArray();
            $attributValue2 = array_merge($requirement_search,$power_range,$speed_range);
              }
            }
            else
            {
              $speed = explode('-', $request->speed);
                $require = $betteryid.",".$speedid.",".$powerid;
            $require = explode(',', $require);
            // dd($require);
            $require_value = array_values(array_filter($require));
            // dd($require_value);
            $require = explode('-', $require_value[0]);
            // dd($require);
            $attributValue2 = Attribute_Product::whereIn('name', $require_value)->get()->toArray();
              
            }
          

            
            
            $productIds = array_column($attributValue2, 'product_id');
            // dd($productIds);
            $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',$request->vehicle_type)->whereIn('product_id',$productIds)->get()->toArray();
            $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
            $data = Product::whereIn('id',$fetchproductids)->where('status',1)->get();
            // $data = Product::whereIn('id',$productIds)->where('status',1)->get();
             //dd($fetchproductids);
            // latest car
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchbrandids = array_column($brand_product, 'brand_id');
          $brands = Brand::whereIn('id',$fetchbrandids)->get();
          $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds = array_column($brandhome, 'product_id');
          $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
          foreach ($data5 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==3)
                     {
                     $data5[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data5[$key]->home =0;                    
                   }
          }
          }
          
          
        }
        else
          {
          $brand = Brand::where('name','like','%'.$request->searchtext.'%')->get()->toArray();
          $brandIds = array_column($brand, 'id');
          $productIds = Brand_product::whereIn('brand_id',$brandIds)->get()->toArray();
          $productIds = array_column($productIds, 'product_id');
          $mastercategory_fourwheelerid = Mastercategory_product::whereIn('product_id',$productIds)
                                          ->where('mastercategory_id','1')->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $productdata = Product::whereIn('id',$fetchproductids)->where('product_type','product')->where('status',1)->get();
          $checkdata = $productdata->toArray();
          if($checkdata==null){
            $productdatas = Product::where('name','like','%'.$request->searchtext.'%')->get()->toArray();
            $brandproductids = array_column($productdatas, 'id');
            $mastercategory_fourwheelid = Mastercategory_product::whereIn('product_id',$brandproductids)
                                          ->where('mastercategory_id','1')->get()->toArray();
            $fetchproductids = array_column($mastercategory_fourwheelid, 'product_id');
            $data = Product::whereIn('id',$fetchproductids)->where('product_type','product')->where('status',1)->get();
          }else{
            $data = $productdata;
          }
          // dd($data);

          // latest car
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchbrandids = array_column($brand_product, 'brand_id');
          $brands = Brand::whereIn('id',$fetchbrandids)->get();
          $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds = array_column($brandhome, 'product_id');
          $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
          foreach ($data5 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==3)
                     {
                     $data5[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data5[$key]->home =0;                    
                   }
          }
          }
         }
        catch(\Exception $e)
        {
           echo $e->getMessage();
        }
        return view('search-list',compact('data','brands','data5'));
    }
// *******************************End Top Search According to input **************************

// *******************************Welcome page Search According to input **************************
    public function msearch_type_product(Request $request)
    {
          
      
     if($request->name!=null && $request->requirements==null)
     {
       
         try{

         $check_mastercat_id = Mastercategory::where('id',$request->producttype)->first()->id??0;
         if($check_mastercat_id!=0)
          {
            $$selectData = Brand_product::where('brand_id', $request->id)->get()->toArray();
           $productIds = array_column($selectData, 'product_id');
           $data = Product::whereIn('id',$productIds)->get();

          }
          else
          {
            $data = Product::where('id',0)->get();
            
          }
            }
            catch(\Exception $e)
            {
               echo $e->getMessage();
            }

          return view('search.search-page-1',compact('data'));
     }
     else if($request->name==null && $request->requirements!=null)
     {
         try{

         $check_mastercat_id = Mastercategory::where('id',$request->producttype)->first()->id??0;

         if($check_mastercat_id!=0)
          {
            $check_mastercat_id = $check_mastercat_id;
            $check_mastercat_id = Category_Mastercategory::where('mastercategory_id',$check_mastercat_id)
                    ->get()->toArray();

            $mastercategory_id = array_column($check_mastercat_id, 'category_id');
            $fetchattribute_id = Attribute_Category::whereIn('category_id',$mastercategory_id)->get()->toArray();
            $fetchattribute_id = array_column($fetchattribute_id, 'attribute_id');
            $fetchproductids = Attribute_Product::whereIn('attribute_id',$fetchattribute_id)->get()->toArray();
            $fetchproductids = array_column($fetchproductids, 'product_id');
            $data = Product::whereIn('id',$fetchproductids)->get();
          }
          else
          {
            $data = Product::where('id',0)->get();
            
          }
            }
            catch(\Exception $e)
            {
               echo $e->getMessage();
            }

          return view('search.search-page-1',compact('data'));
     }
     else
     {
      $data = Product::get();
      return view('search.search-page-1',compact('data'));
     }
      
    }

// *******************************End Welcome page Search According to input **************************

// *******************************LIVE SEARCH FOR TOP INPUT BOX **************************************

    public function livesearchdata(Request $request)
    {
      // dd($request->toArray());
         if($request->get('query'))
         {
            try{
            $query = $request->get('query');
            $data = Mastercategory::where('name', 'LIKE', '%' . $query . '%')->get();
            if(count($data)>0)
            {
            $output='<ul class="dropdown=menu" style="display:block;list-style-type: none;>';

            foreach ($data as  $key => $value){
                $url = 'http://localhost/EV/evtype/'.$value->name; 
                $output .='<li style="list-style-type:none"  value="'.$value->id.'"><a style="text-decoration : none;" href="'.$url.'">'. $value->name.'</a></li>';
             }
             }
             else
             {
                $output='<ul class="dropdown=menu" style="display:block;list-style-type: none;>';
                $output .='<li style="list-style-type:none" value="0">"No Data Found!"</li>';
             }
            $output .='</ul>';
            echo $output;
            }
            catch(\Exception $e)
            {
               echo $e->getMessage();
            }
         }
    }
// *******************************END LIVE SEARCH FOR TOP INPUT BOX **************************************

// *****************************LIVE SEARCH ACCORDING TO NAME FOR WELCOME INPUT BOX ******************
     
   public function livesearchnamedata(Request $request)
    {
      // dd($request->toArray());
         if($request->get('query'))
         {   
            $ev     =  $request->get('ev');
            $ev1    =  $request->get('ev1');
            $query  = $request->get('query');
            $evtype = $ev;
            try{

            $check_mastercat_id = Mastercategory::where('name',$evtype)->first()->id??0;
            if($check_mastercat_id!=0)
            {
            $check_mastercat_id = $check_mastercat_id;
            $check_mastercat_id = Category_Mastercategory::where('mastercategory_id',$check_mastercat_id)
                ->get()->toArray();
            $mastercategory_id = array_column($check_mastercat_id, 'category_id');
            $fetchproductids = Category_Product::whereIn('category_id',$mastercategory_id)->get()->toArray();
            $fetchproductids = array_column($fetchproductids, 'product_id');
            $data = Product::whereIn('id',$fetchproductids)
                   ->where('name', 'LIKE', '%' . $query . '%')->get();

            }

           
            // $data = Product::where('name', 'LIKE', '%' . $query . '%')->get();
            if(count($data)>0)
            {
            $output='<ul class="dropdown=menu" style="display:block;list-style-type: none;>';

            foreach ($data as  $key => $value){
                $url = 'http://localhost/EV/evtypename/'.$ev."/".$ev1."/".$value->name; 
                $output .='<li style="list-style-type:none"  value="'.$value->id.'"><a style="text-decoration : none;" href="'.$url.'">'. $value->name.'</a></li>';
             }
             }
             else
             {
                $output='<ul class="dropdown=menu" style="display:block;list-style-type: none;>';
                $output .='<li style="list-style-type:none" value="0">"No Data Found!"</li>';
             }
            $output .='</ul>';
            echo $output;
            }
            catch(\Exception $e)
            {
               echo $e->getMessage();
            }
         }
    }
// *****************************ENDLIVE SEARCH ACCORDING TO NAME FOR WELCOME INPUT BOX ******************

// *****************************LIVE SEARCH ACCORDING TO REQUIREMENTS FOR WELCOME INPUT BOX ******************
public function livesearchrequirementsdata(Request $request)
    {
      // dd($request->toArray());
         if($request->get('query'))
         {  
             $ev =  $request->get('ev');
             $ev1 =  $request->get('ev1');
             $evtype = $ev;
            try{
            $query = $request->get('query');
            $check_mastercat_id = Mastercategory::where('name',$evtype)->first()->id??0;
            if($check_mastercat_id!=0)
            {
            $check_mastercat_id = $check_mastercat_id;
            $check_mastercat_id = Category_Mastercategory::where('mastercategory_id',$check_mastercat_id)
                                  ->get()->toArray();
            $mastercategory_id = array_column($check_mastercat_id, 'category_id');
            $fetchattribute_id = Attribute_Category::whereIn('category_id',$mastercategory_id)->get()->toArray();
            $fetchattribute_id = array_column($fetchattribute_id, 'attribute_id');
            $data = Attribute::whereIn('id',$fetchattribute_id)->where('name', 'LIKE', '%' . $query . '%')->get();
            }
            if(count($data)>0)
            {
            $output='<ul class="dropdown=menu" style="display:block;list-style-type: none;>';

            foreach ($data as  $key => $value){
                $url = 'http://localhost/EV/requirements'."/".$ev."/".$ev1."/".$value->name; 
                $output .='<li style="list-style-type:none"  value="'.$value->id.'"><a style="text-decoration : none;" href="'.$url.'">'. $value->name.'</a></li>';
             }
             }
             else
             {
                $output='<ul class="dropdown=menu" style="display:block;list-style-type: none;>';
                $output .='<li style="list-style-type:none" value="0">"No Data Found!"</li>';
             }
            $output .='</ul>';
            echo $output;
            }
            catch(\Exception $e)
            {
               echo $e->getMessage();
            }
         }
    }

    // ******************END LIVE SEARCH ACCORDING TO REQUIREMENTS FOR WELCOME INPUT BOX ******************

    // *****************************TOP SEARCH ACCORDING TO ANCHARTAG *************************************
    public function evtype($evtype)
    {
        try{
           
         $check_mastercat_id = Mastercategory::where('name',$evtype)->first()->id??0;
         if($check_mastercat_id!=0)
          {
            $check_mastercat_id = $check_mastercat_id;
            $check_mastercat_id = Category_Mastercategory::where('mastercategory_id',$check_mastercat_id)
                    ->get()->toArray();
            $mastercategory_id = array_column($check_mastercat_id, 'category_id');
            $fetchproductids = Category_Product::whereIn('category_id',$mastercategory_id)->get()->toArray();
            $fetchproductids = array_column($fetchproductids, 'product_id');
            $data = Product::whereIn('id',$fetchproductids)->get();

          }
          else
          {
            $data = Product::where('id',0)->get();
            
          }
            }
            catch(\Exception $e)
            {
               echo $e->getMessage();
            }

          return view('search.search-page-1',compact('data'));
    }
 // *****************************TOP SEARCH ACCORDING TO ANCHARTAG *************************************

  // *******************WELCOME PAGE SEARCH ACCORDING TO ANCHARTAG IN NAME BOX****************************
    public function evtypename($value1,$value2,$value3)
    {
        
         $evtype = $value1;
         try{

         $check_mastercat_id = Mastercategory::where('name',$evtype)->first()->id??0;
         if($check_mastercat_id!=0)
          {
            $check_mastercat_id = $check_mastercat_id;
            $check_mastercat_id = Category_Mastercategory::where('mastercategory_id',$check_mastercat_id)
                    ->get()->toArray();
            $mastercategory_id = array_column($check_mastercat_id, 'category_id');
            $fetchproductids = Category_Product::whereIn('category_id',$mastercategory_id)->get()->toArray();
            $fetchproductids = array_column($fetchproductids, 'product_id');
            $data = Product::whereIn('id',$fetchproductids)->where('name','like','%'.$value3.'%')->get();

          }
          else
          {
            $data = Product::where('id',0)->get();
            
          }
            }
            catch(\Exception $e)
            {
               echo $e->getMessage();
            }

          return view('search.search-page-1',compact('data'));
    }

// *******************END WELCOME PAGE SEARCH ACCORDING TO ANCHARTAG IN NAME BOX**************************

// *******************WELCOME PAGE SEARCH ACCORDING TO ANCHARTAG IN REQUIREMENTS BOX*******************
    public function requirements($value1,$value2,$value3)
    {
        $evtype = $value1;
         try{

         $check_mastercat_id = Mastercategory::where('name',$evtype)->first()->id??0;

         if($check_mastercat_id!=0)
          {
            $check_mastercat_id = $check_mastercat_id;
            $check_mastercat_id = Category_Mastercategory::where('mastercategory_id',$check_mastercat_id)
                    ->get()->toArray();

            $mastercategory_id = array_column($check_mastercat_id, 'category_id');
            $fetchattribute_id = Attribute_Category::whereIn('category_id',$mastercategory_id)->get()->toArray();
            $fetchattribute_id = array_column($fetchattribute_id, 'attribute_id');
            $fetchproductids = Attribute_Product::whereIn('attribute_id',$fetchattribute_id)->get()->toArray();
            $fetchproductids = array_column($fetchproductids, 'product_id');
            $data = Product::whereIn('id',$fetchproductids)->get();
          }
          else
          {
            $data = Product::where('id',0)->get();
            
          }
            }
            catch(\Exception $e)
            {
               echo $e->getMessage();
            }

          return view('search.search-page-1',compact('data'));
    }
    // *******************WELCOME PAGE SEARCH ACCORDING TO ANCHARTAG IN REQUIREMENTS BOX*******************
   
   //********************compare Cars **********************************/
   public function compare_car()
   {
   
  
    $brand = Brand::all();
    $brand1 = Brand::all();
    $brand2 = Brand::all();
    $brand3 = Brand::all();

    // latest car
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchbrandids = array_column($brand_product, 'brand_id');
          $brands = Brand::whereIn('id',$fetchbrandids)->get();
          $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds = array_column($brandhome, 'product_id');
          $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
          foreach ($data5 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==3)
                     {
                     $data5[$key]->home =$value;

                   }
              }
        
            }
            else
            {
              $data5[$key]->home =0;                    
            }
          }
    
    $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
    $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
    $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
    $fetchbrandids = array_column($brand_product, 'brand_id');
    $brands = Brand::whereIn('id',$fetchbrandids)->get();
    return view('search.comparecar',compact('brands','brand','brand1','brand2','brand3','data5'));
   }

   public function select_variant(Request $request)
    {
    	if($request->ajax()){
        $product_id = Brand_product::where('brand_id', $request->id)->get()->toArray();
        $product_id = array_column($product_id, 'product_id');
        $selectData = Product::whereIn('id',$product_id)->get();
    		$data = view('search.car-variant-select',compact('selectData'))->render();
    		return response()->json(['options'=>$data]);
    	}
    }

  public function add_compere_product(Request $request)
  {
    // Fetch Product
    $product = Product::where('id',$request->vehicle1)->first();
    //End Fetch Product

    // Fetch Attribute                  
    $attributeData = Attribute::get();

    foreach ($attributeData as $key1 => $value1) {
      $attributeData[$key1]->attr_name1 =  Attribute_Product::where('attribute_id',$value1->id)
                                          ->where('product_id',$request->vehicle1)
                                          ->first()->name??'No';
    }
    // End Fetch Attribute
    
    $arr = ['product'=>$product,'attData'=>$attributeData];
  
    return json_encode($arr);
  }

    public function comparepost(Request $request)
    {
      $product_id1 = isset($request->variant1) ? $request->variant1 : 0;
      $product_id2 = isset($request->variant2) ? $request->variant2 : 0;
      $product_id3 = isset($request->variant3) ? $request->variant3 : 0;
      $product_id4 = isset($request->variant4) ? $request->variant4 : 0;

      $brandid1 = isset($request->brandid1) ? $request->brandid1 : 0;
      $brandid2 = isset($request->brandid2) ? $request->brandid2 : 0;
      $brandid3 = isset($request->brandid3) ? $request->brandid3 : 0;
      $brandid4 = isset($request->brandid4) ? $request->brandid4 : 0;
      $brand = Brand::all();
      $brand1 = Brand::all();
      $brand2 = Brand::all();
      $brand3 = Brand::all();

      $productdet1 = Product::where('id',$product_id1)->first()??'No';
      $productdet2 = Product::where('id',$product_id2)->first()??'No';
      $productdet3 = Product::where('id',$product_id3)->first()??'No';
      $productdet4 = Product::where('id',$product_id4)->first()??'No';

      $variant1 = Product::all();
      $variant2 = Product::all();
      $variant3 = Product::all();
      $variant4 = Product::all();

       return view('search.compare-car-product',compact('variant1','product_id1','variant2','product_id2','variant3','product_id3','variant4','product_id4','brandid1','brandid2','brandid3','brandid4','productdet1','productdet2','productdet3','productdet4','brand','brand1','brand2','brand3','brandid1','brandid2','brandid3','brandid4'));      
      // dd( $selectData);
    }

    public function welcome()
    {
        try{
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchbrandids = array_column($brand_product, 'brand_id');
          $brands = Brand::whereIn('id',$fetchbrandids)->get();
          $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->limit(4)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds = array_column($brandhome, 'product_id');
          $data = Product::whereIn('id',$homeproductIds)->where('status',1)->get();
          foreach ($data as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==1)
                     {
                     $data[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data[$key]->home =0;                    
                   }
          }
          // dd($data->toArray());

          //popular brands
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchbrandids = array_column($brand_product, 'brand_id');
          $brands = Brand::whereIn('id',$fetchbrandids)->get();
          $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds = array_column($brandhome, 'product_id');
          $data6 = Product::whereIn('id',$homeproductIds)->where('status',1)->get();

          foreach ($data6 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==4)
                     {
                     $data6[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data6[$key]->home =0;                    
                   }
          }

          // latest car
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchbrandids = array_column($brand_product, 'brand_id');
          $brands = Brand::whereIn('id',$fetchbrandids)->get();
          $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds = array_column($brandhome, 'product_id');
          $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
          foreach ($data5 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==3)
                     {
                     $data5[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data5[$key]->home =0;                    
                   }
          }
          // dd($data5->toArray());

          $mastercategory_twowheelerid = Mastercategory_product::where('mastercategory_id',2)->get()->toArray();
          $fetchproductids2 = array_column($mastercategory_twowheelerid, 'product_id');
          $brand_product2 = Brand_product::whereIn('product_id',$fetchproductids2)->get()->toArray();
          $fetchbrandids2 = array_column($brand_product2, 'brand_id');
          $brands2 = Brand::whereIn('id',$fetchbrandids2)->get();
          $brandhome2 = Brand_product::whereIn('product_id',$fetchproductids2)->limit(4)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds2 = array_column($brandhome2, 'product_id');
          $data2 = Product::whereIn('id',$homeproductIds2)->get();
          foreach ($data2 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==1)
                     {
                     $data2[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data2[$key]->home =0;                    
                   }
          }

          $mastercategory_rikshawwheelerid = Mastercategory_product::where('mastercategory_id',3)->get()->toArray();
          $fetchproductids3 = array_column($mastercategory_rikshawwheelerid, 'product_id');
          $brand_product3 = Brand_product::whereIn('product_id',$fetchproductids3)->get()->toArray();
          $fetchbrandids3 = array_column($brand_product3, 'brand_id');
          $brands3 = Brand::whereIn('id',$fetchbrandids3)->get();
          $brandhome3 = Brand_product::whereIn('product_id',$fetchproductids3)->limit(4)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds3 = array_column($brandhome3, 'product_id');
          $data3 = Product::whereIn('id',$homeproductIds3)->get();
          foreach ($data3 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==1)
                     {
                     $data3[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data3[$key]->home =0;                    
                   }
          }

          $mastercategory_commercialwheelerid = Mastercategory_product::where('mastercategory_id',4)->get()->toArray();
          $fetchproductids4 = array_column($mastercategory_commercialwheelerid, 'product_id');
          $brand_product4 = Brand_product::whereIn('product_id',$fetchproductids4)->get()->toArray();
          $fetchbrandids4 = array_column($brand_product4, 'brand_id');
          $brands4 = Brand::whereIn('id',$fetchbrandids4)->get();
          $brandhome4 = Brand_product::whereIn('product_id',$fetchproductids4)->limit(4)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds4 = array_column($brandhome4, 'product_id');
          $data4 = Product::whereIn('id',$homeproductIds4)->get();
          foreach ($data4 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==1)
                     {
                     $data4[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data4[$key]->home =0;                    
                   }
          }

          $fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fourwheeler_productids = array_column($fourwheelerid, 'product_id');
          
          $bettery_type = Attribute::where('name','Battery Type')->get()->first();

          if($bettery_type!=null)
          {
            $attribute_id = $bettery_type->id;
            $bettery_type = Attribute_Product::where('attribute_id',$attribute_id)->whereIn('product_id',$fourwheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            // dd($bettery_type->toArray());
          }
          else
          {
            $bettery_type = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          } 

          $top_speed = Attribute::where('name','Top Speed')->get()->first();
          if($top_speed!=null)
          {
            $attribute_id = $top_speed->id;
            $top_speed = Attribute_Product::where('attribute_id',$attribute_id)->whereIn('product_id',$fourwheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            $collection = collect($top_speed);
            $top_speed = $collection->sortBy('name');
          }
          else
          {
            $top_speed = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          } 

          $horse_power = Attribute::where('name','Horse Power')->get()->first();
          if($horse_power!=null)
          {
            $attribute_id = $horse_power->id;
            $horse_power = Attribute_Product::where('attribute_id',$attribute_id)->whereIn('product_id',$fourwheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            $collection = collect($horse_power);
            $horse_power = $collection->sortBy('name');
          }
          else
          {
            $horse_power = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          }

          // two wheeler code
          $twowheelerid = Mastercategory_product::where('mastercategory_id',2)->get()->toArray();
          $twowheeler_productids = array_column($twowheelerid, 'product_id');
          
          $bettery_type2 = Attribute::where('name','Battery Type')->get()->first();

          if($bettery_type2!=null)
          {
            $attribute_id2 = $bettery_type2->id;
            $bettery_type2 = Attribute_Product::where('attribute_id',$attribute_id2)->whereIn('product_id',$twowheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            // dd($bettery_type->toArray());
          }
          else
          {
            $bettery_type2 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          } 

          $top_speed2 = Attribute::where('name','Top Speed')->get()->first();
          if($top_speed2!=null)
          {
            $attribute_id2 = $top_speed2->id;
            $top_speed2 = Attribute_Product::where('attribute_id',$attribute_id2)->whereIn('product_id',$twowheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            $collection2 = collect($top_speed2);
            $top_speed2 = $collection2->sortBy('name');
          }
          else
          {
            $top_speed2 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          } 

          $horse_power2 = Attribute::where('name','Horse Power')->get()->first();
          if($horse_power2!=null)
          {
            $attribute_id2 = $horse_power2->id;
            $horse_power2 = Attribute_Product::where('attribute_id',$attribute_id2)->whereIn('product_id',$twowheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            $collection2 = collect($horse_power2);
            $horse_power2 = $collection2->sortBy('name');
          }
          else
          {
            $horse_power2 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          }

          // riksha code
          $rikshawheelerid = Mastercategory_product::where('mastercategory_id',3)->get()->toArray();
          $rikshawheeler_productids = array_column($rikshawheelerid, 'product_id');
          
          $bettery_type3 = Attribute::where('name','Battery Type')->get()->first();

          if($bettery_type3!=null)
          {
            $attribute_id3 = $bettery_type3->id;
            $bettery_type3 = Attribute_Product::where('attribute_id',$attribute_id3)->whereIn('product_id',$rikshawheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            // dd($bettery_type->toArray());
          }
          else
          {
            $bettery_type3 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          } 

          $top_speed3 = Attribute::where('name','Top Speed')->get()->first();
          if($top_speed3!=null)
          {
            $attribute_id3 = $top_speed3->id;
            $top_speed3 = Attribute_Product::where('attribute_id',$attribute_id3)->whereIn('product_id',$rikshawheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            $collection3 = collect($top_speed3);
            $top_speed3 = $collection3->sortBy('name');
          }
          else
          {
            $top_speed3 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          } 

          $horse_power3 = Attribute::where('name','Horse Power')->get()->first();
          if($horse_power3!=null)
          {
            $attribute_id3 = $horse_power3->id;
            $horse_power3 = Attribute_Product::where('attribute_id',$attribute_id3)->whereIn('product_id',$rikshawheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            $collection3 = collect($horse_power3);
            $horse_power3 = $collection3->sortBy('name');
          }
          else
          {
            $horse_power3 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          }

          // commercial code
          $commercialwheelerid = Mastercategory_product::where('mastercategory_id',4)->get()->toArray();
          $commercialwheeler_productids = array_column($commercialwheelerid, 'product_id');
          
          $bettery_type4 = Attribute::where('name','Battery Type')->get()->first();

          if($bettery_type4!=null)
          {
            $attribute_id4 = $bettery_type4->id;
            $bettery_type4 = Attribute_Product::where('attribute_id',$attribute_id4)->whereIn('product_id',$commercialwheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            // dd($bettery_type->toArray());
          }
          else
          {
            $bettery_type4 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          } 

          $top_speed4 = Attribute::where('name','Top Speed')->get()->first();
          if($top_speed4!=null)
          {
            $attribute_id4 = $top_speed4->id;
            $top_speed4 = Attribute_Product::where('attribute_id',$attribute_id4)->whereIn('product_id',$commercialwheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            $collection4 = collect($top_speed4);
            $top_speed4 = $collection4->sortBy('name');
          }
          else
          {
            $top_speed4 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          } 

          $horse_power4 = Attribute::where('name','Horse Power')->get()->first();
          if($horse_power4!=null)
          {
            $attribute_id4 = $horse_power4->id;
            $horse_power4 = Attribute_Product::where('attribute_id',$attribute_id4)->whereIn('product_id',$commercialwheeler_productids)->select('name')->distinct()->orderBy('name', 'asc')->get();
            $collection4 = collect($horse_power4);
            $horse_power4 = $collection4->sortBy('name');
          }
          else
          {
            $horse_power4 = Attribute_Product::where('attribute_id',0)->select('name')->distinct()->get();
          }

          $popular_brands = Brand::where('featured',1)->get();

          return view('welcome',compact('brands','brands2','brands3','brands4','data','data2','data3','data4','data5','bettery_type','top_speed','horse_power','bettery_type2','top_speed2','horse_power2','bettery_type3','top_speed3','horse_power3','bettery_type4','top_speed4','horse_power4','data6','popular_brands'));
            }
            catch(\Exception $e)
                {
                   echo $e->getMessage();
                }

    }

    public function selectVehiclename(Request $request)
    {
        if($request->ajax()){      

           $selectData = Brand_product::where('brand_id', $request->id)->get()->toArray();
           $productIds = array_column($selectData, 'product_id');
           $data = Product::whereIn('id',$productIds)->get();
           $data = view('select-vehiclename',compact('data'))->render();
           return response()->json(['options'=>$data]);
            
        }
    }

    public function selectVehiclename2(Request $request)
    {
        if($request->ajax()){      

           $selectData = Brand_product::where('brand_id', $request->id)->get()->toArray();
           $productIds = array_column($selectData, 'product_id');
           $data = Product::whereIn('id',$productIds)->get();
           $data = view('select-vehiclename',compact('data'))->render();
           return response()->json(['options'=>$data]);
            
        }
    }

    public function selectVehiclename3(Request $request)
    {
        if($request->ajax()){      

           $selectData = Brand_product::where('brand_id', $request->id)->get()->toArray();
           $productIds = array_column($selectData, 'product_id');
           $data = Product::whereIn('id',$productIds)->get();
           $data = view('select-vehiclename',compact('data'))->render();
           return response()->json(['options'=>$data]);
            
        }
    }

    public function selectVehiclename4(Request $request)
    {
        if($request->ajax()){      

           $selectData = Brand_product::where('brand_id', $request->id)->get()->toArray();
           $productIds = array_column($selectData, 'product_id');
           $data = Product::whereIn('id',$productIds)->get();
           $data = view('select-vehiclename',compact('data'))->render();
           return response()->json(['options'=>$data]);
            
        }
    }

    public function vehicle_detail(Request $request)
    {
      try{
        $data = Product::where('id',$request->product_id)->get();
        $attributValue = Attribute_Product::where('product_id', $request->product_id)->get();
        foreach ($attributValue as $key => $value) {
          $attributValue[$key]->attr_name= Attribute::where('id',$value->attribute_id)->first()->name;
        }
        // dd($attributValue);
        $data_varient = Product::where('parent_id',$request->product_id)->get();
        // latest car
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
        foreach ($data5 as $key => $v) {
          if($v->tag_name!=null)
          {
            $arr = json_decode($v->tag_name);
            foreach ($arr as $value) {
                   if($value ==3)
                   {
                   $data5[$key]->home =$value;

                 }
            }
      
          }
                 else
                 {
                  $data5[$key]->home =0;                    
                 }
          }
        return view('vehicle-detail',compact('data','data_varient','data5','attributValue'));
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }

    public function vehicle_details(Request $request)
    {
      try{
        // dd($request->id);
        $id = base64_decode($request->id);
        $data = Product::where('id',$id)->get();
        $attributValue = Attribute_Product::where('product_id', $id)->get();
        foreach ($attributValue as $key => $value) {
          $attributValue[$key]->attr_name= Attribute::where('id',$value->attribute_id)->first()->name;
        }

        $data_varient = Product::where('parent_id',$id)->get();
        // latest car
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchbrandids = array_column($brand_product, 'brand_id');
          $brands = Brand::whereIn('id',$fetchbrandids)->get();
          $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
          $homeproductIds = array_column($brandhome, 'product_id');
          $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
          foreach ($data5 as $key => $v) {
            if($v->tag_name!=null)
            {
              $arr = json_decode($v->tag_name);
              foreach ($arr as $value) {
                     if($value ==3)
                     {
                     $data5[$key]->home =$value;

                   }
              }
        
            }
                   else
                   {
                    $data5[$key]->home =0;                    
                   }
          }
          // dd($data->toArray());
        return view('vehicle-detail',compact('data','data_varient','attributValue','data5'));
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }

    public function vehicle_detail_by_requirement(Request $request)
    {
      try{
        // dd($request->toArray());
        $attributValue2 = Attribute_Product::whereIn('name', $request)->get()->toArray();
        $productIds = array_column($attributValue2, 'product_id');
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->where('product_id',$productIds)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->limit(4)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data = Product::whereIn('id',$homeproductIds)->get();
        $data_varient = Product::where('parent_id',$homeproductIds)->get();
        $attributValue = Attribute_Product::where('product_id', $homeproductIds)->get();
        foreach ($attributValue as $key => $value) {
          $attributValue[$key]->attr_name= Attribute::where('id',$value->attribute_id)->first()->name;
        }

        // latest car
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
        foreach ($data5 as $key => $v) {
          if($v->tag_name!=null)
          {
            $arr = json_decode($v->tag_name);
            foreach ($arr as $value) {
                   if($value ==3)
                   {
                   $data5[$key]->home =$value;

                 }
            }
      
          }
                 else
                 {
                  $data5[$key]->home =0;                    
                 }
          }
        return view('vehicle-detail',compact('data','attributValue','data_varient','data5'));
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }

    public function twowheeler_detail_by_requirement(Request $request)
    {
      try{
        // dd($request->toArray());
        $attributValue = Attribute_Product::whereIn('name', $request)->get();
        $attributValue2 = Attribute_Product::whereIn('name', $request)->get()->toArray();
        $productIds = array_column($attributValue2, 'product_id');
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',2)->where('product_id',$productIds)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->limit(4)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data = Product::whereIn('id',$homeproductIds)->get();
        $data_varient = Product::where('parent_id',$homeproductIds)->get();
        $attributValue = Attribute_Product::where('product_id', $homeproductIds)->get();
        foreach ($attributValue as $key => $value) {
          $attributValue[$key]->attr_name= Attribute::where('id',$value->attribute_id)->first()->name;
        }
        // latest car
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
        foreach ($data5 as $key => $v) {
          if($v->tag_name!=null)
          {
            $arr = json_decode($v->tag_name);
            foreach ($arr as $value) {
                   if($value ==3)
                   {
                   $data5[$key]->home =$value;

                 }
            }
      
          }
                 else
                 {
                  $data5[$key]->home =0;                    
                 }
          }
        return view('vehicle-detail',compact('data','attributValue','data_varient','data5'));
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }

    public function rikshaw_detail_by_requirement(Request $request)
    {
      try{
        // dd($request->toArray());
        $attributValue = Attribute_Product::whereIn('name', $request)->get();
        $attributValue2 = Attribute_Product::whereIn('name', $request)->get()->toArray();
        $productIds = array_column($attributValue2, 'product_id');
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',3)->where('product_id',$productIds)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->limit(4)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data = Product::whereIn('id',$homeproductIds)->get();
        $data_varient = Product::where('parent_id',$homeproductIds)->get();
        $attributValue = Attribute_Product::where('product_id', $homeproductIds)->get();
        foreach ($attributValue as $key => $value) {
          $attributValue[$key]->attr_name= Attribute::where('id',$value->attribute_id)->first()->name;
        }
        // latest car
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
        foreach ($data5 as $key => $v) {
          if($v->tag_name!=null)
          {
            $arr = json_decode($v->tag_name);
            foreach ($arr as $value) {
                   if($value ==3)
                   {
                   $data5[$key]->home =$value;

                 }
            }
      
          }
                 else
                 {
                  $data5[$key]->home =0;                    
                 }
          }
        return view('vehicle-detail',compact('data','attributValue','data_varient','data5'));
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }

    public function commercial_detail_by_requirement(Request $request)
    {
      try{
        // dd($request->toArray());
        $attributValue = Attribute_Product::whereIn('name', $request)->get();
        $attributValue2 = Attribute_Product::whereIn('name', $request)->get()->toArray();
        $productIds = array_column($attributValue2, 'product_id');
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',4)->where('product_id',$productIds)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->limit(4)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data = Product::whereIn('id',$homeproductIds)->get();
        $data_varient = Product::where('parent_id',$homeproductIds)->get();
        $attributValue = Attribute_Product::where('product_id', $homeproductIds)->get();
        foreach ($attributValue as $key => $value) {
          $attributValue[$key]->attr_name= Attribute::where('id',$value->attribute_id)->first()->name;
        }
        // latest car
        $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->get()->toArray();
        $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
        $brand_product = Brand_product::whereIn('product_id',$fetchproductids)->get()->toArray();
        $fetchbrandids = array_column($brand_product, 'brand_id');
        $brands = Brand::whereIn('id',$fetchbrandids)->get();
        $brandhome = Brand_product::whereIn('product_id',$fetchproductids)->orderBy('id', 'DESC')->get()->toArray();
        $homeproductIds = array_column($brandhome, 'product_id');
        $data5 = Product::whereIn('id',$homeproductIds)->where('product_type','product')->where('status',1)->get();
        foreach ($data5 as $key => $v) {
          if($v->tag_name!=null)
          {
            $arr = json_decode($v->tag_name);
            foreach ($arr as $value) {
                   if($value ==3)
                   {
                   $data5[$key]->home =$value;

                 }
            }
      
          }
                 else
                 {
                  $data5[$key]->home =0;                    
                 }
          }
        return view('vehicle-detail',compact('data','attributValue','data_varient','data5'));
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }

    public function product_checklist(Request $request)
    {
      try{
        $id_explode = explode(",", $request->ids);
        // $bateryid_explode = explode(",", $request->battery_id);
        if($request->battery_id==null)
        {
           
           $selectData = Brand_product::whereIn('brand_id', $id_explode)->get()->toArray();
           $productIds = array_column($selectData, 'product_id');
           $data = Product::whereIn('id',$productIds)->where('product_type','product')->where('status',1)->get();
           $data = view('product-list',compact('data'))->render();
           return response()->json(['options'=>$data]);
        }
        else
        {
            // brand id code 
          $selectData = Brand_product::whereIn('brand_id', $id_explode)->get()->toArray();
          $productIdsbran_id = array_column($selectData, 'product_id');
           // battery code
          //return json_encode($productIdsbran_id);
          $attributValue2 = Attribute_Product::whereIn('name', $request->battery_id)->get()->toArray();
          $productIds_battery = array_column($attributValue2, 'product_id');
          //return json_encode($productIds_battery);
          $productIds = array_unique(array_intersect($productIdsbran_id,$productIds_battery));
          $data = Product::whereIn('id',$productIds)->get();
          $data = view('product-list',compact('data'))->render();
          return response()->json(['options'=>$data]);
        }


        //dd($data);
        // return view('product-list',compact('data','attributValue'));
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }

    public function batteryproductchecklist(Request $request)
    {
      try{
        $id_explode = explode(",", $request->product_id);
        // return json_encode($request->product_id);
        if($request->product_id==null)
        {
          $explode_id = explode(",", $request->ids);
          $attributValue2 = Attribute_Product::whereIn('name', $explode_id)->get()->toArray();
          $productIds = array_column($attributValue2, 'product_id');
          $data = Product::whereIn('id',$productIds)->get();
          $data = view('product-list',compact('data'))->render();
           return response()->json(['options'=>$data]);
        }
        else
        {
            // brand id code 
          $selectData = Brand_product::whereIn('brand_id', $id_explode)->get()->toArray();
          $productIdsbran_id = array_column($selectData, 'product_id');
           // battery code
          if($request->ids==null)
          {
           $productIds = array_column($selectData, 'product_id');
          }
          else
          {
          $explode_id = explode(",", $request->ids);
          $attributValue2 = Attribute_Product::whereIn('name', $explode_id)->get()->toArray();
          $productIds_battery = array_column($attributValue2, 'product_id');
          $productIds = array_unique(array_intersect($productIdsbran_id,$productIds_battery));
          }
          // return json_encode($productIds_battery);
        
          $data = Product::whereIn('id',$productIds)->get();
          // return json_encode($data);
          $data = view('product-list',compact('data'))->render();
          return response()->json(['options'=>$data]);
        }

        
        //dd($data);
        // return view('product-list',compact('data','attributValue'));
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }

    public function productbyprice(Request $request)
    {
      try{
          $minPrice = (int)$request->minPrice;
          $maxPrice = (int)$request->maxPrice;
        if($request->product_id==null && $request->battery_id==null)
        {
          $productid = Product::whereBetween('price', [$minPrice, $maxPrice])->get()->toArray();
          $fetchproductids = array_column($productid, 'id');
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)->whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $data = Product::whereIn('id',$fetchproductids)->get();
          $data = view('product-list',compact('data'))->render();
          return response()->json(['options'=>$data]);
        }
        elseif($request->product_id!=null && $minPrice!=null && $maxPrice!=null)
        {
            // brand id code 
          $id_explode = explode(",", $request->product_id);
          $selectData = Brand_product::whereIn('brand_id', $id_explode)->get()->toArray();
          $brandproductIds = array_column($selectData, 'product_id');
          $productid = Product::whereBetween('price', [$minPrice, $maxPrice])->get()->toArray();
          $fetchproductids = array_column($productid, 'id');
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)
                                         ->whereIn('product_id',$fetchproductids)->get()->toArray();
          $fetchproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $productIds = array_unique(array_intersect($brandproductIds,$fetchproductids));
          $data = Product::whereIn('id',$productIds)->get();
          $data = view('product-list',compact('data'))->render();
          return response()->json(['options'=>$data]);
        }
        elseif($request->battery_id!=null && $minPrice!=null && $maxPrice!=null)
        {
          $attributValue2 = Attribute_Product::whereIn('name', $request->battery_id)->get()->toArray();
          $batteryproductids = array_column($attributValue2, 'product_id');

          $productid = Product::whereBetween('price', [$minPrice, $maxPrice])->get()->toArray();
          $fetchproductids = array_column($productid, 'id');
          $productIds = array_unique(array_intersect($batteryproductids,$fetchproductids));
          $data = Product::whereIn('id',$productIds)->get();
          $data = view('product-list',compact('data'))->render();

          return response()->json(['options'=>$data]);
        }
        else
        {
          $id_explode = explode(",", $request->product_id);
          $attributValue2 = Attribute_Product::whereIn('name', $request->battery_id)->get()->toArray();
          $batteryproductids = array_column($attributValue2, 'product_id');
          $productid = Product::whereBetween('price', [$minPrice, $maxPrice])->get()->toArray();
          $fetchproductids = array_column($productid, 'id');
          $mastercategory_fourwheelerid = Mastercategory_product::where('mastercategory_id',1)
                                         ->whereIn('product_id',$id_explode)->get()->toArray();
          $masterproductids = array_column($mastercategory_fourwheelerid, 'product_id');
          $productIds = array_unique(array_intersect($batteryproductids,$masterproductids,$fetchproductids));
          $data = Product::whereIn('id',$productIds)->get();
          $data = view('product-list',compact('data'))->render();

          return response()->json(['options'=>$data]); 
        }
      }
      catch(\Exception $e)
        {
          echo $e->getMessage();
        }
    }
    
   //********************End Compare Cars****************************** */   

    public function compare()
    {
      return redirect('compare');
    }

    public function destroy($id)
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login' );
    }
}
