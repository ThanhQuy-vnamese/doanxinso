<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabshipping;
use App\tabpayment;
use App\taborder;
use App\taborderdetail;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\tabmakhuyenmai;
use App\tabcity;
use App\tabprovince;
use App\tabwards;
use App\tabfeeship;
use DB;
use App\tabblog;
use Session;
use Alert;
use App\User;
Session_start();

class CheckoutController extends Controller
{
    public function delivery(Request $rq)
    { 
        // Alert::error(Session::get('feeship'))->persistent('close');
        // return redirect()->back();
        if(Session::get('thanhpho')==NULL || Session::get('quanhuyen')==NULL || Session::get('xaphuong')==NULL || Session::get('housenumberstreet')==NULL || Session::get('feeship')==NULL)
        {
            Alert::error('Bạn chưa nhập thông tin địa chỉ giao hàng')->persistent('close');
            return redirect()->back();
        }
        else
        {
            if(Auth::user())
            {
                $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
                $meta_keywords = "checkoutcoffee1998";
                $meta_title = "1998 Coffee-checkout";
                $url_canonical = $rq->url();
                $recentblog = tabblog::limit(2)->latest()->get();
                if((int)Cart::subtotal()==0)
                {
                    Alert::info('Bạn chưa có sản phẩm')->persistent(false,true)->autoClose(2000);
                    return redirect()->route('shopgiaohang');
                }
                else
                {
                    return view('Frontend.Shop.delivery',['recentblog'=>$recentblog,'meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
                }
            }
            else
            {
                Alert::info('Vui lòng đăng nhập để tiến hành thanh toán')->persistent(false,true)->autoClose(2000);
                return redirect()->route('loginget'); 
            }
               
        }
    }
    
    public function completedelivery1(Request $request)
    {
            if($request->vnp_ResponseCode == '00')
            {
                if(Auth::user())
                {
                    $user = Auth::user();
                    if(Session::get('thongtinshipping'))
                    {
                        foreach(Session::get('thongtinshipping') as $key => $thongtinshipping)
            		    {
            		        $tabpayment = new tabpayment;
                    		$tabpayment->phuongthuc = $thongtinshipping['optradio'];
                			$tabpayment->trangthai = "Đẵ thanh toán";
                			$tabpayment->save();
                    		
                    		$tabshipping = new tabshipping;
                			if($thongtinshipping['tendaydu'])
                    		{
                    		    $tabshipping->fullname = $thongtinshipping['tendaydu'];
                    		}
                    		else
                    		{
                    		    $tabshipping->firstname = $thongtinshipping['tendau'];
                			    $tabshipping->lastname = $thongtinshipping['tencuoi'];
                    		}
                    		// "KH"."_".str_random(4)
                			$tabshipping->diachi = $thongtinshipping['diachi'];
                			$tabshipping->thanhpho = $thongtinshipping['thanhpho'];
                			$tabshipping->congty = $thongtinshipping['congty'];
                			$tabshipping->postcodezip = $thongtinshipping['zipcode'];
                			$tabshipping->dienthoai = $thongtinshipping['dienthoai'];
                			$tabshipping->email = $thongtinshipping['email'];
                			$tabshipping->tinnhan = $thongtinshipping['message'];
                			$tabshipping->diachiship = $thongtinshipping['shippingto'];
                			$tabshipping->idkhachhang = $user->id;
                			$tabshipping->save();
                			
                			$taborder = new taborder;
                    		$taborder->idkhachhang = $user->id;
                			$taborder->idshipping = $tabshipping->id;
                			$taborder->idpayment = $tabpayment->id;
                			$taborder->tongdonhang = $thongtinshipping['tongtien'];
                			$taborder->trangthaidonhang = "Đã thanh toán";
                			$taborder->save();
                			
                			$content = Cart::content();
                			foreach($content as $value1)
                			{
                				$taborderdetail = new taborderdetail;
                	    		$taborderdetail->iddonhang = $taborder->id;
                				$taborderdetail->idsanpham = $value1->id;
                				$taborderdetail->tensanpham = $value1->name;
                				$taborderdetail->size = $value1->options->size;
                				$taborderdetail->gia = $value1->price;
                				$taborderdetail->soluong = $value1->qty;
                				$taborderdetail->save();
                			}
                			
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
                			Alert::success('Đơn hàng xác nhận, vui lòng chờ đợi cuộc gọi cửa hàng', 'Thành công')->persistent("close");
                			return redirect()->route('totalhandcart');
            		    }
                    }
                }
                else
                {
                    return redirect()->route('home');
                }
            }
            else
            {
                Alert::error('Thanh toán không thành công')->persistent("close");
                return redirect()->route('home');    
            }
    }
    
    public function completedelivery($data)
    {
    	if($data['optradio'] == "Payment after arrival of goods")
    	{
    		$user = Auth::user();
    		$tabpayment = new tabpayment;
    		$tabpayment->phuongthuc = $data['optradio'];
			$tabpayment->trangthai = "Đang chờ xử lý";
			$tabpayment->save();
			
    		$tabshipping = new tabshipping;
    		if($data['tendaydu'])
    		{
    		    $tabshipping->fullname = $data['tendaydu'];
    		}
    		else
    		{
    		    $tabshipping->firstname = $data['tendau'];
			    $tabshipping->lastname = $data['tencuoi'];
    		}
			$tabshipping->diachi = $data['diachi'];
			$tabshipping->thanhpho = $data['thanhpho'];
			$tabshipping->congty = $data['congty'];
			$tabshipping->postcodezip = $data['zipcode'];
			$tabshipping->dienthoai = $data['dienthoai'];
			$tabshipping->email = $data['email'];
			$tabshipping->tinnhan = $data['message'];
			$tabshipping->diachiship = $data['shippingto'];
			$tabshipping->idkhachhang = $user->id;
			$tabshipping->save();
			
			$taborder = new taborder;
    		$taborder->idkhachhang = $user->id;
			$taborder->idshipping = $tabshipping->id;
			$taborder->idpayment = $tabpayment->id;
			$taborder->tongdonhang = $data['tongtien'];
			$taborder->trangthaidonhang = "Đang chờ xử lý";
			$taborder->save();
			
			$content = Cart::content();
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
	        Alert::success('Đơn hàng xác nhận, vui lòng chờ đợi cuộc gọi cửa hàng', 'Thành công')->persistent("close");
			return redirect()->route('totalhandcart');
    	}
    }
    
    public function thanhtoanvnpay(Request $request)
    {
        if($request->optradio == "Payment after arrival of goods")
        {
            $data = $request->all();
            return $this->completedelivery($data);
        }
        else
        {
            if($request->tendaydu)
    		{
    		    $thongtinshipping[] = array(
    		                    'optradio' => $request->optradio,
                                'tendaydu' => $request->tendaydu,
                                'diachi' => $request->diachi,
                                'thanhpho' => $request->thanhpho,
                                'congty' => $request->congty,
                                'zipcode' => $request->zipcode,
                                'dienthoai' => $request->dienthoai,
                                'email' => $request->email,
                                'message' => $request->message,
                                'shippingto' => $request->shippingto,
            		            'tongtien' => $request->tongtien,
                            );
                Session::put('thongtinshipping',$thongtinshipping);
    		}
    		else
    		{
    		    $thongtinshipping[] = array(
    		                    'optradio' => $request->optradio,
    		                    'tendaydu' => $request->tendaydu,
                                'tendau' => $request->tendau,
                                'tencuoi' => $request->tencuoi,
                                'diachi' => $request->diachi,
                                'thanhpho' => $request->thanhpho,
                                'congty' => $request->congty,
                                'zipcode' => $request->zipcode,
                                'dienthoai' => $request->dienthoai,
                                'email' => $request->email,
                                'message' => $request->message,
                                'shippingto' => $request->shippingto,
            		            'tongtien' => $request->tongtien,
                            );
                Session::put('thongtinshipping',$thongtinshipping);
    		}
    		
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://1998coffee.xyz/completedelivery1";
            $vnp_TmnCode = "64P39E8L";//Mã website tại VNPAY 
            $vnp_HashSecret = "AJQUEIUDJPYGRWUWBNXTEGLPINTZVZBW"; //Chuỗi bí mật
            
            $vnp_TxnRef = date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_Amount = $request->tongtien*100;//$request->tongtien
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
}
