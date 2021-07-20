<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabmenu;
use Cart;
use Session;
Session_start();

class MenuController extends Controller
{
    // public function menu(Request $rq)
    // {
    //     $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee速 Rewards, manage your gift card and more.";
    //     $meta_keywords = "coffee, maindish, drinks, desserts, menucoffee1998";
    //     $meta_title = "1998 Coffee-menu";
    //     $url_canonical = $rq->url();
    //     $menu = tabmenu::all();
    //     $sang1 = tabmenu::where("buachinh","like",'%sang1%')->orderBy('theloai', 'asc')->get();
    //     $sang2 = tabmenu::where("buachinh","like",'%sang2%')->orderBy('theloai', 'asc')->get();
    //     $trua1 = tabmenu::where("buachinh","like",'%trua1%')->orderBy('theloai', 'asc')->get();
    //     $trua2 = tabmenu::where("buachinh","like",'%trua2%')->orderBy('theloai', 'asc')->get();
    //     $toi1 = tabmenu::where("buachinh","like",'%toi1%')->orderBy('theloai', 'asc')->get();
    //     $toi2 = tabmenu::where("buachinh","like",'%toi2%')->orderBy('theloai', 'asc')->get();
    // 	return view('Frontend.Menu.menu',['sang1'=>$sang1,'sang2'=>$sang2,'trua1'=>$trua1,'trua2'=>$trua2,'toi1'=>$toi1,'toi2'=>$toi2,'menu'=>$menu,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    // }
    
