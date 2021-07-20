<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; //ma hoa du lieu
use App\tabmenu;
use App\tabdangki;
use App\tabdatban;
use App\tabdangnhap;
use App\tabdetailblog;
use App\tabmakhuyenmai;
use App\tabblog;
use App\tabbinhluan;
use App\User;
use App\tab;
use DB;
use Alert;
use App\taborder;
use App\taborderdetail;
use App\tabshipping;
use App\tabpayment;
use App\tabduyethoadon;
use App\tabproductordertoday;
use App\tabkhachhangtiemnang;
use App\tabsanphambanchay;
use App\tabdanhsachcongviec;
use App\tabphongnhahang;
use PDF;
use Carbon\Carbon;
use Session;
use Cart;
Session_start();

class AdminController extends Controller
{
    //--------------------ĐĂNG NHẬP----------------------------//
    public function loginadmin()
    {
        Auth::logout();
        return view('Backend.login.loginadmin');
    }
    
    public function loginstaff()
    {
        Auth::logout();
        return view('Backend.login.loginstaff');
    }
    
    public function loginchef()
    {
        Auth::logout();
        return view('Backend.login.loginchef');
    }
    
    public function Loginadminpost(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
		if(Auth::attempt($credentials))
		{
		    Alert::success('Đăng nhập thành công', 'Thành công')->persistent('Đóng');
			return redirect()->route('dashboardadmin');
		}
		else
		{
			Alert::error('Email hoặc mật khẩu không đúng!', 'Đăng nhập thất bại')->persistent('Đóng');
			return redirect()->route('loginadmin');
		}
    }
    
    public function Loginstaffpost(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
		if(Auth::attempt($credentials))
		{
		    Alert::success('Đăng nhập thành công', 'Thành công')->persistent('Đóng');
			return redirect()->route('dashboardstaff');
		}
		else
		{
			Alert::error('Email hoặc mật khẩu không đúng!', 'Đăng nhập thất bại')->persistent('Đóng');
			return redirect()->route('loginstaff');
		}
    }
    
    public function Loginchefpost(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
		if(Auth::attempt($credentials))
		{
		    Alert::success('Đăng nhập thành công', 'Thành công')->persistent('Đóng');
			return redirect()->route('dashboardchef');
		}
		else
		{
			Alert::error('Email hoặc mật khẩu không đúng!', 'Đăng nhập thất bại')->persistent('Đóng');
			return redirect()->route('loginchef');
		}
    }
    
