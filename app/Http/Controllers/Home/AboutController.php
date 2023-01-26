<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\View\View;
use Image;

class AboutController extends Controller
{
    public function AboutPage() : View
    {

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));

    } //End Method

    public function UpdateAbout(Request $request)
    {
        if($request->file('about_image')){
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();   //556333345345.jpg

            $save_url = 'upload/about_image/'.$name_gen;
            Image::make($image)->resize(523, 605)->save($save_url);

            About::findOrFail(1)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->elm1,
                'about_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About updated with image successfully', 
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }else{
            About::findOrFail(1)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About updated without image successfully', 
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }


    } //End Method

    public function HomeAbout() : View
    {

        $aboutpage = About::find(1);
        return view('frontend.about_page', compact('aboutpage'));

    } //End Method
}
