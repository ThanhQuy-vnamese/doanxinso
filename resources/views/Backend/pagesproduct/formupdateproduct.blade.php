@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">capnhatsanpham</li>
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
              <form role="form" action="{!! route('chucnangcapnhatpost',$capnhatsanpham->id) !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="tenmonan" class="form-control" placeholder="Tên món ăn" value="{{$capnhatsanpham->tenmonan}}" required>
                  </div>
                  <div class="form-group">
                    <!--@if($capnhatsanpham->sanphammoi == 1)
                            {{"checked"}}
                        @endif
                        <input type="checkbox" id="yes" name="new1" value="1">
                    <label for="yes"> I have a</label><br>
                    -->
                    <label>Sản phẩm mới</label><br>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" name="new1" id="yes" value="1"
                          @if($capnhatsanpham->sanphammoi == 1)
                                  {{"checked"}}
                          @endif>
                      <label for="yes" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" name="new1" id="no" value="0" 
                          @if($capnhatsanpham->sanphammoi == 0)
                                  {{"checked"}}
                          @endif>
                      <label for="no" class="custom-control-label">Không</label>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Giá(VND)</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">VND</span>
                          </div>
                          <input type="number" name="gia" class="form-control" placeholder="Đồng giá(VND)" value="{{$capnhatsanpham->gia}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Giá khuyến mãi(VND)</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">VND</span>
                          </div>
                          <input type="number" name="khuyenmai" class="form-control" placeholder="Đồng giá(VND)" value="{{$capnhatsanpham->khuyenmai}}">
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Thể loại</label>
                    <input list="browsers" name="theloai" class="form-control" value="{{$capnhatsanpham->theloai}}">
                    <datalist id="browsers" >
                        <option value="Coffee">
                        <option value="Maindish">
                        <option value="Drinks">
                        <option value="Desserts">
                    </datalist>
                  </div>
                  
                  <div class="form-group">
                    <label>Hình ảnh sản phẩm</label>
                    <p>
                        <img src="../../public/images/{{$capnhatsanpham->hinhanh}}" width="400px" height="300px" style="border-radius:10px;">
                    </p>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="hinhanh" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Từ khóa sản phẩm</label>
                    <input type="text" name="tukhoa" class="form-control" placeholder="Từ khóa sản phẩm" value="{{$capnhatsanpham->meta_keywords}}" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Mô tả tóm tắt</label>
                    <textarea name="tomtat" class="form-control ckeditor" rows="7" placeholder="mô tả tóm tắt" >{{$capnhatsanpham->mota}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea name="chitiet" class="form-control ckeditor" rows="7" placeholder="mô tả chi tiết">{{$capnhatsanpham->motachitiet}}</textarea>
                  </div>
                  
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