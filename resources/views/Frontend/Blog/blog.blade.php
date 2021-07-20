@extends('Frontend.layouts.index')

@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Tin tức</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ URL::route('home')}}">trangchu</a></span> <span class="mr-2"><a href="#">Tin tức</a></span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
          @foreach($blog as $m)
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="{{ URL::route('blogdetail',$m->id)}}" class="block-20" style="background-image: url(public/images/{{$m->hinhanh}});">
              </a>
              <div class="text py-4 d-block">
              	<div class="meta">
              	  <!-- Show date time -->
                  <div>{!!date('F j, Y, g:i a',strtotime($m->created_at))!!}</div>
                  <div>{!!$m->nguoidang!!}</div>
                  <!--<div><a href="#" class="meta-chat"><span class="icon-chat"></span>3</a></div>-->
                </div>
                <h3 class="heading mt-2"><a href="{{ URL::route('blogdetail',$m->id)}}" style="color:#c49b63;">{!!$m->tenbaidang!!}</a></h3>
                <p>{!!$m->noidung!!}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {{ $blog->links()}}
      </div>
    </section>

@endsection