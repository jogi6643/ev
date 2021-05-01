<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return 'add';
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $count = User::where('email',$request->user_email)->count();
     
        if($request->password_confirmation==$request->password &&  $count==0)
        {
             $user =  User::create([
            'name' => $request->user_name,    
            'email' => $request->user_email,
            'password' =>  bcrypt($request->password_confirmation)
        ]);
        $user->save();
        return back()->with('message','User updated successfully..');
        }
        else if($count>0)
        {
          return back()->with('errormessage','email id already exists..');  
        }
       else
       {
        return back()->with('errormessage','Password and confirm password dont match..'); 
       }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('admin.user.edit',compact('user'));
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
        

        $count = User::where('id',$id)->orwhere('email',$request->user_email)->count();
   
        if($request->password_confirmation==$request->password &&$count==1)
        {
            
        $user = User::findOrFail($id);
        $user->name = $request->user_name;    
        $user->email = $request->user_email;
        $user->password =  bcrypt($request->password_confirmation);
        $user->save();
        return back()->with('message','User updated successfully..');
        }
        else if($count>1)
        {
          return back()->with('errormessage','email id already exists..');  
        }
       else
       {
        return back()->with('errormessage','Password and confirm password dont match..'); 
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
