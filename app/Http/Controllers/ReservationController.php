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
use App\tabshop;
use App\tabblog;
use App\taborder;
use App\taborderdetail;
use App\tabcity;
use App\tabprovince;
use App\tabwards;
use App\tabfeeship;
use App\tabphongnhahang;
use App\tabdatban;
use Carbon\Carbon;
Session_start();

class ReservationController extends Controller
{
    public function reservation(request $rq)
    {
        $user = Auth::user();
        if($user)
        {
            $datban = tabdatban::where('idkhachhang','=',$user->id)->get();
            $demdatban = $datban->where('trangthai','!=','Hủy đơn hàng')->count();
            Session::forget('tong');
            Session::forget('ngaydatban');
            $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
            $meta_keywords = "reservationpcoffee1998";
            $meta_title = "1998 Coffee-reservation";
            $url_canonical = $rq->url();
            $recentblog = tabblog::limit(2)->latest()->get();
            $phongnhahang = tabphongnhahang::all();
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            if((int)Cart::subtotal()==0)
            {
                return redirect()->route('datbannhanh');
            }
            else
            {
                return view('Frontend.Reservation.reservation',['demdatban'=>$demdatban,'datban'=>$datban,'dt'=>$dt,'phongnhahang'=>$phongnhahang,'recentblog'=>$recentblog,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
            }
        }
        else
        {
            Alert::info('Vui lòng đăng nhập để tiến hành thanh toán')->persistent(false,true)->autoClose(2000);
            return redirect()->route('loginget');    
        }
    }
    
    public function datbannhanh(request $rq)
    {
        
            Session::forget('tong');
            Session::forget('ngaydatban');
            Session::forget('coupon');
            $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
            $meta_keywords = "reservationpcoffee1998";
            $meta_title = "1998 Coffee-reservation";
            $url_canonical = $rq->url();
            $recentblog = tabblog::limit(2)->latest()->get();
            $phongnhahang = tabphongnhahang::all();
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            return view('Frontend.Reservation.datbannhanh',['dt'=>$dt,'phongnhahang'=>$phongnhahang,'recentblog'=>$recentblog,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }
    
    public function datbanmoi(request $rq)
    {
        $user = Auth::user();
        if($user)
        {
            $demdatban = 0;
            Session::forget('tong');
            Session::forget('ngaydatban');
            $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
            $meta_keywords = "reservationpcoffee1998";
            $meta_title = "1998 Coffee-reservation";
            $url_canonical = $rq->url();
            $recentblog = tabblog::limit(2)->latest()->get();
            $phongnhahang = tabphongnhahang::all();
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            return view('Frontend.Reservation.reservation',['demdatban'=>$demdatban,'dt'=>$dt,'phongnhahang'=>$phongnhahang,'recentblog'=>$recentblog,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
        }
        else
        {
            Alert::info('Vui lòng đăng nhập để tiến hành thanh toán')->persistent(false,true)->autoClose(2000);
            return redirect()->route('loginget');    
        }
    }
    
    public function kiemtrangaycheckout(Request $rq)
    { 
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        if(strtotime($rq->ngay) < strtotime($dt->toDateString()))
        {
            echo "*Ngày không được nhỏ hơn ngày hiện tại";
        }
    }
    
    public function kiemtrathoigiancheckout(Request $rq)
    { 
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        if(strtotime($rq->ngay) == strtotime($dt->toDateString()))
        {
            if(strtotime($rq->thoigian) < strtotime($dt->toTimeString()))
            {
                echo "*Thời gian không được nhỏ hơn thời gian hiện tại";
            }
            elseif((strtotime($rq->thoigian) - strtotime($dt->toTimeString())) <  10800)
            {
                echo "*Thời gian tối thiểu trước 5 tiếng";
            }
        }
    }
    
    public function tienloaiban(Request $rq)
    {
            $tienphongnhahang = tabphongnhahang::where('tenphong','=',$rq->loaiban)->first();
            if(Session::get('coupon'))
            {
                foreach(Session::get('coupon') as $key => $cou)
                {
                    if($cou['tinhnangma']=="giamtheophantram")
                    {
                        $total = (int)Cart::subtotal()*1000;
        				$discount = ($total*$cou['soluong'])/100;
        				$subtotal = $total-$discount + $tienphongnhahang->tienphong;
        				Session::put('tong',$subtotal);
        				echo $subtotal;
                    }
                    else
                    {
                        $total = (int)Cart::subtotal()*1000;
        				$subtotal = $total-$cou['soluong'] + $tienphongnhahang->tienphong;
        				Session::put('tong',$subtotal);
        				echo $subtotal;
                    }
                }
            }
            else
            {
                $total = (int)Cart::subtotal()*1000 + $tienphongnhahang->tienphong;
                Session::put('tong',$total);
            	echo $total;
            }
    }
    
    public function numberoftable(Request $rq)
    {
        $songuoi = $rq->songuoi;
        $output = '';
        
        if($songuoi == 1)
        {
            $output.='
                <input type="text" class="form-control" value="1 (bàn 2 người)" disabled>
                <input type="hidden" class="form-control" value="1" name="soluong">
            ';
            echo $output;
        }
        elseif($songuoi == 2)
        {
            $output.='
                <input type="text" class="form-control" value="1 (bàn 2 người)" disabled>
                <input type="hidden" class="form-control" value="1" name="soluong">
            ';
            echo $output;
        }
        elseif($songuoi == 3)
        {
            $output.='
                <input type="text" class="form-control" value="1 (bàn 4 người)" disabled>
                <input type="hidden" class="form-control" value="1" name="soluong">
            ';
            echo $output;
        }
        elseif($songuoi == 4)
        {
            $output.='
                <input type="text" class="form-control" value="1 (bàn 4 người)" disabled>
                <input type="hidden" class="form-control" value="1" name="soluong">
            ';
            echo $output;
        }
        elseif($songuoi == 5)
        {
            $output.='
                <input type="text" class="form-control" value="2 (bàn 4 người và bàn 2 người)" disabled>
                <input type="hidden" class="form-control" value="2" name="soluong">
            ';
            echo $output;
        }
        elseif($songuoi == 6)
        {
            $output.='
                <input type="text" class="form-control" value="2 (bàn 4 người và bàn 2 người)" disabled>
                <input type="hidden" class="form-control" value="2" name="soluong">
            ';
            echo $output;
        }
        elseif($songuoi == 7)
        {
            $output.='
                <input type="text" class="form-control" value="2 (bàn 4 người và bàn 4 người)" disabled>
                <input type="hidden" class="form-control" value="2" name="soluong">
            ';
            echo $output;
        }
        elseif($songuoi == 8)
        {
            $output.='
                <input type="text" class="form-control" value="2 (bàn 4 người và bàn 4 người)" disabled>
                <input type="hidden" class="form-control" value="2" name="soluong">
            ';
            echo $output;
        }
    }
    
    public function completereservation(Request $request)
    {
        $user = Auth::user();
        $datban = tabdatban::where('id','=',Session::get('ngaydatban'))->first();
        $donhang = taborder::where('iddatban','=',Session::get('ngaydatban'))->first();
        if($datban)
        {
            if ($request->vnp_ResponseCode == '00')
            {
                $content = Cart::content();
                foreach($content as $value)
                {
                    $taborderdetail = new taborderdetail;
                    $taborderdetail->iddonhang = $donhang->id;
                    $taborderdetail->idsanpham = $value->id;
                    $taborderdetail->tensanpham = $value->name;
                    $taborderdetail->size = $value->options->size;
                    $taborderdetail->gia = $value->price;
                    $taborderdetail->soluong = $value->qty;
                    $taborderdetail->save();
                }
                
                $donhang->tongdonhang = $donhang->tongdonhang + (int)Cart::subtotal()*1000;
                $donhang->save();
                
                Cart::destroy();
                    			
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
                
                Alert::success('Đơn hàng xác nhận, vui lòng chờ đợi cuộc gọi cửa hàng', 'Thành công')->persistent(false,true)->autoClose(4000);
                return redirect()->route('totalhandcart');
            }
            Alert::error('Thanh toán không thành công')->persistent(false,true)->autoClose(4000);
            return redirect()->route('home');    
        }
        else
        {
            if($request->vnp_ResponseCode == '00')
            {
                if(Auth::user())
            	{
            		$user = Auth::user();
            		$tongtien = Session::get('tongtien');
            		if(Session::get('thongtinpayment'))
            		{
            		    foreach(Session::get('thongtinpayment') as $key => $thongtinpayment)
            		    {
            		        $tabpayment = new tabpayment;
                    		$tabpayment->phuongthuc = $thongtinpayment['phuongthuc'];
                			$tabpayment->trangthai = $thongtinpayment['trangthai'];
                			$tabpayment->save();
            		    }
            		}
            		
            		if(Session::get('thongtindatban'))
            		{
            		    foreach(Session::get('thongtindatban') as $key => $thongtindatban)
            		    {
            		        $tabdatban = new tabdatban;
                			$tabdatban->yourname = $thongtindatban['yourname'];
                			$tabdatban->sdt = $thongtindatban['sdt'];
                			$tabdatban->email = $thongtindatban['email'];
                			$tabdatban->tinnhan = $thongtindatban['tinnhan'];
                			$tabdatban->idkhachhang = $user->id;
                			$tabdatban->songuoi = $thongtindatban['songuoi'];
                			$tabdatban->soluongban = $thongtindatban['soluongban'];
                			$tabdatban->thoigian = $thongtindatban['thoigian'];
                			$tabdatban->ngay = $thongtindatban['ngay'];
                			$tabdatban->loaiban = $thongtindatban['loaiban'];
                			$tabdatban->save();
                			
                			if($tongtien=='')
                			{
                			    $taborder = new taborder;
                        		$taborder->idkhachhang = $user->id;
                    			$taborder->idshipping = NULL;
                    			$taborder->iddatban = $tabdatban->id;
                    			$taborder->idpayment = $tabpayment->id;
                    			$taborder->tongdonhang = 50000;
                    			$taborder->trangthaidonhang = "Đã đặt cọc";
                    			$taborder->save();
                			}
                			else
                			{
                			    $taborder = new taborder;
                        		$taborder->idkhachhang = $user->id;
                    			$taborder->idshipping = NULL;
                    			$taborder->iddatban = $tabdatban->id;
                    			$taborder->idpayment = $tabpayment->id;
                    			$taborder->tongdonhang = $tongtien;
                    			$taborder->trangthaidonhang = "Đã đặt cọc";
                    			$taborder->save();
                    			
                    			$content = Cart::content();
                    			if($content)
                    			{
                    			    foreach($content as $value)
                        			{
                        				$taborderdetail = new taborderdetail;
                        	    		$taborderdetail->iddonhang = $taborder->id;
                        				$taborderdetail->idsanpham = $value->id;
                        				$taborderdetail->tensanpham = $value->name;
                        				$taborderdetail->size = $value->options->size;
                        				$taborderdetail->gia = $value->price;
                        				$taborderdetail->soluong = $value->qty;
                        				$taborderdetail->save();
                        			}
                        			Cart::destroy();
                    			}
                    			
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
                			
            		    }
            		}
            		Alert::success('Đơn hàng xác nhận, vui lòng chờ đợi cuộc gọi cửa hàng', 'Thành công')->persistent(false,true)->autoClose(4000);
                	return redirect()->route('totalhandcart');
            	}
            	else  //datbannhanh
            	{
            		$tongtien = Session::get('tongtien');
            		if(Session::get('thongtinpayment'))
            		{
            		    foreach(Session::get('thongtinpayment') as $key => $thongtinpayment)
            		    {
            		        $tabpayment = new tabpayment;
                    		$tabpayment->phuongthuc = $thongtinpayment['phuongthuc'];
                			$tabpayment->trangthai = $thongtinpayment['trangthai'];
                			$tabpayment->save();
            		    }
            		}
            		
            		if(Session::get('thongtindatban'))
            		{
            		    foreach(Session::get('thongtindatban') as $key => $thongtindatban)
            		    {
            		        $tabdatban = new tabdatban;
                			$tabdatban->yourname = $thongtindatban['yourname'];
                			$tabdatban->sdt = $thongtindatban['sdt'];
                			$tabdatban->email = $thongtindatban['email'];
                			$tabdatban->tinnhan = $thongtindatban['tinnhan'];
                			$tabdatban->idkhachhang = "KH_".str_random(4);
                			$tabdatban->songuoi = $thongtindatban['songuoi'];
                			$tabdatban->soluongban = $thongtindatban['soluongban'];
                			$tabdatban->thoigian = $thongtindatban['thoigian'];
                			$tabdatban->ngay = $thongtindatban['ngay'];
                			$tabdatban->loaiban = $thongtindatban['loaiban'];
                			$tabdatban->save();
                			
                			if($tongtien=='')
                			{
                			    $taborder = new taborder;
                        		$taborder->idkhachhang = $tabdatban->idkhachhang;
                    			$taborder->idshipping = NULL;
                    			$taborder->iddatban = $tabdatban->id;
                    			$taborder->idpayment = $tabpayment->id;
                    			$taborder->tongdonhang = 50000;
                    			$taborder->trangthaidonhang = "Đã đặt cọc";
                    			$taborder->save();
                			}
                			else
                			{
                			    $taborder = new taborder;
                        		$taborder->idkhachhang = $tabdatban->idkhachhang;
                    			$taborder->idshipping = NULL;
                    			$taborder->iddatban = $tabdatban->id;
                    			$taborder->idpayment = $tabpayment->id;
                    			$taborder->tongdonhang = $tongtien;
                    			$taborder->trangthaidonhang = "Đã đặt cọc";
                    			$taborder->save();
                			}
                // 			$content = Cart::content();
                // 			if($content)
                // 			{
                // 			    foreach($content as $value)
                //     			{
                //     				$taborderdetail = new taborderdetail;
                //     	    		$taborderdetail->iddonhang = $taborder->id;
                //     				$taborderdetail->idsanpham = $value->id;
                //     				$taborderdetail->tensanpham = $value->name;
                //     				$taborderdetail->size = $value->options->size;
                //     				$taborderdetail->gia = $value->price;
                //     				$taborderdetail->soluong = $value->qty;
                //     				$taborderdetail->save();
                //     			}
                //     			Cart::destroy();
                // 			}
                			
                			
                	       // $coupon = Session::get('coupon');
                	       // $fee = Session::get('feeship');
                	       // $thanhpho = Session::get('thanhpho');
                	       // $quanhuyen = Session::get('quanhuyen');
                	       // $xaphuong = Session::get('xaphuong');
                	       // if($fee == true && $thanhpho == true && $quanhuyen == true && $xaphuong == true)
                	       // {
                	       // 	if($coupon == true)
                	       // 	{
                	       // 		Session::forget('coupon');
                		      //      Session::forget('feeship');
                		      //      Session::forget('thanhpho');
                		      //      Session::forget('quanhuyen');
                		      //      Session::forget('xaphuong');
                	       // 	}
                	       // 	else
                	       // 	{
                	       // 		Session::forget('feeship');
                		      //      Session::forget('thanhpho');
                		      //      Session::forget('quanhuyen');
                		      //      Session::forget('xaphuong');
                	       // 	}
                	       // }
            		    }
            		}
            		Alert::success('Đơn hàng xác nhận, vui lòng chờ đợi cuộc gọi cửa hàng', 'Thành công')->persistent(false,true)->autoClose(4000);
                	return redirect()->route('home');
            	}
            }
        }
        Alert::error('Thanh toán không thành công')->persistent(false,true)->autoClose(4000);
        return redirect()->route('home');    
    }
    
    public function thanhtoanvnpay(Request $request)
    {
        $user = Auth::user();
        $datban = tabdatban::where('id','=',$request->ngaydatban)->first();
        if($datban)
        {
                Session::put('ngaydatban',$request->ngaydatban);
                $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://1998coffee.xyz/completereservation";
                $vnp_TmnCode = "64P39E8L";//Mã website tại VNPAY 
                $vnp_HashSecret = "AJQUEIUDJPYGRWUWBNXTEGLPINTZVZBW"; //Chuỗi bí mật
                
                $vnp_TxnRef = date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
                
                $vnp_Amount = ($request->tongtien/2)*100;//$request->tongtien
                $vnp_Locale = 'vn';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                $inputData = array(
                    "vnp_Version" => "2.0.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,   
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,    
                );
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . $key . "=" . $value;
                    } else {
                        $hashdata .= $key . "=" . $value;
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }
                
                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
                    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
        			'code' => '00',
        			'message' => 'success',
        			'data' => $vnp_Url,
        		);
        		return redirect()->to($returnData['data']);
        }
        else
        {
            $ngaydatban = tabdatban::where('ngay','=',$request->ngay)->get();
            $tontaiphong = $ngaydatban->where('loaiban','=',$request->loaiban)->count();
            if($request->loaiban == "Bàn thường" && $tontaiphong == 50)
            {
                Alert::error('Đã hết bàn!')->persistent('close');
                return redirect()->back();
            }
            elseif($request->loaiban == "Phòng thường" && $tontaiphong == 3)
            {
                Alert::error('Đã hết phòng thường!')->persistent('close');
                return redirect()->back();
            }
            elseif($request->loaiban == "Phòng Vip" && $tontaiphong == 3)
            {
                Alert::error('Đã hết phòng Vip!')->persistent('close');
                return redirect()->back();
            }
            elseif($request->loaiban == "Phòng tiệc gia đình" && $tontaiphong == 4)
            {
                Alert::error('Đã hết phòng tiệc gia đình!')->persistent('close');
                return redirect()->back();
            }
            
            
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            if(strtotime($request->ngay) < strtotime($dt->toDateString()))
            {
                Alert::error('*Ngày không được nhỏ hơn ngày hiện tại')->persistent('close');
                return redirect()->back();
            }
            elseif(strtotime($request->ngay) == strtotime($dt->toDateString()))
            {
                if(strtotime($request->thoigian) < strtotime($dt->toTimeString()))
                {
                    Alert::error('*Thời gian không được nhỏ hơn thời gian hiện tại')->persistent('close');
                    return redirect()->back();
                }
                elseif((strtotime($request->thoigian) - strtotime($dt->toTimeString())) <  10800)
                {
                    Alert::error('*Thời gian cách ít nhất 5h')->persistent('close');
                    return redirect()->back();
                }
                else
                {
                    // if($request->songuoi==3 && $request->tongtien < 40)
                    // {
                    //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                    //     return redirect()->back();
                    // }
                    // elseif($request->songuoi==4 && $request->tongtien<60)
                    // {
                    //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                    //     return redirect()->back();
                    // }
                    // elseif($request->songuoi==5 && $request->tongtien<60)
                    // {
                    //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                    //     return redirect()->back();
                    // }
                    // elseif($request->songuoi==6 && $request->tongtien<80)
                    // {
                    //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                    //     return redirect()->back();
                    // }
                    // elseif($request->songuoi==7 && $request->tongtien<80)
                    // {
                    //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                    //     return redirect()->back();
                    // }
                    // elseif($request->songuoi==8 && $request->tongtien<100)
                    // {
                    //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                    //     return redirect()->back();
                    // }
                    // else
                    // {
                        if($request->loaiban == "Phòng Vip" && $request->songuoi > 6)
                        {
                            Alert::error('Phòng VIP chỉ tối đa 6 người')->persistent('close');
                            return redirect()->back();
                        }
                        elseif($request->loaiban == "Phòng thường" && $request->songuoi > 6)
                        {
                            Alert::error('Phòng thường chỉ tối đa 6 người')->persistent('close');
                            return redirect()->back();
                        }
                        elseif($request->loaiban == "Phòng tiệc gia đình" && $request->songuoi < 8)
                        {
                            Alert::error('Phòng gia đình phải tối thiểu 8 người')->persistent('close');
                            return redirect()->back();
                        }
                        else
                        {
                            $thongtindatban[] = array(
                                'yourname' => $request->ten,
                                'sdt' => $request->dienthoai,
                                'email' => $request->email,
                                'tinnhan' => $request->message,
                                'songuoi' => $request->songuoi,
                                'soluongban' => $request->soluong,
                                'thoigian' => $request->thoigian,
                                'ngay' => $request->ngay,
            		            'loaiban' => $request->loaiban,
                            );
                            Session::put('thongtindatban',$thongtindatban);
                                
                            $thongtinpayment[] = array(
                                                'phuongthuc' => $request->optradio,
                                                'trangthai' => "Đã đặt cọc",
                                            );
                            Session::put('thongtinpayment',$thongtinpayment);
                            if(Session::get('tong'))
                            {
                                Session::put('tongtien',Session::get('tong'));
                            }
                            else
                            {
                                Session::put('tongtien',$request->tongtien);
                            }
                            
                            if($request->loaiban == "Bàn thường")
                            {
                                $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                                $vnp_Returnurl = "http://1998coffee.xyz/completereservation";
                                $vnp_TmnCode = "64P39E8L";//Mã website tại VNPAY 
                                $vnp_HashSecret = "AJQUEIUDJPYGRWUWBNXTEGLPINTZVZBW"; //Chuỗi bí mật
                                
                                $vnp_TxnRef = date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                                $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
                                if(Session::get('tong'))
                                {
                                    $vnp_Amount = (Session::get('tong')/2)*100;//$request->tongtien
                                }
                                elseif($request->tongtien)
                                {
                                    $vnp_Amount = ($request->tongtien/2)*100;//$request->tongtien
                                }
                                else
                                {
                                    $vnp_Amount = 50000 *100;
                                }
                                $vnp_Locale = 'vn';
                                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                                $inputData = array(
                                    "vnp_Version" => "2.0.0",
                                    "vnp_TmnCode" => $vnp_TmnCode,
                                    "vnp_Amount" => $vnp_Amount,
                                    "vnp_Command" => "pay",
                                    "vnp_CreateDate" => date('YmdHis'),
                                    "vnp_CurrCode" => "VND",
                                    "vnp_IpAddr" => $vnp_IpAddr,
                                    "vnp_Locale" => $vnp_Locale,   
                                    "vnp_OrderInfo" => $vnp_OrderInfo,
                                    "vnp_ReturnUrl" => $vnp_Returnurl,
                                    "vnp_TxnRef" => $vnp_TxnRef,    
                                );
                                ksort($inputData);
                                $query = "";
                                $i = 0;
                                $hashdata = "";
                                foreach ($inputData as $key => $value) {
                                    if ($i == 1) {
                                        $hashdata .= '&' . $key . "=" . $value;
                                    } else {
                                        $hashdata .= $key . "=" . $value;
                                        $i = 1;
                                    }
                                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                                }
                                
                                $vnp_Url = $vnp_Url . "?" . $query;
                                if (isset($vnp_HashSecret)) {
                                    $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
                                    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                                }
                                $returnData = array(
                        			'code' => '00',
                        			'message' => 'success',
                        			'data' => $vnp_Url,
                        		);
                        		return redirect()->to($returnData['data']);
                            }
                            else
                            {
                                $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                                $vnp_Returnurl = "http://1998coffee.xyz/completereservation";
                                $vnp_TmnCode = "64P39E8L";//Mã website tại VNPAY 
                                $vnp_HashSecret = "AJQUEIUDJPYGRWUWBNXTEGLPINTZVZBW"; //Chuỗi bí mật
                                
                                $vnp_TxnRef = date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                                $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
                                if(Session::get('tong'))
                                {
                                    $vnp_Amount = (Session::get('tong')/2)*100;//$request->tongtien
                                }
                                else
                                {
                                    $vnp_Amount = ($request->tongtien/2)*100;//$request->tongtien
                                }
                                $vnp_Locale = 'vn';
                                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                                $inputData = array(
                                    "vnp_Version" => "2.0.0",
                                    "vnp_TmnCode" => $vnp_TmnCode,
                                    "vnp_Amount" => $vnp_Amount,
                                    "vnp_Command" => "pay",
                                    "vnp_CreateDate" => date('YmdHis'),
                                    "vnp_CurrCode" => "VND",
                                    "vnp_IpAddr" => $vnp_IpAddr,
                                    "vnp_Locale" => $vnp_Locale,   
                                    "vnp_OrderInfo" => $vnp_OrderInfo,
                                    "vnp_ReturnUrl" => $vnp_Returnurl,
                                    "vnp_TxnRef" => $vnp_TxnRef,    
                                );
                                ksort($inputData);
                                $query = "";
                                $i = 0;
                                $hashdata = "";
                                foreach ($inputData as $key => $value) {
                                    if ($i == 1) {
                                        $hashdata .= '&' . $key . "=" . $value;
                                    } else {
                                        $hashdata .= $key . "=" . $value;
                                        $i = 1;
                                    }
                                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                                }
                                
                                $vnp_Url = $vnp_Url . "?" . $query;
                                if (isset($vnp_HashSecret)) {
                                    $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
                                    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                                }
                                $returnData = array(
                        			'code' => '00',
                        			'message' => 'success',
                        			'data' => $vnp_Url,
                        		);
                        		return redirect()->to($returnData['data']);
                            }
                        }
                    //}
                }
            }
            else
            {
                // if($request->songuoi==3 && $request->tongtien < 40)
                // {
                //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                //     return redirect()->back();
                // }
                // elseif($request->songuoi==4 && $request->tongtien<60)
                // {
                //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                //     return redirect()->back();
                // }
                // elseif($request->songuoi==5 && $request->tongtien<60)
                // {
                //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                //     return redirect()->back();
                // }
                // elseif($request->songuoi==6 && $request->tongtien<80)
                // {
                //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                //     return redirect()->back();
                // }
                // elseif($request->songuoi==7 && $request->tongtien<80)
                // {
                //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                //     return redirect()->back();
                // }
                // elseif($request->songuoi==8 && $request->tongtien<100)
                // {
                //     Alert::error('*Số tiền nhỏ hơn mức quy định số người, bạn cần mua thêm món hàng')->persistent('close');
                //     return redirect()->back();
                // }
                // else
                // {
                    if($request->loaiban == "Phòng Vip" && $request->songuoi > 6)
                    {
                        Alert::error('Phòng VIP chỉ tối đa 6 người')->persistent('close');
                        return redirect()->back();
                    }
                    elseif($request->loaiban == "Phòng thường" && $request->songuoi > 6)
                    {
                        Alert::error('Phòng thường chỉ tối đa 6 người')->persistent('close');
                        return redirect()->back();
                    }
                    elseif($request->loaiban == "Phòng tiệc gia đình" && $request->songuoi < 8)
                    {
                        Alert::error('Phòng gia đình phải tối thiểu 8 người')->persistent('close');
                        return redirect()->back();
                    }
                    else
                    {
                        $thongtindatban[] = array(
                                'yourname' => $request->ten,
                                'sdt' => $request->dienthoai,
                                'email' => $request->email,
                                'tinnhan' => $request->message,
                                'songuoi' => $request->songuoi,
                                'soluongban' => $request->soluong,
                                'thoigian' => $request->thoigian,
                                'ngay' => $request->ngay,
            		            'loaiban' => $request->loaiban,
                            );
                        Session::put('thongtindatban',$thongtindatban);
                            
                        $thongtinpayment[] = array(
                                            'phuongthuc' => $request->optradio,
                                            'trangthai' => "Đã thanh toán",
                                        );
                        Session::put('thongtinpayment',$thongtinpayment);
                        if(Session::get('tong'))
                        {
                            Session::put('tongtien',Session::get('tong'));
                        }
                        else
                        {
                            Session::put('tongtien',$request->tongtien);
                        }
                        
                        if($request->loaiban == "Bàn thường")
                        {
                            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                            $vnp_Returnurl = "http://1998coffee.xyz/completereservation";
                            $vnp_TmnCode = "64P39E8L";//Mã website tại VNPAY 
                            $vnp_HashSecret = "AJQUEIUDJPYGRWUWBNXTEGLPINTZVZBW"; //Chuỗi bí mật
                            
                            $vnp_TxnRef = date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
                            if(Session::get('tong'))
                            {
                                $vnp_Amount = (Session::get('tong')/2)*100;//$request->tongtien
                            }
                            elseif($request->tongtien)
                            {
                                $vnp_Amount = ($request->tongtien/2)*100;//$request->tongtien
                            }
                            else
                            {
                                $vnp_Amount = 50000 *100;
                            }
                            $vnp_Locale = 'vn';
                            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                            $inputData = array(
                                "vnp_Version" => "2.0.0",
                                "vnp_TmnCode" => $vnp_TmnCode,
                                "vnp_Amount" => $vnp_Amount,
                                "vnp_Command" => "pay",
                                "vnp_CreateDate" => date('YmdHis'),
                                "vnp_CurrCode" => "VND",
                                "vnp_IpAddr" => $vnp_IpAddr,
                                "vnp_Locale" => $vnp_Locale,   
                                "vnp_OrderInfo" => $vnp_OrderInfo,
                                "vnp_ReturnUrl" => $vnp_Returnurl,
                                "vnp_TxnRef" => $vnp_TxnRef,    
                            );
                            ksort($inputData);
                            $query = "";
                            $i = 0;
                            $hashdata = "";
                            foreach ($inputData as $key => $value) {
                                if ($i == 1) {
                                    $hashdata .= '&' . $key . "=" . $value;
                                } else {
                                    $hashdata .= $key . "=" . $value;
                                    $i = 1;
                                }
                                $query .= urlencode($key) . "=" . urlencode($value) . '&';
                            }
                            
                            $vnp_Url = $vnp_Url . "?" . $query;
                            if (isset($vnp_HashSecret)) {
                                $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
                                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                            }
                            $returnData = array(
                    			'code' => '00',
                    			'message' => 'success',
                    			'data' => $vnp_Url,
                    		);
                    		return redirect()->to($returnData['data']);
                        }
                        else
                        {
                            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                            $vnp_Returnurl = "http://1998coffee.xyz/completereservation";
                            $vnp_TmnCode = "64P39E8L";//Mã website tại VNPAY 
                            $vnp_HashSecret = "AJQUEIUDJPYGRWUWBNXTEGLPINTZVZBW"; //Chuỗi bí mật
                            
                            $vnp_TxnRef = date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
                            
                            if(Session::get('tong'))
                            {
                                $vnp_Amount = (Session::get('tong')/2)*100;//$request->tongtien
                            }
                            else
                            {
                                $vnp_Amount = ($request->tongtien/2)*100;//$request->tongtien
                            }
                            
                            $vnp_Locale = 'vn';
                            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                            $inputData = array(
                                "vnp_Version" => "2.0.0",
                                "vnp_TmnCode" => $vnp_TmnCode,
                                "vnp_Amount" => $vnp_Amount,
                                "vnp_Command" => "pay",
                                "vnp_CreateDate" => date('YmdHis'),
                                "vnp_CurrCode" => "VND",
                                "vnp_IpAddr" => $vnp_IpAddr,
                                "vnp_Locale" => $vnp_Locale,   
                                "vnp_OrderInfo" => $vnp_OrderInfo,
                                "vnp_ReturnUrl" => $vnp_Returnurl,
                                "vnp_TxnRef" => $vnp_TxnRef,    
                            );
                            ksort($inputData);
                            $query = "";
                            $i = 0;
                            $hashdata = "";
                            foreach ($inputData as $key => $value) {
                                if ($i == 1) {
                                    $hashdata .= '&' . $key . "=" . $value;
                                } else {
                                    $hashdata .= $key . "=" . $value;
                                    $i = 1;
                                }
                                $query .= urlencode($key) . "=" . urlencode($value) . '&';
                            }
                            
                            $vnp_Url = $vnp_Url . "?" . $query;
                            if (isset($vnp_HashSecret)) {
                                $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
                                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                            }
                            $returnData = array(
                    			'code' => '00',
                    			'message' => 'success',
                    			'data' => $vnp_Url,
                    		);
                    		return redirect()->to($returnData['data']);
                        }
                        
                    }
                    
                //}
            }
        }
    }
}