@extends('Frontend.layouts.index')

@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Dịch vụ</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ URL::route('home')}}">trangchu</a></span> <span>dichvu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    <?php
      $dichvu = config('dichvu');
    ?>
    <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
          @foreach($dichvu as $m)
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<span class="{{$m['icon']}}"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">{{$m['name']}}</h3>
                <p>{{$m['content']}}</p>
              </div>
            </div>      
          </div>
          @endforeach
        </div>
    	</div>
    </section>

@endsection