    //--------------------dashboard----------------------------//
    public function dashboard()
    {
        $donhang = taborder::all()->count();
        $datban = tabdatban::all()->count();
        $khachhang=DB::table('tabdangkis')
                    ->whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=',NULL);
                     
                                })
                    ->get()->count();
        $thongtinkhachhang=DB::table('tabdangkis')
                    ->whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=',NULL);
                     
                                })
                    ->get();
        $tongtien = tabduyethoadon::all();
        $donhangdaduyet = tabduyethoadon::all()->count();
        $congviectrongngay = tabdanhsachcongviec::paginate(5);
        $demcongviec = tabdanhsachcongviec::all()->count();
        $demphanhoi = tabbinhluan::where('noidungphanhoi','=',NULL)->count();
        $current = Carbon::now('Asia/Ho_Chi_Minh');
        $sanphammoi = tabmenu::where('sanphammoi','=','1')->paginate(5);
        $sanphamkhuyenmai = tabmenu::where('khuyenmai','>',0)->paginate(5);
        $khachhangnhanthuong = tabdangnhap::where('diemthuong','>=','50')->paginate(5);
        return view('Backend.admin.admin',['demphanhoi'=>$demphanhoi,'thongtinkhachhang'=>$thongtinkhachhang,'khachhangnhanthuong'=>$khachhangnhanthuong,'sanphamkhuyenmai'=>$sanphamkhuyenmai,'sanphammoi'=>$sanphammoi,'current'=>$current,'demcongviec'=>$demcongviec,'congviectrongngay'=>$congviectrongngay,'datban'=>$datban,'donhangdaduyet'=>$donhangdaduyet,'donhang'=>$donhang,'khachhang'=>$khachhang,'tongtien'=>$tongtien]);
    }
    
    public function postthemcongviec(Request $rq)
    {
        $congviec = new tabdanhsachcongviec;
        $congviec->tencongviec = $rq->tencongviec;
        $congviec->ngaybatdau = $rq->start;
        $congviec->ngayketthuc = $rq->finish;
        $congviec->save();
        
        if($congviec){
            return response()->json(true);
          }
    }
    
    public function xoacongviec($id)
    {
        $congviec = tabdanhsachcongviec::where('id','=',$id)->first();
        $congviec->delete();
        return redirect()->back();
    }
    
    public function postcheckhoanhthanh(Request $rq)
    {
        $congviec = tabdanhsachcongviec::where('id','=',$rq->check)->first();
        // dd($congviec);
        $congviec->trangthai = $rq->val;
        $congviec->save();
        
        if($congviec){
            return response()->json(true);
          }
    }
    
    public function resetdiemthuong($id)
    {
        $reset = tabdangnhap::where('id','=',$id)->first();
        $reset->diemthuong = NULL;
        $reset->save();
        return redirect()->back();
    }
    
    //--------------------SẢN PHẨM----------------------------//
    public function themsanpham()
    {
        return view('Backend.pagesproduct.formaddproduct');
    }
    
    public function postthemsanpham(Request $rq)
    {
        $tabmenu = new tabmenu;
		$tabmenu->tenmonan = $rq->tenmonan;
		$tabmenu->sanphammoi = $rq->new1;
		$tabmenu->mota = $rq->tomtat;
		$tabmenu->motachitiet = $rq->chitiet;
		$tabmenu->gia = $rq->gia;
		$tabmenu->khuyenmai = $rq->khuyenmai;
		$tabmenu->meta_keywords = $rq->tukhoa;
		$tabmenu->theloai = $rq->theloai;
 		if($rq->hasFile('hinhanh')) 
 		{
		  
		  $file = $rq->file('hinhanh');
		  $name = $file->getClientOriginalName();
		  $hinh = str_random(4)."_".$name;
		  while(file_exists("public/images/".$hinh))
		  {
		      $hinh = str_random(4)."_".$name;
		  }
		  $file->move("public/images",$hinh);
		  $tabmenu->hinhanh = $hinh;
    	}
		else
		{
            $tabmenu->hinhanh = "";
		}
		$tabmenu->save();
		return redirect()->route('bangsanpham');
    }
    
    public function capnhatsanpham()
    {
        $sanpham = tabmenu::paginate(5);
        return view('Backend.pagesproduct.viewupdateproduct',['sanpham'=>$sanpham]);
    }
    
    public function chucnangcapnhatsanpham($id)
    {
        $capnhatsanpham = tabmenu::find($id);
        return view('Backend.pagesproduct.formupdateproduct',['capnhatsanpham'=>$capnhatsanpham]);
    }
    
    public function chucnangcapnhatpost(Request $rq,$id)
    {
        $capnhat = tabmenu::find($id);
        $capnhat->tenmonan = $rq->tenmonan;
		$capnhat->sanphammoi = $rq->new1;
		$capnhat->mota = $rq->tomtat;
		$capnhat->motachitiet = $rq->chitiet;
		$capnhat->gia = $rq->gia;
		$capnhat->khuyenmai = $rq->khuyenmai;
		$capnhat->meta_keywords = $rq->tukhoa;
		$capnhat->theloai = $rq->theloai;
 		if($rq->hasFile('hinhanh')) 
 		{
		  
		  $file = $rq->file('hinhanh');
		  $name = $file->getClientOriginalName();
		  $hinh = str_random(4)."_".$name;
		  while(file_exists("public/images/".$hinh))
		  {
		      $hinh = str_random(4)."_".$name;
		  }
		  $file->move("public/images",$hinh);
		  unlink("public/images/".$capnhat->hinhanh);
		  $capnhat->hinhanh = $hinh;
    	}
		$capnhat->save();
		Alert::success('Đã cập nhật', 'Thành công')->persistent(false,true)->autoClose(4000);
		return redirect()->route('capnhatsanpham');
    }
    
    public function chucnangxoa($id)
    {
        $xoa = tabmenu::find($id);
        $xoa->delete();
        
		return redirect()->route('capnhatsanpham');
    }
    
    public function timkiemchucnangbangsanpham(Request $rq)
    {
      $search=tabmenu::Where('tenmonan','like','%'.$rq->value1.'%')->orWhere('theloai','like', '%'.$rq->value1.'%')->orWhere('id','like', '%'.$rq->value1.'%')->get();
      $output='';
      $output.='
      
                <table class="table table-bordered table-hover ">
                    <thead>                  
                      <tr align="center" class="text-nowrap">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Thể loại</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>';
                    foreach($search as $searchchucnangsanpham)
                    {
                        $output.='
                          <tr align="center">
                            <td>'.$searchchucnangsanpham->id.'</td>
                            <td>'.$searchchucnangsanpham->tenmonan.'</td>
                            <td><img src="../public/images/'.$searchchucnangsanpham->hinhanh.'" width="50px" height="50px" style="border-radius:10px;"></td>
                            <td>'.$searchchucnangsanpham->theloai.'</td>
                              <td style="width:85px">
                                <a href="'.route('chucnangcapnhatsanpham',$searchchucnangsanpham->id).'">
                                  <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                                </a>
                              </td>
                              <td style="width:85px">
                                <a href="'.route('chucnangxoa',$searchchucnangsanpham->id).'">
                                  <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                </a>
                              </td>
                          </tr>';
                    }
                    
                     $output.='
                    </tbody>
                  </table>
                 ';
       echo $output;
    }
    
    //--------------------KHÁCH HÀNG----------------------------//
    public function themkhachhang()
    {
        return view('Backend.pagescustomer.formaddcustomer');
    }
    
    public function postthemkhachhang(Request $rq)
    {
        $tabdangki = new tabdangki;
		$tabdangki->firstname = $rq->tendau;
		$tabdangki->lastname = $rq->tencuoi;
		$tabdangki->email = $rq->email;
		$tabdangki->diachi = $rq->diachi;
		$tabdangki->sdt = $rq->sdt;
		$tabdangki->usename = $rq->username;
		$tabdangki->password = $rq->password;
		$tabdangki->save();

		$tabdangnhap = new tabdangnhap;
		$tabdangnhap->username = $rq->username;
		$tabdangnhap->password =  Hash::make($rq->password);
		$tabdangnhap->email = $rq->email;
		$tabdangnhap->chucvu = $rq->chucvu;
		$tabdangnhap->id_thongtindangki = $tabdangki->id;
		$tabdangnhap->save();
		return redirect()->route('bangkhachhang');
    }
    
    public function capnhatkhachhang()
    {
        $khachhang=DB::table('tabdangkis')
                    ->whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=',NULL);
                     
                                })
                    ->paginate(7);
        return view('Backend.pagescustomer.viewupdatecustomer',['khachhang'=>$khachhang]);
    }
    
    public function chucnangcapnhatkhachhang($id)
    {
        $capnhatkhachhang1 = tabdangki::find($id);
        $capnhatkhachhang2 = tabdangnhap::where('id_thongtindangki','=',$id)->first();
        return view('Backend.pagescustomer.formupdatecustomer',['capnhatkhachhang1'=>$capnhatkhachhang1,'capnhatkhachhang2'=>$capnhatkhachhang2]);
    }
    
    public function chucnangcapnhatkhachhangpost(Request $rq,$id)
    {
        $capnhat1 = tabdangki::find($id);
		$capnhat1->firstname = $rq->tendau;
		$capnhat1->lastname = $rq->tencuoi;
		$capnhat1->email = $rq->email;
		$capnhat1->diachi = $rq->diachi;
		$capnhat1->sdt = $rq->sdt;
		$capnhat1->usename = $rq->username;
		$capnhat1->password = $rq->password;
		$capnhat1->save();

		$capnhat2 = tabdangnhap::where('id_thongtindangki','=',$id)->first();
		$capnhat2->username = $rq->username;
		$capnhat2->password =  Hash::make($rq->password);
		$capnhat2->email = $rq->email;
		$capnhat2->chucvu = $rq->chucvu;
		$capnhat2->save();
		Alert::success('Đã cập nhật', 'Thành công')->persistent(false,true)->autoClose(4000);
		return redirect()->route('capnhatkhachhang');
    }
    
    public function chucnangxoakhachhang($id)
    {
        $xoa1 = tabdangki::find($id);
        $xoa1->delete();
        
        $xoa2 = tabdangnhap::where('id_thongtindangki','=',$id)->first();
        $xoa2->delete();
        
		return redirect()->route('capnhatkhachhang');
    }
    
    public function detailcustomer($id)
    {
        $detailcustomer1 = tabdangki::find($id);
        $detailcustomer2 = tabdangnhap::where('id_thongtindangki','=',$id)->first();
        return view('Backend.pagescustomer.detailcustomer',['detailcustomer1'=>$detailcustomer1,'detailcustomer2'=>$detailcustomer2]);
    }
    
    public function timkiemchucnangbangkhachhang(Request $rq)
    {
        $search1 = tabdangki::Where('firstname','like','%'.$rq->value.'%')->orWhere('lastname','like', '%'.$rq->value.'%')->orWhere('email','like', '%'.$rq->value.'%')->orWhere('sdt','like', '%'.$rq->value.'%')->first();
        $search2 = tabdangnhap::where('id_thongtindangki','=',$search1->id)->first();
        if($search2->chucvu == NULL)
        {
            $searchchucnangkhachhang = $search1;
        }
      $output='';
      $output.='
      
                <table class="table table-sm table-hover text-nowrap">
                    <thead>                  
                      <tr align="center">
                        <th>ID</th>
                        <th>Họ & tên</th>
                        <th>Email</th>
                        <th>sdt</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr align="center">
                        <td>'.$searchchucnangkhachhang->id.'</td>
                        <td>
                          <a href="'.route('detailcustomer',$searchchucnangkhachhang->id).'">'.$searchchucnangkhachhang->firstname.''.' '.$searchchucnangkhachhang->lastname.'</button></a>
                        </td>
                        <td>'.$searchchucnangkhachhang->email.'</td>
                        <td>'.$searchchucnangkhachhang->sdt.'</td>
                        <td style="width:85px">
                          <a href="'.route('chucnangcapnhatkhachhang',$searchchucnangkhachhang->id).'">
                            <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                          </a>
                        </td>
                        <td style="width:85px">
                          <a href="'.route('chucnangxoakhachhang',$searchchucnangkhachhang->id).'">
                            <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
      
                
                 ';
       echo $output;
    }
    
    //--------------------ADMIN----------------------------//
    public function themnguoiquantri()
    {
        return view('Backend.pagesadmin.formaddadmin');
    }
    
    public function postthemadmin(Request $rq)
    {
        $tabdangki = new tabdangki;
		$tabdangki->firstname = $rq->tendau;
		$tabdangki->lastname = $rq->tencuoi;
		$tabdangki->email = $rq->email;
		$tabdangki->diachi = $rq->diachi;
		$tabdangki->sdt = $rq->sdt;
		$tabdangki->usename = $rq->username;
		$tabdangki->password = $rq->password;
		$tabdangki->save();

		$tabdangnhap = new tabdangnhap;
		$tabdangnhap->username = $rq->username;
		$tabdangnhap->password =  Hash::make($rq->password);
		$tabdangnhap->email = $rq->email;
		$tabdangnhap->chucvu = $rq->chucvu;
		$tabdangnhap->id_thongtindangki = $tabdangki->id;
		$tabdangnhap->save();
		return redirect()->route('bangquantri');
    }
    
    public function capnhatnguoiquantri()
    {
        $quantri = tabdangki::whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=','admin');
                                })
                    ->paginate(5);
        $taikhoan = tabdangnhap::all();
        return view('Backend.pagesadmin.viewupdateadmin',['quantri'=>$quantri,'taikhoan'=>$taikhoan]);
    }
    
    public function capnhatnhanvien()
    {
        $nhanvien = tabdangki::whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=','staff')->orwhere('chucvu','=','chef');
                                })
                    ->paginate(5);
        $taikhoan = tabdangnhap::all();
        return view('Backend.pagesadmin.viewupdatestaff',['nhanvien'=>$nhanvien,'taikhoan'=>$taikhoan]);
    }
    
    public function chucnangcapnhatadmin($id)
    {
        $capnhatadmin1 = tabdangki::find($id);
        $capnhatadmin2 = tabdangnhap::where('id_thongtindangki','=',$id)->first();
        return view('Backend.pagesadmin.formupdateadmin',['capnhatadmin1'=>$capnhatadmin1,'capnhatadmin2'=>$capnhatadmin2]);
    }
    
    public function chucnangcapnhatadminpost(Request $rq,$id)
    {
        $capnhat1 = tabdangki::find($id);
		$capnhat1->firstname = $rq->tendau;
		$capnhat1->lastname = $rq->tencuoi;
		$capnhat1->email = $rq->email;
		$capnhat1->diachi = $rq->diachi;
		$capnhat1->sdt = $rq->sdt;
		$capnhat1->usename = $rq->username;
		$capnhat1->password = $rq->password;
		$capnhat1->save();

		$capnhat2 = tabdangnhap::where('id_thongtindangki','=',$id)->first();
		$capnhat2->username = $rq->username;
		$capnhat2->password =  Hash::make($rq->password);
		$capnhat2->email = $rq->email;
		$capnhat2->chucvu = $rq->chucvu;
		$capnhat2->save();
		Alert::success('Đã cập nhật', 'Thành công')->persistent(false,true)->autoClose(4000);
		return redirect()->route('capnhatnguoiquantri');
    }
    
    public function chucnangxoaadmin($id)
    {
        $xoa1 = tabdangki::find($id);
        $xoa1->delete();
        
        $xoa2 = tabdangnhap::where('id_thongtindangki','=',$id)->first();
        $xoa2->delete();
        
		return redirect()->route('capnhatnguoiquantri');
    }
    
    public function detailadmin($id)
    {
        $detailadmin1 = tabdangki::find($id);
        $detailadmin2 = tabdangnhap::where('id_thongtindangki','=',$id)->first();
        return view('Backend.pagesadmin.detailadmin',['detailadmin1'=>$detailadmin1,'detailadmin2'=>$detailadmin2]);
    }
    
    public function timkiemchucnangbangadmin(Request $rq)
    {
        $search1 = tabdangki::Where('firstname','like','%'.$rq->value.'%')->orWhere('lastname','like', '%'.$rq->value.'%')->orWhere('email','like', '%'.$rq->value.'%')->orWhere('sdt','like', '%'.$rq->value.'%')->first();
        $search2 = tabdangnhap::where('id_thongtindangki','=',$search1->id)->first();
        if($search2->chucvu == 'admin')
        {
            $s = $search1;
        }
      $output='';
      $output.='
                <table class="table table-sm table-hover text-nowrap">
                    <thead>                  
                      <tr align="center">
                        <th>ID</th>
                        <th>Họ & tên</th>
                        <th>Email</th>
                        <th>sdt</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr align="center">
                        <td>'.$s->id.'</td>
                        <td><a href="'.route('detailadmin',$s->id).'">'.$s->firstname.''.' '.$s->lastname.'</a></td>
                        <td>'.$s->email.'</td>
                        <td>'.$s->sdt.'</td>
                        <td style="width:85px">
                          <a href="'.route('chucnangcapnhatadmin',$s->id).'">
                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                          </a>
                        </td>
                        <td style="width:85px">
                          <a href="'.route('chucnangxoaadmin',$s->id).'">
                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
      
                
                 ';
       echo $output;
    }
    
    //--------------------Blog----------------------------//
    public function themblog()
    {
        return view('Backend.pagesblog.formaddblog');
    }
    
    public function postthemblog(Request $rq)
    {
        $tabblog = new tabblog;
		$tabblog->tenbaidang = $rq->tieude;
		$tabblog->noidung = $rq->noidungtieude;
		if($rq->hasFile('hinhanh')) 
 		{
		  
		  $file = $rq->file('hinhanh');
		  $name = $file->getClientOriginalName();
		  $hinh = str_random(4)."_".$name;
		  while(file_exists("public/images/".$hinh))
		  {
		      $hinh = str_random(4)."_".$name;
		  }
		  $file->move("public/images",$hinh);
		  $tabblog->hinhanh = $hinh;
    	}
		else
		{
            $tabblog->hinhanh = "";
		}
		$tabblog->nguoidang = $rq->nguoidang;
		$tabblog->save();

		$tabdetailblog = new tabdetailblog;
		$tabdetailblog->noidungchitiet = $rq->noidungchitiet;
		$tabdetailblog->metakeywords = $rq->tukhoablog;
		$tabdetailblog->id_blog =  $tabblog->id;
		$tabdetailblog->save();
		return redirect()->route('quanlyblog');
    }
    
    public function capnhatblog()
    {
        $tabblog= tabblog::paginate(7);
        return view('Backend.pagesblog.viewupdateblog',['blog'=>$tabblog]);
    }
    
    public function chucnangcapnhatblog($id)
    {
        $capnhatblog1 = tabblog::find($id);
        $capnhatblog2 = tabdetailblog::where('id_blog','=',$id)->first();
        return view('Backend.pagesblog.formupdateblog',['capnhatblog1'=>$capnhatblog1,'capnhatblog2'=>$capnhatblog2]);
    }
    
    public function chucnangcapnhatblogpost(Request $rq,$id)
    {
		$tabblog = tabblog::find($id);
		$tabblog->tenbaidang = $rq->tieude;
		$tabblog->noidung = $rq->noidungtieude;
		if($rq->hasFile('hinhanh')) 
 		{
		  
		  $file = $rq->file('hinhanh');
		  $name = $file->getClientOriginalName();
		  $hinh = str_random(4)."_".$name;
		  while(file_exists("public/images/".$hinh))
		  {
		      $hinh = str_random(4)."_".$name;
		  }
		  $file->move("public/images",$hinh);
		  if($tabblog->hinhanh!=NULL)
		  {
		      unlink("public/images/".$tabblog->hinhanh);
		  }
		  $tabblog->hinhanh = $hinh;
    	}
		$tabblog->nguoidang = $rq->nguoidang;
		$tabblog->save();

        $tabdetailblog = tabdetailblog::where('id_blog','=',$id)->first();
		$tabdetailblog->noidungchitiet = $rq->noidungchitiet;
		$tabdetailblog->metakeywords = $rq->tukhoablog;
		$tabdetailblog->id_blog =  $tabblog->id;
		$tabdetailblog->save();
		Alert::success('Đã cập nhật', 'Thành công')->persistent(false,true)->autoClose(4000);
		return redirect()->route('quanlyblog');
    }
    
    public function chucnangxoablog($id)
    {
        $xoa1 = tabblog::find($id);
        $xoa1->delete();
        
        $xoa2 = tabdetailblog::where('id_blog','=',$id)->first();
        $xoa2->delete();
        
		return redirect()->route('quanlyblog');
    }
    
    public function timkiemchucnangbangblog(Request $rq)
    {
      $s = tabblog::where('tenbaidang','like','%'.$rq->value.'%')->first();
      $output='';
      $output.='
                  
                  <table class="table table-sm table-hover text-nowrap">
                    <thead>                  
                      <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>
                        <th>Người đăng</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr align="center">
                        <td>'.$s->id.'</td>
                        <td><label>'.$s->tenbaidang.'</label></td>
                        <td><img src="../public/images/'.$s->hinhanh.'" width="50px" height="50px" style="border-radius:10px;"></td>
                        <td>'.$s->nguoidang.'</td>
                        <td style="width:85px">
                          <a href="'.route('chucnangcapnhatblog',$s->id).'">
                            <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                          </a>
                        </td>
                        <td style="width:85px">
                          <a href="'.route('chucnangxoablog',$s->id).'">
                            <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                          </a>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
      
                
                 ';
       echo $output;
    }
    //----------------------------phòng--------------------------//
    public function quanlyphong()
    {
        $quanlyphong= tabphongnhahang::paginate(7);
        return view('Backend.pagesroom.viewupdateroom',['quanlyphong'=>$quanlyphong]);
    }
    
    public function themphong()
    {
        return view('Backend.pagesroom.formaddroom');
    }
    
    public function postthemphong(Request $rq)
    {
        $tabphong = new tabphongnhahang;
		$tabphong->tenphong = $rq->tenphong;
		$tabphong->soluong = $rq->soluong;
		$tabphong->tienphong = $rq->gia;
		$tabphong->save();
		return redirect()->route('quanlyphong');
    }
    
    public function chucnangcapnhatphong($id)
    {
        $capnhatphong = tabphongnhahang::find($id);
        return view('Backend.pagesroom.formupdateroom',['capnhatphong'=>$capnhatphong]);
    }
    
    public function chucnangcapnhatphongpost(Request $rq,$id)
    {
		$tabphong = tabphongnhahang::find($id);
		$tabphong->tenphong = $rq->tenphong;
		$tabphong->soluong = $rq->soluong;
		$tabphong->tienphong = $rq->gia;
		$tabphong->save();
		Alert::success('Đã cập nhật', 'Thành công')->persistent(false,true)->autoClose(4000);
		return redirect()->route('quanlyphong');
    }
    
    public function chucnangxoaphong($id)
    {
        $xoa1 = tabphongnhahang::find($id);
        $xoa1->delete();
        
		return redirect()->route('quanlyphong');
    }
    
    //----------------------------phản hồi khách hàng--------------------------//
    public function phanhoikhachhang()
    {
        $binhluan = tabbinhluan::paginate(7);
        return view('Backend.pagesfeedbackcustomer.viewfeedbackcustomer',['binhluan'=>$binhluan]);
    }
    
    public function chitietphanhoikhachhang($id)
    {
        $detail = tabbinhluan::find($id);
        return view('Backend.pagesfeedbackcustomer.sendcustomerfeedback',['detail'=>$detail]);
    }
    
    public function postphanhoiykienkhachhang(Request $rq,$id)
    {
        if($rq->noidungphanhoiykien==NUll)
        {
            alert('Bạn chưa nhập nội dung mail.');
            return redirect()->back();
        }
        else
        {
            $phanhoi = tabbinhluan::find($id);
            $phanhoi->tieudephanhoi = $rq->tieude;
            $phanhoi->cuahangphanhoi = $rq->tencuahang;
            $phanhoi->emailnguoiphanhoi = $rq->emailadmin;
            $phanhoi->noidungphanhoi = $rq->noidungphanhoiykien;
            $phanhoi->save();
            return redirect()->back();
        }
    }
    
    public function xoaphanhoikhachhang($id)
    {
        $phanhoi = tabbinhluan::find($id);
        $phanhoi->delete();
        return redirect()->route('phanhoikhachhang');
    }
    
    //----------------------------Đặt bàn----------------//
    public function booktable()
    {
        if(Session::get('luungay'))
        {
            Session::forget('luungay');
        }
        $ngayhientai = Carbon::now('Asia/Ho_Chi_Minh')->day;
        $booking = tabdatban::paginate(7);
        $donhang = taborder::all();
        return view('Backend.pagesbooktable.viewbooktable',['ngayhientai'=>$ngayhientai,'booking'=>$booking,'donhang'=>$donhang]);
    }
    
    public function xemdatban($id)
    {
        $booking = tabdatban::find($id);
        $donhang = taborder::where('iddatban','=',$booking->id)->first();
        $chitietdonhang = taborderdetail::where('iddonhang','=',$donhang->id)->get();
        $demchitietdonhang = taborderdetail::where('iddonhang','=',$donhang->id)->count();
        $sanpham = tabmenu::all();
        $phuongthucthanhtoan = tabpayment::where('id','=',$donhang->idpayment)->first();
        return view('Backend.pagesbooktable.viewdetailbooktable',['sanpham'=>$sanpham,'booking'=>$booking,'phuongthucthanhtoan'=>$phuongthucthanhtoan,'donhang'=>$donhang,'chitietdonhang'=>$chitietdonhang,'demchitietdonhang'=>$demchitietdonhang]);
    }
    
    public function xoadatban($id)
    {
        $booking = tabdatban::find($id);
        $booking->delete();
        $user = auth::user();
        if($user->chucvu == 'admin')
        {
            return redirect()->route('booktable');
        }
        else
        {
            return redirect()->route('booktable1');
        }
    }
    
    public function datbantheongay(Request $rq)
    {
        $user = Auth::user();
        $booking = tabdatban::paginate(7);
        $donhang = taborder::all();
        $ngayht = Carbon::now('Asia/Ho_Chi_Minh');
        if($rq->value == "now")
        {
            if(Session::get('luungay'))
            {
                Session::forget('luungay');
            }
            $ngayhientai = date('j-m-Y');
        }
        elseif($rq->value == "left")
        {
            if(Session::get('luungay'))
            {
                $ngay = strtotime ( '-1 day' , strtotime ( Session::get('luungay' ) ) );
                $newdate = date ( 'j-m-Y' , $ngay );
                Session::put('luungay',$newdate);
                $ngayhientai = Session::get('luungay');
            }
            else
            {
                $date = date('j-m-Y');
                $new = strtotime ( '-1 day' , strtotime ( $date ) ) ;
                $newdate = date ( 'j-m-Y' , $new );
                
                Session::put('luungay',$newdate);
                $ngayhientai = Session::get('luungay');
            }
        }
        elseif($rq->value == "right")
        {
            if(Session::get('luungay'))
            {
                $ngay = strtotime ( '+1 day' , strtotime ( Session::get('luungay' ) ) );
                $newdate = date ( 'j-m-Y' , $ngay );
                Session::put('luungay',$newdate);
                $ngayhientai = Session::get('luungay');
            }
            else
            {
                $date = date('j-m-Y');
                $new = strtotime ( '+1 day' , strtotime ( $date ) ) ;
                $newdate = date ( 'j-m-Y' , $new );
                
                Session::put('luungay',$newdate);
                $ngayhientai = Session::get('luungay');
            }
        }
        elseif($rq->value == "all")
        {
            $ngayhientai = 0;
        }
        
        // $output='';
        //     $output.='
        //         <table class="table table-sm table-hover text-nowrap">
        //           <thead>                  
        //             <tr align="center">
        //                 <th>Mã đặt bàn '.$ngayhientai.', '.Session::get('luungay').'</th>
        //                 <th>Tên khách hàng</th>
        //                 <th>Số điện thoại</th>
        //                 <th>Email</th>
        //                 <th>Ngày đến</th>
        //                 <th>Thời gian đến</th>
        //                 <th>Ngày đặt</th>
        //                 <th>Trạng thái</th>';
        //             if($user->chucvu == 'admin' || $user->chucvu == 'staff')
        //             {
        //                 $output.='
        //                     <th>Xem</th>
        //                     <th>Xóa</th>
        //                 </tr>';
        //             }
        //             else
        //             {
        //                 $output.='
        //                     <th>Xem hahahah</th>
        //                 </tr>';
        //             }
        //         $output.='    
        //           </thead>
        //         </table>';
        
        //$ngaytt = $ngayht->setDate($ngayhientai)->toDateTimeString();
            $output='';
            $output.='
                Ngày '.$ngayhientai.'
                <table class="table table-sm table-hover text-nowrap">
                  <thead>                  
                    <tr align="center">
                        <th>Mã đặt bàn</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ngày đến</th>
                        <th>Thời gian đến</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>';
                    if($user->chucvu == 'admin' || $user->chucvu == 'staff')
                    {
                        $output.='
                            <th>Xem</th>
                            <th>Xóa</th>
                        </tr>';
                    }
                    else
                    {
                        $output.='
                            <th>Xem</th>
                        </tr>';
                    }
                $output.='    
                  </thead>
                  <tbody>';
                  foreach($booking as $s)
                  {
                      if(date('j-m-Y',strtotime($s->ngay)) == $ngayhientai)
                      {
                          $output.='
                            <tr align="center">
                            <td>MA'.$s->id.'</td>
                            <td>'.$s->yourname.'</td>
                            <td>'.$s->sdt.'</td>
                            <td>'.$s->email.'</td>
                            <td>'.date('F j, Y',strtotime($s->ngay)).'</td>
                            <td>'.$s->thoigian.'</td>
                            <td>'.date('F j, Y',strtotime($s->created_at)).'</td>';
                            
                            foreach($donhang as $d)
                            {
                                if($d->iddatban == $s->id)
                                {
                                    $output.='
                                    <td>'.$d->trangthaidonhang.'</td>';
                                }
                            }
                            
                            if($user->chucvu == 'admin')
                            {
                                $output.='
                                    <td style="width:85px">
                                        <a href="'.route('xemdatban',$s->id).'">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                        </a>
                                    </td>
                                    
                                    <td style="width:85px">
                                        <a href="'.route('xoadatban',$s->id).'">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                      </a>
                                    </td>
                                    </tr>
                                ';
                            }
                            elseif($user->chucvu == 'staff')
                            {
                                $output.='
                                    <td style="width:85px">
                                        <a href="'.route('xemdatban1',$s->id).'">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                        </a>
                                    </td>
                                
                                    
                                    <td style="width:85px">
                                        <a href="'.route('xoadatban1',$s->id).'">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                        </a>
                                    </td>
                                    </tr>
                                ';
                            }
                            else
                            {
                                foreach($donhang as $d)
                                {
                                    if($d->iddatban == $s->id)
                                    {
                                        $output.='
                                            <td style="width:85px">
                                                <a href="'.route('printproduct2',$d->id).'">
                                                    <button type="button" class="btn btn-success btn-sm">In bill</button>
                                                </a>
                                            </td>
                                            </tr>
                                        ';
                                    }
                                }
                            }
                      }  
                      elseif($ngayhientai == 0)
                      {
                          $output.='
                            <tr align="center">
                            <td>MA'.$s->id.'</td>
                            <td>'.$s->yourname.'</td>
                            <td>'.$s->sdt.'</td>
                            <td>'.$s->email.'</td>
                            <td>'.date('F j, Y',strtotime($s->ngay)).'</td>
                            <td>'.$s->thoigian.'</td>
                            <td>'.date('F j, Y',strtotime($s->created_at)).'</td>';
                            
                            foreach($donhang as $d)
                            {
                                if($d->iddatban == $s->id)
                                {
                                    $output.='
                                    <td>'.$d->trangthaidonhang.'</td>';
                                }
                            }
                            
                            if($user->chucvu == 'admin')
                            {
                                $output.='
                                    <td style="width:85px">
                                        <a href="'.route('xemdatban',$s->id).'">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                        </a>
                                    </td>
                                    
                                    <td style="width:85px">
                                        <a href="'.route('xoadatban',$s->id).'">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                      </a>
                                    </td>
                                    </tr>
                                ';
                            }
                            elseif($user->chucvu == 'staff')
                            {
                                $output.='
                                    <td style="width:85px">
                                        <a href="'.route('xemdatban1',$s->id).'">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                        </a>
                                    </td>
                                
                                    
                                    <td style="width:85px">
                                        <a href="'.route('xoadatban1',$s->id).'">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                        </a>
                                    </td>
                                    </tr>
                                ';
                            }
                            else
                            {
                                foreach($donhang as $d)
                                {
                                    if($d->iddatban == $s->id)
                                    {
                                        $output.='
                                            <td style="width:85px">
                                                <a href="'.route('printproduct2',$d->id).'">
                                                    <button type="button" class="btn btn-success btn-sm">In bill</button>
                                                </a>
                                            </td>
                                            </tr>
                                        ';
                                    }
                                }
                            }
                      }
                  }
                
            $output.='
                  </tbody>
                </table>
                ';
            echo $output;
    }
    
    public function timkiemdatban(Request $rq)
    {
      $datban = tabdatban::where('yourname','like','%'.$rq->value.'%')->get();
      $donhang = taborder::all();
      $user = Auth::user();
      $output='';
      $output.='
                <table class="table table-sm table-hover text-nowrap">
                  <thead>                  
                    <tr align="center">
                        <th>Mã đặt bàn</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ngày đến</th>
                        <th>Thời gian đến</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Xem</th>
                        <th>Xóa</th>
                    </tr>
                  </thead>
                  <tbody>';
                  foreach($datban as $s)
                  {
                      $output.='
                        <tr align="center">
                        <td>MA'.$s->id.'</td>
                        <td>'.$s->yourname.'</td>
                        <td>'.$s->sdt.'</td>
                        <td>'.$s->email.'</td>
                        <td>'.date('F j, Y',strtotime($s->ngay)).'</td>
                        <td>'.$s->thoigian.'</td>
                        <td>'.date('F j, Y',strtotime($s->created_at)).'</td>';
                        
                        foreach($donhang as $d)
                        {
                            if($d->iddatban == $s->id)
                            {
                                $output.='
                                <td>'.$d->trangthaidonhang.'</td>';
                            }
                        }
                        
                        if($user->chucvu == 'admin')
                        {
                            $output.='
                                <td style="width:85px">
                                    <a href="'.route('xemdatban',$s->id).'">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                    </a>
                                </td>
                                
                                <td style="width:85px">
                                    <a href="'.route('xoadatban',$s->id).'">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                  </a>
                                </td>
                            </tr>
                            ';
                        }
                        else
                        {
                            $output.='
                                <td style="width:85px">
                                    <a href="'.route('xemdatban1',$s->id).'">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                    </a>
                                </td>
                                
                                <td style="width:85px">
                                    <a href="'.route('xoadatban1',$s->id).'">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                  </a>
                                </td>
                            </tr>
                            ';
                        }
                  }
                
            $output.='
                  </tbody>
                </table>
                ';
       echo $output;
    }
    
    //----------------------------giao hàng----------------//
    public function danhsachgiaohang()
    {
        $danhsachgiaohang = tabshipping::paginate(7);
        $donhang = taborder::all();
        return view('Backend.pageshipping.viewshipping',['danhsachgiaohang'=>$danhsachgiaohang,'donhang'=>$donhang]);
    }
    
    public function xemgiaohang($id)
    {
        $giaohang = tabshipping::find($id);
        $donhang = taborder::where('idshipping','=',$giaohang->id)->first();
        $chitietdonhang = taborderdetail::where('iddonhang','=',$donhang->id)->get();
        $sanpham = tabmenu::all();
        $phuongthucthanhtoan = tabpayment::where('id','=',$donhang->idpayment)->first();
        return view('Backend.pageshipping.viewdetailshipping',['sanpham'=>$sanpham,'giaohang'=>$giaohang,'phuongthucthanhtoan'=>$phuongthucthanhtoan,'donhang'=>$donhang,'chitietdonhang'=>$chitietdonhang]);
    }
    
    public function xoagiaohang($id)
    {
        $giaohang = tabshipping::find($id);
        $giaohang->delete();
        $user = auth::user();
        if($user->chucvu == 'admin')
        {
            return redirect()->route('danhsachgiaohang');
        }
        else
        {
            return redirect()->route('danhsachgiaohang1');
        }
    }
    
    public function timkiemgiaohang(Request $rq)
    {
      $giaohang = tabshipping::where('lastname','like','%'.$rq->value.'%')->get();
      $donhang = taborder::all();
      $user = Auth::user();
      $output='';
      $output.='
                <table class="table table-sm table-hover text-nowrap">
                  <thead>                  
                    <tr align="center">
                        <th>Mã giao hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Xem</th>
                        <th>Xóa</th>
                    </tr>
                  </thead>
                  <tbody>';
                  foreach($giaohang as $s)
                  {
                      $output.='
                        <tr align="center">
                        <td>MA'.$s->id.'</td>';
                        if($s->fullname)
                        {
                            $output.='
                                <td>'.$s->fullname.'</td>';
                        }
                        else
                        {
                            $output.='
                                <td>'.$s->firstname.' '.$s->lastname.'</td>';
                        }
                        
                        $output.='
                        <td>'.$s->dienthoai.'</td>
                        <td>'.$s->diachiship.'</td>
                        <td>'.date('F j, Y',strtotime($s->created_at)).'</td>';
                        foreach($donhang as $d)
                        {
                            if($d->idshipping == $s->id)
                            {
                                $output.='
                                <td>'.$d->trangthaidonhang.'</td>';
                            }
                        }
                        
                        if($user->chucvu == 'admin')
                        {
                            $output.='
                                <td style="width:85px">
                                    <a href="'.route('xemgiaohang',$s->id).'">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                    </a>
                                </td>
                                
                                <td style="width:85px">
                                    <a href="'.route('xoagiaohang',$s->id).'">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                  </a>
                                </td>
                            ';
                        }
                        else
                        {
                            $output.='
                                <td style="width:85px">
                                    <a href="'.route('xemgiaohang1',$s->id).'">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                    </a>
                                </td>
                            </tr>
                                
                                <td style="width:85px">
                                    <a href="'.route('xoagiaohang1',$s->id).'">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                  </a>
                                </td>
                            </tr>
                            ';
                        }
                  }
                
            $output.='
                  </tbody>
                </table>
                ';
       echo $output;
    }
    
    //----------------------------Đơn đặt hàng----------------//
    public function quanlyhoadon()
    {
        $hoadon = taborder::latest()->paginate(7);
        $chitiethoadon = taborderdetail::all();
        $giaohang = tabshipping::all();
        $datban = tabdatban::all();
        return view('Backend.pagesorder.tableorder',['datban'=>$datban,'hoadon'=>$hoadon,'chitiethoadon'=>$chitiethoadon,'giaohang'=>$giaohang]);
    }
    
    public function laphoadon()
    {
        $sanpham = tabmenu::all();
        return view('Backend.pagesorder.createorder',['sanpham'=>$sanpham]);
    }
    
    // public function postlaphoadon(request $rq)
    // {
    //     return view('Backend.pagesorder.createorder',['sanpham'=>$sanpham]);
    // }
    
    public function shipdonhang()
    {
        return view('Backend.pagesorder.createordership');
    }
    
    // public function postshipdonhang(request $rq)
    // {
    //     return view('Backend.pagesorder.createordership');
    // }
    
    public function deletesanphambanchay()
    {
        $xoasanphambanchay = tabsanphambanchay::all();
        $xoasanphambanchay->delete();
        return redirect()->back();
    }
    
    public function quanlydoanhthu()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang = tabduyethoadon::all()->count();
        $khachhang=DB::table('tabdangkis')
                    ->whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=',NULL);
                     
                                })
                    ->get()->count();
        $tongtien = tabduyethoadon::all();
        $hoadon = taborder::latest()->get();
        $sanphamhomnay = tabproductordertoday::distinct('tensanpham')->get();
        $sanphambanchay = tabsanphambanchay::paginate(5);
        $chitiethoadon = taborderdetail::all();
        $sanpham = tabmenu::all();
        return view('Backend.pagesorder.viewrevenue',['sanpham'=>$sanpham,'sanphambanchay'=>$sanphambanchay,'chitiethoadon'=>$chitiethoadon,'hoadon'=>$hoadon,'donhang'=>$donhang,'khachhang'=>$khachhang,'tongtien'=>$tongtien]);
    }
    
    public function chitiethoadon($id)
    {
        $hoadon = taborder::find($id);
        $chitiethoadon = taborderdetail::all();
        $giaohang = tabshipping::all();
        $sanpham = tabmenu::all();
        $datban = tabdatban::all();
        $payment = DB::table('tabpayments')
                    ->whereIn('id',function ($query) use($id) {
                                    $query->select('idpayment')->from('tabdonhangs')
                                    ->Where('id','=',$id);
                     
                                })
                    ->first();
        return view('Backend.pagesorder.viewdetailorder',['datban'=>$datban,'hoadon'=>$hoadon,'chitiethoadon'=>$chitiethoadon,'giaohang'=>$giaohang,'sanpham'=>$sanpham,'payment'=>$payment]);
    }
    
    public function chucnangxoahoadon($id)
    {
        $xoa3 = tabpayment::whereIn('id',function ($query) use($id) {
                                    $query->select('idpayment')->from('tabdonhangs')
                                    ->Where('id','=',$id);
                     
                                })
                    ->first();
        $xoa3->delete();
        
        $xoa4 = tabshipping::whereIn('id',function ($query) use($id) {
                                    $query->select('idshipping')->from('tabdonhangs')
                                    ->Where('id','=',$id);
                     
                                })
                    ->first();
        $xoa4->delete();
        
		$xoa1 = taborder::find($id);
        $xoa1->delete();
        
        $xoa2 = taborderdetail::where('iddonhang','=',$id)->get();
        foreach( $xoa2 as $x2)
        {
                $x2->delete();
        }
        
        return redirect()->back();
    }
    
    public function sanphamdamua(Request $rq)
    {
        $sanphamtrongngay = tabproductordertoday::all();
        $output = '';
        $output.='<div class="alert alert-info">
        <strong>Mã hóa đơn:</strong> HD_'.$rq->id.'</br>
        ';
        
        foreach($sanphamtrongngay as $s)
        {
            if($s->mahd == $rq->id)
            {
                $output.='
                        '.$s->tensanpham.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Số lượng</strong>&nbsp;&nbsp;&nbsp;&nbsp;'.$s->soluong.'.</br>
                ';
            }
        }
        $output.='</div>';
        
        echo $output;
    }
    
    public function duyethoadon()
    {
        $duyethoadon = tabduyethoadon::all();
        return view('Backend.pagesorder.tableduyetorder',['duyethoadon'=>$duyethoadon]);
    }
    
    public function postduyethoadon($id)
    {
        $hoadon = taborder::find($id);
        $giaohang = tabshipping::where('id','=',$hoadon->idshipping)->first();
        $datban = tabdatban::where('id','=',$hoadon->iddatban)->first();
        $chitiethoadon = taborderdetail::where('iddonhang','=',$hoadon->id)->get();
        $demchitietdonhang = taborderdetail::where('iddonhang','=',$hoadon->id)->count();
        if($giaohang)
        {
            $taikhoan = tabdangnhap::where('id','=',$giaohang->idkhachhang)->first();
        }
        else
        {
            $taikhoan = tabdangnhap::where('id','=',$datban->idkhachhang)->first();
        }
        
        
        //dd($sanphambanchay);
        if($giaohang)
        {
            if($hoadon->trangthaidonhang == "Hủy đơn hàng")
            {
                $tabduyethoadon = new tabduyethoadon;
        		$tabduyethoadon->mahd = $hoadon->id;
        		$tabduyethoadon->makh = $hoadon->idkhachhang;
        		$tabduyethoadon->firstname = $giaohang->firstname;
        		$tabduyethoadon->lastname = $giaohang->lastname;
        		$tabduyethoadon->tongtien = 0;
        		$tabduyethoadon->tonghoadon = $hoadon->tongdonhang;
        		$tabduyethoadon->ngayxuathoadon = $hoadon->created_at;
        		$tabduyethoadon->trangthai = "Đơn hàng không thành công";
        		$tabduyethoadon->save();    
        		
        		foreach($chitiethoadon as $c)
        		{
        		    $tabproductordertoday = new tabproductordertoday;
            		$tabproductordertoday->mahd = $c->iddonhang;
            		$tabproductordertoday->masanpham = $c->idsanpham;
            		$tabproductordertoday->tensanpham = $c->tensanpham;
            		$tabproductordertoday->soluong = $c->soluong;
            		$tabproductordertoday->save();
        		}
        		
        		$xoa3 = tabpayment::whereIn('id',function ($query) use($id) {
                                            $query->select('idpayment')->from('tabdonhangs')
                                            ->Where('id','=',$id);
                             
                                        })
                            ->first();
                $xoa3->delete();
                
                $xoa4 = tabshipping::whereIn('id',function ($query) use($id) {
                                            $query->select('idshipping')->from('tabdonhangs')
                                            ->Where('id','=',$id);
                             
                                        })
                            ->first();
                $xoa4->delete();
                
        		$xoa1 = taborder::find($id);
                $xoa1->delete();
                
                $xoa2 = taborderdetail::where('iddonhang','=',$id)->get();
                foreach( $xoa2 as $x2)
                {
                        $x2->delete();
                }
                $user = auth::user();
        		if($user->chucvu =='admin')
        		{
        		    return redirect()->route('quanlyhoadon');
        		}
        		else
        		{
        		    return redirect()->route('quanlyhoadon1');
        		}
        		
            }
            else
            {
                $tabduyethoadon = new tabduyethoadon;
        		$tabduyethoadon->mahd = $hoadon->id;
        		$tabduyethoadon->makh = $hoadon->idkhachhang;
        		$tabduyethoadon->firstname = $giaohang->firstname;
        		$tabduyethoadon->lastname = $giaohang->lastname;
        		$tabduyethoadon->tongtien = $hoadon->tongdonhang;
        		$tabduyethoadon->tonghoadon = $hoadon->tongdonhang;
        		$tabduyethoadon->ngayxuathoadon = $hoadon->created_at;
        		$tabduyethoadon->trangthai = "Đơn hàng thành công";
        		$tabduyethoadon->save();
        		
        		if($taikhoan)
        		{
        		    $taikhoan->diemthuong = $taikhoan->diemthuong+5;
        		    $taikhoan->save();
        		}
        		else
        		{
        		    
        		    $tabkhachhangtiemnang = new tabkhachhangtiemnang;
            		$tabkhachhangtiemnang->firstname = $giaohang->firstname;
            		$tabkhachhangtiemnang->lastname = $giaohang->lastname;
            		$tabkhachhangtiemnang->diachi = $giaohang->diachi;
            		$tabkhachhangtiemnang->thanhpho = $giaohang->thanhpho;
            		$tabkhachhangtiemnang->congty = $giaohang->congty;
            		$tabkhachhangtiemnang->dienthoai = $giaohang->dienthoai;
            		$tabkhachhangtiemnang->email = $giaohang->email;
        		    $tabkhachhangtiemnang->idkhachhang = $giaohang->idkhachhang;
        		    $tabkhachhangtiemnang->save();
        		}
        		
        		foreach($chitiethoadon as $c)
        		{
        		    $sanphambanchay = tabsanphambanchay::where('masanpham','=',$c->idsanpham)->first();
                    if($sanphambanchay)
                    {
                        $sanphambanchay->soluong = $c->soluong + $sanphambanchay->soluong;
            		    $sanphambanchay->save();
                    }
                    else
                    {
                        $tabsanphambanchay = new tabsanphambanchay;
                        $tabsanphambanchay->masanpham = $c->idsanpham;
                        $tabsanphambanchay->tensanpham = $c->tensanpham;
                        $tabsanphambanchay->soluong = $c->soluong;
                        $tabsanphambanchay->save();
                    }
        		        
        		}
        		    
        		
        		foreach($chitiethoadon as $c)
        		{
        		    $tabproductordertoday = new tabproductordertoday;
            		$tabproductordertoday->mahd = $c->iddonhang;
            		$tabproductordertoday->masanpham = $c->idsanpham;
            		$tabproductordertoday->tensanpham = $c->tensanpham;
            		$tabproductordertoday->soluong = $c->soluong;
            		$tabproductordertoday->save();
        		}
        		
        		$xoa3 = tabpayment::whereIn('id',function ($query) use($id) {
                                            $query->select('idpayment')->from('tabdonhangs')
                                            ->Where('id','=',$id);
                             
                                        })
                            ->first();
                $xoa3->delete();
                
                $xoa4 = tabshipping::whereIn('id',function ($query) use($id) {
                                            $query->select('idshipping')->from('tabdonhangs')
                                            ->Where('id','=',$id);
                             
                                        })
                            ->first();
                $xoa4->delete();
                
        		$xoa1 = taborder::find($id);
                $xoa1->delete();
                
                $xoa2 = taborderdetail::where('iddonhang','=',$id)->get();
                foreach( $xoa2 as $x2)
                {
                        $x2->delete();
                }
                $user = auth::user();
        		if($user->chucvu =='admin')
        		{
        		    return redirect()->route('quanlyhoadon');
        		}
        		else
        		{
        		    return redirect()->route('quanlyhoadon1');
        		}
            }
        }
        else
        {
            if($demchitietdonhang >=1)
        	{
                $giacacsanpham = 0;
                foreach($chitiethoadon as $c)
                {
                    $giacacsanpham = $giacacsanpham + $c->soluong*$c->gia;
                }
                $tiendu = $hoadon->tongdonhang - $giacacsanpham;
                if($tiendu == 0)
                {
                    $giadatcocsanphamsaukhigiam = $hoadon->tongdonhang/2;
                }
                elseif($tiendu < 50000)
                {
                    $tiengiamgia = 50000 - $tiendu;
                    $giadatcocsanphamsaukhigiam = ($giacacsanpham - $tiengiamgia)/2;
                }
                elseif($tiendu == 50000)
                {
                    $giadatcocsanphamsaukhigiam = $giacacsanpham/2;
                }
                elseif($tiendu > 50000)
                {
                    $giadatcocsanphamsaukhigiam = $hoadon->tongdonhang/2;
                }
        	}
        	
            if($hoadon->trangthaidonhang == "Hủy đơn hàng")
            {
                if($hoadon->hoantratien == "Hoàn trả 50% số tiền cọc")
                {
                    $tabduyethoadon = new tabduyethoadon;
            		$tabduyethoadon->mahd = $hoadon->id;
            		$tabduyethoadon->makh = $hoadon->idkhachhang;
            		$tabduyethoadon->fullname = $datban->yourname;
            		if($demchitietdonhang >=1)
            		{
            		    $tabduyethoadon->tongtien = $giadatcocsanphamsaukhigiam/2;
            		}
            		else
            		{
            		    $tabduyethoadon->tongtien = $hoadon->tongdonhang/2;
            		}
            		if($demchitietdonhang >=1)
            		{
            		    if($tiendu<=50000 && $tiendu>0)
            		    {
            		        $tabduyethoadon->tonghoadon = ($hoadon->tongdonhang - 50000);
            		    }
            		    else
            		    {
            		        $tabduyethoadon->tonghoadon = $hoadon->tongdonhang;
            		    }
            		}
            		else
            		{
            		    $tabduyethoadon->tonghoadon = $hoadon->tongdonhang;
            		}
            		$tabduyethoadon->ngayxuathoadon = $hoadon->created_at;
            		$tabduyethoadon->trangthai = "Đơn hàng không thành công";
            		$tabduyethoadon->save();
                }
                elseif($hoadon->hoantratien == "Hoàn trả 100% số tiền cọc")
                {
                    $tabduyethoadon = new tabduyethoadon;
            		$tabduyethoadon->mahd = $hoadon->id;
            		$tabduyethoadon->makh = $hoadon->idkhachhang;
            		$tabduyethoadon->fullname = $datban->yourname;
            		if($demchitietdonhang >=1)
            		{
            		    $tabduyethoadon->tongtien = 0;
            		}
            		else
            		{
            		    $tabduyethoadon->tongtien = 0;
            		}
            		if($demchitietdonhang >=1)
            		{
            		    if($tiendu<=50000 && $tiendu>0)
            		    {
            		        $tabduyethoadon->tonghoadon = ($hoadon->tongdonhang - 50000);
            		    }
            		    else
            		    {
            		        $tabduyethoadon->tonghoadon = $hoadon->tongdonhang;
            		    }
            		}
            		else
            		{
            		    $tabduyethoadon->tonghoadon = $hoadon->tongdonhang;
            		}
            		$tabduyethoadon->ngayxuathoadon = $hoadon->created_at;
            		$tabduyethoadon->trangthai = "Đơn hàng không thành công";
            		$tabduyethoadon->save();
                }
                
                    if($demchitietdonhang >=1)
            		{
                		foreach($chitiethoadon as $c)
                		{
                		    $tabproductordertoday = new tabproductordertoday;
                    		$tabproductordertoday->mahd = $c->iddonhang;
                    		$tabproductordertoday->masanpham = $c->idsanpham;
                    		$tabproductordertoday->tensanpham = $c->tensanpham;
                    		$tabproductordertoday->soluong = $c->soluong;
                    		$tabproductordertoday->save();
                		}
            		}
            		
            		$xoa3 = tabpayment::whereIn('id',function ($query) use($id) {
                                            $query->select('idpayment')->from('tabdonhangs')
                                            ->Where('id','=',$id);
                             
                                        })
                            ->first();
                    $xoa3->delete();
                    $xoa4 = tabdatban::whereIn('id',function ($query) use($id) {
                                                $query->select('iddatban')->from('tabdonhangs')
                                                ->Where('id','=',$id);
                                 
                                            })
                                ->first();
                    $xoa4->delete();
                    
                    
            		$xoa1 = taborder::find($id);
                    $xoa1->delete();
                    
                    if($demchitietdonhang >=1)
            		{
                        $xoa2 = taborderdetail::where('iddonhang','=',$id)->get();
                        foreach( $xoa2 as $x2)
                        {
                                $x2->delete();
                        }
            		}
                    
            		$user = auth::user();
            		if($user->chucvu =='admin')
            		{
            		    return redirect()->route('quanlyhoadon');
            		}
            		else
            		{
            		    return redirect()->route('quanlyhoadon1');
            		}
            }
            else
            {
                $tabduyethoadon = new tabduyethoadon;
        		$tabduyethoadon->mahd = $hoadon->id;
        		$tabduyethoadon->makh = $hoadon->idkhachhang;
        		$tabduyethoadon->fullname = $datban->yourname;
        		if($demchitietdonhang >=1)
        		{
        		    if($tiendu<=50000 && $tiendu>0)
        		    {
        		        $tabduyethoadon->tongtien = ($hoadon->tongdonhang - 50000);
        		        $tabduyethoadon->tonghoadon = ($hoadon->tongdonhang - 50000);
        		    }
        		    else
        		    {
        		        $tabduyethoadon->tongtien = $hoadon->tongdonhang;
        		        $tabduyethoadon->tonghoadon = $hoadon->tongdonhang;
        		    }
        		}
        		else
        		{
        		    $tabduyethoadon->tongtien = $hoadon->tongdonhang;
        		    $tabduyethoadon->tonghoadon = $hoadon->tongdonhang;
        		}
        		
        		$tabduyethoadon->ngayxuathoadon = $hoadon->created_at;
        		$tabduyethoadon->trangthai = "Đơn hàng thành công";
        		$tabduyethoadon->save();
        		
        		if($taikhoan)
        		{
        		    $taikhoan->diemthuong = $taikhoan->diemthuong+5;
        		    $taikhoan->save();
        		}
        		else
        		{
        		    
        		    $tabkhachhangtiemnang = new tabkhachhangtiemnang;
            		$tabkhachhangtiemnang->fullname = $datban->yourname;
            		$tabkhachhangtiemnang->dienthoai = $datban->sdt;
            		$tabkhachhangtiemnang->email = $datban->email;
        		    $tabkhachhangtiemnang->idkhachhang = $datban->idkhachhang;
        		    $tabkhachhangtiemnang->save();
        		}
        		if($demchitietdonhang >=1)
        		{
        		    foreach($chitiethoadon as $c)
            		{
            		    $sanphambanchay = tabsanphambanchay::where('masanpham','=',$c->idsanpham)->first();
                        if($sanphambanchay)
                        {
                            $sanphambanchay->soluong = $c->soluong + $sanphambanchay->soluong;
                		    $sanphambanchay->save();
                        }
                        else
                        {
                            $tabsanphambanchay = new tabsanphambanchay;
                            $tabsanphambanchay->masanpham = $c->idsanpham;
                            $tabsanphambanchay->tensanpham = $c->tensanpham;
                            $tabsanphambanchay->soluong = $c->soluong;
                            $tabsanphambanchay->save();
                        }
            		        
            		}
            		
            		foreach($chitiethoadon as $c)
            		{
            		    $tabproductordertoday = new tabproductordertoday;
                		$tabproductordertoday->mahd = $c->iddonhang;
                		$tabproductordertoday->masanpham = $c->idsanpham;
                		$tabproductordertoday->tensanpham = $c->tensanpham;
                		$tabproductordertoday->soluong = $c->soluong;
                		$tabproductordertoday->save();
            		}
            		
        		}
        		
        		$xoa3 = tabpayment::whereIn('id',function ($query) use($id) {
                                            $query->select('idpayment')->from('tabdonhangs')
                                            ->Where('id','=',$id);
                             
                                        })
                            ->first();
                $xoa3->delete();
                $xoa4 = tabdatban::whereIn('id',function ($query) use($id) {
                                            $query->select('iddatban')->from('tabdonhangs')
                                            ->Where('id','=',$id);
                             
                                        })
                            ->first();
                $xoa4->delete();
                
                
        		$xoa1 = taborder::find($id);
                $xoa1->delete();
                
                if($demchitietdonhang >=1)
        		{
                    $xoa2 = taborderdetail::where('iddonhang','=',$id)->get();
                    foreach( $xoa2 as $x2)
                    {
                            $x2->delete();
                    }
        		}
                
        		$user = auth::user();
        		if($user->chucvu =='admin')
        		{
        		    return redirect()->route('quanlyhoadon');
        		}
        		else
        		{
        		    return redirect()->route('quanlyhoadon1');
        		}
            }
        }
        
    }
    
    public function xoaduyethoadon($id)
    {
        $xoa1 = tabduyethoadon::find($id);
        $xoa2 = tabproductordertoday::where('mahd','=',$xoa1->mahd)->get();
        foreach( $xoa2 as $x)
        {
                $x->delete();
        }
        $xoa1->delete();
        
        
		return redirect()->route('duyethoadon');
    }
    
    public function xoatatcaduyethoadon()
    {
        $xoa = tabduyethoadon::all();
        foreach( $xoa as $x)
        {
                $x->delete();
        }
        
        $xoa1 = tabproductordertoday::all();
        foreach( $xoa1 as $x1)
        {
                $x1->delete();
        }
        
		return redirect()->route('duyethoadon');
    }
    
    public function themmagiamgia()
    {
        return view('Backend.pagesorder.formaddcodediscount');
    }
    
    public function postthemmagiamgia(Request $rq)
    {
        $tabmakhuyenmai = new tabmakhuyenmai;
		$tabmakhuyenmai->tenma = $rq->tenma;
		$tabmakhuyenmai->magiam = $rq->magiam;
		$tabmakhuyenmai->soluong = $rq->soluongma;
		$tabmakhuyenmai->tinhnangma = $rq->tinhnangma;
		$tabmakhuyenmai->phantramgiam = $rq->giatrigiam;
		$tabmakhuyenmai->save();
		return redirect()->route('capnhatmakhuyenmai');
    }
    
    public function capnhatmakhuyenmai()
    {
        $makhuyenmai = tabmakhuyenmai::paginate(7);
        return view('Backend.pagesorder.viewcodediscount',['makhuyenmai'=>$makhuyenmai]);
    }
    
    public function chucnangcapnhatmakhuyenmai($id)
    {
        $capnhatmakhuyenmai = tabmakhuyenmai::find($id);
        return view('Backend.pagesorder.formupdatecodediscount',['capnhatmakhuyenmai'=>$capnhatmakhuyenmai]);
    }
    
    public function chucnangcapnhatmakhuyenmaipost(Request $rq,$id)
    {
        $capnhat1 = tabmakhuyenmai::find($id);
		$capnhat1->tenma = $rq->tenma;
		$capnhat1->magiam = $rq->magiam;
		$capnhat1->soluong = $rq->soluongma;
		$capnhat1->tinhnangma = $rq->tinhnangma;
		$capnhat1->phantramgiam = $rq->giatrigiam;
		$capnhat1->save();
		Alert::success('Đã cập nhật', 'Thành công')->persistent(false,true)->autoClose(4000);
		return redirect()->route('capnhatmakhuyenmai');
    }
    
    public function chucnangxoamakhuyenmai($id)
    {
        $xoa = tabmakhuyenmai::find($id);
        $xoa->delete();
		return redirect()->route('capnhatmakhuyenmai');
    }
    
    public function printorder($checkoutcode)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkoutcode));
        return $pdf->stream();
    }
    
    public function print_order_convert($checkoutcode)
    {
        //return $checkoutcode;
        $hoadon = taborder::find($checkoutcode);
        $chitiethoadon = taborderdetail::all();
        $shipping = $hoadon->idshipping;
        $booktable = $hoadon->iddatban;
        $datban = tabdatban::where('id','=',$booktable)->first();
        $giaohang = tabshipping::where('id','=',$shipping)->first();
        $sanpham = tabmenu::all();
        $payment = DB::table('tabpayments')
                    ->whereIn('id',function ($query) use($checkoutcode) {
                                    $query->select('idpayment')->from('tabdonhangs')
                                    ->Where('id','=',$checkoutcode);
                     
                                })
                    ->first();
                    
        $output = '';
        if($giaohang)
        {
            $output.='
            <style>
                body{
                    font-family: DejaVu Sans;
                    padding-top: 10px;
                    padding-right: 10px;
                    padding-bottom: 50px;
                    padding-left: 10px;
                    font-size:13px;
                }
                .border{
                    border: 1px solid #000;
                }
                .border2{
                    border: 1px solid #000;
                }
                p{
                    line-height:2px;
                }
            </style>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:70%;"></td>
                        <td align="left">
                           <p>Mẫu số: 0365DAD24</p>
                           <p>Kí hiệu: 0365DAD24</p>
                           <p>Số: <b>000212</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <p><h2>HÓA ĐƠN THANH TOÁN GIAO HÀNG</h2><p></br>
                            <p>Công ty TNHH 1998 Coffee</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:25%;">Đơn vị bán hàng:</td>
                        <td>1998 Coffee Company</td>
                    </tr>
                    <tr>
                        <td style="width:25%;">Mã số thuế:</td>
                        <td>03115421512585</td>
                    </tr>
                    <tr>
                        <td style="width:25%;">Địa chỉ:</td>
                        <td>12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Thành Phố Hồ Chí Minh</td>
                    </tr>
                    <tr>
                        <td style="width:25%;">Số điện thoại:</td>
                        <td>18000909</td>
                    </tr>
                    <tr>
                        <td><label>Địa chỉ giao hàng:</label></td>
                        <td>'.$giaohang->diachiship.'</td>
                    </tr>
                                
                    <tr>
                        <td><label>Tên người mua hàng:</label></td>
                        <td>'.$giaohang->firstname.' '.$giaohang->lastname.'</td>
                    </tr>
                    <tr>
                        <td><label>Email:</label></td>
                        <td>'.$giaohang->email.'</td>
                    </tr>
                    <tr>
                        <td><label>Địa chỉ:</label></td>
                        <td>'.$giaohang->diachi.'</td>
                    </tr>
                    <tr>
                        <td><label>Số điện thoại:</label></td>
                        <td>'.$giaohang->dienthoai.'</td>
                    </tr>
                    <tr>
                        <td><label>Địa chỉ giao hàng:</label></td>
                        <td>'.$giaohang->diachiship.'</td>
                    </tr>
                    ';
                    if($payment->phuongthuc == "Payment after arrival of goods")
                    {
                        $output.='
                            <tr>
                                <td><label>Hình thức thanh toán:</label></td>
                                <td>Thanh toán khi nhận hàng.</td>
                            </tr>
                            ';
                    }
                    else
                    {
                        $output.='
                            <tr>
                                <td><label>Hình thức thanh toán:</label></td>
                                <td>'.$payment->phuongthuc.'</td>
                            </tr>
                            ';
                    }
                    
                    if($hoadon->trangthaidonhang == "Hủy đơn hàng")
                    {
                        $output.='
                            <tr>
                                <td><label>Trạng thái:</label></td>
                                <td>Hủy đơn hàng.</td>
                            </tr>
                            ';
                    }
                    
                $output.='
                </tbody>
            </table>';
            $output.='
            <h3>Đơn hàng sản phẩm</h3>
            <table style="width:100%;" class="border">
                <thead>
                    <tr align="center">
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>';
                
                foreach($chitiethoadon as $c)
                {
                    if($c->iddonhang == $hoadon->id)
                    {
                        $output.=' 
                        <tr align="center">
                            <td>'.$c->idsanpham.'</td>
                            <td>'.$c->tensanpham.'</td>
                            <td>'.$c->soluong.'</td>
                            <td>'.$c->gia.'</td>
                            <td>'.number_format($c->gia*$c->soluong).' VND</td>';
                    }
                }
            $output.='
                    </tr>
                </tbody>
            </table>';
            $output.='
            <table style="width:50%;" class="border">
                <tbody>';
                        $output.=' 
                            <tr align="center">
                                <td>Tổng hóa đơn</td>
                                <td>'.$hoadon->tongdonhang.' VND</td>
                            </tr>
                        ';
            $output.='
                </tbody>
            </table>';
            
            $output.='
            <table style="width:100%; margin-top:120px;">
                <thead>
                    <tr align="center">
                        <th>Người lập phiếu</th>
                        <th>Người nhận</th>
                    </tr>
                </thead>
            </table>';
        }
        else
        {
            $output.='
            <style>
                body{
                    font-family: DejaVu Sans;
                    padding-top: 10px;
                    padding-right: 10px;
                    padding-bottom: 50px;
                    padding-left: 10px;
                    font-size:13px;
                }
                .border{
                    border: 1px solid #000;
                }
                .border2{
                    border: 1px solid #000;
                }
                p{
                    line-height:2px;
                }
            </style>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:70%;"></td>
                        <td align="left">
                           <p>Mẫu số: 0365DAD24</p>
                           <p>Kí hiệu: 0365DAD24</p>
                           <p>Số: <b>000212</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <p><h2>HÓA ĐƠN THANH TOÁN ĐẶT BÀN</h2><p></br>
                            <p>Công ty TNHH 1998 Coffee</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:25%;">Đơn vị bán hàng:</td>
                        <td>1998 Coffee Company</td>
                    </tr>
                    <tr>
                        <td style="width:25%;">Mã số thuế:</td>
                        <td>03115421512585</td>
                    </tr>
                    <tr>
                        <td style="width:25%;">Địa chỉ:</td>
                        <td>12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Thành Phố Hồ Chí Minh</td>
                    </tr>
                    <tr>
                        <td style="width:25%;">Số điện thoại:</td>
                        <td>18000909</td>
                    </tr>     
                    <tr>
                        <td><label>Tên người mua hàng:</label></td>
                        <td>'.$datban->yourname.'</td>
                    </tr>
                    <tr>
                        <td><label>Email:</label></td>
                        <td>'.$datban->email.'</td>
                    </tr>
                    <tr>
                        <td><label>Số điện thoại:</label></td>
                        <td>'.$datban->sdt.'</td>
                    </tr>
                    <tr>
                        <td><label>Hình thức thanh toán:</label></td>
                        <td>'.$payment->phuongthuc.'</td>
                    </tr>';
                    if($hoadon->trangthaidonhang == "Hủy đơn hàng")
                    {
                        $output.='
                            <tr>
                                <td><label>Trạng thái:</label></td>
                                <td>Hủy đơn hàng.</td>
                            </tr>
                            ';
                    }
                    
                $output.='
                </tbody>
            </table>';
            $output.='
            <h3>Đơn hàng sản phẩm</h3>
            <table style="width:100%;" class="border">
                <thead>
                    <tr align="center">
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>';
                
                foreach($chitiethoadon as $c)
                {
                    if($c->iddonhang == $hoadon->id)
                    {
                        $output.=' 
                        <tr align="center">
                            <td>'.$c->idsanpham.'</td>
                            <td>'.$c->tensanpham.'</td>
                            <td>'.$c->soluong.'</td>
                            <td>'.$c->gia.'</td>
                            <td>'.number_format($c->gia*$c->soluong).' VND</td>
                        </tr>
                        ';
                    }
                }
            $output.='
                </tbody>
            </table>';
            
            $output.='
            <table style="width:50%;" class="border">
                <tbody>';
                            $giacacsanpham = 0;
                            foreach($chitiethoadon as $c)
                            {
                                if($c->iddonhang == $hoadon->id)
                                {
                                    $giacacsanpham = $giacacsanpham + $c->soluong*$c->gia;
                                }
                            }
                            $tiendu = $hoadon->tongdonhang - $giacacsanpham;
                            if($tiendu == 0)
                            {
                                $giadatcocsanphamsaukhigiam = $hoadon->tongdonhang/2;
                            }
                            elseif($tiendu < 50000)
                            {
                                $tiengiamgia = 50000 - $tiendu;
                                $giadatcocsanphamsaukhigiam = ($giacacsanpham - $tiengiamgia)/2;
                            }
                            elseif($tiendu == 50000)
                            {
                                $giadatcocsanphamsaukhigiam = $giacacsanpham/2;
                            }
                            elseif($tiendu > 50000)
                            {
                                $giadatcocsanphamsaukhigiam = $hoadon->tongdonhang/2;
                            }
                            
                    if($tiendu<=50000 && $tiendu>0)
                    {
                        $output.=' 
                            <tr align="center">
                                <td>Tổng hóa đơn</td>
                                <td>'.($hoadon->tongdonhang-50000).' VND</td>
                            </tr>
                        ';
                    }
                    else
                    {
                        $output.=' 
                            <tr align="center">
                                <td>Tổng hóa đơn</td>
                                <td>'.$hoadon->tongdonhang.' VND</td>
                            </tr>
                        ';
                    }
            $output.='
                </tbody>
            </table>';
            
            $output.='
            <table style="width:100%; margin-top:120px;">
                <thead>
                    <tr align="center">
                        <th>Người lập phiếu</th>
                        <th>Người nhận</th>
                    </tr>
                </thead>
            </table>';
        }
        
              
        return $output;
    }
    
    public function printproduct($checkoutcode1)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert1($checkoutcode1));
        return $pdf->stream();
    }
    
    public function print_order_convert1($checkoutcode1)
    {
        //return $checkoutcode;
        $hoadon = taborder::find($checkoutcode1);
        $chitiethoadon = taborderdetail::all();
        $shipping = $hoadon->idshipping;
        $booktable = $hoadon->iddatban;
        $datban = tabdatban::where('idkhachhang','=',$booktable)->first();
        $giaohang = tabshipping::where('id','=',$shipping)->first();
        $sanpham = tabmenu::all();
        $payment = DB::table('tabpayments')
                    ->whereIn('id',function ($query) use($checkoutcode1) {
                                    $query->select('idpayment')->from('tabdonhangs')
                                    ->Where('id','=',$checkoutcode1);
                     
                                })
                    ->first();
                    
        $output = '';
        if($giaohang)
        {
            $output.='
            <style>
                body{
                    font-family: DejaVu Sans;
                    padding-top: 10px;
                    padding-right: 10px;
                    padding-bottom: 50px;
                    padding-left: 10px;
                    font-size:13px;
                }
                .border{
                    border: 1px solid #000;
                }
                .border2{
                    border: 1px solid #000;
                }
                p{
                    line-height:2px;
                }
            </style>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:70%;"></td>
                        <td align="left">
                           <p>Mẫu số: 0365DAD24</p>
                           <p>Kí hiệu: 0365DAD24</p>
                           <p>Số: <b>000212</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <p><h2>HÓA ĐƠN THANH TOÁN GIAO HÀNG</h2><p></br>
                            <p>Công ty TNHH 1998 Coffee</p>
                        </td>
                    </tr>
                </tbody>
            </table>';
            
            $output.='
            <h3>Đơn hàng sản phẩm</h3>
            <table style="width:100%;" class="border">
                <thead>
                    <tr align="center">
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>';
                
                foreach($chitiethoadon as $c)
                {
                    if($c->iddonhang == $hoadon->id)
                    {
                        $output.=' 
                        <tr align="center">
                            <td>'.$c->idsanpham.'</td>
                            <td>'.$c->tensanpham.'</td>
                            <td>'.$c->soluong.'</td>
                            <td>'.$c->gia.'</td>';
                    }
                }
            $output.='
                    </tr>
                </tbody>
            </table>';
        }
        else
        {
            $output.='
            <style>
                body{
                    font-family: DejaVu Sans;
                    padding-top: 10px;
                    padding-right: 10px;
                    padding-bottom: 50px;
                    padding-left: 10px;
                    font-size:13px;
                }
                .border{
                    border: 1px solid #000;
                }
                .border2{
                    border: 1px solid #000;
                }
                p{
                    line-height:2px;
                }
            </style>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:70%;"></td>
                        <td align="left">
                           <p>Mẫu số: 0365DAD24</p>
                           <p>Kí hiệu: 0365DAD24</p>
                           <p>Số: <b>000212</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <p><h2>HÓA ĐƠN THANH TOÁN ĐẶT BÀN</h2><p></br>
                            <p>Công ty TNHH 1998 Coffee</p>
                        </td>
                    </tr>
                </tbody>
            </table>';
            
            $output.='
            <h3>Đơn hàng sản phẩm: HD'.$hoadon->id.'</h3>
            <table style="width:100%;" class="border">
                <thead>
                    <tr align="center">
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>';
                
                foreach($chitiethoadon as $c)
                {
                    if($c->iddonhang == $hoadon->id)
                    {
                        $output.=' 
                        <tr align="center">
                            <td>'.$c->idsanpham.'</td>
                            <td>'.$c->tensanpham.'</td>
                            <td>'.$c->soluong.'</td>
                        </tr>
                        ';
                    }
                }
            $output.='
                </tbody>
            </table>';
        }
        
              
        return $output;
    }
    //--------------------DATABASE----------------------------//
    public function bangsanpham()
    {
        $sanpham = tabmenu::paginate(7);
        return view('Backend.pagestabledata.tableproduct',['sanpham'=>$sanpham]);
    }
    
    public function bangkhachhang()
    {
        //$khachhang = tabdangki::paginate(7);
        $khachhang=DB::table('tabdangkis')
                    ->whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=',NULL);
                     
                                })
                    ->paginate(7);
        $taikhoan = tabdangnhap::where('chucvu','=',NULL)->paginate(7);
        return view('Backend.pagestabledata.tablecustomer',['khachhang'=>$khachhang,'taikhoan'=>$taikhoan]);
    }
    
    public function bangnhanvien()
    {
        //$khachhang = tabdangki::paginate(7);
        $nhanvien = tabdangki::whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=','staff')->orwhere('chucvu','=','chef');
                     
                                })
                    ->paginate(5);
        $taikhoan = tabdangnhap::where('chucvu','=','staff')->orwhere('chucvu','=','chef')->paginate(5);
        return view('Backend.pagestabledata.tablestaff',['nhanvien'=>$nhanvien,'taikhoan'=>$taikhoan]);
    }
    
    public function bangquantri()
    {
        $quantri=DB::table('tabdangkis')
                    ->whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=','admin');
                     
                                })
                    ->paginate(7);
        $nhanvien=DB::table('tabdangkis')
                    ->whereIn('id',function ($query) {
                                    $query->select('id_thongtindangki')->from('tabdangnhaps')
                                    ->Where('chucvu','=','staff');
                     
                                })
                    ->paginate(7);
        $taikhoan = tabdangnhap::where('chucvu','=','admin')->paginate(7);
        $taikhoan1 = tabdangnhap::where('chucvu','=','staff')->paginate(7);
        return view('Backend.pagestabledata.tableadmin',['quantri'=>$quantri,'taikhoan'=>$taikhoan,'nhanvien'=>$nhanvien,'taikhoan1'=>$taikhoan1]);
    }
    
    public function importcsv()
    {
        $sanpham = tabmenu::paginate(7);
        return view('Backend.pagestabledata.tableproduct',['sanpham'=>$sanpham]);
    }
    
    public function exportcsv()
    {
        $sanpham = tabmenu::paginate(7);
        return view('Backend.pagestabledata.tableproduct',['sanpham'=>$sanpham]);
    }
    
    public function timkiemsanpham(Request $rq)
    {
      $search = tabmenu::Where('tenmonan','like','%'.$rq->value.'%')->orWhere('theloai','like', '%'.$rq->value.'%')->orWhere('id','like', '%'.$rq->value.'%')->get();
      $output='';
      $output.='
      
                <table class="table table-bordered table-hover ">
                  <thead>                  
                    <tr align="center" class="text-nowrap">
                      <th>ID</th>
                      <th>Tên sản phẩm</th>
                      <th>Hình ảnh</th>
                      <th>Thể loại</th>
                      <th>Giá</th>
                      <th>Giá khuyến mãi</th>
                      <th>Sản phẩm mới</th>
                    </tr>
                  </thead>
                  <tbody>';
                  foreach($search as $searchsanphan)
                  {
                      $output.='
                        <tr align="center">
                            <td>'.$searchsanphan->id.'</td>
                            <td>'.$searchsanphan->tenmonan.'</td>
                            <td>
                                <img src="../public/images/'.$searchsanphan->hinhanh.'" width="50px" height="50px" style="border-radius:10px;">
                            </td>
                            <td>'.$searchsanphan->theloai.'</td>
                            <td>'.$searchsanphan->gia.'$</td>
                            <td>'.$searchsanphan->khuyenmai.'$</td>
                        ';
                            if($searchsanphan->sanphammoi==1)
                            {
                                $output.='
                                <td>Có</td>
                                ';
                            }
                            else
                            {
                                $output.='
                                <td>Không</td>
                        </tr>
                                ';
                            }
                  }
                   
        $output.=' 
                  </tbody>
                </table>
      ';
       echo $output;
    }
    
    public function timkiemtaikhoankhachhang(Request $rq)
    {
      $search = tabdangnhap::where([
                                   ['username','like','%'.$rq->value1.'%'],
                                   ['chucvu','=',NULL],
                                ])->get();                         
      $output='';
      $output.='
      
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Chức vụ</th>
                        <th>ID_thongtincanhan</th>
                      </tr>
                    </thead>
                    <tbody>';
                   foreach($search as $searchtaikhoankhachhang)
                   {
                       $output.='
                          <tr>
                            <td>'.$searchtaikhoankhachhang->id.'</td>
                            <td>'.$searchtaikhoankhachhang->username.'</td>
                            <td>'.$searchtaikhoankhachhang->password.'</td>';
                            if($searchtaikhoankhachhang->chucvu==NULL)
                            {
                                $output.='
                                <td>Guest</td>';
                            }
                              
                            else
                            {
                                $output.='
                                <td>Admin</td>';
                            }
                        $output.='
                            <td>'.$searchtaikhoankhachhang->id_thongtindangki.'</td>
                          </tr>';
                   }
                    
                     $output.='
                    </tbody>
                  </table>
                 ';
       echo $output;
    }
    
    public function timkiemthongtinkhachhang(Request $rq)
    {
        $search1 = tabdangki::Where('firstname','like','%'.$rq->value2.'%')->orWhere('lastname','like', '%'.$rq->value2.'%')->orWhere('usename','like', '%'.$rq->value2.'%')->orWhere('email','like', '%'.$rq->value2.'%')->orWhere('sdt','like', '%'.$rq->value2.'%')->first();
        $search2 = tabdangnhap::where('id_thongtindangki','=',$search1->id)->first();
        if($search2->chucvu == NULL)
        {
            $searchthongtinkhachhang = $search1;
        }
      $output='';
      $output.='
      
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>                  
                      <tr>
                        <th>ID</th>
                        <th>Họ & tên lót</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>'.$searchthongtinkhachhang->id.'</td>
                        <td>'.$searchthongtinkhachhang->firstname.'</td>
                        <td>'.$searchthongtinkhachhang->lastname.'</td>
                        <td>'.$searchthongtinkhachhang->email.'</td>
                        <td>'.$searchthongtinkhachhang->diachi.'</td>
                        <td>'.$searchthongtinkhachhang->sdt.'</td>
                        <td>'.$searchthongtinkhachhang->usename.'</td>
                        <td>'.$searchthongtinkhachhang->password.'</td>
                      </tr>
                    </tbody>
                  </table>
                 ';
       echo $output;
    }
    
    public function timkiemtaikhoanadmin(Request $rq)
    {
      $search = tabdangnhap::where([
                                   ['username','like','%'.$rq->value1.'%'],
                                   ['chucvu','=','admin'],
                                ])->get();
      $output='';
      $output.='
      
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Chức vụ</th>
                        <th>ID_thongtincanhan</th>
                      </tr>
                    </thead>
                    <tbody>';
                    foreach($search as $searchtaikhoanadmin)
                    {
                        $output.='
                          <tr>
                            <td>'.$searchtaikhoanadmin->id.'</td>
                            <td>'.$searchtaikhoanadmin->username.'</td>
                            <td>'.$searchtaikhoanadmin->password.'</td>';
                            if($searchtaikhoanadmin->chucvu==NULL)
                            {
                                $output.='
                                <td>Guest</td>';
                            }
                              
                            else
                            {
                                $output.='
                                <td>Admin</td>';
                            }
                        $output.='
                            <td>'.$searchtaikhoanadmin->id_thongtindangki.'</td>
                        </tr>';
                    }
                       
                    $output.='
                    </tbody>
                  </table>
                 ';
       echo $output;
    }
    
    public function timkiemthongtinadmin(Request $rq)
    {
        $search1 = tabdangki::Where('firstname','like','%'.$rq->value2.'%')->orWhere('lastname','like', '%'.$rq->value2.'%')->orWhere('usename','like', '%'.$rq->value2.'%')->orWhere('email','like', '%'.$rq->value2.'%')->orWhere('sdt','like', '%'.$rq->value2.'%')->first();
        $search2 = tabdangnhap::where('id_thongtindangki','=',$search1->id)->first();
        if($search2->chucvu == 'admin')
        {
            $searchthongtinadmin = $search1;
        }
      $output='';
      $output.='
      
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>                  
                      <tr>
                        <th>ID</th>
                        <th>Họ & tên lót</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>'.$searchthongtinadmin->id.'</td>
                        <td>'.$searchthongtinadmin->firstname.'</td>
                        <td>'.$searchthongtinadmin->lastname.'</td>
                        <td>'.$searchthongtinadmin->email.'</td>
                        <td>'.$searchthongtinadmin->diachi.'</td>
                        <td>'.$searchthongtinadmin->sdt.'</td>
                        <td>'.$searchthongtinadmin->usename.'</td>
                        <td>'.$searchthongtinadmin->password.'</td>
                      </tr>
                    </tbody>
                  </table>
                 ';
       echo $output;
    }
    
    public function timkiemtaikhoanstaff(Request $rq)
    {
      $search = tabdangnhap::where([
                                   ['username','like','%'.$rq->value1.'%'],
                                   ['chucvu','=','staff'],
                                ])->get();
      $output='';
      $output.='
      
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Chức vụ</th>
                        <th>ID_thongtincanhan</th>
                      </tr>
                    </thead>
                    <tbody>';
                    foreach($search as $searchtaikhoanstaff)
                    {
                        $output.='
                          <tr>
                            <td>'.$searchtaikhoanstaff->id.'</td>
                            <td>'.$searchtaikhoanstaff->username.'</td>
                            <td>'.$searchtaikhoanstaff->password.'</td>';
                            if($searchtaikhoanstaff->chucvu==NULL)
                            {
                                $output.='
                                <td>Guest</td>';
                            }
                              
                            else
                            {
                                $output.='
                                <td>Admin</td>';
                            }
                        $output.='
                            <td>'.$searchtaikhoanstaff->id_thongtindangki.'</td>
                        </tr>';
                    }
                       
                    $output.='
                    </tbody>
                  </table>
                 ';
       echo $output;
    }
    
    public function timkiemthongtinstaff(Request $rq)
    {
        $search1 = tabdangki::Where('firstname','like','%'.$rq->value2.'%')->orWhere('id','like', '%'.$rq->value2.'%')->orWhere('lastname','like', '%'.$rq->value2.'%')->orWhere('usename','like', '%'.$rq->value2.'%')->orWhere('email','like', '%'.$rq->value2.'%')->orWhere('sdt','like', '%'.$rq->value2.'%')->first();
        if($search1)
        {
            $search2 = tabdangnhap::where('id_thongtindangki','=',$search1->id)->first();
            if($search2->chucvu == 'staff')
            {
                $s = $search1;
                $output='';
                  $output.='
                  
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>                  
                                  <tr>
                                    <th>ID</th>
                                    <th>Họ & tên lót</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>'.$s->id.'</td>
                                    <td>'.$s->firstname.'</td>
                                    <td>'.$s->lastname.'</td>
                                    <td>'.$s->email.'</td>
                                    <td>'.$s->diachi.'</td>
                                    <td>'.$s->sdt.'</td>
                                    <td>'.$s->usename.'</td>
                                    <td>'.$s->password.'</td>
                                  </tr>
                                </tbody>
                              </table>
                             ';
                  echo $output;
            }
            else
            {
                $output='';
                  $output.='
                  
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>                  
                                  <tr>
                                    <th>ID</th>
                                    <th>Họ & tên lót</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <center>Không tìm thấy</center>
                                  </tr>
                                </tbody>
                              </table>
                             ';
                  echo $output;
            }
        }
        else
        {
            $output='';
              $output.='
              
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>                  
                              <tr>
                                <th>ID</th>
                                <th>Họ & tên lót</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tên đăng nhập</th>
                                <th>Mật khẩu</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <center>Không tìm thấy</center>
                              </tr>
                            </tbody>
                          </table>
                         ';
              echo $output;
        }
    }
}
