<?php
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
//----------------------------Frontend-----------------------------
//view error


//view Home
Route::get('/','HomeController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::get('dangnhap','HomeController@Loginget')->name('loginget'); //xuat trang login
Route::post('datban',['as'=>'datban1','uses'=>'HomeController@datban']);
Route::get('resultsuccess','HomeController@resultsuccess'); //trả kết quả đặt bàn thành công
Route::get('lienhe','HomeController@contact')->name('contact');

//login member
Route::get('dangki','LoginController@Register')->name('register'); 
Route::get('resultsuccessregister','LoginController@resultsuccessregister'); //trả kết quả đăng kí thành viên thành công
Route::post('dangki',['as'=>'dangki1','uses'=>'LoginController@dangkidangnhap']);//Đăng kí, đưa dữ liệu vào 2 bảng ��ăng kí, đăng nhập
Route::post('login',['as'=>'Loginpost','uses'=>'LoginController@Loginpost']); //lấy dữ liệu form login
Route::get('logout','LoginController@logout')->name('logout');
Route::get('thongtintaikhoan','LoginController@Membersettingget')->name('membersetting');
Route::get('rewardpoints','LoginController@rewardpoints')->name('rewardpoints');
Route::post('membersetting',['as'=>'membersettingpost','uses'=>'LoginController@membersettingpost']);
Route::get('dangnhapforcheckout','LoginController@dangnhapforcheckout')->name('dangnhapforcheckout');

//Login facebook
Route::get('auth/redirect/{provider}', 'LoginController@redirect');
Route::get('login/callback/{provider}', 'LoginController@callback');

//view contact
Route::get('lienhe','ContactController@contact')->name('contact');
Route::post('contact',['as'=>'contactpost','uses'=>'ContactController@contactpost']);

//view menu
Route::get('cacmonchinh','MenuController@cacmonchinh')->name('cacmonchinh');
Route::get('combo','MenuController@combo')->name('combo');
Route::post('hienthinuttimkiem',['as'=>'hienthinuttimkiem','uses'=>'MenuController@hienthinuttimkiem']);
Route::post('ketquatimkiem',['as'=>'ketquatimkiem','uses'=>'MenuController@ketquatimkiem']);

Route::get('combosang1','MenuController@combosang1')->name('combosang1');
Route::get('combosang2','MenuController@combosang2')->name('combosang2');
Route::get('combotrua1','MenuController@combotrua1')->name('combotrua1');
Route::get('combotrua2','MenuController@combotrua2')->name('combotrua2');
Route::get('combotoi1','MenuController@combotoi1')->name('combotoi1');
Route::get('combotoi2','MenuController@combotoi2')->name('combotoi2');

//view service
Route::get('services','ServicesController@service')->name('service');

//view blog
Route::get('tintuc','BlogController@blog')->name('blog');
Route::get('chitiettintuc/{id}','BlogController@blogdetail')->name('blogdetail');

//view about
Route::get('about','AboutController@about')->name('about');

//view shop
Route::get('datban','ShopController@shopdatban')->name('shopdatban');
Route::get('giaohang','ShopController@shopgiaohang')->name('shopgiaohang');

//view single product
Route::get('chitietsanpham/{id}','SingleproductController@singleproduct')->name('singleproduct');

//view reservation
Route::get('datbannhanh','ReservationController@datbannhanh')->name('datbannhanh');
Route::post('datbannhanh',['as'=>'thanhtoanvnpay','uses'=>'ReservationController@thanhtoanvnpay']);

Route::get('dattiec','ReservationController@reservation')->name('reservation');
Route::get('datbanmoi','ReservationController@datbanmoi')->name('datbanmoi');
Route::get('completereservation','ReservationController@completereservation')->name('completereservation');
Route::post('numberoftable',['as'=>'numberoftable','uses'=>'ReservationController@numberoftable']);
Route::post('postreservation',['as'=>'postreservation','uses'=>'ReservationController@postreservation']);
Route::post('kiemtrangaycheckout',['as'=>'kiemtrangaycheckout','uses'=>'ReservationController@kiemtrangaycheckout']);
Route::post('kiemtrathoigiancheckout',['as'=>'kiemtrathoigiancheckout','uses'=>'ReservationController@kiemtrathoigiancheckout']);
Route::post('tienloaiban',['as'=>'tienloaiban','uses'=>'ReservationController@tienloaiban']);
Route::post('dattiec',['as'=>'thanhtoanvnpay','uses'=>'ReservationController@thanhtoanvnpay']);
Route::post('datbanmoi',['as'=>'thanhtoanvnpay','uses'=>'ReservationController@thanhtoanvnpay']);

//view cart
Route::get('cart','CartController@cart')->name('cart');
Route::post('savecart',['as'=>'savecart','uses'=>'CartController@savecart']);
Route::post('savecart1',['as'=>'savecart1','uses'=>'CartController@savecart1']);
Route::post('updateqtyproduct',['as'=>'updateqtyproduct','uses'=>'CartController@updatecardqty']);
Route::post('updatediscountproduct',['as'=>'updatediscountproduct','uses'=>'CartController@updatediscountproduct']);
Route::get('showcart','CartController@showcart')->name('showcart');
Route::get('deletecart/{rowid}','CartController@deletecart')->name('deletecart');
Route::get('deleteorder/{id}','CartController@deleteorder')->name('deleteorder');
Route::get('viewhandcartreservationfast/{id}','CartController@viewhandcartreservationfast')->name('viewhandcartreservationfast');

Route::get('hoadon','CartController@totalhandcart')->name('totalhandcart');
Route::get('hoadondatban/{id}','CartController@viewhandcartreservation')->name('viewhandcartreservation');
Route::get('hoadongiaohang/{id}','CartController@viewhandcartshipping')->name('viewhandcartshipping');
Route::get('cancelorder-reservation/{id}','CartController@cancelorderreservation')->name('cancelorder-reservation');
Route::get('cancelorder-reservationfast/{id}','CartController@cancelorderreservationfast')->name('cancelorder-reservationfast');
Route::get('cancelorder-shipping/{id}','CartController@cancelordershipping')->name('cancelorder-shipping');
Route::get('listordercancel','CartController@listordercancel')->name('listordercancel');
Route::get('viewordercancel/{id}','CartController@viewordercancel')->name('viewordercancel');

Route::post('updatediachishipping',['as'=>'updatediachishipping','uses'=>'CartController@updatediachishipping']);
Route::post('updatetenshipping',['as'=>'updatetenshipping','uses'=>'CartController@updatetenshipping']);
Route::post('updatesdtshipping',['as'=>'updatesdtshipping','uses'=>'CartController@updatesdtshipping']);
Route::post('updateemailshipping',['as'=>'updateemailshipping','uses'=>'CartController@updateemailshipping']);
Route::post('updateghichushipping',['as'=>'updateghichushipping','uses'=>'CartController@updateghichushipping']);

Route::post('updatetendatban',['as'=>'updatetendatban','uses'=>'CartController@updatetendatban']);
Route::post('updateemaildatban',['as'=>'updateemaildatban','uses'=>'CartController@updateemaildatban']);
Route::post('updatesdtdatban',['as'=>'updatesdtdatban','uses'=>'CartController@updatesdtdatban']);
Route::post('updatetinnhandatban',['as'=>'updatetinnhandatban','uses'=>'CartController@updatetinnhandatban']);

Route::get('unsetcoupon','CartController@unsetcoupon')->name('unsetcoupon');
Route::get('unsetfeeship','CartController@unsetfeeship')->name('unsetfeeship');
Route::post('selectdeliveryforcash',['as'=>'selectdeliveryforcash','uses'=>'CartController@selectdeliveryforcash']);
Route::post('calculatefeeship',['as'=>'calculatefeeship','uses'=>'CartController@calculatefeeship']);

//view checkout
Route::get('giaohangtannoi','CheckoutController@delivery')->name('delivery');
Route::post('giaohangtannoi',['as'=>'thanhtoanvnpaycheckout','uses'=>'CheckoutController@thanhtoanvnpay']);
// Route::post('completedelivery/{data}',['as'=>'completedelivery','uses'=>'CheckoutController@completedelivery']);
Route::get('completedelivery1','CheckoutController@completedelivery1')->name('completedelivery1');
//----------------------------Backend-----------------------------
//admin
Route::get('admin','AdminController@loginadmin')->name('loginadmin');
Route::get('staff','AdminController@loginstaff')->name('loginstaff');
Route::get('chef','AdminController@loginchef')->name('loginchef');
Route::post('Loginadminpost',['as'=>'Loginadminpost','uses'=>'AdminController@Loginadminpost']);
Route::post('Loginstaffpost',['as'=>'Loginstaffpost','uses'=>'AdminController@Loginstaffpost']);
Route::post('Loginchefpost',['as'=>'Loginchefpost','uses'=>'AdminController@Loginchefpost']);
Route::group(['prefix'=>'admin','middleware'=>'Adminlogin'],function(){
	Route::get('dashboard','AdminController@dashboard')->name('dashboardadmin');
	Route::post('postthemcongviec',['as'=>'postthemcongviec','uses'=>'AdminController@postthemcongviec']);
	Route::post('postcheckhoanhthanh',['as'=>'postcheckhoanhthanh','uses'=>'AdminController@postcheckhoanhthanh']);
	Route::get('xoacongviec/{id}','AdminController@xoacongviec')->name('xoacongviec');
	Route::get('resetdiemthuong/{id}','AdminController@resetdiemthuong')->name('resetdiemthuong');
	//Route::post('notificationstore',['as'=>'notificationstore','uses'=>'SendNotification@store']);
	//----------------------------sanpham--------------------------//
	Route::get('themsanpham','AdminController@themsanpham')->name('themsanpham');
	Route::post('postthemsanpham',['as'=>'postthemsanpham','uses'=>'AdminController@postthemsanpham']);
	Route::get('capnhatsanpham','AdminController@capnhatsanpham')->name('capnhatsanpham');
	Route::get('chucnangcapnhatsanpham/{id}','AdminController@chucnangcapnhatsanpham')->name('chucnangcapnhatsanpham');
	Route::post('chucnangcapnhatpost/{id}',['as'=>'chucnangcapnhatpost','uses'=>'AdminController@chucnangcapnhatpost']);
	Route::get('xoa/{id}','AdminController@chucnangxoa')->name('chucnangxoa');
	Route::post('timkiemchucnangbangsanpham',['as'=>'timkiemchucnangbangsanpham','uses'=>'AdminController@timkiemchucnangbangsanpham']);
	//----------------------------khách hàng--------------------------//
	Route::get('themkhachhang','AdminController@themkhachhang')->name('themkhachhang');
	Route::post('postthemkhachhang',['as'=>'postthemkhachhang','uses'=>'AdminController@postthemkhachhang']);
	Route::get('capnhatkhachhang','AdminController@capnhatkhachhang')->name('capnhatkhachhang');
	Route::get('chucnangcapnhatkhachhang/{id}','AdminController@chucnangcapnhatkhachhang')->name('chucnangcapnhatkhachhang');
	Route::post('chucnangcapnhatkhachhangpost/{id}',['as'=>'chucnangcapnhatkhachhangpost','uses'=>'AdminController@chucnangcapnhatkhachhangpost']);
	Route::get('chucnangxoakhachhang/{id}','AdminController@chucnangxoakhachhang')->name('chucnangxoakhachhang');
	Route::get('detailcustomer/{id}','AdminController@detailcustomer')->name('detailcustomer');
	Route::post('timkiemchucnangbangkhachhang',['as'=>'timkiemchucnangbangkhachhang','uses'=>'AdminController@timkiemchucnangbangkhachhang']);
	//----------------------------người quản trị--------------------------//
	Route::get('themnguoiquantri','AdminController@themnguoiquantri')->name('themnguoiquantri');
	Route::post('postthemadmin',['as'=>'postthemadmin','uses'=>'AdminController@postthemadmin']);
	Route::get('capnhatnguoiquantri','AdminController@capnhatnguoiquantri')->name('capnhatnguoiquantri');
	Route::get('capnhatnhanvien','AdminController@capnhatnhanvien')->name('capnhatnhanvien');
	Route::get('chucnangcapnhatadmin/{id}','AdminController@chucnangcapnhatadmin')->name('chucnangcapnhatadmin');
	Route::post('chucnangcapnhatadminpost/{id}',['as'=>'chucnangcapnhatadminpost','uses'=>'AdminController@chucnangcapnhatadminpost']);
	Route::get('chucnangxoaadmin/{id}','AdminController@chucnangxoaadmin')->name('chucnangxoaadmin');
	Route::get('detailadmin/{id}','AdminController@detailadmin')->name('detailadmin');
	Route::post('timkiemchucnangbangadmin',['as'=>'timkiemchucnangbangadmin','uses'=>'AdminController@timkiemchucnangbangadmin']);
	//----------------------------blog--------------------------//
	Route::get('themblog','AdminController@themblog')->name('themblog');
	Route::post('postthemblog',['as'=>'postthemblog','uses'=>'AdminController@postthemblog']);
	Route::get('quanlyblog','AdminController@capnhatblog')->name('quanlyblog');
	Route::get('chucnangcapnhatblog/{id}','AdminController@chucnangcapnhatblog')->name('chucnangcapnhatblog');
	Route::post('chucnangcapnhatblogpost/{id}',['as'=>'chucnangcapnhatblogpost','uses'=>'AdminController@chucnangcapnhatblogpost']);
	Route::get('chucnangxoablog/{id}','AdminController@chucnangxoablog')->name('chucnangxoablog');
	Route::post('timkiemchucnangbangblog',['as'=>'timkiemchucnangbangblog','uses'=>'AdminController@timkiemchucnangbangblog']);
	//----------------------------phong--------------------------//
	Route::get('quanlyphong','AdminController@quanlyphong')->name('quanlyphong');
	Route::get('themphong','AdminController@themphong')->name('themphong');
	Route::post('postthemphong',['as'=>'postthemphong','uses'=>'AdminController@postthemphong']);
	Route::get('chucnangcapnhatphong/{id}','AdminController@chucnangcapnhatphong')->name('chucnangcapnhatphong');
	Route::post('chucnangcapnhatphongpost/{id}',['as'=>'chucnangcapnhatphongpost','uses'=>'AdminController@chucnangcapnhatphongpost']);
	Route::get('chucnangxoaphong/{id}','AdminController@chucnangxoaphong')->name('chucnangxoaphong');
	//----------------------------phản hồi khách hàng--------------------------//
	Route::get('phanhoikhachhang','AdminController@phanhoikhachhang')->name('phanhoikhachhang');
	Route::get('chitietphanhoikhachhang/{id}','AdminController@chitietphanhoikhachhang')->name('chitietphanhoikhachhang');
	Route::post('postphanhoiykienkhachhang/{id}',['as'=>'postphanhoiykienkhachhang','uses'=>'AdminController@postphanhoiykienkhachhang']);
	Route::get('xoaphanhoikhachhang/{id}','AdminController@xoaphanhoikhachhang')->name('xoaphanhoikhachhang');
	//----------------------------Đơn đặt hàng--------------------------//
	Route::get('quanlyhoadon','AdminController@quanlyhoadon')->name('quanlyhoadon');
	Route::get('quanlydoanhthu','AdminController@quanlydoanhthu')->name('quanlydoanhthu');
	Route::get('deletesanphambanchay','AdminController@deletesanphambanchay')->name('deletesanphambanchay');
	Route::get('chitiethoadon/{id}','AdminController@chitiethoadon')->name('chitiethoadon');
	Route::get('chucnangxoahoadon/{id}','AdminController@chucnangxoahoadon')->name('chucnangxoahoadon');
	Route::get('themmagiamgia','AdminController@themmagiamgia')->name('themmagiamgia');
	Route::post('postthemmagiamgia',['as'=>'postthemmagiamgia','uses'=>'AdminController@postthemmagiamgia']);
	Route::get('capnhatmakhuyenmai','AdminController@capnhatmakhuyenmai')->name('capnhatmakhuyenmai');
	Route::get('chucnangcapnhatmakhuyenmai/{id}','AdminController@chucnangcapnhatmakhuyenmai')->name('chucnangcapnhatmakhuyenmai');
	Route::post('chucnangcapnhatmakhuyenmaipost/{id}',['as'=>'chucnangcapnhatmakhuyenmaipost','uses'=>'AdminController@chucnangcapnhatmakhuyenmaipost']);
	Route::get('chucnangxoamakhuyenmai/{id}','AdminController@chucnangxoamakhuyenmai')->name('chucnangxoamakhuyenmai');
	Route::get('printorder/{checkoutcode}','AdminController@printorder')->name('printorder');
	Route::get('printproduct/{checkoutcode1}','AdminController@printproduct')->name('printproduct');
	Route::get('duyethoadon','AdminController@duyethoadon')->name('duyethoadon');
	Route::post('sanphamdamua',['as'=>'sanphamdamua','uses'=>'AdminController@sanphamdamua']);
	Route::get('postduyethoadon/{id}','AdminController@postduyethoadon')->name('postduyethoadon');
	Route::get('xoaduyethoadon/{id}','AdminController@xoaduyethoadon')->name('xoaduyethoadon');
	Route::get('xoatatcaduyethoadon','AdminController@xoatatcaduyethoadon')->name('xoatatcaduyethoadon');
	//----------------------------Vận chuyển--------------------------//
	Route::get('phivanchuyen','DeliveryController@phivanchuyen')->name('phivanchuyen');
	Route::post('selectdelivery',['as'=>'selectdelivery','uses'=>'DeliveryController@selectdelivery']);
	Route::post('insertdelivery',['as'=>'insertdelivery','uses'=>'DeliveryController@insertdelivery']);
	Route::post('selectfeeship',['as'=>'selectfeeship','uses'=>'DeliveryController@selectfeeship']);
	Route::post('updatedelivery',['as'=>'updatedelivery','uses'=>'DeliveryController@updatedelivery']);
	Route::post('timkiemvanchuyen',['as'=>'timkiemvanchuyen','uses'=>'DeliveryController@timkiemvanchuyen']);
	//---------------------------- đơn giao hàng--------------------------//
	Route::get('danhsachgiaohang','AdminController@danhsachgiaohang')->name('danhsachgiaohang');
	Route::get('chitietgiaohang/{id}','AdminController@xemgiaohang')->name('xemgiaohang');
	Route::get('xoagiaohang/{id}','AdminController@xoagiaohang')->name('xoagiaohang');
	Route::post('timkiemgiaohang',['as'=>'timkiemgiaohang','uses'=>'AdminController@timkiemgiaohang']);
	//---------------------------- đơn đặt bàn--------------------------//
	Route::get('booktable','AdminController@booktable')->name('booktable');
	Route::get('chitietdatban/{id}','AdminController@xemdatban')->name('xemdatban');
	Route::get('xoadatban/{id}','AdminController@xoadatban')->name('xoadatban');
	Route::post('datbantheongay',['as'=>'datbantheongay','uses'=>'AdminController@datbantheongay']);
	Route::post('timkiemdatban',['as'=>'timkiemdatban','uses'=>'AdminController@timkiemdatban']);
	//----------------------------pages--------------------------//
	Route::get('pagehome','PageController@pagehome')->name('pagehome');
	Route::get('themslider','PageController@themslider')->name('themslider');
	Route::post('postthemslider',['as'=>'postthemslider','uses'=>'PageController@postthemslider']);
	Route::get('capnhatslide/{id}','PageController@capnhatslide')->name('capnhatslide');
	Route::post('postcapnhatslider/{id}',['as'=>'postcapnhatslider','uses'=>'PageController@postcapnhatslider']);
	Route::get('chucnangxoaslide/{id}','PageController@chucnangxoaslide')->name('chucnangxoaslide');
	//----------------------------database--------------------------//
	Route::get('bangsanpham','AdminController@bangsanpham')->name('bangsanpham');
	Route::get('bangkhachhang','AdminController@bangkhachhang')->name('bangkhachhang');
	Route::get('bangnhanvien','AdminController@bangnhanvien')->name('bangnhanvien');
	Route::get('bangquantri','AdminController@bangquantri')->name('bangquantri');
	Route::post('importcsv',['as'=>'importcsv','uses'=>'AdminController@importcsv']);
	Route::post('exportcsv',['as'=>'exportcsv','uses'=>'AdminController@exportcsv']);
	Route::post('timkiemsanpham',['as'=>'timkiemsanpham','uses'=>'AdminController@timkiemsanpham']);
	Route::post('timkiemtaikhoankhachhang',['as'=>'timkiemtaikhoankhachhang','uses'=>'AdminController@timkiemtaikhoankhachhang']);
	Route::post('timkiemthongtinkhachhang',['as'=>'timkiemthongtinkhachhang','uses'=>'AdminController@timkiemthongtinkhachhang']);
	Route::post('timkiemtaikhoanstaff',['as'=>'timkiemtaikhoanstaff','uses'=>'AdminController@timkiemtaikhoanstaff']);
	Route::post('timkiemthongtinstaff',['as'=>'timkiemthongtinstaff','uses'=>'AdminController@timkiemthongtinstaff']);
	Route::post('timkiemtaikhoanadmin',['as'=>'timkiemtaikhoanadmin','uses'=>'AdminController@timkiemtaikhoanadmin']);
	Route::post('timkiemthongtinadmin',['as'=>'timkiemthongtinadmin','uses'=>'AdminController@timkiemthongtinadmin']);
});

Route::group(['prefix'=>'staff','middleware'=>'Stafflogin'],function(){
	Route::get('dashboard','AdminController@dashboard')->name('dashboardstaff');
	Route::post('postcheckhoanhthanh',['as'=>'postcheckhoanhthanh1','uses'=>'AdminController@postcheckhoanhthanh']);
	Route::get('resetdiemthuong/{id}','AdminController@resetdiemthuong')->name('resetdiemthuong1');
	//----------------------------sanpham--------------------------//
	//----------------------------khách hàng--------------------------//
	Route::get('themkhachhang','AdminController@themkhachhang')->name('themkhachhang1');
	Route::post('postthemkhachhang',['as'=>'postthemkhachhang1','uses'=>'AdminController@postthemkhachhang']);
	Route::get('capnhatkhachhang','AdminController@capnhatkhachhang')->name('capnhatkhachhang1');
	Route::get('chucnangcapnhatkhachhang/{id}','AdminController@chucnangcapnhatkhachhang')->name('chucnangcapnhatkhachhang1');
	Route::post('chucnangcapnhatkhachhangpost/{id}',['as'=>'chucnangcapnhatkhachhangpost1','uses'=>'AdminController@chucnangcapnhatkhachhangpost']);
	Route::get('chucnangxoakhachhang/{id}','AdminController@chucnangxoakhachhang')->name('chucnangxoakhachhang1');
	Route::get('detailcustomer/{id}','AdminController@detailcustomer')->name('detailcustomer1');
	Route::post('timkiemchucnangbangkhachhang',['as'=>'timkiemchucnangbangkhachhang1','uses'=>'AdminController@timkiemchucnangbangkhachhang']);
	//----------------------------người quản trị--------------------------//
	//----------------------------blog--------------------------//
	Route::get('themblog','AdminController@themblog')->name('themblog1');
	Route::post('postthemblog',['as'=>'postthemblog1','uses'=>'AdminController@postthemblog']);
	Route::get('quanlyblog','AdminController@capnhatblog')->name('quanlyblog1');
	Route::get('chucnangcapnhatblog/{id}','AdminController@chucnangcapnhatblog')->name('chucnangcapnhatblog1');
	Route::post('chucnangcapnhatblogpost/{id}',['as'=>'chucnangcapnhatblogpost1','uses'=>'AdminController@chucnangcapnhatblogpost']);
	Route::get('chucnangxoablog/{id}','AdminController@chucnangxoablog')->name('chucnangxoablog1');
	Route::post('timkiemchucnangbangblog',['as'=>'timkiemchucnangbangblog1','uses'=>'AdminController@timkiemchucnangbangblog']);
	//----------------------------Đơn đặt hàng--------------------------//
	Route::get('quanlyhoadon','AdminController@quanlyhoadon')->name('quanlyhoadon1');
	Route::get('laphoadon','AdminController@laphoadon')->name('laphoadon');
	Route::post('postlaphoadon',['as'=>'postlaphoadon','uses'=>'AdminController@postlaphoadon']);
	Route::get('shipdonhang','AdminController@shipdonhang')->name('shipdonhang');
	Route::post('postshipdonhang',['as'=>'postshipdonhang','uses'=>'AdminController@postshipdonhang']);
	Route::get('chitiethoadon/{id}','AdminController@chitiethoadon')->name('chitiethoadon1');
	Route::get('chucnangxoahoadon/{id}','AdminController@chucnangxoahoadon')->name('chucnangxoahoadon1');
	Route::get('inhoadon/{checkoutcode}','AdminController@printorder')->name('printorder1');
	Route::get('printproduct/{checkoutcode1}','AdminController@printproduct')->name('printproduct1');
	Route::get('duyethoadon','AdminController@duyethoadon')->name('duyethoadon1');
	Route::get('postduyethoadon/{id}','AdminController@postduyethoadon')->name('postduyethoadon1');
	Route::post('sanphamdamua',['as'=>'sanphamdamua1','uses'=>'AdminController@sanphamdamua']);
	//----------------------------Vận chuyển--------------------------//
	//---------------------------- đơn giao hàng--------------------------//
	Route::get('danhsachgiaohang','AdminController@danhsachgiaohang')->name('danhsachgiaohang1');
	Route::get('chitietgiaohang/{id}','AdminController@xemgiaohang')->name('xemgiaohang1');
	Route::get('xoagiaohang/{id}','AdminController@xoagiaohang')->name('xoagiaohang1');
	Route::post('timkiemgiaohang',['as'=>'timkiemgiaohang1','uses'=>'AdminController@timkiemgiaohang']);
	//----------------------------Đặt bàn--------------------------//
	Route::get('booktable','AdminController@booktable')->name('booktable1');
	Route::get('chitietdatban/{id}','AdminController@xemdatban')->name('xemdatban1');
	Route::get('xoadatban/{id}','AdminController@xoadatban')->name('xoadatban1');
	Route::post('datbantheongay',['as'=>'datbantheongay1','uses'=>'AdminController@datbantheongay']);
	Route::post('timkiemdatban',['as'=>'timkiemdatban1','uses'=>'AdminController@timkiemdatban']);
	//----------------------------pages--------------------------//
	//----------------------------database--------------------------//
	Route::get('bangsanpham','AdminController@bangsanpham')->name('bangsanpham1');
	Route::get('bangkhachhang','AdminController@bangkhachhang')->name('bangkhachhang1');
	Route::get('bangnhanvien','AdminController@bangnhanvien')->name('bangnhanvien1');
	Route::post('importcsv',['as'=>'importcsv','uses'=>'AdminController@importcsv']);
	Route::post('exportcsv',['as'=>'exportcsv','uses'=>'AdminController@exportcsv']);
	Route::post('timkiemsanpham',['as'=>'timkiemsanpham1','uses'=>'AdminController@timkiemsanpham']);
	Route::post('timkiemtaikhoankhachhang',['as'=>'timkiemtaikhoankhachhang1','uses'=>'AdminController@timkiemtaikhoankhachhang']);
	Route::post('timkiemthongtinkhachhang',['as'=>'timkiemthongtinkhachhang1','uses'=>'AdminController@timkiemthongtinkhachhang']);
	Route::post('timkiemtaikhoanstaff',['as'=>'timkiemtaikhoanstaff1','uses'=>'AdminController@timkiemtaikhoanstaff']);
	Route::post('timkiemthongtinstaff',['as'=>'timkiemthongtinstaff1','uses'=>'AdminController@timkiemthongtinstaff']);
	Route::post('timkiemtaikhoanadmin',['as'=>'timkiemtaikhoanadmin1','uses'=>'AdminController@timkiemtaikhoanadmin']);
	Route::post('timkiemthongtinadmin',['as'=>'timkiemthongtinadmin1','uses'=>'AdminController@timkiemthongtinadmin']);
});

Route::group(['prefix'=>'chef','middleware'=>'Cheflogin'],function(){
    Route::get('dashboard','AdminController@dashboard')->name('dashboardchef');
    Route::get('booktable','AdminController@booktable')->name('booktable2');
    Route::get('danhsachgiaohang','AdminController@danhsachgiaohang')->name('danhsachgiaohang2');
    Route::get('printproduct/{checkoutcode1}','AdminController@printproduct')->name('printproduct2');
    Route::post('datbantheongay',['as'=>'datbantheongay2','uses'=>'AdminController@datbantheongay']);
    Route::post('timkiemdatban',['as'=>'timkiemdatban2','uses'=>'AdminController@timkiemdatban']);
});

// them cot
Route::get('them',function(){
	Schema::table('tabdangnhaps',function($table){
		$table->rememberToken();
	});
});

Route::get('them1',function(){
	Schema::table('tabdangnhaps',function($table){
		$table->integer('id_thongtindangki')->unsigned();
		$table->foreign('id_thongtindangki')->references('id')->on('tabdangkis');
	});
	echo "Đã tạo";
});


//nagy
Route::get('time',function(){
	$c = new Carbon();
	return $c;
});


