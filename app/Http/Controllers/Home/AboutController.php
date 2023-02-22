<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\View\View;
use Image;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function AboutPage() : View
    {

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));

    } //End Method

    public function AboutMultiImage(){
        return view('admin.about_page.multimage');
    }

    public function StoreMultiImage(Request $request){
        $images = $request->file('multi_image');
        foreach($images as $image){
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();   //556333345345.jpg

            $save_url = 'upload/multi/'.$name_gen;
            Image::make($image)->resize(220, 220)->save($save_url);

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Multi images inserted successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllMultiImage(){

        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multimage',compact('allMultiImage'));
    }


    public function EditMultiImage($id){

        $image = MultiImage::findorfail($id);
        return view('admin.about_page.edit_image',compact('image'));
    }

    public function UpdateMultiImage(Request $request)
    {
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();   //556333345345.jpg

            $save_url = 'upload/multi/'.$name_gen;
            Image::make($image)->resize(220, 220)->save($save_url);

            MultiImage::findOrFail($request->id)->update([
                'multi_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Image updated with image successfully', 
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }else{
            $notification = array(
                'message' => 'No image selected!', 
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

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
