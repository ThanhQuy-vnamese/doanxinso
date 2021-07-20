@extends('Frontend.layouts.index')

@section('content')
<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Giỏ hàng</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">trangchu</a></span> <span>giohang</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
	{!! csrf_field() !!}
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
    					<?php
    						$content = Cart::content();
    					?>
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Sản phẩm</th>
						        <th>Kích cỡ</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Tổng tiền</th>
						      </tr>
						    </thead>
						    <tbody>
							    @foreach($content as $value)
							      <tr class="text-center">
							        <td class="product-remove"><a href="{{ URL::route('deletecart',$value->rowId)}}"><span class="icon-close"></span></a></td>
	
							        <td class="image-prod"><div class="img" style="background-image:url(public/images/{{$value->options->image}});"></div></td>
	
							        <td class="product-name">
							        	<h3>{{$value->name}}</h3>
							        	<p>Xa, sau núi chữ, xa nước</p>
							        </td>
							        <td class="price">
							                {{$value->options->size}} 
							        </td>
							        <td class="price">{{$value->price}} VND
							        <input type="hidden" id="price" value="{{$value->price}}">
							        </td>
	
							        <td class="quantity">
							        	<div class="input-group mb-3">
							        		<input type="number" class="quantity form-control input-number qty" name="quantity" id="{{$value->rowId}}" value="{{$value->qty}}" min="1" max="100">
							        		<!--<input type="hidden" class="hiddenid" value="{{$value->rowId}}" id="hiddenid">-->
						          		</div>
						          	</td>
							        <td class="total">
							        <span class="giatri" style="color:#fff">
								        <?php
								        	$total = $value->qty * $value->price;
								        	echo $total;
								        ?>
								        VND
							        </span>
							        </td>
							      </tr>
							   @endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-4 col-md-6 mt-5 cart-wrap ftco-animate">
    			@if(Session::get('datbanorgiaohang'))
    			    <div class="cart-total mb-3">
    					@if(Cart::subtotal()!=0)
	    				<h3>Địa chỉ giao hàng</h3>
	    					<div class="row align-items-end">
				          		<div class="col-md-12">
				                <div class="form-group">
				                	<label for="firstname" style="color:yellow">Tỉnh/Thành phố</label>
				                  <select id="city" name="city" class="form-control city choose">
				                  	<option value=""></option>
			                        @foreach($city as $ci)
			                            <option value="{{$ci->matp}}">{{$ci->nametinhthanhpho}}</option>
			                        @endforeach
			                      </select>
				                  <label for="firstname" style="color:yellow">Quận/Huyện</label>
				                  <select id="province" name="province" class="form-control province choose">
				                  	<option value=""></option>
			                      </select>
				                  <label for="firstname" style="color:yellow">Xã,phường,thị trấn</label>
				                  <select id="wards" name="wards" class="form-control wards">
				                  	<option value=""></option>
			                      </select>
			                      <label style="color:yellow">Số nhà, đường</label>
	                  				<input type="text" name="housenumberstreet" class="form-control housenumberstreet" >
				                </div>
				              </div>
				             </div>
				             <div class="text-center">
								<div class="row">
									<div class="col-6">
										<input type="button" class="btn btn-primary py-3 px-4 addfeeship" id="addfeeship" value="Thêm"/>
									</div>
									<div class="col-6">
										<a href="{{ URL::route('unsetfeeship')}}"><span class="btn btn-primary py-3 px-4">Xóa</span></a>
									</div>
								</div>
				            </div>
				        @else
				        	<h3>Địa chỉ giao hàng</h3>
	    					<div class="row align-items-end">
				          		<div class="col-md-12">
				                <div class="form-group">
				                	<label for="firstname" style="color:yellow">Tỉnh/Thành phố</label>
				                  <select id="city" name="city" class="form-control city choose">
				                  	<option value=""></option>
			                        @foreach($city as $ci)
			                            <option value="{{$ci->matp}}">{{$ci->nametinhthanhpho}}</option>
			                        @endforeach
			                      </select>
				                  <label for="firstname" style="color:yellow">Quận/huyện</label>
				                  <select id="province" name="province" class="form-control province choose">
				                  	<option value=""></option>
			                      </select>
				                  <label for="firstname" style="color:yellow">Xã,phường,thị trấn</label>
				                  <select id="wards" name="wards" class="form-control wards">
				                  	<option value=""></option>
			                      </select>
				                </div>
				              </div>
				             </div>
				             <div class="text-center">
								<div class="row">
									<div class="col-6">
										<input type="button" class="btn btn-primary py-3 px-4 addfeeship" id="addfeeship" value="Thêm"/>
									</div>
									<div class="col-6">
										<a href="{{ URL::route('unsetfeeship')}}"><span class="btn btn-primary py-3 px-4">Xóa</span></a>
									</div>
								</div>
				            </div>
						@endif
    				</div>
    			@elseif(Session::get('giaohang'))
    			    <div class="cart-total mb-3">
    					@if(Cart::subtotal()!=0)
	    				<h3>Địa chỉ giao hàng</h3>
	    					<div class="row align-items-end">
				          		<div class="col-md-12">
				                <div class="form-group">
				                	<label for="firstname" style="color:yellow">Tỉnh/Thành phố</label>
				                  <select id="city" name="city" class="form-control city choose">
				                  	<option value=""></option>
			                        @foreach($city as $ci)
			                            <option value="{{$ci->matp}}">{{$ci->nametinhthanhpho}}</option>
			                        @endforeach
			                      </select>
				                  <label for="firstname" style="color:yellow">Quận/Huyện</label>
				                  <select id="province" name="province" class="form-control province choose">
				                  	<option value=""></option>
			                      </select>
				                  <label for="firstname" style="color:yellow">Xã,phường,thị trấn</label>
				                  <select id="wards" name="wards" class="form-control wards">
				                  	<option value=""></option>
			                      </select>
			                      <label style="color:yellow">Số nhà, đường</label>
	                  				<input type="text" name="housenumberstreet" class="form-control housenumberstreet" >
				                </div>
				              </div>
				             </div>
				             <div class="text-center">
								<div class="row">
									<div class="col-6">
										<input type="button" class="btn btn-primary py-3 px-4 addfeeship" id="addfeeship" value="Thêm"/>
									</div>
									<div class="col-6">
										<a href="{{ URL::route('unsetfeeship')}}"><span class="btn btn-primary py-3 px-4">Xóa</span></a>
									</div>
								</div>
				            </div>
				        @else
				        	<h3>Delivery</h3>
	    					<div class="row align-items-end">
				          		<div class="col-md-12">
				                <div class="form-group">
				                	<label for="firstname" style="color:yellow">Tỉnh/Thành phố</label>
				                  <select id="city" name="city" class="form-control city choose">
				                  	<option value=""></option>
			                        @foreach($city as $ci)
			                            <option value="{{$ci->matp}}">{{$ci->nametinhthanhpho}}</option>
			                        @endforeach
			                      </select>
				                  <label for="firstname" style="color:yellow">Quận/huyện</label>
				                  <select id="province" name="province" class="form-control province choose">
				                  	<option value=""></option>
			                      </select>
				                  <label for="firstname" style="color:yellow">Xã,phường,thị trấn</label>
				                  <select id="wards" name="wards" class="form-control wards">
				                  	<option value=""></option>
			                      </select>
				                </div>
				              </div>
				             </div>
				             <div class="text-center">
								<div class="row">
									<div class="col-6">
										<input type="button" class="btn btn-primary py-3 px-4 addfeeship" id="addfeeship" value="Thêm"/>
									</div>
									<div class="col-6">
										<a href="{{ URL::route('unsetfeeship')}}"><span class="btn btn-primary py-3 px-4">Xóa</span></a>
									</div>
								</div>
				            </div>
						@endif
    				</div>
    		    @endif
    				<div class="cart-total mb-3">
    					@if(Cart::subtotal()!=0)
	    				<h3>Mã giảm giá</h3>
	    					<p class="d-flex">
	    						<span style="color:yellow">Nhập mã giảm giá</span>
	    						<span><input type="text" class="form-control" name="discount" id="discount" min="1" max="100"></span>
	    					</p>
							<div class="text-center">
								<div class="row">
									<div class="col-6">
										<input type="button" id="submitdiscount" value="Thêm" class="btn btn-primary py-3 px-4">
									</div>
									<div class="col-6">
										<a href="{{ URL::route('unsetcoupon')}}"><span class="btn btn-primary py-3 px-4">Xóa mã</span></a>
									</div>
								</div>
				            </div>
						@else
						<?php
							Session::forget('coupon');
						?>
		    					<h3>Mã giảm giá</h3>
		    					<p class="d-flex">
		    						<span style="color:yellow">Nhập mã giảm giá</span>
		    						<span><input type="text" class="form-control" name="discount" id="discount" min="1" max="100"></span>
		    					</p>
								<div class="text-center">
					              <input type="submit" value="Thêm" class="btn btn-primary py-3 px-4">
					       	</div>
						@endif
    				</div>
    			</div>
    			
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng giỏ hàng</h3>
    					<p class="d-flex">
    						<span>Tạm tính</span>
    						<span>
    						        <?php
				    						echo (int)Cart::subtotal()*1000;
				    				?>
				    				VND
				    		</span>
    					</p>
    					@if(Session::get('feeship'))
	    					<p class="d-flex">
	    						<span>Phí ship</span>
	    						<span>
	    							{{Session::get('feeship')}} VND
	    						</span>
	    					</p>
    					@endif
    					@if(Session::get('feeship'))
	    					<p class="d-flex">
	    						<span>Địa chỉ giao hàng</span>
	    						<span>
	    							{{Session::get('housenumberstreet')}}, {{Session::get('xaphuong')}}, {{Session::get('quanhuyen')}}, {{Session::get('thanhpho')}}
	    						</span>
	    					</p>
    					@endif
    					<p class="d-flex">
    						<span>Mã giảm</span>
    						<span>
    							@if(Session::get('coupon'))
    								@foreach(Session::get('coupon') as $key => $cou)
    									@if($cou['tinhnangma']=="giamtheophantram")
    										{{$cou['magiam']}}
    									@endif	
    								@endforeach
    							@else
    							Không có	
    							@endif
    						</span>
    					</p>
    					<p class="d-flex">
    						<span>Giảm</span>
    						<span>
    							@if(Session::get('coupon'))
    								@foreach(Session::get('coupon') as $key => $cou)
    									@if($cou['tinhnangma']=="giamtheophantram")
    										{{$cou['soluong']}}%
    									@else
    										{{$cou['soluong']}} VND
    									@endif	
    								@endforeach
    							@else
    							Không có
    							@endif
    						</span>
    					</p>
    					<p class="d-flex">
    						<span>Tổng giảm</span>
    						<span>
    							@if(Session::get('coupon'))
    								@foreach(Session::get('coupon') as $key => $cou)
    									@if($cou['tinhnangma']=="giamtheophantram")
    									<?php
    										$total = (int)Cart::subtotal()*1000;;
    										$discount = ($total*$cou['soluong'])/100;
    										echo $discount;
    									?>
    									@else
    										{{$cou['soluong']}}
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
			    								@else
			    									<?php
			    										$total = (int)Cart::subtotal()*1000;
			    										$discount = ($total*$cou['soluong'])/100;
			    										$subtotal = $total-$discount;
			    										echo $subtotal;
			    									?>
			    								@endif
		    								@else
		    									@if(Session::get('feeship'))
			    									<?php
			    										$total = (int)Cart::subtotal()*1000;
			    										$subtotal = $total-$cou['soluong']+Session::get('feeship');
			    										echo $subtotal;
			    									?>
			    								@else
			    									<?php
			    										$total = (int)Cart::subtotal()*1000;
			    										$subtotal = $total-$cou['soluong'];
			    										echo $subtotal;
			    									?>
			    								@endif
	    									@endif
    								@endforeach
    							@else
	    							@if(Session::get('feeship'))
			    							<?php
				    							$total = (int)Cart::subtotal()*1000+Session::get('feeship');
				    							echo $total;
				    						?>
				    				@else
				    					<?php
				    						$total = (int)Cart::subtotal()*1000;
				    						echo $total;
				    					?>
				    				@endif
    							@endif
    							VND
    						</span>
    					</p>
    				</div>
    				@if(Cart::subtotal()!=0)
    				    @if(Session::get('giaohang'))
    				        <p class="text-center"><a href="{{ URL::route('shopgiaohang')}}" class="btn btn-primary py-3 px-4 btncash">Đặt thêm món</a></p>
		    				<p class="text-center"><a href="{{ URL::route('delivery')}}" class="btn btn-primary py-3 px-4 btncash">Giao hàng</a></p>
		    			@elseif(Session::get('datban'))
		    			    <p class="text-center"><a href="{{ URL::route('shopdatban')}}" class="btn btn-primary py-3 px-4 btncash">Đặt thêm món</a></p>
		    				<p class="text-center"><a href="{{ URL::route('reservation')}}" class="btn btn-primary py-3 px-4 btncash">Đặt bàn</a></p>
		    			@elseif(Session::get('datbanorgiaohang'))
		    			    <p class="text-center"><a href="{{ URL::route('delivery')}}" class="btn btn-primary py-3 px-4 btncash">Giao hàng</a></p>
		    			    <p class="text-center"><a href="{{ URL::route('reservation')}}" class="btn btn-primary py-3 px-4 btncash">Đặt bàn</a></p>
		    			@endif
    				@else
    						<p class="text-center"><a href="#" class="btn btn-primary py-3 px-4 btncash">Giao hàng</a></p>
		    				<p class="text-center"><a href="#" class="btn btn-primary py-3 px-4 btncash">Đặt bàn</a></p>
    				@endif
    			</div>
    		</div>
		</div>
	</section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Khám phá</span>
            <h2 class="mb-4">Thức uống Coffee</h2>
            <p>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.</p>
          </div>
        </div>
        <div class="row">
        	@foreach($cart as $s)
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
    						<p>{{$s->mota}}</p>
    						<p class="price"><span>${{$s->gia}}</span></p>
    						<p><a href="{{ URL::route('singleproduct',$s->id)}}" class="btn btn-primary btn-outline-primary">Xem chi tiết</a></p>
    					</div>
    				</div>
        	</div>
        	@endforeach
        </div>
        <div class="row mt-5">
			    <div class="col text-center">
			        <div class="block-27">
			        {{ $cart->links()}}
			        </div>
    			</div>
				</div>
    	</div>
    </section>
