<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\State;
use App\Category;
class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        
        $states = State::all();
        return view('admin.state.index', compact('states'));
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
        $state = State::all();
        return view('admin.state.create', compact('categories'));
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

            'name' => 'required|min:3|unique:states'
        ]);

        $state = new State();
        $state->name = $request->name;    
        $state->status = 1;
        $state->save();
        return back()->with('message','State created successfully..');
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
        $states = State::findOrFail($id);
        return view('admin.state.edit', compact('states'));
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

        $state = State::findOrFail($id);
        $state->name = $request->name;    
        $state->status = 1;
        $state->save();
        return back()->with('message','State updated successfully..');
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

            State::where('id',$request->id)->update(['status'=>!$request->status]);
            return response()->json(['status'=>'done']);
        }
    }
    
    public function destroy($id)
    {
        //
    }
}
