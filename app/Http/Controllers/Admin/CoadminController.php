<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Label;
use App\Coadmin;
class CoadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $coadmin = Coadmin::all();
        foreach($coadmin as $key=>$reqs)
        {
               $coadmin[$key]->assignedrole=isset(Label::where('id',$reqs['role'])->first()['name'])?Label::where('id',$reqs['role'])->first()['name']:"";
        }
        return view('admin.coadmin.index', compact('coadmin'));
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
        $coadmin = Coadmin::all();;
        return view('admin.coadmin.create', compact('coadmin'));
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
            'name' => 'required',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:coadmins,email',

            // 'name' => 'required|min:3|unique:attributs_table'
        ]);

        $coadmin = new Coadmin();
        $coadmin->name = $request->name;
        $coadmin->phone = $request->phone;    
        $coadmin->email = $request->email;
        $coadmin->status = 1;
        $coadmin->save();
        return back()->with('message','Co-admin created successfully..');
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
        $coadmin = Coadmin::findOrFail($id);
        $label=Label::where('status',1)->get();
        return view('admin.coadmin.edit', compact('coadmin','label'));
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
            'name' => 'required',
            'phone' => 'required|digits:10',
            // 'email' => 'required|email|unique:coadmins,email',
        ]);

        $coadmin = Coadmin::findOrFail($id);
        $coadmin->name = $request->name;  
        $coadmin->phone = $request->phone;
        $coadmin->role = $request->roleid;  
        // $coadmin->email = $request->email;
        $coadmin->status = 1;
        $coadmin->save();
        return back()->with('message','Co-admin updated successfully..');
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

            Coadmin::where('id',$request->co_id)->update(['status'=>!$request->status]);
            return response()->json(['status'=>'done']);
        }
    }
    
    public function destroy($id)
    {
        //
    }
}
