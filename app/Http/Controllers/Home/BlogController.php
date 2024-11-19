<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Carbon;
use Image;

class BlogController extends Controller
{
    //
    public function AllBlogs(){

        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    } //End of method
}
