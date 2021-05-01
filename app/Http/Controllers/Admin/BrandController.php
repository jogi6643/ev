<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
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
        return view('admin.brand.create');
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
        //dd($request->popular_files);
        $vliadte = $request->validate([
            'name' => 'required|min:3|unique:brands',
            'slug' => 'required'
        ]);

        
                    $file = request()->file('popular_files');
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move('./public/server/logo', $fileName);    
                
                //dd($fileName);
        $brands =  Brand::create([
            'name' => $request->name, 
            //'discription' => ($request->discription)!=''? $request->discription:'null',
            'slug' => $request->slug,
            'logo' => $fileName,
        ]);

        $brands->save();
        return back()->with('message','Brand created successfully..');
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
        $brands = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brands'));
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
        // dd($request->popular_files);
        $vliadte = $request->validate([
            'name' => 'required|min:3|unique:attributs_table'
        ]);

        if (request()->hasFile('popular_files')) {
                $file = request()->file('popular_files');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./public/server/logo', $fileName);    
            }
            else
            {
                $fileName = $request->popular_files;
            }
            // dd($fileName);
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;    
        $brand->slug = $request->slug;
        $brand->logo = $fileName;
        $brand->save();

        //$attribute->category()->attach($request->category_id);
        return back()->with('message','Brand updated successfully..');
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

            Brand::where('id',$request->brand_id)->update(['status'=>!$request->status]);
            return response()->json(['status'=>'done']);
        }
    }
    
    public function featured(Request $request)
    {
        
        if($request->ajax()){

            Brand::where('id',$request->brand_id)->update(['featured'=>!$request->featured]);
            return response()->json(['featured'=>'done']);
        }
    }
    public function destroy($id)
    {
        //
    }
}
