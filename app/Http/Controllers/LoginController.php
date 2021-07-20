<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\tabdangki;
use App\tabdangnhap;
use App\User;
use App\tabsocial; 
use Illuminate\Http\Request;
use DB,Datetime,session,File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; //ma hoa du lieu
use Validator;
use Alert;
use Socialite;


class LoginController extends Controller
{
	public function redirect($provider)
     {
         return Socialite::driver($provider)->redirect();
     }
     public function callback($provider)
     {
       $getInfo = Socialite::driver($provider)->user(); 
       $user = $this->createUser($getInfo,$provider); 
       $user1 = User::where('email','=',$user->email)->first();
       Auth::login($user1);
       Alert::success('Đăng nhập thành công', 'Thành công')->persistent('Đóng');
       return redirect()->route('home');
     }
     function createUser($getInfo,$provider)
     {
         $user = tabdangnhap::where('provider_id','=', $getInfo->id)->first();
         if($user)
         {
             return $user;
         }
         else
         {
             $user3 = tabdangki::create([
                 'fullname'     => $getInfo->name,
                 'usename'     => $getInfo->name,
                 'email'    => $getInfo->email,
             ]);
             $user = tabdangnhap::create([
                 'username'     => $getInfo->name,
                 'email'    => $getInfo->email,
                 'provider' => $provider,
                 'provider_id' => $getInfo->id,
                 'id_thongtindangki' => $user3->id,
             ]);
             
             return $user;
         }
       
     }

	
    public function Register()
	{
        return view('Frontend.Login.Register');
    }

    public function resultsuccessregister()
    {
    	return view('Frontend.Login.resultsuccessregister');
    }

    public function dangkidangnhap(Request $rq)// Nhập dữ liệu vào csdl
	{
	    $kiemtraemailorusename = tabdangki::where('email','=',$rq->email)->orwhere('usename','=',$rq->Username)->first();
	    if($kiemtraemailorusename)
	    {
	        Alert::warning('Email or tài khoản đã tồn tại', 'Cảnh báo')->persistent('Đóng');
	        //return redirect()->route('register');
	        return redirect()->back()->withInput();
	    }
	    else
	    {
	        $tabdangki = new tabdangki;
    		$tabdangki->firstname = $rq->tendau;
    		$tabdangki->lastname = $rq->tencuoi;
    		$tabdangki->email = $rq->email;
    		$tabdangki->diachi = $rq->diachi;
    		$tabdangki->sdt = $rq->sdt;
    		$tabdangki->usename = $rq->Username;
    		$tabdangki->password = $rq->Password;
    		$tabdangki->save();
    
    		$tabdangnhap = new tabdangnhap;
    		$tabdangnhap->username = $rq->Username;
    		$tabdangnhap->password =  Hash::make($rq->Password);
    		$tabdangnhap->email = $rq->email;
    		$tabdangnhap->id_thongtindangki = $tabdangki->id;
    		$tabdangnhap->save();
    		$user1 = User::where('email','=',$rq->email)->first();
            Auth::login($user1);
    		Alert::success('Đăng ký thành công', 'Thành công')->persistent('Đóng');
		    return redirect()->route('home');
	    }
	}

	public function Loginpost(Request $request)
	{
		$credentials = ['email' => $request->email, 'password' => $request->password];
		if(Auth::attempt($credentials))
		{
			Alert::success('Đăng nhập thành công', 'Thành công')->persistent('Đóng');
			return redirect()->route('home');
		}
		else
		{
			Alert::error('Email hoặc mật khẩu ko đúng!', 'Đăng nhập thất bại')->persistent('Đóng');
			return redirect()->route('loginget');
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route("home");
	}

	public function Membersettingget()
	{
		$user = Auth::user();
		return view('Frontend.Login.membersetting',['user'=>$user]);
		
	}
	
	public function rewardpoints()
	{
		$user = Auth::user();
		if($user->diemthuong)
		{
			Alert::message($user->diemthuong.' điểm','Điểm thưởng')->persistent('Đóng');
		}
		else
		{
			Alert::message('0 điểm','Điểm thưởng')->persistent('Đóng');
		}
		return redirect()->route('home');
	}

	public function membersettingpost(Request $request)
	{
		$user = Auth::user();
		$usermember = tabdangki::find($user->id_thongtindangki);
		$usermember->firstname = $request->tendau;
		$usermember->lastname = $request->tencuoi;
		$usermember->email = $request->Email;
		$usermember->diachi = $request->diachi;
		$usermember->sdt = $request->sdt;
		$usermember->usename = $request->username;
		if($request->thaydoipass || $request->thaydoipassagain)
		{
			if($request->thaydoipass == $request->thaydoipassagain)
			{
				$usermember->password = $request->thaydoipass;
			}
		}
		$usermember->save();
		alert()->success('Cập nhật thành công', 'Thành công')->persistent("Đóng");
		return redirect()->route('home');
	}
	
	public function dangnhapforcheckout()
	{
		return view('Frontend.Login.Login');
	}
}

