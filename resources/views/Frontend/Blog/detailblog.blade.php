@extends('Frontend.layouts.index')

@section('content')
<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ URL::to('/') }}/public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Chi tiết tin tức - sự kiện</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ URL::route('home')}}">trangchu</a></span> <span class="mr-2"><a href="{{ URL::route('blog')}}">Tin tức</a></span> <span>Chitiet</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3">{{$blog->tenbaidang}}</h2>
            <p><a  style="color:#e0d1d1;">{!!$blogdetail->noidungchitiet!!}</a></p>
            <!--<div class="tag-widget post-tag-container mb-5 mt-5">-->
            <!--  <div class="tagcloud">-->
            <!--    <a href="#" class="tag-cloud-link">Life</a>-->
            <!--    <a href="#" class="tag-cloud-link">Sport</a>-->
            <!--    <a href="#" class="tag-cloud-link">Tech</a>-->
            <!--    <a href="#" class="tag-cloud-link">Travel</a>-->
            <!--  </div>-->
            <!--</div>-->


            <div class="pt-5 mt-5">
              <h3 class="mb-5">Bình luận bài viết</h3>
              <div class="fb-comments" data-href="{{$url_canonical}}" data-colorscheme="Dark" data-numposts="5"  data-width=""></div>
              <div class="fb-page" data-href="https://www.facebook.com/only1998Coffee/" data-tabs="message" data-width="320px" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/only1998Coffee/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/only1998Coffee/">1998 Coffee</a></blockquote></div>
              <!-- END comment-list -->
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
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
              <h3>Tin tức gần đây</h3>
              @foreach($recentblog as $n)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ URL::to('/') }}/public/images/{{$n->hinhanh}});"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{ URL::route('blogdetail',$n->id)}}">{!!$n->tenbaidang!!}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span>{!!date('F j, Y, g:i a',strtotime($n->created_at))!!}</a></div>
                    <div><a href="#"><span class="icon-person"></span>{!!$n->nguoidang!!}</a></div>
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