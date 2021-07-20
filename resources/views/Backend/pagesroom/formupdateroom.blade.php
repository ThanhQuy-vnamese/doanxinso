@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">themblog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"><b>Form</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Auth::user()->chucvu == 'admin')
              <form role="form" action="{!! route('chucnangcapnhatphongpost',$capnhatphong->id) !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              @elseif(Auth::user()->chucvu == 'staff')
              <form role="form" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              @endif
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên phòng</label>
                    <input type="text" name="tenphong" class="form-control" placeholder="Tên phòng" value="{!!$capnhatphong->tenphong!!}">
                  </div>
                  
                  <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" name="soluong" class="form-control" placeholder="Số lượng" value="{!!$capnhatphong->soluong!!}">
                  </div>
                  
                  <div class="form-group">
                    <label>Giá (VND)</label>
                    <input type="text" name="gia" class="form-control" placeholder="Giá phòng" value="{!!$capnhatphong->tienphong!!}">
                  </div>
                  
                </div>
                <div class="card-footer">
                  <input type="submit" class="btn btn-danger" value="Cập nhật">
                </div>
              </form>
            </div>
            </div>
          <div class="col-md-6">

          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection