@extends('Frontend.layouts.index')

@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image:url({{ URL::to('/') }}/public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Đặt bàn</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ URL::route('home')}}">Home</a></span> <span>datban</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <input type = "hidden" name = "_token" value = "{{csrf_token()}} ">
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 ftco-animate">
              	@if(Auth::check())
              	<?php
              		$user = Auth::user();
              	?>
    				<form action="" method="post">
    				<div class="billing-form ftco-bg-dark p-3 p-md-5">
    				<h3 class="mb-4 billing-heading">Thông tin đặt bàn</h3>
        	          	<div class="row align-items-end">
        	          	    
            	          	<div class="col-md-6">
            	                <div class="form-group">
            	                	<label for="firstname">Họ và tên</label>
            	                  <input type="text" class="form-control" required placeholder="" name="ten" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('firstname')}} {{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('lastname')}}">
            	                </div>
            	            </div>
            	            
            	            <div class="col-md-6">
            	                <div class="form-group">
            	                	<label for="emailaddress">Email</label>
            	                    <input type="text" class="form-control" name="email" required placeholder="" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('email')}}">
            	                </div>
                            </div>
            	              
                            <div class="w-100"></div>
                            
                            <div class="col-md-6">
            		            <div class="form-group">
            		            	<label for="postcodezip">Mã bưu điện / ZIP *</label>
            	                    <input type="text" class="form-control" name="zipcode" required placeholder="">
            	                </div>
            		        </div>
                            
                            <div class="col-md-6">
            	                <div class="form-group">
            	                	<label for="phone">Số điện thoại</label>
            	                    <input type="text" class="form-control" name="dienthoai" required placeholder="" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('sdt')}}" minlength="10" maxlength="11">
            	                </div>
            	            </div>
            	            
            	            <div class="w-100"></div>
            		        
            		        <div class="col-md-6">
            		            <div class="form-group">
            		            	<label>Ngày đặt</label>
            	                    <div class="input-wrap">
            		            		<div class="icon"><span class="ion-md-calendar"></span></div>
            		            		<input type="text" class="form-control appointment_date" placeholder="Ngày" value="{{$dt->format('d/m/Y')}}" disabled>
            	            		</div>
            	                </div>
            		        </div>
                            
                            <div class="col-md-6">
            	                <div class="form-group">
            	                	<label>Thời gian đặt</label>
            	                    <div class="input-wrap">
            		            		<div class="icon"><span class="ion-ios-clock"></span></div>
            		            		<input type="text" class="form-control appointment_time" placeholder="Thời gian" value="{{$dt->toTimeString()}}" disabled>
            	            		</div>
            	                </div>
            	            </div>
            		        
            		        <div class="w-100"></div>
            		        
            		        <div class="col-md-6">
            		            <div class="form-group">
            		            	<label>Ngày đến</label>
            		            	<div class="loingay" style="color:red;"></div>
            	                    <div class="input-wrap">
            		            		<div class="icon"><span class="ion-md-calendar"></span></div>
            		            		<input type="text" class="form-control appointment_date date" required placeholder="Ngày" name="ngay" required>
            	            		</div>
            	                </div>
            		        </div>
                            
                            <div class="col-md-6">
            	                <div class="form-group">
            	                	<label>Thời gian đến</label>
            	                	<div class="loithoigian" style="color:red;"></div>
            	                    <div class="input-wrap">
            		            		<div class="icon"><span class="ion-ios-clock"></span></div>
            		            		<input type="text" class="form-control appointment_time time" placeholder="Thời gian" name="thoigian" required >
            	            		</div>
            	                </div>
            	            </div>
            	            
            	            <div class="w-100"></div>
            		        
            		        <div class="col-md-4">
            	                <div class="form-group">
            	                	<label>Số người</label>
            	                    <input type="number" class="form-control songuoi" name="songuoi" id="songuoi" min=1 max=8 required>
            	                </div>
            	            </div>
            		        
            	            <div class="col-md-4">
            	                <div class="form-group">
            	                	<label>Số bàn đặt</label>
            	                	<div class="soban">
            	                	    <input type="text" class="form-control" disabled>
            	                	</div>
            	                </div>
            	            </div>
            	            
            	            <div class="col-md-4">
            	                <div class="form-group">
            	                	<label>Loại bàn</label>
            	                    <select class="form-control loaiban" name="loaiban" id="loaiban" required>
            	                       @foreach($phongnhahang as $phong)
            	                            @if($phong->soluong)
            	                                @if($phong->tenphong=="Bàn thường")
            	                                    <option style="color:black;" value="{{$phong->tenphong}}">{{$phong->tenphong}}-50000VND</option>
            	                                @else
            	                                    <option style="color:black;" value="{{$phong->tenphong}}">{{$phong->tenphong}}-{{$phong->tienphong}}VND</option>
            	                                @endif
            	                                
            	                            @endif
            	                       @endforeach
                                    </select>
            	                </div>
            	            </div>
            		        
            		        <div class="w-100"></div>
            		        
            		        <div class="col-md-12">
            		            <div class="form-group">
            		            	<label for="country">Tin nhắn</label>
            		            	<textarea name="message" rows="8" class="form-control" required/></textarea/>
            		            </div>
            		        </div>
                            
        	            </div>
    	            </div>
    	            <div class="row mt-5 pt-3 d-flex">
    	          	<div class="col-md-6 d-flex">
    	          		<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
    	          			<h3 class="billing-heading mb-4">Tổng hóa đơn</h3>
    	          			<p class="d-flex">
    		    						<span>Tạm tính</span>
    		    						<span>
    		    						    <a class="tienloaiban">0</a>
        				    				VND
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
    		    										echo number_format($discount,2);
    		    									?>
    		    									@else
    		    										{{number_format($cou['soluong'],2)}}
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
    		    						    <a class="tienloaiban">0</a>
    			    					VND
    			    					@if(Session::get('tong'))
    			    						<input type="hidden" name="tongtien1" value="{{Session::get('tong')}}"/>
    			    					@endif
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
    											   <label><input type="radio" name="optradio" class="mr-2" value="VNPay" required>VNPay</label>
    											</div>
    										</div>
    									</div>
    									<p><input type="submit" class="btn btn-primary py-3 px-4" value="Đặt bàn"></p>
    								</div>
    	          	</div>
    	          </div>
    	          </form><!-- END -->
    	       @else
    	            <form action="" method="post">
    				<div class="billing-form ftco-bg-dark p-3 p-md-5">
    				<h3 class="mb-4 billing-heading">Thông tin đặt bàn</h3>
        	          	<div class="row align-items-end">
        	          	    
            	          	<div class="col-md-6">
            	                <div class="form-group">
            	                	<label for="firstname">Họ và tên</label>
            	                  <input type="text" class="form-control" required placeholder="" name="ten" value="">
            	                </div>
            	            </div>
            	            
            	            <div class="col-md-6">
            	                <div class="form-group">
            	                	<label for="emailaddress">Email</label>
            	                    <input type="text" class="form-control" name="email" required placeholder="" value="">
            	                </div>
                            </div>
            	              
                            <div class="w-100"></div>
                            
                            <div class="col-md-6">
            		            <div class="form-group">
            		            	<label for="postcodezip">Mã bưu điện / ZIP *</label>
            	                    <input type="text" class="form-control" name="zipcode" required placeholder="">
            	                </div>
            		        </div>
                            
                            <div class="col-md-6">
            	                <div class="form-group">
            	                	<label for="phone">Số điện thoại</label>
            	                    <input type="text" class="form-control" name="dienthoai" required placeholder="" value="" minlength="10" maxlength="11">
            	                </div>
            	            </div>
            	            
            	            <div class="w-100"></div>
            		        
            		        <div class="col-md-6">
            		            <div class="form-group">
            		            	<label>Ngày đặt</label>
            	                    <div class="input-wrap">
            		            		<div class="icon"><span class="ion-md-calendar"></span></div>
            		            		<input type="text" class="form-control appointment_date" placeholder="Ngày" value="{{$dt->format('d/m/Y')}}" disabled>
            	            		</div>
            	                </div>
            		        </div>
                            
                            <div class="col-md-6">
            	                <div class="form-group">
            	                	<label>Thời gian đặt</label>
            	                    <div class="input-wrap">
            		            		<div class="icon"><span class="ion-ios-clock"></span></div>
            		            		<input type="text" class="form-control appointment_time" placeholder="Thời gian" value="{{$dt->toTimeString()}}" disabled>
            	            		</div>
            	                </div>
            	            </div>
            		        
            		        <div class="w-100"></div>
            		        
            		        <div class="col-md-6">
            		            <div class="form-group">
            		            	<label>Ngày đến</label>
            		            	<div class="loingay" style="color:red;"></div>
            	                    <div class="input-wrap">
            		            		<div class="icon"><span class="ion-md-calendar"></span></div>
            		            		<input type="text" class="form-control appointment_date date" required placeholder="Ngày" name="ngay" required>
            	            		</div>
            	                </div>
            		        </div>
                            
                            <div class="col-md-6">
            	                <div class="form-group">
            	                	<label>Thời gian đến</label>
            	                	<div class="loithoigian" style="color:red;"></div>
            	                    <div class="input-wrap">
            		            		<div class="icon"><span class="ion-ios-clock"></span></div>
            		            		<input type="text" class="form-control appointment_time time" placeholder="Thời gian" name="thoigian" required >
            	            		</div>
            	                </div>
            	            </div>
            	            
            	            <div class="w-100"></div>
            		        
            		        <div class="col-md-4">
            	                <div class="form-group">
            	                	<label>Số người</label>
            	                    <input type="number" class="form-control songuoi" name="songuoi" id="songuoi" min=1 max=8 required>
            	                </div>
            	            </div>
            		        
            	            <div class="col-md-4">
            	                <div class="form-group">
            	                	<label>Số bàn đặt</label>
            	                	<div class="soban">
            	                	    <input type="text" class="form-control" disabled>
            	                	</div>
            	                </div>
            	            </div>
            	            
            	            <div class="col-md-4">
            	                <div class="form-group">
            	                	<label>Loại bàn</label>
            	                    <select class="form-control loaiban" name="loaiban" id="loaiban" required>
            	                       @foreach($phongnhahang as $phong)
            	                            @if($phong->soluong)
            	                                @if($phong->tenphong=="Bàn thường")
            	                                    <option style="color:black;" value="{{$phong->tenphong}}">{{$phong->tenphong}}-50000VND</option>
            	                                @else
            	                                    <option style="color:black;" value="{{$phong->tenphong}}">{{$phong->tenphong}}-{{$phong->tienphong}}VND</option>
            	                                @endif
            	                            @endif
            	                       @endforeach
                                    </select>
            	                </div>
            	            </div>
            		        
            		        <div class="w-100"></div>
            		        
            		        <div class="col-md-12">
            		            <div class="form-group">
            		            	<label for="country">Tin nhắn</label>
            		            	<textarea name="message" rows="8" class="form-control" required/></textarea/>
            		            </div>
            		        </div>
                            
        	            </div>
    	            </div>
    	            <div class="row mt-5 pt-3 d-flex">
    	          	<div class="col-md-6 d-flex">
    	          		<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
    	          			<h3 class="billing-heading mb-4">Tổng hóa đơn</h3>
    	          			<p class="d-flex">
    		    						<span>Tạm tính</span>
    		    						<span>
    		    						    <a class="tienloaiban">0</a>
        				    				VND
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
    		    										echo number_format($discount,2);
    		    									?>
    		    									@else
    		    										{{number_format($cou['soluong'],2)}}
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
    		    						    <a class="tienloaiban">0</a>
    			    					VND
    			    					@if(Session::get('tong'))
    			    						<input type="hidden" name="tongtien1" value="{{Session::get('tong')}}"/>
    			    					@endif
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
    											   <label><input type="radio" name="optradio" class="mr-2" value="VNPay" required>VNPay</label>
    											</div>
    										</div>
    									</div>
    									<p><input type="submit" class="btn btn-primary py-3 px-4" value="Đật bàn"></p>
    								</div>
    	          	</div>
    	          </div>
    	          </form><!-- END -->
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

