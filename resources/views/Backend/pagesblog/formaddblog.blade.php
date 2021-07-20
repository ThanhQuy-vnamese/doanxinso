@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm tin tức</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">themtintuc</li>
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
              <form role="form" action="{!! route('postthemblog') !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              @elseif(Auth::user()->chucvu == 'staff')
              <form role="form" action="{!! route('postthemblog1') !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              @endif
                <div class="card-body">
                  <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" name="tieude" class="form-control" placeholder="Tiêu đề" required>
                  </div>
                  
                  <input type="hidden" name="nguoidang" value="admin"/>
                  
                  <div class="form-group">
                    <label>Tin tức hình ảnh </label>
                      <input type="file" class="form-control" name="hinhanh" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Nội dung tiêu đề</label>
                    <textarea name="noidungtieude" class="form-control ckeditor" rows="6" required></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label>Từ khóa tin tức</label>
                    <textarea name="tukhoablog" class="form-control ckeditor" rows="6" required></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label>Nội dung chi tiết</label>
                    <textarea name="noidungchitiet" class="form-control ckeditor" rows="10" placeholder="mô tả tóm tắt" required></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-danger" value="Thêm">
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