    public function combo(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee速 Rewards, manage your gift card and more.";
        $meta_keywords = "coffee, maindish, drinks, desserts, menucoffee1998";
        $meta_title = "1998 Coffee-menu";
        $url_canonical = $rq->url();
        $sang1 = tabmenu::where("buachinh","like",'%sang1%')->orderBy('theloai', 'asc')->get();
        $sang2 = tabmenu::where("buachinh","like",'%sang2%')->orderBy('theloai', 'asc')->get();
        $trua1 = tabmenu::where("buachinh","like",'%trua1%')->orderBy('theloai', 'asc')->get();
        $trua2 = tabmenu::where("buachinh","like",'%trua2%')->orderBy('theloai', 'asc')->get();
        $toi1 = tabmenu::where("buachinh","like",'%toi1%')->orderBy('theloai', 'asc')->get();
        $toi2 = tabmenu::where("buachinh","like",'%toi2%')->orderBy('theloai', 'asc')->get();
    	return view('Frontend.Menu.combo',['sang1'=>$sang1,'sang2'=>$sang2,'trua1'=>$trua1,'trua2'=>$trua2,'toi1'=>$toi1,'toi2'=>$toi2,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }
    
    public function cacmonchinh(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee速 Rewards, manage your gift card and more.";
        $meta_keywords = "coffee, maindish, drinks, desserts, menucoffee1998";
        $meta_title = "1998 Coffee-menu";
        $url_canonical = $rq->url();
        $menu = tabmenu::all();
    	return view('Frontend.Menu.cacmonchinh',['menu'=>$menu,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }
    
    public function hienthinuttimkiem(Request $rq)
    {
        echo    '<a><input type="text" class="form-control nhaptimtiem" placeholder="Search..."></a>';
    }
    
    public function ketquatimkiem(Request $rq)  //{{ URL::route('.singleproduct.',$s->id)}}
    {
        $menu = tabmenu::where("tenmonan","like",'%'.$rq->value.'%')->get();
        $out ='';
        $out.='
            <div class="tab-pane fade show active">
                <div class="row">
        ';
        foreach($menu as $s)
        {
           $out.='
                    <div class="col-md-3">
    					<div class="menu-entry">
    					    <a class="img" style="background-image: url(public/images/'.$s->hinhanh.');"></a>
        					<div class="text text-center pt-4">
        					    <h3><a href="'.route('singleproduct',$s->id).'">'.$s->tenmonan.'</a></h3>
            					<p>'.$s->mota.'</p>
            	';
            					if($s->khuyenmai>0)
            					{
            					    $out.='<p class="price"><strike>'.$s->gia.' VND</strike> <span>'.$s->khuyenmai.' VND</span></p>';
            					}
            					else
            					{
            					    $out.='<p class="price"><span>'.$s->gia.' VND</span></p>';
            					}
            $out.='
            					<p><a href="'.route('singleproduct',$s->id).'" class="btn btn-primary btn-outline-primary">Xem chi tiết</a></p>
        					</div>
    					</div>
					</div>
                '; 
        }
        
        
        $out.='
                </div>
    		</div>
        ';
        
        echo $out;
    }
    
    public function combosang1()
    {
        $sang1 = tabmenu::where("buachinh","like",'%sang1%')->orderBy('theloai', 'asc')->get();;
        
        foreach($sang1 as $m)
        {
            $size = "Nhỏ";
            $data['id'] = $m->id;
            $data['qty'] = 1;
            $data['name'] = $m->tenmonan;
            if($m->khuyenmai>0)
            {
                $data['price'] = $m->khuyenmai;
            }
            else
            {
                $data['price'] = $m->gia;
            }
            $data['options']['image'] = $m->hinhanh;
            if($m->theloai == "Drinks" || $m->theloai == "Coffee")
            {
                $data['options']['size'] = $size;
            }
            else
            {
                $data['options']['size'] = NULL;
            }
            Cart::add($data);
        }
        return redirect()->route('showcart');
    }
    
    public function combosang2()
    {
        $sang1 = tabmenu::where("buachinh","like",'%sang2%')->orderBy('theloai', 'asc')->get();;
        
        foreach($sang1 as $m)
        {
            $size = "Nhỏ";
            $data['id'] = $m->id;
            $data['qty'] = 1;
            $data['name'] = $m->tenmonan;
            if($m->khuyenmai>0)
            {
                $data['price'] = $m->khuyenmai;
            }
            else
            {
                $data['price'] = $m->gia;
            }
            $data['options']['image'] = $m->hinhanh;
            if($m->theloai == "Drinks" || $m->theloai == "Coffee")
            {
                $data['options']['size'] = $size;
            }
            else
            {
                $data['options']['size'] = NULL;
            }
            Cart::add($data);
        }
        return redirect()->route('showcart');
    }
    
    public function combotrua1()
    {
        $sang1 = tabmenu::where("buachinh","like",'%trua1%')->orderBy('theloai', 'asc')->get();;
        
        foreach($sang1 as $m)
        {
            $size = "Nhỏ";
            $data['id'] = $m->id;
            $data['qty'] = 1;
            $data['name'] = $m->tenmonan;
            if($m->khuyenmai>0)
            {
                $data['price'] = $m->khuyenmai;
            }
            else
            {
                $data['price'] = $m->gia;
            }
            $data['options']['image'] = $m->hinhanh;
            if($m->theloai == "Drinks" || $m->theloai == "Coffee")
            {
                $data['options']['size'] = $size;
            }
            else
            {
                $data['options']['size'] = NULL;
            }
            Cart::add($data);
        }
        return redirect()->route('showcart');
    }
    
    public function combotrua2()
    {
        $sang1 = tabmenu::where("buachinh","like",'%trua2%')->orderBy('theloai', 'asc')->get();;
        
        foreach($sang1 as $m)
        {
            $size = "Nhỏ";
            $data['id'] = $m->id;
            $data['qty'] = 1;
            $data['name'] = $m->tenmonan;
            if($m->khuyenmai>0)
            {
                $data['price'] = $m->khuyenmai;
            }
            else
            {
                $data['price'] = $m->gia;
            }
            $data['options']['image'] = $m->hinhanh;
            if($m->theloai == "Drinks" || $m->theloai == "Coffee")
            {
                $data['options']['size'] = $size;
            }
            else
            {
                $data['options']['size'] = NULL;
            }
            Cart::add($data);
        }
        return redirect()->route('showcart');
    }
    
    public function combotoi1()
    {
        $sang1 = tabmenu::where("buachinh","like",'%toi1%')->orderBy('theloai', 'asc')->get();;
        
        foreach($sang1 as $m)
        {
            $size = "Nhỏ";
            $data['id'] = $m->id;
            $data['qty'] = 1;
            $data['name'] = $m->tenmonan;
            if($m->khuyenmai>0)
            {
                $data['price'] = $m->khuyenmai;
            }
            else
            {
                $data['price'] = $m->gia;
            }
            $data['options']['image'] = $m->hinhanh;
            if($m->theloai == "Drinks" || $m->theloai == "Coffee")
            {
                $data['options']['size'] = $size;
            }
            else
            {
                $data['options']['size'] = NULL;
            }
            Cart::add($data);
        }
        return redirect()->route('showcart');
    }
    
    public function combotoi2()
    {
        $sang1 = tabmenu::where("buachinh","like",'%toi2%')->orderBy('theloai', 'asc')->get();;
        
        foreach($sang1 as $m)
        {
            $size = "Nhỏ";
            $data['id'] = $m->id;
            $data['qty'] = 1;
            $data['name'] = $m->tenmonan;
            if($m->khuyenmai>0)
            {
                $data['price'] = $m->khuyenmai;
            }
            else
            {
                $data['price'] = $m->gia;
            }
            $data['options']['image'] = $m->hinhanh;
            if($m->theloai == "Drinks" || $m->theloai == "Coffee")
            {
                $data['options']['size'] = $size;
            }
            else
            {
                $data['options']['size'] = NULL;
            }
            Cart::add($data);
        }
        return redirect()->route('showcart');
    }
    
}
