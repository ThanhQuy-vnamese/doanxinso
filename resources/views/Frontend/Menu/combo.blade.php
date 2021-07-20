@extends('Frontend.layouts.index')
@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Thực đơn</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ URL::route('home')}}">trangchu</a></span> <span>cacmonchinh</span></p>
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
            <h2 class="mb-4">Combo bữa chính và đồ uống</h2>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate">
		    		<div class="row">
		    		    
    		          <div class="col-md-12 nav-link-wrap mb-5">
    		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    		              <a class="nav-link active" id="v-pills-0-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-0" aria-selected="true">Bữa sáng</a>
    		              <a class="nav-link" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-1" aria-selected="false">Bữa trưa</a>
    		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-2" aria-selected="false">Bữa tối</a>
    		            </div>
    		          </div>
    		          
		          <div class="col-md-12 d-flex align-items-center">
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		              	<div class="row">
		              		@if($sang1)
		              		    <h3 class="mb-5 heading-pricing ftco-animate"><a href="{{ URL::route('combosang1')}}" class="btn btn-primary btn-outline-primary">Combo 1</a></h3>
		              		    @foreach($sang1 as $mn)
                        		<div class="pricing-entry d-flex ftco-animate">
                        			<a href="images/{{$mn->hinhanh}}" class="image-popup"><div class="img" style="background-image: url(public/images/{{$mn->hinhanh}});"></div></a>
                        			<div class="desc pl-3">
                	        			<div class="d-flex text align-items-center">
                	        				<h3><span>{{$mn->tenmonan}}</span></h3>
                	        				@if($mn->khuyenmai>0)
                						    	<p class="price"><strike>{{$mn->gia}}đ</strike> <span>{{$mn->khuyenmai}}đ</span></p>
                						    @else
                						    	<p class="price"><span>{{$mn->gia}}đ</span></p>
                						    @endif
                	        			</div>
                	        			<div class="d-block">
                	        				<p>{!!$mn->mota!!}</p>
                	        			</div>
                        			</div>
                        		</div>
                        		@endforeach
		              		@endif
		              		
		              		@if($sang2)
		              		    <h3 class="mb-5 heading-pricing ftco-animate"><a href="{{ URL::route('combosang2')}}" class="btn btn-primary btn-outline-primary">Combo 2</a></h3>
		              		    @foreach($sang2 as $mn)
                        		<div class="pricing-entry d-flex ftco-animate">
                        			<a href="images/{{$mn->hinhanh}}" class="image-popup"><div class="img" style="background-image: url(public/images/{{$mn->hinhanh}});"></div></a>
                        			<div class="desc pl-3">
                	        			<div class="d-flex text align-items-center">
                	        				<h3><span>{{$mn->tenmonan}}</span></h3>
                	        				@if($mn->khuyenmai>0)
                						    	<p class="price"><strike>{{$mn->gia}}đ</strike> <span>{{$mn->khuyenmai}}đ</span></p>
                						    @else
                						    	<p class="price"><span>{{$mn->gia}}đ</span></p>
                						    @endif
                	        			</div>
                	        			<div class="d-block">
                	        				<p>{!!$mn->mota!!}</p>
                	        			</div>
                        			</div>
                        		</div>
                        		@endforeach
		              		@endif
		              	</div>
		              </div>
		              
		              <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
		              	<div class="row">
		              		@if($trua1)
		              		    <h3 class="mb-5 heading-pricing ftco-animate"><a href="{{ URL::route('combotrua1')}}" class="btn btn-primary btn-outline-primary">Combo 1</a></h3>
		              		    @foreach($trua1 as $mn)
                        		<div class="pricing-entry d-flex ftco-animate">
                        			<a href="images/{{$mn->hinhanh}}" class="image-popup"><div class="img" style="background-image: url(public/images/{{$mn->hinhanh}});"></div></a>
                        			<div class="desc pl-3">
                	        			<div class="d-flex text align-items-center">
                	        				<h3><span>{{$mn->tenmonan}}</span></h3>
                	        				@if($mn->khuyenmai>0)
                						    	<p class="price"><strike>{{$mn->gia}}đ</strike> <span>{{$mn->khuyenmai}}đ</span></p>
                						    @else
                						    	<p class="price"><span>{{$mn->gia}}đ</span></p>
                						    @endif
                	        			</div>
                	        			<div class="d-block">
                	        				<p>{!!$mn->mota!!}</p>
                	        			</div>
                        			</div>
                        		</div>
                        		@endforeach
		              		@endif
		              		
		              		@if($trua2)
		              		    <h3 class="mb-5 heading-pricing ftco-animate"><a href="{{ URL::route('combotrua2')}}" class="btn btn-primary btn-outline-primary">Combo 2</a></h3>
		              		    @foreach($trua2 as $mn)
                        		<div class="pricing-entry d-flex ftco-animate">
                        			<a href="images/{{$mn->hinhanh}}" class="image-popup"><div class="img" style="background-image: url(public/images/{{$mn->hinhanh}});"></div></a>
                        			<div class="desc pl-3">
                	        			<div class="d-flex text align-items-center">
                	        				<h3><span>{{$mn->tenmonan}}</span></h3>
                	        				@if($mn->khuyenmai>0)
                						    	<p class="price"><strike>{{$mn->gia}}đ</strike> <span>{{$mn->khuyenmai}}đ</span></p>
                						    @else
                						    	<p class="price"><span>{{$mn->gia}}đ</span></p>
                						    @endif
                	        			</div>
                	        			<div class="d-block">
                	        				<p>{!!$mn->mota!!}</p>
                	        			</div>
                        			</div>
                        		</div>
                        		@endforeach
		              		@endif
		              	</div>
		              </div>
		              
		              
		              <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
		              	<div class="row">
		              		@if($toi1)
		              		    <h3 class="mb-5 heading-pricing ftco-animate"><a href="{{ URL::route('combotoi1')}}" class="btn btn-primary btn-outline-primary">Combo 1</a></h3>
		              		    @foreach($toi1 as $mn)
                        		<div class="pricing-entry d-flex ftco-animate">
                        			<a href="images/{{$mn->hinhanh}}" class="image-popup"><div class="img" style="background-image: url(public/images/{{$mn->hinhanh}});"></div></a>
                        			<div class="desc pl-3">
                	        			<div class="d-flex text align-items-center">
                	        				<h3><span>{{$mn->tenmonan}}</span></h3>
                	        				@if($mn->khuyenmai>0)
                						    	<p class="price"><strike>{{$mn->gia}}đ</strike> <span>{{$mn->khuyenmai}}đ</span></p>
                						    @else
                						    	<p class="price"><span>{{$mn->gia}}đ</span></p>
                						    @endif
                	        			</div>
                	        			<div class="d-block">
                	        				<p>{!!$mn->mota!!}</p>
                	        			</div>
                        			</div>
                        		</div>
                        		@endforeach
		              		@endif
		              		
		              		@if($toi2)
		              		    <h3 class="mb-5 heading-pricing ftco-animate"><a href="{{ URL::route('combotoi2')}}" class="btn btn-primary btn-outline-primary">Combo 2</a></h3>
		              		    @foreach($toi2 as $mn)
                        		<div class="pricing-entry d-flex ftco-animate">
                        			<a href="images/{{$mn->hinhanh}}" class="image-popup"><div class="img" style="background-image: url(public/images/{{$mn->hinhanh}});"></div></a>
                        			<div class="desc pl-3">
                	        			<div class="d-flex text align-items-center">
                	        				<h3><span>{{$mn->tenmonan}}</span></h3>
                	        				@if($mn->khuyenmai>0)
                						    	<p class="price"><strike>{{$mn->gia}}đ</strike> <span>{{$mn->khuyenmai}}đ</span></p>
                						    @else
                						    	<p class="price"><span>{{$mn->gia}}đ</span></p>
                						    @endif
                	        			</div>
                	        			<div class="d-block">
                	        				<p>{!!$mn->mota!!}</p>
                	        			</div>
                        			</div>
                        		</div>
                        		@endforeach
		              		@endif
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