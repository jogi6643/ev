<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

	public function index(){

		return view('admin.postview.post.show');
	}


	public function create(){

		return view('admin.postview.post.create');
	}

	public function store(Request $request){


		dd($request->all());
	}


    
}
