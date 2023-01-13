<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index(){
        return view('about');
    } // end index function

    public function contact(){
        return view('contact');
    } // end index function
}
