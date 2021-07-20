@extends('Backend.layouts.indexadmin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">slide</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                  Image slide
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  @foreach($slide as $s)
                    <div class="col-sm-2">
                      <a href="{{ URL::route('capnhatslide',$s->id)}}">
                        <img src="../public/images/{{$s->hinhanhslide}}" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            <a href="{{ URL::route('themslider')}}">
                <button type="button" class="btn btn-success"><b></b>Thêm slide</button>
              </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <script>
      $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox({
            alwaysShowClose: true
          });
        });
    
        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function() {
          $('.btn[data-filter]').removeClass('active');
          $(this).addClass('active');
        });
      })
    </script>
  
  
  @endsection