<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabshop;
use Session;
Session_start();
class ShopController extends Controller
{
    public function shopdatban(Request $rq)
	{
		$meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "shopcoffee1998";
        $meta_title = "1998 Coffee-shop";
        $url_canonical = $rq->url();
		$shop = tabshop::all();
		$datban = 1;
		$giaohang =Session::get('giaohang');
		$datbanorgiaohang =Session::get('datbanorgiaohang');
		if($giaohang == true || $datbanorgiaohang == true)
		{
		    Session::forget('datbanorgiaohang');
		    Session::forget('giaohang');
		    $coupon = Session::get('coupon');
            $fee = Session::get('feeship');
            $thanhpho = Session::get('thanhpho');
            $quanhuyen = Session::get('quanhuyen');
            $xaphuong = Session::get('xaphuong');
            if($fee == true && $thanhpho == true && $quanhuyen == true && $xaphuong == true)
            {
                if($coupon == true)
                {
                	Session::forget('coupon');
                    Session::forget('feeship');
                    Session::forget('thanhpho');
		            Session::forget('quanhuyen');
                	Session::forget('xaphuong');
            	}
                else
                {
                	Session::forget('feeship');
                	Session::forget('thanhpho');
                	Session::forget('quanhuyen');
                	Session::forget('xaphuong');
                }
            }
		}
		Session::put('datban',$datban);
		return view('Frontend.Shop.shop',['shop'=>$shop,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
	}
	
	public function shopgiaohang(Request $rq)
	{
		$meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "shopcoffee1998";
        $meta_title = "1998 Coffee-shop";
        $url_canonical = $rq->url();
		$shop = tabshop::all();
		$giaohang = 2;
		$datban =Session::get('datban');
		$datbanorgiaohang =Session::get('datbanorgiaohang');
		if($datban == true || $datbanorgiaohang == true)
		{
		       $coupon = Session::get('coupon');
    //         $fee = Session::get('feeship');
    //         $thanhpho = Session::get('thanhpho');
    //         $quanhuyen = Session::get('quanhuyen');
    //         $xaphuong = Session::get('xaphuong');
    //         if($fee == true && $thanhpho == true && $quanhuyen == true && $xaphuong == true)
    //         {
                if($coupon == true)
                {
                	Session::forget('coupon');
            //         Session::forget('feeship');
            //         Session::forget('thanhpho');
		          //  Session::forget('quanhuyen');
            //     	Session::forget('xaphuong');
            	}
                // else
                // {
                // 	Session::forget('feeship');
                // 	Session::forget('thanhpho');
                // 	Session::forget('quanhuyen');
                // 	Session::forget('xaphuong');
                // }
            //}
		    Session::forget('datbanorgiaohang');
		    Session::forget('datban');
		}
		Session::put('giaohang',$giaohang);
		return view('Frontend.Shop.shop',['shop'=>$shop,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
	}
}
