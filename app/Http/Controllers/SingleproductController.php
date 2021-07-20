<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabsingleproduct;

class SingleproductController extends Controller
{
    public function singleproduct(Request $req)
    {
        $meta_desc = tabsingleproduct::whereid($req->id)->value("mota");
        $meta_keywords = tabsingleproduct::whereid($req->id)->value("meta_keywords");
        $meta_title = "1998 Coffee"."-".tabsingleproduct::whereid($req->id)->value("tenmonan");
        $url_canonical = $req->url();
        $detailproduct = tabsingleproduct::where('id',$req->id)->first();
        $menu = tabsingleproduct::wheretheloai($detailproduct->theloai)->paginate(4);
        return view('Frontend.Shop.singleproduct',['detailproduct'=>$detailproduct,'menu'=>$menu,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }
}
