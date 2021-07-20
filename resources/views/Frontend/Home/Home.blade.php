    @extends('Frontend.layouts.index')

    @section('content')
    <section class="home-slider owl-carousel">
    	@foreach($slide as $s)
	    	@if($s->trangthai == "show")
		      <div class="slider-item" style="background-image: url('public/images/{{$s->hinhanhslide}}');">
		      	<div class="overlay"></div>
		        <div class="container">
		          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
		
		            <div class="col-md-8 col-sm-12 text-center ftco-animate">
		            	<span class="subheading">Welcome</span>
		              <h1 class="mb-4">{{$s->tieude}}</h1>
		              <p class="mb-4 mb-md-5">{{$s->mota}}</p>
		              <p><a href="{{ URL::route('shopdatban')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Đặt hàng</a> <a href="{{ URL::route('cacmonchinh')}}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Xem thực đơn</a></p>
		            </div>
		
		          </div>
		        </div>
		      </div>
	      @endif
      @endforeach
    </section>
    
    <!--dia chi, dat ban-->
    <!--<section class="ftco-intro">-->
    <!--	<div class="container-wrap">-->
    <!--		<div class="wrap d-md-flex align-items-xl-end">-->
	   <!-- 		<div class="info">-->
	   <!-- 			<div class="row no-gutters">-->
	   <!-- 				<div class="col-md-4 d-flex ftco-animate">-->
	   <!-- 					<div class="icon"><span class="icon-phone"></span></div>-->
	   <!-- 					<div class="text">-->
	   <!-- 						<h3>000 (123) 456 7890</h3>-->
	   <!-- 						<p>Mọi chi tiết giải đáp thắc mắc xin liên hệ số trên để được giải đáp.</p>-->
	   <!-- 					</div>-->
	   <!-- 				</div>-->
	   <!-- 				<div class="col-md-4 d-flex ftco-animate">-->
	   <!-- 					<div class="icon"><span class="icon-my_location"></span></div>-->
	   <!-- 					<div class="text">-->
	   <!-- 						<h3>Địa chỉ</h3>-->
	   <!-- 						<p>	12 Nguyễn Văn Bảo, phường 4, Gò vấp, thành phố Hồ Chí Minh.</p>-->
	   <!-- 					</div>-->
	   <!-- 				</div>-->
	   <!-- 				<div class="col-md-4 d-flex ftco-animate">-->
	   <!-- 					<div class="icon"><span class="icon-clock-o"></span></div>-->
	   <!-- 					<div class="text">-->
	   <!-- 						<h3>Mở cửa từ thứ 2 đến Chủ nhật</h3>-->
	   <!-- 						<p>8:00 giờ - 21:00 giờ.</p>-->
	   <!-- 					</div>-->
	   <!-- 				</div>-->
	   <!-- 			</div>-->
	   <!-- 		</div>-->
	    		
	   <!-- 		<div class="book p-4">-->
	   <!-- 			<h3>Đặt bàn nhanh (có bàn sau 15p)</h3>-->
    <!--        @if(Auth::check())-->
	   <!-- 			<form action="{!! route('datban1') !!}" method="post" class="appointment-form">-->

    <!--          <input type = "hidden" name = "_token" value = "{{csrf_token()}} ">-->
	   <!-- 				<div class="d-md-flex">-->
		  <!--  				<div class="form-group">-->
		  <!--  					<input type="text" class="form-control" placeholder="Họ & tên" name="ten" value="{{DB::table('tabdangkis')->where('id','=',Auth::user()->id_thongtindangki)->value('firstname')}} {{DB::table('tabdangkis')->where('id','=',Auth::user()->id_thongtindangki)->value('lastname')}}" minlength="2" maxlength="100" required>-->
		  <!--  				</div>-->
		  <!--  				<div class="form-group ml-md-4">-->
		  <!--  					<input type="number" class="form-control" placeholder="Số lượng người" name="soluongnguoi" min=1 max=10 required>-->
		  <!--  				</div>-->
	   <!-- 				</div>-->
	   <!-- 				<div class="d-md-flex">-->
		  <!--  				<div class="form-group">-->
		  <!--  					<div class="input-wrap">-->
		  <!--          		<div class="icon"><span class="ion-md-calendar"></span></div>-->
		  <!--          		<input type="text" class="form-control appointment_date" placeholder="Ngày đến" value="{{$dt->format('d/m/Y')}}" disabled>-->
		  <!--          		<input type="hidden" class="form-control" value="{{$dt->format('d/m/Y')}}" name="ngay">-->
	   <!--         		</div>-->
		  <!--  				</div>-->
		  <!--  				<div class="form-group ml-md-4">-->
		  <!--  					<div class="input-wrap">-->
		  <!--          		<div class="icon"><span class="ion-ios-clock"></span></div>-->
		  <!--          		<input type="text" class="form-control" placeholder="Thờigian đến" name="thoigian" value="{{$cenvertedTime}}" required>-->
	   <!--         		</div>-->
		  <!--  				</div>-->
		  <!--  				<div class="form-group ml-md-4">-->
		  <!--  					<input type="text" class="form-control" placeholder="Số điện thoại" name="dienthoai" value="{{DB::table('tabdangkis')->where('id','=',Auth::user()->id_thongtindangki)->value('sdt')}}" minlength="10" maxlength="11" required>-->
		  <!--  				</div>-->
	   <!-- 				</div>-->
	   <!-- 				<div class="d-md-flex">-->
	   <!-- 					<div class="form-group">-->
		  <!--            <textarea id="" cols="30" rows="2" class="form-control" placeholder="Tin nhắn" name="tinnhan" minlength="1" maxlength="1000" required></textarea>-->
		  <!--          </div>-->
		  <!--          <div class="form-group ml-md-4">-->
		  <!--            <input type="submit" value="Đặt bàn" name="subdatban" class="btn btn-white py-3 px-4">-->
		  <!--          </div>-->
	   <!-- 				</div>-->
	   <!-- 			</form>-->
    <!--        @else-->
    <!--          <form method="post" class="appointment-form">-->
    <!--            <input type = "hidden" name = "_token" value = "{{csrf_token()}} ">-->
    <!--            <div class="d-md-flex">-->
    <!--              <div class="form-group">-->
    <!--                <input type="text" class="form-control" placeholder="Họ & tên" name="ten" minlength="2" maxlength="100" disabled>-->
    <!--              </div>-->
    <!--              <div class="form-group ml-md-4">-->
    <!--                <input type="number" class="form-control" placeholder="Số lượng người" name="soluongnguoi" min=1 max=10 disabled>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--            <div class="d-md-flex">-->
    <!--              <div class="form-group">-->
    <!--                <div class="input-wrap">-->
    <!--                  <div class="icon"><span class="ion-md-calendar"></span></div>-->
    <!--                  <input type="text" class="form-control appointment_date" placeholder="Ngày đến" name="ngay" disabled>-->
    <!--                </div>-->
    <!--              </div>-->
    <!--              <div class="form-group ml-md-4">-->
    <!--                <div class="input-wrap">-->
    <!--                  <div class="icon"><span class="ion-ios-clock"></span></div>-->
    <!--                  <input type="text" class="form-control appointment_time" placeholder="Thờigian đến" name="thoigian" disabled>-->
    <!--                </div>-->
    <!--              </div>-->
    <!--              <div class="form-group ml-md-4">-->
    <!--                <input type="text" class="form-control" placeholder="Số điện thoại" name="dienthoai" disabled minlength="10" maxlength="11">-->
    <!--              </div>-->
    <!--            </div>-->
    <!--            <div class="d-md-flex">-->
    <!--              <div class="form-group">-->
    <!--                <textarea id="" cols="30" rows="2" class="form-control" placeholder="Tin nhắn" name="tinnhan" disabled minlength="1" maxlength="1000"></textarea>-->
    <!--              </div>-->
    <!--              <div class="form-group ml-md-4">-->
    <!--                <a href="{{ URL::route('loginget')}}" id="dangnhap" class="btn btn-white py-3 px-4">Đăng nhập</a>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </form> -->
    <!--        @endif-->
	   <!-- 		</div>-->
    <!--		</div>-->
    <!--	</div>-->
    <!--</section>-->

    <?php
      $dichvu = config('dichvu');
    ?>
    <!--dichvu-->
    <!--<section class="ftco-section ftco-services">-->
    <!--  <div class="container">-->
    <!--    <div class="row">-->
    <!--      @foreach($dichvu as $m)-->
    <!--      <div class="col-md-4 ftco-animate">-->
    <!--        <div class="media d-block text-center block-6 services">-->
    <!--          <div class="icon d-flex justify-content-center align-items-center mb-5">-->
    <!--            <span class="{{$m['icon']}}"></span>-->
    <!--          </div>-->
    <!--          <div class="media-body">-->
    <!--            <h3 class="heading">{{$m['name']}}</h3>-->
    <!--            <p>{{$m['content']}}</p>-->
    <!--          </div>-->
    <!--        </div>      -->
    <!--      </div>-->
    <!--      @endforeach-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->
    
    <!--<section class="ftco-gallery">-->
    <!--	<div class="container-wrap">-->
    <!--		<div class="row no-gutters">-->
				<!--	<div class="col-md-3 ftco-animate">-->
				<!--		<a href="public/images/gallery-1.jpg" class="gallery img d-flex align-items-center image-popup" style="background-image: url(public/images/gallery-1.jpg);">-->
				<!--			<div class="icon mb-4 d-flex align-items-center justify-content-center">-->
    <!--						<span class="fas fa-images"></span>-->
    <!--					</div>-->
				<!--		</a>-->
				<!--	</div>-->
				<!--	<div class="col-md-3 ftco-animate">-->
				<!--		<a href="public/images/gallery-2.jpg" class="gallery img d-flex align-items-center image-popup" style="background-image: url(public/images/gallery-2.jpg);">-->
				<!--			<div class="icon mb-4 d-flex align-items-center justify-content-center">-->
    <!--						<span class="fas fa-images"></span>-->
    <!--					</div>-->
				<!--		</a>-->
				<!--	</div>-->
				<!--	<div class="col-md-3 ftco-animate">-->
				<!--		<a href="public/images/gallery-3.jpg" class="gallery img d-flex align-items-center image-popup" style="background-image: url(public/images/gallery-3.jpg);">-->
				<!--			<div class="icon mb-4 d-flex align-items-center justify-content-center">-->
    <!--						<span class="fas fa-images"></span>-->
    <!--					</div>-->
				<!--		</a>-->
				<!--	</div>-->
				<!--	<div class="col-md-3 ftco-animate">-->
				<!--		<a href="public/images/gallery-4.jpg" class="gallery img d-flex align-items-center image-popup" style="background-image: url(public/images/gallery-4.jpg);">-->
				<!--			<div class="icon mb-4 d-flex align-items-center justify-content-center">-->
    <!--						<span class="fas fa-images"></span>-->
    <!--					</div>-->
				<!--		</a>-->
				<!--	</div>-->
    <!--    </div>-->
    <!--	</div>-->
    <!--</section>-->
    <!--kham pha menu-->
    <!--<section class="ftco-section">-->
    <!--	<div class="container">-->
    <!--		<div class="row align-items-center">-->
    <!--			<div class="col-md-6 pr-md-5">-->
    <!--				<div class="heading-section text-md-right ftco-animate">-->
	   <!--       	<span class="subheading">Khám phá</span>-->
	   <!--         <h2 class="mb-4">Menu của chúng tôi</h2>-->
	   <!--         <p class="mb-4">Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt. Tách biệt, họ sống trong Bookmarksgrove ngay tại bờ biển Semantics, một đại dương ngôn ngữ rộng lớn.</p>-->
	   <!--         <p><a href="" class="btn btn-primary btn-outline-primary px-4 py-3">Xem tất cả Menu</a></p>-->
	   <!--       </div>-->
    <!--			</div>-->
    <!--			<div class="col-md-6">-->
    <!--				<div class="row">-->
    <!--					<div class="col-md-6">-->
    <!--						<div class="menu-entry">-->
		  <!--  					<a href="#" class="img" style="background-image: url(public/images/menu-1.jpg);"></a>-->
		  <!--  				</div>-->
    <!--					</div>-->
    <!--					<div class="col-md-6">-->
    <!--						<div class="menu-entry mt-lg-4">-->
		  <!--  					<a href="#" class="img" style="background-image: url(public/images/menu-2.jpg);"></a>-->
		  <!--  				</div>-->
    <!--					</div>-->
    <!--					<div class="col-md-6">-->
    <!--						<div class="menu-entry">-->
		  <!--  					<a href="#" class="img" style="background-image: url(public/images/menu-3.jpg);"></a>-->
		  <!--  				</div>-->
    <!--					</div>-->
    <!--					<div class="col-md-6">-->
    <!--						<div class="menu-entry mt-lg-4">-->
		  <!--  					<a href="#" class="img" style="background-image: url(public/images/menu-4.jpg);"></a>-->
		  <!--  				</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--			</div>-->
    <!--		</div>-->
    <!--	</div>-->
    <!--</section>-->
		
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Khám phá</span>
            <h2 class="mb-4">Những sản phẩm giảm giá</h2>
            <p>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.</p>
          </div>
        </div>
        <div class="row">
        	@foreach($seller as $sell)
						@if($sell->khuyenmai)
		        	<div class="col-md-3">
		        		<div class="menu-entry">
		    					<a href="#" class="img" style="background-image: url(public/images/{{$sell->hinhanh}});"></a>
		    					<div class="text text-center pt-4">
		    						<h3><a href="{{ URL::route('singleproduct',$sell->id)}}">{{$sell->tenmonan}}</a></h3>
		    						<p>{{$sell->mota}}</p>
		    						<p class="price"><strike>${{$sell->gia}}</strike></p>
		    						<p class="price"><span>{{$sell->khuyenmai}} VND</span></p>
		    						<p><a href="{{ URL::route('singleproduct',$sell->id)}}" class="btn btn-primary btn-outline-primary">Thêm vào giỏ hàng</a></p>
		    					</div>
		    				</div>
		        	</div>
	        	@endif
   				@endforeach
        </div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(public/images/bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="3">0</strong>
		              	<span>Chi nhánh cà phê</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="85">0</strong>
		              	<span>Số giải thưởng</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="10567">0</strong>
		              	<span>Những khách hàng hạnh phúc</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="75">0</strong>
		              	<span>Nhân viên</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

		<section class="ftco-menu mb-5 pb-5">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Khám phá</span>
            <h2 class="mb-4">Sản phẩm mới của chúng tôi</h2>
            <p>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		            	<a class="nav-link active" id="v-pills-0-tab" data-toggle="pill" href="#v-pills-0" role="tab" aria-controls="v-pills-0" aria-selected="true">Coffee</a>

		              <a class="nav-link" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="false">Món chính</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Thức uống</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Tráng miệng</a>
		            </div>
		          </div>
		          
		          
		          <div class="col-md-12 d-flex align-items-center">
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">
		              
		              <div class="tab-pane fade" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">
		                <div class="row">
		              		
		              		@foreach($menu as $s)
		              		@if($s->theloai == 'Coffee')
		              		<div class="col-md-4">
						        		<div class="menu-entry">
						    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
						    						<p>{{$s->mota}}</p>
						    						<p class="price"><span>{{$s->gia}} VND</span></p>
						    						<p><a href="{{ URL::route('singleproduct',$s->id)}}" class="btn btn-primary btn-outline-primary">Thêm vào giỏ hàng</a></p>
						    					</div>
						    				</div>
						        	</div>
		              		@endif
						    @endforeach
		              	</div>
		              </div>
		              
		              <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		                <div class="row">
		              		
		              		@foreach($menu as $s)
		              		@if($s->theloai == 'Maindish')
		              		<div class="col-md-4">
						        		<div class="menu-entry">
						    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
						    						<p>{{$s->mota}}</p>
						    						<p class="price"><span>{{$s->gia}} VND</span></p>
						    						<p><a href="{{ URL::route('singleproduct',$s->id)}}" class="btn btn-primary btn-outline-primary">Thêm vào giỏ hàng</a></p>
						    					</div>
						    				</div>
						        	</div>
		              		@endif
						    @endforeach
		              	</div>
		              </div>
		              
		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
		              		
		              		@foreach($menu as $s)
		              		@if($s->theloai == 'Drinks')
		              		<div class="col-md-4">
						        		<div class="menu-entry">
						    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
						    						<p>{{$s->mota}}</p>
						    						<p class="price"><span>{{$s->gia}} VND</span></p>
						    						<p><a href="{{ URL::route('singleproduct',$s->id)}}" class="btn btn-primary btn-outline-primary">Thêm vào giỏ hàng</a></p>
						    					</div>
						    				</div>
						        	</div>
		              		@endif
						    @endforeach
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
		              		
		              		@foreach($menu as $s)
		              		@if($s->theloai == 'Desserts')
		              		<div class="col-md-4">
						        		<div class="menu-entry">
						    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
						    						<p>{{$s->mota}}</p>
						    						<p class="price"><span>{{$s->gia}} VND</span></p>
						    						<p><a href="{{ URL::route('singleproduct',$s->id)}}" class="btn btn-primary btn-outline-primary">Thêm vào giỏ hàng</a></p>
						    					</div>
						    				</div>
						        	</div>
		              		@endif
						    @endforeach
		              	</div>
		              </div>
		              
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url(public/images/gallery-2.jpg);"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
	        <div class="heading-section ftco-animate ">
	        	<span class="subheading">Giới thiệu</span>
	          <h2 class="mb-4">về chúng tôi</h2>
	        </div>
	        <div>
	  				<p style="color:#ffffff;">“1998 coffee” tiền thân là nhà hàng “1998” tại số 12 Nguyễn Văn Bảo được sáng lập từ năm 2016. Hiện nay “1998 coffee” được xây dựng trên khuôn viên hơn 2.500 m2 tọa lạc tại số 12 Nguyễn Văn Bảo, P4, Q. Gò Vấp, TP. Hồ Chí Minh, liền kề trường Đại học công nghiệp, giáp ranh 3 quận: Phú Nhuận, Gò Vấp, Bình Thạnh cách sân bay Tân Sơn Nhất 10 phút đi xe gắn máy.
Nhà hàng 1998 coffee trải rộng trong khuôn viên xanh mát với thiết kế mang phong cách bày trí tinh tế kiểu Châu Âu. Khuôn viên thoáng mát với trang trí cây xanh tạo bầu không khí mát mẻ, hòa hợp với thiên nhiên thích hợp cho những bữa ăn sáng và bữa gặp gỡ, khu vực trung tâm lại mang đến cảm giác nhẹ nhàng, ấm cúng, tinh tế của không gian nhà xưa. Đặc biệt với các phòng VIP của nhà hàng thể hiện sự chuẩn mực và sang trọng dành cho những bữa ăn mang tính riêng tư, những buổi gặp gỡ khách hàng quan trọng. Bên cạnh đó, nhà hàng 1998 coffee còn có một phòng tiệc dành cho gia đình dành 12 đến 24 người để tổ chức hội nghị, liên hoan sinh nhật và họp mặt công ty bạn bè … đem đến cho quý vị sự lựa chọn một không gian riêng cho buổi tiệc của mình.
Thực đơn với các món ăn ngon, mới lạ, đa dạng đã được khách hàng trong và ngoài nước tín nhiệm hơn nhiều năm nay. Được chế biến và bày trí tinh tế của các đầu bếp nổi tiếng của nhà hàng Nhà hàng 1998 coffee luôn mang đến những trải nghiệm đích thực về ẩm thực cùng cung cách phục vụ chuyên nghiệp, chu đáo dành cho quý khách khi đến với chúng tôi.
                    </p>
                    <p style="color:#ffffff;">
                        </br><b>Mọi chi tiết xin vui lòng liên hệ:</b>
                        </br><a style="font-size:25px;">1998 Coffee</a>
                        </br>Địa chỉ: <a style="color:#c49b63;">12, Nguyễn Văn Bảo, Phường 4, Q.Gò vấp, TP.HCM</a>
                        </br>Hotline: <a style="color:#c49b63;">+2 392 3929 210</a>
                        </br><a href="#"><span class="icon icon-envelope"></span><span class="text"> info@yourdomain.com</span></a>
                        </br></br><a style="color:#c49b63;" href="https://1998coffee.xyz">https://1998coffee.xyz</a> 
                    </p>
                    
                    
	  			</div>
  			</div>
    	</div>
    </section>

    <section class="ftco-section img" id="ftco-testimony" style="background-image: url(public/images/bg_1.jpg);"  data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
	    <div class="container">
	      <div class="row justify-content-center mb-5">
	        <div class="col-md-7 heading-section text-center ftco-animate">
	        	<span class="subheading">Phản hồi</span>
	          <h2 class="mb-4">Khách hàng nói</h2>
	          <p>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.</p>
	        </div>
	      </div>
	    </div>
	    <div class="container-wrap">
	      <div class="row d-flex no-gutters">
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Ngay cả Pointing toàn năng cũng không kiểm soát được các văn bản mù quáng, đó là một cuộc sống gần như không có thần thoại Một ngày dù nhỏ.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="public/images/person_4.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Ngay cả Pointing toàn năng cũng không kiểm soát được các văn bản mù mà nó gần như là một cuộc sống gần như không có thần thoại Một ngày nọ, một dòng văn bản mù nhỏ mang tên Lorem Ipsum quyết định rời đi Thế giới Ngữ pháp xa xôi.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="public/images/person_2.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Ngay cả Pointing toàn năng cũng không kiểm soát được các văn bản mù, nó là một cuộc sống gần như không có thần thoại Một ngày nào đó, một dòng văn bản mù nhỏ theo tên. &rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="public/images/person_3.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Ngay cả Pointing toàn năng cũng không kiểm soát được các văn bản mù quáng, đó là một cuộc sống gần như không có thần thoại..&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="public/images/person_2.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	            <blockquote>
	              <p>&ldquo;Ngay cả Pointing toàn năng cũng không kiểm soát được các văn bản mù, đó là một cuộc sống gần như không có thần thoại Một ngày nào đó, một dòng văn bản mù nhỏ theo tên. &rdquo;</p>
	            </blockquote>
	            <div class="author d-flex mt-4">
	              <div class="image mr-3 align-self-center">
	                <img src="public/images/person_3.jpg" alt="">
	              </div>
	              <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
    
    <!-- blog-->
    <!--<section class="ftco-section">-->
    <!--  <div class="container">-->
    <!--    <div class="row justify-content-center mb-5 pb-3">-->
    <!--      <div class="col-md-7 heading-section ftco-animate text-center">-->
    <!--        <h2 class="mb-4">Blog gần đây</h2>-->
    <!--        <p>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.</p>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--    <div class="row d-flex">-->
    <!--    	@foreach($blog as $m)-->
    <!--      <div class="col-md-4 d-flex ftco-animate">-->
    <!--        <div class="blog-entry align-self-stretch">-->
    <!--          <a href="{{ URL::route('blogdetail',$m->id)}}" class="block-20" style="background-image: url('public/images/{{$m->hinhanh}}');">-->
    <!--          </a>-->
    <!--          <div class="text py-4 d-block">-->
    <!--            <div class="meta">-->
    <!--              <div>{!!date('F j, Y, g:i a',strtotime($m->created_at))!!}</div>-->
    <!--              <div>{!!$m->nguoidang!!}</div>-->
    <!--              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>-->
    <!--            </div>-->
    <!--            <h3 class="heading mt-2"><a href="{{ URL::route('blogdetail',$m->id)}}">{!!$m->tenbaidang!!}</a></h3>-->
    <!--            <p>{!!$m->noidung!!}</p>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      @endforeach-->
    <!--    </div>-->
    <!--    {{ $blog->links()}}-->
    <!--  </div>-->
    <!--</section>-->
	<div id="map"></div>
	<!-- map va thong tin-->
	<!--<section class="ftco-appointment">-->
	<!--	<div class="overlay"></div>-->
 <!--   	<div class="container-wrap">-->
 <!--   		<div class="row no-gutters d-md-flex align-items-center">-->
 <!--   			<div class="col-md-6 d-flex align-self-stretch">-->
 <!--   				<div id="map"></div>-->
 <!--   			</div>-->
	<!--    		<div class="col-md-6 appointment ftco-animate">-->
	<!--    		    <div class="row">-->
	<!--				    <div class="col-md-12 mb-4">-->
 <!--           	            <h2 class="h4">Thông tin liên hệ</h2>-->
 <!--           	            </div>-->
 <!--           	            <div class="col-md-12 mb-3">-->
 <!--           	                <p><span>Address:</span> 12 Nguyễn Văn Bảo, Phường 4, Gò vấp, thành phố Hồ Chí Minh</p>-->
 <!--           	            </div>-->
 <!--           	            <div class="col-md-12 mb-3">-->
 <!--           	                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>-->
 <!--           	            </div>-->
 <!--           	            <div class="col-md-12 mb-3">-->
 <!--           	                <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>-->
 <!--           	            </div>-->
 <!--           	            <div class="col-md-12 mb-3">-->
 <!--           	                <p><span>Fanpage:</span> <a href="https://www.facebook.com/only1998Coffee">1998 coffee</a></p>-->
 <!--           	            </div>-->
	<!--					</div>-->
	    			<!--<h3 class="mb-3">Đặt bàn</h3>-->
	    			<!--<form action="{!! route('datban1') !!}" method="post" class="appointment-form">-->

        <!--      <input type = "hidden" name = "_token" value = "{{csrf_token()}} ">-->
	    			<!--	<div class="d-md-flex">-->
		    		<!--		<div class="form-group">-->
		    		<!--			<input type="text" class="form-control" placeholder="Họ & tên" name="ten" minlength="2" maxlength="100" required>-->
		    		<!--		</div>-->
		    		<!--		<div class="form-group ml-md-4">-->
		    		<!--			<input type="number" class="form-control" placeholder="số lượng người" name="soluong" min=1 max=10 required>-->
		    		<!--		</div>-->
	    			<!--	</div>-->
	    			<!--	<div class="d-md-flex">-->
		    		<!--		<div class="form-group">-->
		    		<!--			<div class="input-wrap">-->
		      <!--      		<div class="icon"><span class="ion-md-calendar"></span></div>-->
		      <!--      		<input type="text" class="form-control appointment_date" placeholder="Ngày đến" name="ngay" required>-->
	       <!--     		</div>-->
		    		<!--		</div>-->
		    		<!--		<div class="form-group ml-md-4">-->
		    		<!--			<div class="input-wrap">-->
		      <!--      		<div class="icon"><span class="ion-ios-clock"></span></div>-->
		      <!--      		<input type="text" class="form-control appointment_time" placeholder="Thờigian đến" name="thoigian" required>-->
	       <!--     		</div>-->
		    		<!--		</div>-->
		    		<!--		<div class="form-group ml-md-4">-->
		    		<!--			<input type="text" class="form-control" placeholder="Số điện thoại" name="dienthoai" minlength="10" maxlength="11" required>-->
		    		<!--		</div>-->
	    			<!--	</div>-->
	    			<!--	<div class="d-md-flex">-->
	    			<!--		<div class="form-group">-->
		      <!--        <textarea id="" cols="30" rows="2" class="form-control" placeholder="Tin nhắn" name="tinnhan" minlength="1" maxlength="1000" required></textarea>-->
		      <!--      </div>-->
		      <!--      <div class="form-group ml-md-4">-->
		      <!--        <input type="submit" value="Đặt bàn" name="subdatban" class="btn btn-white py-3 px-4">-->
		      <!--      </div>-->
	    			<!--	</div>-->
	    			<!--</form>-->
	<!--    		</div>    			-->
 <!--   		</div>-->
 <!--   	</div>-->
 <!--   </section>-->
@endsection

