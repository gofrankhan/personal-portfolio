<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    //

    public function FooterSetup(){
        $footer_all = Footer::findOrFail(1);
        return view('admin.footer.footer_all', compact('footer_all'));
    }

    public function EditFooter(){
        
    }

    public function UpdateFooter(Request $request){

        $footer_id = $request->id;
         Footer::findOrFail($footer_id)->update([
                'number' => $request->number,
                'short_description' => $request->short_description,
                'address' => $request->address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
            ]); 
            $notification = array(
            'message' => 'Footer Updated Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }
}
