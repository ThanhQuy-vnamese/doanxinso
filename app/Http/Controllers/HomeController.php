<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\tabdatban;
use Validator;
use Alert;
use App\tabmenu;
use App\tabblog;
use App\tabslide;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $rq)
    {
        //seo
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee速 Rewards, manage your gift card and more.";
        $meta_keywords = "coffee, maindish, drinks, desserts, coffee1998";
        $meta_title = "1998 Coffee-home";
        $url_canonical = $rq->url();
        //seo
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $startTime = date("H:i");
        $cenvertedTime = date('H:i A',strtotime('+20 minutes',strtotime($dt)));
        $slide = tabslide::all();
        $menu = tabmenu::wheresanphammoi(1)->get();
        $seller = tabmenu::all();
        $blog = tabblog::paginate(6);
        return view('Frontend.Home.Home',['cenvertedTime'=>$cenvertedTime,'seller'=>$seller,'dt'=>$dt,'menu'=>$menu,'slide'=>$slide,'blog'=>$blog,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }

    public function datban(Request $rq)
    {
        $user = Auth::user();
        $tabdatban = new tabdatban;
        $tabdatban->idkhachhang = $user->id;
        $tabdatban->yourname = $rq->ten;
        $tabdatban->songuoi = $rq->soluongnguoi;
        if($rq->soluongnguoi == 1)
        {
            $bandat = 1;
        }
        elseif($rq->soluongnguoi == 2)
        {
            $bandat = 1;
        }
        elseif($rq->soluongnguoi == 3)
        {
            $bandat = 1;
        }
        elseif($rq->soluongnguoi == 4)
        {
            $bandat = 1;
        }
        elseif($rq->soluongnguoi == 5)
        {
            $bandat = 2;
        }
        elseif($rq->soluongnguoi == 6)
        {
            $bandat = 2;
        }
        $tabdatban->soluongban = $bandat;
        $tabdatban->loaiban = "Bàn thường";
        $tabdatban->ngay = $rq->ngay;
        $tabdatban->thoigian = $rq->thoigian;
        $tabdatban->sdt = $rq->dienthoai;
        $tabdatban->email = $user->email;
        $tabdatban->tinnhan = $rq->tinnhan;
        $tabdatban->loaidatban = "Đặt bàn nhanh";
        $tabdatban->save();
        Alert::success('Successful table reservation!', 'Successfully')->persistent(false,true)->autoClose(4000);
        return redirect()->route('home');
    }

    public function Loginget()
    {
        return view('Frontend.Login.Login');
    }

    public function resultsuccess()
    {
        return view('Frontend.Home.resultsuccessbooktable');
    }
}
