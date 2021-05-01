<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Attribute;
use App\Category;
class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

        $attributs = Attribute::all();
        return view('admin.attribute.index', compact('attributs'));
           }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        try{
        $categories = Category::all();
        return view('admin.attribute.create', compact('categories'));
             }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
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

            'name' => 'required|min:3|unique:attributs_table'
        ]);

        $attribute = new Attribute();
        $attribute->name = $request->name;    
        $attribute->slug = $request->slug;
        $attribute->status = 1;
        $attribute->save();

        //$attribute->category()->attach($request->category_id);

        return back()->with('message','Arrtibute created successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $attributes = Attribute::findOrFail($id);
        return view('admin.attribute.edit', compact('attributes'));
             }
        catch (\Exception $e) {
        $errormessage = $e->getMessage();
        return view('errormessage', compact('errormessage'));
        return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $vliadte = $request->validate([
            'name' => 'required|min:3|unique:attributs_table'
        ]);

        $attribute = Attribute::findOrFail($id);
        $attribute->name = $request->name;    
        $attribute->slug = $request->slug;
        $attribute->status = 1;
        $attribute->save();

        //$attribute->category()->attach($request->category_id);
        return back()->with('message','Arrtibute updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        
        if($request->ajax()){

            Attribute::where('id',$request->attr_id)->update(['status'=>!$request->status]);
            return response()->json(['status'=>'done']);
        }
    }
    
    public function destroy($id)
    {
        //
    }
}
