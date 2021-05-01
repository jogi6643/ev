<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mastercategory;
use App\Category;
use App\Attribute;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $categories = Category::all();
                 }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
        return view('admin.catagory.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        try{
        $mastercategorys = Mastercategory::all();
        $attributes = Attribute::all();
        }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
        return view('admin.catagory.add-catagory', compact('mastercategorys','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vliadte = $request->validate([

            'name' => 'required|min:3',
            'slug' => 'required|unique:categories'

        ]);


        $categories =  Category::create([
            'name' => $request->name, 
            'discription' => ($request->discription)!=''? $request->discription:'null',
            'slug' => $request->slug
        ]);

        $categories->mastercategories()->attach($request->master_cat_id);
        $categories->attribute()->attach($request->attribute);

        $categories->save();

        return back()->with('message','Catagory created successfully..');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
        $catagorys = Category::findOrFail($id);
        $mastercategorys = Mastercategory::all();
        $attributes = Attribute::all();
                    }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
        return view('admin.catagory.edit', compact('mastercategorys','attributes','catagorys'));
    }


    public function update(Request $request, $id)
    {

       $vliadte = $request->validate([

            'name' => 'required|min:3'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name; 
        $category->discription = ($request->discription)!=''? $request->discription:'null';
        $category->mastercategories()->detach();
        $category->mastercategories()->attach($request->master_cat_id);
        $category->attribute()->detach();
        $category->attribute()->attach($request->attribute);
        $category->save();
        return back()->with('message','Catagory Update successfully..');
    }

    public function status(Request $request)
    {
        
        if($request->ajax()){

            Category::where('id',$request->cat_id)->update(['status'=>!$request->status]);
            return response()->json(['status'=>'done']);
        }
    }

    public function destroy($id)
    {
        echo "destroy";
    }
}