@section('script')
<script language="javascript">
    $(document).ready(function(){
    	
    	$('.songuoi').change(function(){
    		var songuoi = $(this).val();
    		var _token = $('input[name="_token"]').val();
    // 		alert(songuoi);
    // 		alert(_token);
    		$.ajax({
    			type:'POST',
    			cache: false,
    			url:"{{ route('numberoftable') }}",
    			data:{
    				_token:_token,songuoi:songuoi
    			},
    			success:function(data){
              		$('.soban').html(data);
              }
    		});
    	});
    	
    	$('.date').change(function(){
    		var ngay = $('input[name="ngay"]:text').val();
    		var _token = $('input[name="_token"]').val();
    		
    // 		alert(ngay);
    // 		alert(_token);
    		$.ajax({
    			type:'POST',
    			cache: false,
    			url:"{{ route('kiemtrangaycheckout') }}",
    			data:{
    				_token:_token,ngay:ngay
    			},
    			success:function(data){
              		$('.loingay').html(data);
              }
    		});
    	});
    	
    	$('.time').change(function(){
    		var thoigian = $('input[name="thoigian"]:text').val();
    		var _token = $('input[name="_token"]').val();
    		var ngay = $('input[name="ngay"]:text').val();
    // 		alert(ngay);
    // 		alert(_token);
    		$.ajax({
    			type:'POST',
    			cache: false,
    			url:"{{ route('kiemtrathoigiancheckout') }}",
    			data:{
    				_token:_token,thoigian:thoigian,ngay:ngay
    			},
    			success:function(data){
              		$('.loithoigian').html(data);
              }
    		});
    	});
    	
    	$(".loaiban").on('change',function(){
    		var loaiban = $(this).val();
    		var ngay = $('input[name="ngay"]:text').val();
    		var _token = $('input[name="_token"]').val();
    // 		alert(loaiban);
    // 		alert(_token);
    		$.ajax({
    			type:'POST',
    			cache: false,
    			url:"{{ route('tienloaiban') }}",
    			data:{
    				_token:_token,ngay:ngay,loaiban:loaiban
    			},
    			success:function(data){
              		$('.tienloaiban').html(data);
              }
    		});
    	});
    	
    	$('.new').click(function(){
    		window.location = "{{route('datbanmoi')}}";
    	});
    	
    	
    	
    });
</script>
@endsection
