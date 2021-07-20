<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabcart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use App\User;
use App\tabdangki;
use Auth;
use Alert;
use App\tabmakhuyenmai;
use App\tabshipping;
use App\tabpayment;
use App\taborder;
use App\taborderdetail;
use App\tabcity;
use App\tabprovince;
use App\tabwards;
use App\tabdatban;
use App\tabfeeship;
use Carbon\Carbon;
use App\tabphongnhahang;
Session_start();

class CartController extends Controller
{
    public function cart(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "cartcoffee1998";
        $meta_title = "1998 Coffee-cart";
        $url_canonical = $rq->url();
        $city = tabcity::orderby('matp','ASC')->get();
        $cart = tabcart::wheretheloai('Coffee')->paginate(4);
        if(!Session::get('giaohang') && !Session::get('datban'))
        {
            $datbanorgiaohang = 12;
            Session::put('datbanorgiaohang',$datbanorgiaohang);
        }
        return view('Frontend.Shop.cart',['cart'=>$cart,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical,'city'=>$city]);
    }
    
    public function savecart(Request $req)
    {
        $productid = $req->productidhidden;
        $qty = $req->quantity;
        $size = $req->size;
        $productinfo = tabcart::whereid($productid)->first();
        $data['id'] = $productid;
        $data['qty'] = $qty;
        $data['name'] = $productinfo->tenmonan;
        if($productinfo->khuyenmai>0)
        {
            if($size == "Lớn")
            {
                $data['price'] = $productinfo->khuyenmai + 3000;
            }
            else
            {
                $data['price'] = $productinfo->khuyenmai;
            }
        }
        else
        {
            if($size == "Lớn")
            {
                $data['price'] = $productinfo->gia + 3000;
            }
            else
            {
                $data['price'] = $productinfo->gia;
            }
        }
        $data['options']['image'] = $productinfo->hinhanh;
        $data['options']['size'] = $size;
        
        
        Cart::add($data);
        //Cart::destroy();
        return redirect::to('showcart');
    }
    
    public function savecart1(Request $req)
    {
        $productid = $req->productidhidden1;
        $qty = 1;
        $productinfo = tabcart::whereid($productid)->first();
        $data['id'] = $productid;
        $data['qty'] = $qty;
        $data['name'] = $productinfo->tenmonan;
        $data['price'] = $productinfo->gia;
        $data['options']['size'] = "Small";
        $data['options']['image'] = $productinfo->hinhanh;
        Cart::add($data);
        //Cart::destroy();
        return redirect::to('showcart');
    }
    
    public function showcart(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "cartcoffee1998";
        $meta_title = "1998 Coffee-cart";
        $url_canonical = $rq->url();
        $city = tabcity::orderby('matp','ASC')->get();
        $cart = tabcart::wheretheloai('Coffee')->paginate(4);
        if(!Session::get('giaohang') && !Session::get('datban'))
        {
            $datbanorgiaohang = 12;
            Session::put('datbanorgiaohang',$datbanorgiaohang);
        }
        return view('Frontend.Shop.cart',['cart'=>$cart,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical,'city'=>$city]);
        // $content = Cart::content();
        // dd($content);
    }
    
    public function deletecart($rowid)
    {
        Cart::update($rowid,0);
        return redirect::to('showcart');
    }
    
