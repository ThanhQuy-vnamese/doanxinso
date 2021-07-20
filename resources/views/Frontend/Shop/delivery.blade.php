@extends('Frontend.layouts.index')

@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image:url({{ URL::to('/') }}/public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Giao hàng</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ URL::route('home')}}">trangchu</a></span> <span>giaohang</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 ftco-animate">
          	@if(Auth::check())
          	<?php
          		$user = Auth::user();
          	?>
						<form action="" method="post">
							<input type = "hidden" name = "_token" value = "{{csrf_token()}} ">
							<div class="billing-form ftco-bg-dark p-3 p-md-5">
							<h3 class="mb-4 billing-heading">Thông tin giao hàng</h3>
	          	<div class="row align-items-end">
	          	    @if(DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('fullname'))
	          	        <div class="col-md-12">
        	                <div class="form-group">
        	                	<label for="firstname">Họ & tên</label>
        	                  <input type="text" class="form-control" placeholder="" required name="tendaydu" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('fullname')}}">
        	                </div>
    	              </div>
	          	    @else
        	           <input type="hidden" class="form-control" placeholder="" required name="tendaydu" value="">
	          	        <div class="col-md-6">
        	                <div class="form-group">
        	                	<label for="firstname">Họ & tên lót</label>
        	                    <input type="text" class="form-control" placeholder="" required name="tendau" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('firstname')}}">
        	                </div>
    	                </div>
        	            <div class="col-md-6">
        	                <div class="form-group">
        	                	<label for="lastname">Tên</label>
        	                    <input type="text" class="form-control" placeholder="" required name="tencuoi" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('lastname')}}">
        	                </div>
                        </div>
	          	    @endif
	          		
                <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Địa chỉ</label>
	                  <input type="text" class="form-control" placeholder="Your Address" required name="diachi" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('diachi')}}">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" class="form-control" name="congty" placeholder="Công ty, phòng, căn hộ, v.v.: (tùy chọn)">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Thành phố / thị trấn</label>
	                  <input type="text" class="form-control" name="thanhpho" placeholder="" required>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Mã bưu điện / Zip *</label>
	                  <input type="text" class="form-control" name="zipcode" placeholder="" required>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Số điện thoại</label>
	                  <input type="text" class="form-control" name="dienthoai" placeholder="" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('sdt')}}" required minlength="10" maxlength="11">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="text" class="form-control" name="email" placeholder="" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('email')}}" required>
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Ghi chú đơn hàng</label>
		            		<textarea name="message" rows="8" class="form-control" required/></textarea/>
		            	</div>
		            </div>
	            </div>
	            </div>
	            <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Chi tiết thanh toán</h3>
	          			<p class="d-flex">
		    						<span>Tạm tính</span>
		    						<span>
		    						        <?php
        				    						echo (int)Cart::subtotal()*1000;
        				    				?>
        				    				VND
		    						</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Phí vận chuyển</span>
		    						<span>
		    						    {{number_format(Session::get('feeship'))}} VND
		    						</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Giao hàng đến</span>
		    						<span>
		    							{{Session::get('housenumberstreet')}}, {{Session::get('xaphuong')}}, {{Session::get('quanhuyen')}}, {{Session::get('thanhpho')}}
		    							<input type="hidden" name="shippingto" value="{{Session::get('housenumberstreet')}}, {{Session::get('xaphuong')}}, {{Session::get('quanhuyen')}}, {{Session::get('thanhpho')}}"/>
		    						</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Giảm giá</span>
		    						<span>
		    							@if(Session::get('coupon'))
		    								@foreach(Session::get('coupon') as $key => $cou)
		    									@if($cou['tinhnangma']=="giamtheophantram")
		    									<?php
		    										$total = (int)Cart::subtotal()*1000;
		    										$discount = ($total*$cou['soluong'])/100;
		    										echo number_format($discount);
		    									?>
		    									@else
		    										{{number_format($cou['soluong'])}}
		    									@endif
		    								@endforeach
		    							@else
		    								0
		    							@endif
		    							VND
		    						</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Thanh toán</span>
		    						<span>
		    							@if(Session::get('coupon'))
			    								@foreach(Session::get('coupon') as $key => $cou)
				    									@if($cou['tinhnangma']=="giamtheophantram")
				    										@if(Session::get('feeship'))
						    									<?php
						    										$total = (int)Cart::subtotal()*1000;
						    										$discount = ($total*$cou['soluong'])/100;
						    										$subtotal = $total-$discount+Session::get('feeship');
						    										echo $subtotal;
						    									?>
						    									<input type="hidden" name="tongtien" value="<?php
						    										$total = (int)Cart::subtotal()*1000;
						    										$discount = ($total*$cou['soluong'])/100;
						    										$subtotal = $total-$discount+Session::get('feeship');
						    										echo $subtotal;
						    									?>"/>
						    								@else
						    									<?php
						    										$total = (int)Cart::subtotal()*1000;
						    										$discount = ($total*$cou['soluong'])/100;
						    										$subtotal = $total-$discount;
						    										echo $subtotal;
						    									?>
						    									<input type="hidden" name="tongtien" value="<?php
						    										$total = (int)Cart::subtotal()*1000;
						    										$discount = ($total*$cou['soluong'])/100;
						    										$subtotal = $total-$discount;
						    										echo $subtotal;
						    									?>"/>
						    								@endif
					    								@else
					    									@if(Session::get('feeship'))
						    									<?php
						    										$total = (int)Cart::subtotal()*1000;
						    										$subtotal = $total-$cou['soluong']+Session::get('feeship');
						    										echo $subtotal;
						    									?>
						    									<input type="hidden" name="tongtien" value="<?php
						    										$total = (int)Cart::subtotal()*1000;
						    										$subtotal = $total-$cou['soluong']+Session::get('feeship');
						    										echo $subtotal;
						    									?>"/>
						    								@else
						    									<?php
						    										$total = (int)Cart::subtotal()*1000;
						    										$subtotal = $total-$cou['soluong'];
						    										echo $subtotal;
						    									?>
						    									<input type="hidden" name="tongtien" value="<?php
						    										$total = (int)Cart::subtotal()*1000;
						    										$subtotal = $total-$cou['soluong'];
						    										echo $subtotal;
						    									?>"/>
						    								@endif
				    									@endif
			    								@endforeach
			    							@else
				    							@if(Session::get('feeship'))
						    							<?php
							    							$total = (int)Cart::subtotal()*1000;
							    							$subtotal = $total+Session::get('feeship');
							    							echo $subtotal;
							    						?>
							    						<input type="hidden" name="tongtien" value="<?php
							    							$total = (int)Cart::subtotal()*1000;
							    							$subtotal = $total+Session::get('feeship');
							    							echo $subtotal;
							    						?>"/>
							    				@else
							    					<?php
							    						$total = (int)Cart::subtotal()*1000;
							    						echo $total;
							    					?>
							    					<input type="hidden" name="tongtien" value="<?php
							    						$total = (int)Cart::subtotal()*1000;
							    						echo $total;
							    					?>"/>
							    				@endif
			    							@endif
			    							VND
		    						</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail ftco-bg-dark p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2" value="Payment after arrival of goods">Thanh toán khi nhận hàng</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2" value="VNPay"> VNPay</label>
											</div>
										</div>
									</div>
									<p><input type="submit" class="btn btn-primary py-3 px-4" value="Giao hàng"></p>
								</div>
	          	</div>
	          </div>
	          </form>
	          @endif
	          
	          <script>
	          	function onButton()
              {
                 document.location.href="{!! route('dangnhapforcheckout'); !!}";       
              }
	          </script>
          </div> <!-- .col-md-8 -->




          <div class="col-xl-4 sidebar ftco-animate">
            <!--<div class="sidebar-box">-->
            <!--  <form action="#" class="search-form">-->
            <!--    <div class="form-group">-->
            <!--    	<div class="icon">-->
	           <!--       <span class="icon-search"></span>-->
            <!--      </div>-->
            <!--      <input type="text" class="form-control" placeholder="Search...">-->
            <!--    </div>-->
            <!--  </form>-->
            <!--</div>-->
            <!--<div class="sidebar-box ftco-animate">-->
            <!--  <div class="categories">-->
            <!--    <h3>Categories</h3>-->
            <!--    <li><a href="#">Tour <span>(12)</span></a></li>-->
            <!--    <li><a href="#">Hotel <span>(22)</span></a></li>-->
            <!--    <li><a href="#">Coffee <span>(37)</span></a></li>-->
            <!--    <li><a href="#">Drinks <span>(42)</span></a></li>-->
            <!--    <li><a href="#">Foods <span>(14)</span></a></li>-->
            <!--    <li><a href="#">Travel <span>(140)</span></a></li>-->
            <!--  </div>-->
            <!--</div>-->

            <div class="sidebar-box ftco-animate">
              <h3>Tin tức mới nhất</h3>
              @foreach($recentblog as $n)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(public/images/{{$n->hinhanh}});"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">{{$n->tenbaidang}}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {!!date('F j, Y, g:i a',strtotime($n->created_at))!!}</a></div>
                    <div><a href="#"><span class="icon-person"></span> {{$n->nguoidang}}</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <!--<div class="sidebar-box ftco-animate">-->
            <!--  <h3>Tag Cloud</h3>-->
            <!--  <div class="tagcloud">-->
            <!--    <a href="#" class="tag-cloud-link">dish</a>-->
            <!--    <a href="#" class="tag-cloud-link">menu</a>-->
            <!--    <a href="#" class="tag-cloud-link">food</a>-->
            <!--    <a href="#" class="tag-cloud-link">sweet</a>-->
            <!--    <a href="#" class="tag-cloud-link">tasty</a>-->
            <!--    <a href="#" class="tag-cloud-link">delicious</a>-->
            <!--    <a href="#" class="tag-cloud-link">desserts</a>-->
            <!--    <a href="#" class="tag-cloud-link">drinks</a>-->
            <!--  </div>-->
            <!--</div>-->

            <!--<div class="sidebar-box ftco-animate">-->
            <!--  <h3>Paragraph</h3>-->
            <!--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>-->
            <!--</div>-->
          </div>

        </div>
      </div>
    </section> <!-- .section -->
    
@endsection