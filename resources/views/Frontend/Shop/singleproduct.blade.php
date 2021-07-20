@extends('Frontend.layouts.index')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url({{ URL::to('/') }}/public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Chi tiết sản phẩm</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">trangchu</a></span> <span>chitietsanpham</span></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">

    				<a href="{{URL::to('/') }}/public/images/{{$detailproduct->hinhanh}}" class="image-popup"><img src="{{URL::to('/') }}/public/images/{{$detailproduct->hinhanh}}" class="img-fluid" alt="{{$detailproduct->tenmonan}}"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$detailproduct->tenmonan}}</h3>
    				<p class="price"><span>
    					@if($detailproduct->khuyenmai>0)
	    					{{$detailproduct->khuyenmai}} VND
	    				@else
	    					{{$detailproduct->gia}} VND
	    				@endif
    				</span></p>
    				<p>{{$detailproduct->mota}}</p>
    				<p>{{$detailproduct->motachitiet}}</p>
						<form action="{!!route('savecart')!!}" method="post">
							{{csrf_field()}}
							<div class="row mt-4">
							    @if($detailproduct->theloai=="Drinks" || $detailproduct->theloai=="Coffee")
    								<div class="col-md-6">
    									<div class="form-group d-flex">
    						              <div class="select-wrap">
    					                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                	    					  <select name="size" id="size" class="form-control">
        					                  	<option value="Nhỏ">Nhỏ</option>
        					                    <option value="Lớn">Lớn</option>
        					                  </select>
    					                </div>
    						            </div>
    								</div>
								@endif
								<div class="w-100"></div>
								<div class="input-group col-md-6 d-flex mb-3">
									<span class="input-group-btn mr-2">
										<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
									   <i class="icon-minus"></i>
										</button>
										</span>
									<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
									<input type="hidden" name="productidhidden" value="{{$detailproduct->id}}">
									<span class="input-group-btn ml-2">
										<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										 <i class="icon-plus"></i>
									 </button>
									</span>
								</div>
	          				</div>
						<p><input type="submit" class="btn btn-primary py-3 px-5" value="Thêm vào giỏ hàng"></p>
						</form>
    			</div>
    		</div>
    	</div>
    </section>

	    <section class="ftco-section">
	    	<div class="container">
	    		<div class="row justify-content-center mb-5 pb-3">
	          <div class="col-md-7 heading-section ftco-animate text-center">
	          	<span class="subheading">Khám phá</span>
	            <h2 class="mb-4">Sản phẩm liên quan</h2>
	            <p>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.</p>
	          </div>
	        </div>
	        <div class="row">
	        	@foreach($menu as $s)
	        	<div class="col-md-3">
	        		<div class="menu-entry">
	        			<form action="{!!route('savecart1')!!}" method="post">
	    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url({{ URL::to('/') }}/public/images/{{$s->hinhanh}});"></a>
	    					<div class="text text-center pt-4">
	    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
	    						<p>{{$s->mota}}</p>
	    						<p class="price"><span>${{$s->gia}}</span></p>
	    						<input type="hidden" name="productidhidden1" value="{{$s->id}}">
	    						<p><input type="submit" class="btn btn-primary btn-outline-primary" value="Thêm vào giỏ hàng"></p>
	    					</div>
	    				</form>
	    			</div>
	        	</div>
	        	@endforeach
	        </div>
	        <div class="row mt-5">
			    <div class="col text-center">
			        <div class="block-27">
			        {{ $menu->links()}}
			        </div>
    			</div>
			</div>
	    	</div>
	    	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
				console.log('chay');
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            $('#quantity').val(quantity + 1);


		            // Increment

		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		});
	</script>
	    </section>

@endsection