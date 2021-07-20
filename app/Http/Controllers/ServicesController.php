<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function service(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "servicescoffee1998";
        $meta_title = "1998 Coffee-services";
        $url_canonical = $rq->url();
    	return view('Frontend.Service.service',['meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }
}
