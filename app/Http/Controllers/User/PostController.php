<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(post $slug)
    {
    	//$slug =post::all();
    	//dd($slug);
    	return view('user/post',compact('slug'));
    }
}