@endsection

@section('script')
<script language="javascript">
    $(document).ready(function(){
    	$(".choose").on('change',function(){
    		var action = $(this).attr('id');
    	  var maid = $(this).val();
    	  var result = '';
    	  var _token = $('input[name="_token"]').val();
    	  if(action=='city')
    	  {
    	    result = 'province';
    	  }
    	  else
    	  {
    	    result = 'wards';
    	  }
    	  $.ajax({
    			type:'POST',
    			url:"{{ route('selectdeliveryforcash') }}",
    			data:{
    				action:action,maid:maid,_token:_token
    			},
    			success:function(data){
              		$('#'+result).html(data);
              }
    		});
    	 
    	});
    	
    	$(".addfeeship").click(function(){
	    	var city = $('.city').val();
    		var province = $('.province').val();
    		var wards = $('.wards').val();
    		var housenumberstreet = $('.housenumberstreet').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(city);
    		// alert(province);
    		// alert(wards);
    		// alert(_token);
	      if(city == '' && province=='' && wards=='')
	      {
	      	alert('Bạn chưa chọn vận chuyển!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('calculatefeeship') }}",
	    			data:{
	    				city:city,province:province,wards:wards,_token:_token,housenumberstreet:housenumberstreet
	    			},
	    			success:function(data){
	              		location.reload();
	              }
	    		});
	      }
	    });
	    
	    $("#submitdiscount").click(function(){
	    	var discount = $('#discount').val();
    		var _token = $('input[name="_token"]').val();
	      if(discount == '')
	      {
	      	alert('Bạn chưa nhập mã giảm giá!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('updatediscountproduct') }}",
	    			data:{
	    				discount:discount,_token:_token
	    			},
	    			success:function(data){
	              		location.reload();
	              }
	    		});
	      }
	    });
    	
    	$('.qty').change(function(){
    		var id = $(this).attr('id');
    		var qty = $(this).val();
    		var _token = $('input[name="_token"]').val();
    		// alert(id);
    		// alert(qty);
    		// alert(_token);
    		$.ajax({
    			type:'POST',
    			cache: false,
    			url:"{{ route('updateqtyproduct') }}",
    			data:{
    				id:id,_token:_token,qty:qty
    			},
    			success:function(data){
               		location.reload();
               }
    		});
    	});
    	
    });
</script>
@endsection
