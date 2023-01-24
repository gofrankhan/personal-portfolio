<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Image;

class HomeSliderController extends Controller
{
    public function HomeSlider() : View
    {

        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeslide'));

    } //End Method

    public function UpdateSlider(Request $request)
    {
        if($request->file('home_slide')){
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();   //556333345345.jpg

            $save_url = 'upload/home_slide/'.$name_gen;
            Image::make($image)->resize(636, 852)->save($save_url);

            HomeSlide::findOrFail(1)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated with Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }else{
            HomeSlide::findOrFail(1)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated without Image Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }


    } //End Method
}
