@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật mã giảm giá</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">themmoimagiamgia</li>
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
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><b>Form</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{!! route('chucnangcapnhatmakhuyenmaipost',$capnhatmakhuyenmai->id) !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  
                  <div class="form-group">
                    <label>Tên mã</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                      <input type="text" name="tenma" class="form-control" placeholder="" value="{{$capnhatmakhuyenmai->tenma}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Tạo mã</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                      <input type="text" name="magiam" class="form-control" placeholder="" value="{{$capnhatmakhuyenmai->magiam}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Số lượng mã</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                      <input type="number" name="soluongma" class="form-control" placeholder="" value="{{$capnhatmakhuyenmai->soluong}}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Tính năng mã</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                    <select id="tinhnangma" name="tinhnangma" class="form-control">
                        <option value="khongchon">-----chọn-----</option>
                        <option value="giamtheophantram">Giảm theo phần trăm</option>
                        <option value="giamtheotien">Giảm theo tiền</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Nhập số % hoặc tiền cần giảm</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                      <input type="number" class="form-control" name="giatrigiam" value="{{$capnhatmakhuyenmai->phantramgiam}}">
                    </div>
                  </div>
    
                </div>

                <div class="card-footer">
                  <input type="submit" class="btn btn-success" value="Cập nhật">
                </div>
              </form>
            </div>

            </div>

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