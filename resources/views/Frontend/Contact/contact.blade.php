@extends('Frontend.layouts.index')

@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Liên hệ chúng tôi</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">trangchu</a></span> <span>lienhe</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Thông tin liên hệ</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Địa chỉ:</span> 12 Nguyễn Văn Bảo, Phường 4, Gò vấp, thành phố Hồ Chí Minh</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Số điện thoại:</span> <a href="tel://2 392 3929 210">+2 392 3929 210</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yourdomain.com</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Fanpage:</span> <a href="https://www.facebook.com/only1998Coffee">1998 coffee</a></p>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            @if(Auth::check())
            @if(session('thongbao1'))
                <div style="color:#00001a" class="alert alert-success">{{ Session::get('thongbao1')}}</div>
            @endif
            <form action="{!! route('contactpost') !!}" method="post" class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Họ & tên" value="{{DB::table('tabdangkis')->where('id','=',Auth::user()->id_thongtindangki)->value('lastname')}}" minlength="2" maxlength="32" required pattern="[a-zA-Z0-9]+" name="ten">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Email" value="{{DB::table('tabdangkis')->where('id','=',Auth::user()->id_thongtindangki)->value('email')}}" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
	                </div>
	                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Chủ đề" name="chude" minlength="2" maxlength="32" required>
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="7" class="form-control" placeholder="Lời nhắn/bình luận" name="tinnhan" required minlength="1" maxlength="1000"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Gửi" class="btn btn-primary py-3 px-5">
              </div>
            </form>
            @else
            <form action="{!! route('contactpost') !!}" method="post" class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Họ & tên" name="ten" minlength="2" maxlength="32" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                  </div>
                  </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Chủ đề" name="chude" minlength="2" maxlength="32" required>
              </div>
              <div class="form-group">
                <textarea name="tinnhan" id="" cols="30" rows="7" class="form-control" placeholder="Nội dung" required minlength="1" maxlength="1000"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Gửi" class="btn btn-primary py-3 px-5">
              </div>
            </form>
            @endif
          </div>
        </div>
      </div>
    </section>

    <div id="map"></div>
@endsection