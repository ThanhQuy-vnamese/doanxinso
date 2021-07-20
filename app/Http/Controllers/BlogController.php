<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabblog;
use App\tabdetailblog;

class BlogController extends Controller
{
    public function blog(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "blogcoffee1998";
        $meta_title = "1998 Coffee-blog";
        $url_canonical = $rq->url();
        $blog = tabblog::paginate(6);
    	return view('Frontend.Blog.blog',['blog'=>$blog,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }
    
    public function blogdetail(Request $rq, $id)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = tabdetailblog::whereid_blog($id)->value("metakeywords");
        $meta_title = "1998 Coffee-blogdetail";
        $url_canonical = $rq->url();
        $blog = tabblog::find($id);
        $recentblog = tabblog::limit(2)->latest()->get();
        $blogdetail = tabdetailblog::whereid_blog($id)->first();
    	return view('Frontend.Blog.detailblog',['blogdetail'=>$blogdetail,'blog'=>$blog,'recentblog'=>$recentblog,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }
}
