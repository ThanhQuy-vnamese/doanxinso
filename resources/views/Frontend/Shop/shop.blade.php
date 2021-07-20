@extends('Frontend.layouts.index')

@section('content')

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Đặt hàng trực tuyến</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">trangchu</a></span> <span>Shop</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
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

		              <div class="tab-pane fade show active" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">
		              	<div class="row">
		              		@foreach($shop as $s)
		              		@if($s->theloai == 'Coffee')
		              			<div class="col-md-3">
						        		<div class="menu-entry">
						        			<form action="{!!route('singleproduct',$s->id)!!}">
						        				{{csrf_field()}}
						    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
						    						<p>{{$s->mota}}</p>
						    						@if($s->khuyenmai>0)
						    							<p class="price"><strike>{{$s->gia}} VND</strike> <span>{{$s->khuyenmai}} VND</span></p>
						    						@else
						    							<p class="price"><span>{{$s->gia}} VND</span></p>
						    						@endif
						    						<input type="hidden" name="productidhidden1" value="{{$s->id}}">
						    						<p><input type="submit" class="btn btn-primary btn-outline-primary" value="Đặt"></p>
						    					</div>
						    					</form>
						    				</div>
						        	</div>
						     @endif
						     @endforeach
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		                <div class="row">
		                	@foreach($shop as $s)
		              		@if($s->theloai == 'Maindish')
		              		<div class="col-md-3">
						        		<div class="menu-entry">
						    					<form action="{!!route('singleproduct',$s->id)!!}">
						        				{{csrf_field()}}
						    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
						    						<p>{{$s->mota}}</p>
						    						@if($s->khuyenmai>0)
						    							<p class="price"><strike>{{$s->gia}}</strike> <span>{{$s->khuyenmai}} VND</span></p>
						    						@else
						    							<p class="price"><span>{{$s->gia}} VND</span></p>
						    						@endif
						    						<input type="hidden" name="productidhidden1" value="{{$s->id}}">
						    						<p><input type="submit" class="btn btn-primary btn-outline-primary" value="Đặt"></p>
						    					</div>
						    					</form>
						    				</div>
						        	</div>
		              		@endif
						    @endforeach
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
		                	@foreach($shop as $s)
		              		@if($s->theloai == 'Drinks')
		              		<div class="col-md-3">
						        		<div class="menu-entry">
						    					<form action="{!!route('singleproduct',$s->id)!!}">
						        				{{csrf_field()}}
						    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
						    						<p>{{$s->mota}}</p>
						    						@if($s->khuyenmai>0)
						    							<p class="price"><strike>{{$s->gia}} VND</strike> <span>{{$s->khuyenmai}} VND</span></p>
						    						@else
						    							<p class="price"><span>{{$s->gia}} VND</span></p>
						    						@endif
						    						<input type="hidden" name="productidhidden1" value="{{$s->id}}">
						    						<p><input type="submit" class="btn btn-primary btn-outline-primary" value="Đặt"></p>
						    					</div>
						    					</form>
						    				</div>
						        	</div>
		              		@endif
						    @endforeach
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
		              		
		              		@foreach($shop as $s)
		              		@if($s->theloai == 'Desserts')
		              		<div class="col-md-3">
						        		<div class="menu-entry">
						    					<form action="{!!route('singleproduct',$s->id)!!}">
						        				{{csrf_field()}}
						    					<a href="{{ URL::route('singleproduct',$s->id)}}" class="img" style="background-image: url(public/images/{{$s->hinhanh}});"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="{{ URL::route('singleproduct',$s->id)}}">{{$s->tenmonan}}</a></h3>
						    						<p>{{$s->mota}}</p>
						    						@if($s->khuyenmai>0)
						    							<p class="price"><strike>{{$s->gia}} VND</strike> <span>{{$s->khuyenmai}} VND</span></p>
						    						@else
						    							<p class="price"><span>{{$s->gia}} VND</span></p>
						    						@endif
						    						<input type="hidden" name="productidhidden1" value="{{$s->id}}">
						    						<p><input type="submit" class="btn btn-primary btn-outline-primary" value="Đặt"></p>
						    					</div>
						    					</form>
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

@endsection