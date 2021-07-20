@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm phòng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">themphong</li>
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
              <form role="form" action="{!! route('postthemphong') !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              @endif
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên phòng</label>
                    <input type="text" name="tenphong" class="form-control" placeholder="Tên phòng">
                  </div>
                  
                  <div class="form-group">
                    <label>Số lượng</label>
                    <input type="number" name="soluong" class="form-control" placeholder="số lượng">
                  </div>
                  
                  <div class="form-group">
                    <label>Giá (VND)</label>
                    <input type="text" name="gia" class="form-control" placeholder="Giá phòng">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-danger" value="Thêm">
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