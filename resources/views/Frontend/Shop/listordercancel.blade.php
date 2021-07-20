@extends('Frontend.layouts.index')

@section('content')
<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Hóa đơn đã hủy</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">trangchu</a></span> <span>hoadondadat</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
	{!! csrf_field() !!}
		<section class="ftco-section ftco-cart">
			<div class="container">
			    @if($dem>=1)
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
    				        <table class="table">
	    				    <thead class="thead-primary" style="background:none;">
						      <tr class="text-center">
						        <th colspan="7"><a style="font-size:20px;">Thông tin hủy đơn hàng</a></th>
						      </tr>
						    </thead>
						    
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Mã HD</th>
						        <th>Tổng tiền</th>
						        <th>Trạng thái đơn hàng</th>
						        <th>Số tiền hoàn trả</th>
						        <th>Ngày hủy đơn</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
						           <tr class="text-center"></tr>
						         @foreach($hoadon as $h)
    						         @if($h->trangthaidonhang == 'Hủy đơn hàng')
    							      <tr class="text-center">
    							        <td ><h6>{{$h->id}}</h6></td>
        	                            <td><h6><a style="color:yellow;">{{$h->tongdonhang}}</a></h6></td>
        	                            <td><h6><a style="color:yellow;">{{$h->trangthaidonhang}}</a></h6></td>
        	                            @if($h->hoantratien)
        	                                <td><h6><a style="color:yellow;">{{$h->hoantratien}}</a></h6></td>
        	                            @else
        	                                <td><h6><a style="color:yellow;">Không có</a></h6></td>
        	                            @endif
        	                            <td><h6>{{$h->created_at}}</h6></td>
    	                                <td class="product-remove"><a href="{{ URL::route('viewordercancel',$h->id)}}">Xem</a></td>
    							      </tr>
    							    @endif
							    @endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		@else
    		    <div class="row">
        			   <div class="col-md-12 ftco-animate">
        				<center><h3>Bạn không có hóa đơn hủy nào</h3></center>
            		</div>
            	</div>
        	@endif
    		</div>
    	</section>
	
@endsection
