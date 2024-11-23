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

    public function UpdateFooter(){
        
    }
}
