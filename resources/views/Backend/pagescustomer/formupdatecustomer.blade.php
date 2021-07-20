@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật khách hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">capnhatkhachhang</li>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><b>Form</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Auth::user()->chucvu == 'admin')
              <form role="form" action="{!! route('chucnangcapnhatkhachhangpost',$capnhatkhachhang1->id) !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              @elseif(Auth::user()->chucvu == 'staff')
                <form role="form" action="{!! route('chucnangcapnhatkhachhangpost1',$capnhatkhachhang1->id) !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              @endif
                <div class="card-body">
                  
                  <div class="form-group">
                    <label>Họ & tên lót</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                      <input type="text" name="tendau" class="form-control" placeholder="Hãy nhập họ và tên lót..." value="{{$capnhatkhachhang1->firstname}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Tên</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                      <input type="text" name="tencuoi" class="form-control" placeholder="Hãy nhập tên..." value="{{$capnhatkhachhang1->lastname}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input type="text" name="email" class="form-control" placeholder="Hãy nhập email..." value="{{$capnhatkhachhang1->email}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Địa chỉ</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                      </div>
                    <input type="text" name="diachi" class="form-control" placeholder="Hãy nhập địa chỉ..." value="{{$capnhatkhachhang1->diachi}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" name="sdt" placeholder="Hãy nhập số điện thoại..." value="{{$capnhatkhachhang1->sdt}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Tài khoản</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input type="text" name="username" class="form-control" placeholder="Hãy nhập tên tài khoản..." value="{{$capnhatkhachhang1->usename}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Mật khẩu</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                      </div>
                    <input type="text" name="password" class="form-control" placeholder="Hãy nhập mật khẩu..." value="{{$capnhatkhachhang1->password}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Chức vụ</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                      </div>
                      <input type="text" name="chucvu" class="form-control" placeholder="Hãy nhập chức vụ..." value="{{$capnhatkhachhang2->chucvu}}">
                    </div>
                  </div>
                  
                  <!--<div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>-->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-success" value="Cập nhật">
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection