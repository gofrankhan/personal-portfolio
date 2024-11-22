<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;
use Image;

class BlogController extends Controller
{
    //
    public function AllBlogs(){

        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    } //End of method


    public function AddBlogs(){
        $category = BlogCategory::orderBy('blog_category', 'asc')->get();
        return view('admin.blogs.blogs_add', compact('category'));
    }

    public function StoreBlogs(Request $request){
        $image = $request->file('blog_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now(),
            ]); 
            $notification = array(
            'message' => 'Blog Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.blogs')->with($notification);
    }

    public function EditBlogs($id){
        $blogs = Blog::findOrFail($id);
        $category = BlogCategory::orderBy('blog_category', 'asc')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'category'));
    }  //End of Method

    public function UpdateBlogs(Request $request){
        $blog_id = $request->id;
       if ($request->file('blog_image')) {
           $image = $request->file('blog_image');
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
           $save_url = 'upload/blog/'.$name_gen;
           Blog::findOrFail($blog_id)->update([
               'blog_category_id' => $request->blog_category_id,
               'blog_title' => $request->blog_title,
               'blog_tags' => $request->blog_tags,
               'blog_description' => $request->blog_description,
               'blog_image' => $save_url,
           ]); 
           $notification = array(
           'message' => 'Blog Updated with Image Successfully', 
           'alert-type' => 'success'
       );
       return redirect()->route('all.blogs')->with($notification);
       } else{
           Blog::findOrFail($blog_id)->update([
               'blog_category_id' => $request->blog_category_id,
               'blog_title' => $request->blog_title,
               'blog_tags' => $request->blog_tags,
               'blog_description' => $request->blog_description, 
           ]); 
           $notification = array(
           'message' => 'Blog Updated without Image Successfully', 
           'alert-type' => 'success'
       );
      return redirect()->route('all.blogs')->with($notification);
       } // end Else
   } // End Method
public function DeleteBlogs($id){
       $blogs = Blog::findOrFail($id);
       $img = $blogs->blog_image;
       unlink($img);
       Blog::findOrFail($id)->delete();
        $notification = array(
           'message' => 'Blog Deleted Successfully', 
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);       
    }// End Method 

    public function BlogDetails($id){
        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $category = BlogCategory::orderBy('blog_category', 'asc')->get();
        return view('frontend.blog_details', compact('blogs', 'category', 'allblogs' ));
    }  //End of 
    
    public function CategoryBlog($id){
        $allblogs = Blog::latest()->limit(5)->get();
        if($id == 'all')
            $blogpost = Blog::latest()->get();
        else
            $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $category = BlogCategory::orderBy('blog_category', 'asc')->get();
        return view('frontend.cat_blog_details', compact('blogpost', 'category', 'allblogs' ));
    }  //End of Method

}