    public function totalhandcart(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "handcartcoffee1998";
        $meta_title = "1998 Coffee-handcart";
        $url_canonical = $rq->url();
        
        $user = Auth::user();
        $datban = tabdatban::where('idkhachhang','=',$user->id)->where('trangthai','=',NULL)->get();
        //$datbannhanh = tabdatban::where('idkhachhang','=',$user->id)->where('loaidatban','=','Đặt bàn nhanh')->first();
        $giaohang = tabshipping::where('idkhachhang','=',$user->id)->where('trangthai','=',NULL)->get();
        $demgiaohang = tabshipping::where('idkhachhang','=',$user->id)->where('trangthai','=',NULL)->count();
        $demdatban = tabdatban::where('idkhachhang','=',$user->id)->where('trangthai','=',NULL)->count();
        $hoadon = taborder::all();
        return view('Frontend.Shop.totalhandcart',['meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical,'datban'=>$datban,'giaohang'=>$giaohang,'demgiaohang'=>$demgiaohang,'demdatban'=>$demdatban,'hoadon'=>$hoadon]);
    }
    
    public function viewhandcartshipping(Request $rq,$id)
    {
        $user = Auth::user();
        if($user)
        {
            $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
            $meta_keywords = "handcartcoffee1998";
            $meta_title = "1998 Coffee-handcart";
            $url_canonical = $rq->url();
            $cart = tabcart::wheretheloai('Coffee')->paginate(4);
            
            $donhang = taborder::where('id','=',$id)->first();
            $chitietdonhang = taborderdetail::where('iddonhang','=',$id)->get();
            $payment = tabpayment::where('id','=',$donhang->idpayment)->first();
            $thongtincanhan = tabdangki::where('id','=',$user->id_thongtindangki)->first();
            $shipping = tabshipping::where('idkhachhang','=',$user->id)->first();
            return view('Frontend.Shop.handcartshipping',['meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical,'shipping'=>$shipping,'chitietdonhang'=>$chitietdonhang,'donhang'=>$donhang,'payment'=>$payment,'thongtincanhan'=>$thongtincanhan]);
        }
        else
        {
            return redirect()->route('loginget');
        }
    }
    
    public function viewhandcartreservation(Request $rq,$id)
    {
        $user = Auth::user();
        if($user)
        {
            $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
            $meta_keywords = "handcartcoffee1998";
            $meta_title = "1998 Coffee-handcart";
            $url_canonical = $rq->url();
            $cart = tabcart::wheretheloai('Coffee')->paginate(4);
            $donhang = taborder::where('id','=',$id)->first();
            $chitietdonhang = taborderdetail::where('iddonhang','=',$id)->get();
            $payment = tabpayment::where('id','=',$donhang->idpayment)->first();
            $thongtincanhan = tabdangki::where('id','=',$user->id_thongtindangki)->first();
            $datban = tabdatban::where('id','=',$donhang->iddatban)->first();
            $tienphongnhahang = tabphongnhahang::where('tenphong','=',$datban->loaiban)->first();
            $ngaydatban = strtotime($datban->created_at);
            $dt = strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
            return view('Frontend.Shop.handcartreservation',['meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical,'dt'=>$dt,'ngaydatban'=>$ngaydatban,'datban'=>$datban,'tienphongnhahang'=>$tienphongnhahang,'chitietdonhang'=>$chitietdonhang,'donhang'=>$donhang,'payment'=>$payment,'thongtincanhan'=>$thongtincanhan]);
        }
        else
        {
            return redirect()->route('loginget');
        }
    }
    
    public function viewhandcartreservationfast(Request $rq,$id)
    {
        $user = Auth::user();
        if($user)
        {
            $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
            $meta_keywords = "handcartcoffee1998";
            $meta_title = "1998 Coffee-handcart";
            $url_canonical = $rq->url();
            $cart = tabcart::wheretheloai('Coffee')->paginate(4);
            
            $donhang = NULL;
            $thongtincanhan = tabdangki::where('id','=',$user->id_thongtindangki)->first();
            $datban = tabdatban::where('id','=',$id)->first();
            return view('Frontend.Shop.handcartreservation',['meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical,'datban'=>$datban,'donhang'=>$donhang,'thongtincanhan'=>$thongtincanhan]);
        }
        else
        {
            return redirect()->route('loginget');
        }
    }
    
    public function listordercancel(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "handcartcoffee1998";
        $meta_title = "1998 Coffee-handcart";
        $url_canonical = $rq->url();
        $user = Auth::user();
        $hoadon = taborder::where('idkhachhang','=',$user->id)->get();
        $dem = 0;
        foreach($hoadon as $h)
        {
            if($h->trangthaidonhang == "Hủy đơn hàng")
            {
                $dem +=1;
            }
        }
        return view('Frontend.Shop.listordercancel',['meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical,'hoadon'=>$hoadon,'dem'=>$dem]);
    }
    
    public function viewordercancel(Request $rq,$id)
    {
        $user = Auth::user();
        if($user)
        {
            $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
            $meta_keywords = "handcartcoffee1998";
            $meta_title = "1998 Coffee-handcart";
            $url_canonical = $rq->url();
            $cart = tabcart::wheretheloai('Coffee')->paginate(4);
            $tienphongnhahang = tabphongnhahang::where('tenphong','=',$rq->loaiban)->first();
            $donhang = taborder::where('id','=',$id)->first();
            $chitietdonhang = taborderdetail::where('iddonhang','=',$id)->get();
            $payment = tabpayment::where('id','=',$donhang->idpayment)->first();
            $thongtincanhan = tabdangki::where('id','=',$user->id_thongtindangki)->first();
            return view('Frontend.Shop.detailordercancel',['meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical,'tienphongnhahang'=>$tienphongnhahang,'chitietdonhang'=>$chitietdonhang,'donhang'=>$donhang,'payment'=>$payment,'thongtincanhan'=>$thongtincanhan]);
        }
        else
        {
            return redirect()->route('loginget');
        }
    }
    
    public function cancelordershipping($id)
    {
        $huy3 = tabpayment::whereIn('id',function ($query) use($id) {
                                    $query->select('idpayment')->from('tabdonhangs')
                                    ->Where('id','=',$id);
                     
                                })
                    ->first();
        $huy3->trangthai="Hủy đơn hàng";
        $huy3->save();
        
        $xoa4 = tabshipping::whereIn('id',function ($query) use($id) {
                                    $query->select('idshipping')->from('tabdonhangs')
                                    ->Where('id','=',$id);
                     
                                })
                    ->first();
        $xoa4->trangthai = "Hủy đơn hàng";
        $xoa4->save();
        
		$huy1 = taborder::find($id);
		if($huy1->trangthaidonhang = "Đã thanh toán")
		{
		    $huy1->hoantratien = "Hoàn trả 100% số tiền thanh toán";
		}
		$huy1->trangthaidonhang = "Hủy đơn hàng";
        $huy1->save();
        
		Alert::success('Đã hủy đơn hàng, vui lòng chờ xác nhận', 'Thành công')->persistent('Close');
		return redirect()->route('totalhandcart');
    }
    
    public function cancelorderreservation($id)
    {
        $huy3 = tabpayment::whereIn('id',function ($query) use($id) {
                                    $query->select('idpayment')->from('tabdonhangs')
                                    ->Where('id','=',$id);
                     
                                })
                    ->first();
        $huy3->trangthai="Hủy đơn hàng";
        $huy3->save();
        
        $xoa4 = tabdatban::whereIn('idkhachhang',function ($query) use($id) {
                                    $query->select('idkhachhang')->from('tabdonhangs')
                                    ->Where('id','=',$id);
                     
                                })
                    ->first();
                    
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $tm = Carbon::tomorrow('Asia/Ho_Chi_Minh'); 
        if(strtotime($dt->toTimeString()) == strtotime($xoa4->ngay))
        {
            $hoantratien = 1;
        }
        elseif(strtotime($tm->toTimeString()) == strtotime($xoa4->ngay))
        {
            $hoantratien = 1;
        }
        else
        {
            $hoantratien = 0;
        }
        
        $xoa4->trangthai = "Hủy đơn hàng";
        $xoa4->save();
        //$xoa4->save();
        
		$huy1 = taborder::find($id);
		$huy1->trangthaidonhang = "Hủy đơn hàng";
		if($hoantratien == 1)
		{
		    $huy1->hoantratien = "Hoàn trả 50% số tiền cọc";
		}
		else
		{
		    $huy1->hoantratien = "Hoàn trả 100% số tiền cọc";
		}
        $huy1->save();
        
		Alert::success('Đã hủy đơn hàng, vui lòng chờ xác nhận', 'Thành công')->persistent('Close');
		return redirect()->route('totalhandcart');
    }
    
    public function updatecardqty(Request $req)
    {
        $rowid = $req->id;
        $qty = $req->qty;
        Cart::update($rowid,$qty);
    }
    
    public function updatediscountproduct(Request $rq)
    {
        $coupon = tabmakhuyenmai::where("magiam",$rq->discount)->first();
        if($coupon)
        {
            $count_coupon = $coupon->count();
            if($count_coupon>0)
            {
                $coupon_session = Session::get('coupon');
                if($coupon_session==true)
                {
                    $is_avaiable = 0;
                    if($is_avaiable==0)
                    {
                        $cou[] = array(
                            'magiam' => $coupon->magiam,
                            'tinhnangma' => $coupon->tinhnangma,
                            'soluong' => $coupon->phantramgiam,
                        );
                        Session::put('coupon',$cou);
                    }
                }
                else
                {
                    $cou[] = array(
                            'magiam' => $coupon->magiam,
                            'tinhnangma' => $coupon->tinhnangma,
                            'soluong' => $coupon->soluong,
                        );
                        Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back();
            }
        }
        else
        {
            Alert::error('Mã giảm giá không đúng', 'Không thành công')->persistent(false,true)->autoClose(4000);
            return redirect()->back();
        }
    }
    
    public function calculatefeeship(Request $rq)
    {
        $feeship = tabfeeship::where("feematp",$rq->city)->where("feemaqh",$rq->province)->where("feexaid",$rq->wards)->first();
        $thanhpho = tabcity::where("matp",$rq->city)->first();
        $quanhuyen = tabprovince::where("maqh",$rq->province)->first();
        $xaphuong = tabwards::where("xaid",$rq->wards)->first();
        if($feeship)
        {
            Session::put('thanhpho',$thanhpho->nametinhthanhpho);
            Session::put('quanhuyen',$quanhuyen->namequanhuyen);
            Session::put('xaphuong',$xaphuong->namexaphuong);
            Session::put('housenumberstreet',$rq->housenumberstreet);
            Session::put('feeship',$feeship->feefeeship);
            Session::save();
        }
        else
        {
            Session::put('thanhpho',$thanhpho->nametinhthanhpho);
            Session::put('quanhuyen',$quanhuyen->namequanhuyen);
            Session::put('xaphuong',$xaphuong->namexaphuong);
            Session::put('housenumberstreet',$rq->housenumberstreet);
            Session::put('feeship',20000);
            Session::save();
        }
    }
    
    public function unsetcoupon(Request $req)
    {
        $coupon =Session::get('coupon');
        if($coupon == true)
        {
            Session::forget('coupon');
            return redirect()->back();
        }
    }
    
    public function unsetfeeship(Request $req)
    {
        $fee = Session::get('feeship');
        $thanhpho = Session::get('thanhpho');
        $quanhuyen = Session::get('quanhuyen');
        $xaphuong = Session::get('xaphuong');
        if($fee == true && $thanhpho == true && $quanhuyen == true && $xaphuong == true)
        {
            Session::forget('feeship');
            Session::forget('thanhpho');
            Session::forget('quanhuyen');
            Session::forget('xaphuong');
            return redirect()->back();
        }
    }
    
    public function updatediachishipping(Request $rq)
    {

        //$data = $rq->all();
        $shipping = tabshipping::find($rq->diachi_id);
        $diachi_value =  rtrim($rq->diachi_value);
        $shipping->diachiship =  $diachi_value;
        $shipping->save();
        
        if($shipping){
            return response()->json(true);
        }
    }
    
    public function updatesdtshipping(Request $rq)
    {

        //$data = $rq->all();
        $shipping = tabshipping::find($rq->dt_id);
        $dt_value =  rtrim($rq->dt_value);
        $shipping->dienthoai =  $dt_value;
        $shipping->save();
        
        if($shipping){
            return response()->json(true);
        }
    }
    
    public function updatetenshipping(Request $rq)
    {

        //$data = $rq->all();
        $shipping = tabshipping::find($rq->ten_id);
        $ten_value =  rtrim($rq->ten_value);
        $shipping->fullname =  $ten_value;
        $shipping->save();
        
        if($shipping){
            return response()->json(true);
        }
    }
    
    public function updateemailshipping(Request $rq)
    {

        //$data = $rq->all();
        $shipping = tabshipping::find($rq->email_id);
        $email_value =  rtrim($rq->email_value);
        $shipping->email =  $email_value;
        $shipping->save();
        
        if($shipping){
            return response()->json(true);
        }
    }
    
    public function updateghichushipping(Request $rq)
    {

        //$data = $rq->all();
        $shipping = tabshipping::find($rq->ghichu_id);
        $ghichu_value =  rtrim($rq->ghichu_value);
        $shipping->tinnhan =  $ghichu_value;
        $shipping->save();
        
        if($shipping){
            return response()->json(true);
        }
    }
    
    public function updatetendatban(Request $rq)
    {
        $datban = tabdatban::find($rq->ten_id);
        $ten_value =  rtrim($rq->ten_value);
        $datban->yourname =  $ten_value;
        $datban->save();
        
        if($datban){
            return response()->json(true);
        }
    }
    
    public function updateemaildatban(Request $rq)
    {
        $datban = tabdatban::find($rq->email_id);
        $email_value =  rtrim($rq->email_value);
        $datban->email =  $email_value;
        $datban->save();
        
        if($datban){
            return response()->json(true);
        }
    }
    
    public function updatesdtdatban(Request $rq)
    {
        $datban = tabdatban::find($rq->dt_id);
        $dt_value =  rtrim($rq->dt_value);
        $datban->sdt =  $dt_value;
        $datban->save();
        
        if($datban){
            return response()->json(true);
        }
    }
    
    public function updatetinnhandatban(Request $rq)
    {
        $datban = tabdatban::find($rq->tinnhan_id);
        $tinnhan_value =  rtrim($rq->tinnhan_value);
        $datban->tinnhan =  $tinnhan_value;
        $datban->save();
        
        if($datban){
            return response()->json(true);
        }
    }
    
    public function selectdeliveryforcash(Request $rq)
    {
        if($rq->action)
        {
            $output = '';
            if($rq->action=="city")
            {
                $selectprovince = tabprovince::where('matp',$rq->maid)->orderby('maqh','ASC')->get();
                $output.='<option></option>';
                foreach($selectprovince as $province)
                {
                    $output.='<option value="'.$province->maqh.'">'.$province->namequanhuyen.'</option>';
                }
            }
            else
            {
                $selectwards = tabwards::where('maqh',$rq->maid)->orderby('xaid','ASC')->get();
                $output.='<option></option>';
                foreach($selectwards as $wards)
                {
                    $output.='<option value="'.$wards->xaid.'">'.$wards->namexaphuong.'</option>';
                }
            }
        }
        echo $output;
    }
}
