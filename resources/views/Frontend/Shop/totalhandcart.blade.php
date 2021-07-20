@extends('Frontend.layouts.index')

@section('content')
<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Hóa đơn đã đặt</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">trangchu</a></span> <span>hoadondadat</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
	{!! csrf_field() !!}
		<section class="ftco-section ftco-cart">
			<div class="container">
			    @if($demdatban>=1)
				<div class="row">
    			    <div class="col-md-12 ftco-animate">
    				    <div class="cart-list">
    				        <table class="table">
	    				    <thead class="thead-primary" style="background:none;">
						      <tr class="text-center">
						        <th colspan="7"><a style="font-size:20px;">Thông tin đơn đặt bàn</a></th>
						      </tr>
						    </thead>
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Mã HD</th>
						        <th>Tên khách hàng</th>
						        <th>Số người</th>
						        <th>Loại bàn</th>
						        <th>Thời gian nhận bàn</th>
						        <th>Ngày nhận bàn</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
						          <tr class="text-center"></tr>
						          @foreach($hoadon as $h)
    						          @foreach($datban as $d)
    						            @if($h->iddatban == $d->id)
    						              <tr class="text-center">
        							        <td ><h6>{{$h->id}}</h6></td>
        							        <td><h6><a style="color:yellow;">{{$d->yourname}}</a></h6></td>
            	                            <td><h6><a>{{$d->songuoi}}</a></h6></td>
            	                            <td><h6><a>{{$d->loaiban}}</a></h6></td>
            	                            <td><h6>{{$d->thoigian}}</h6></td>
            	                            <td><h6>{{$d->ngay}}</h6></td>
        	                                <td class="product-remove"><a href="{{ URL::route('viewhandcartreservation',$h->id)}}">Xem</a></td>
        							      </tr>
    						            @endif
    						          @endforeach
							      @endforeach
						    </tbody>
						  </table>
					  </div>
        			</div>
        		</div>
    	        @endif
    	        
    	        @if($demgiaohang != 0)
				<div class="row">
    			    <div class="col-md-12 ftco-animate">
    				    <div class="cart-list">
    				        <table class="table">
	    				    <thead class="thead-primary" style="background:none;">
						      <tr class="text-center">
						        <th colspan="7"><a style="font-size:20px;">Thông tin đơn giao hàng</a></th>
						      </tr>
						    </thead>
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Mã HD</th>
						        <th>Tên khách hàng</th>
						        <th>Địa chỉ ship</th>
						        <th>Ngày tạo</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
						          <tr class="text-center"></tr>
						          @foreach($hoadon as $h)
    						          @foreach($giaohang as $g)
    						            @if($h->idshipping == $g->id)
    						              <tr class="text-center">
        							        <td ><h6>{{$h->id}}</h6></td>
        							        <td><h6><a style="color:yellow;">{{$g->firstname}} {{$g->lastname}}</a></h6></td>
            	                            <td><h6><a>{{$g->diachiship}}</a></h6></td>
            	                            <td><h6>{{$g->created_at}}</h6></td>
        	                                <td class="product-remove"><a href="{{ URL::route('viewhandcartshipping',$h->id)}}">Xem</a></td>
        							      </tr>
    						            @endif
    						          @endforeach
							      @endforeach
						    </tbody>
						  </table>
					  </div>
        			</div>
        		</div>
    	        @endif
    	        
    	        @if($demdatban == 0 && $demgiaohang == 0)
    	            <div class="row">
        			    <div class="col-md-12 ftco-animate">
        				    <center><h3>Bạn không có hóa đơn nào</h3></center>
            			</div>
            		</div>
    	        @endif
    		</div>
    	</section>
@endsection
