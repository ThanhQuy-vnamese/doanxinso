@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">themsanpham</li>
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
              <form role="form" action="{!! route('postthemsanpham') !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="tenmonan" class="form-control" placeholder="Tên món ăn" required>
                  </div>
                  
                  <div class="form-group">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" name="new1" id="yes" value="1" required>
                      <label for="yes" class="custom-control-label">Sản phẩm mới</label>
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
                          <input type="number" name="gia" class="form-control" placeholder="Đồng giá(VND)" min="5000" max="5000000" required>
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
                          <input type="number" name="khuyenmai" class="form-control" placeholder="Đồng giá(VND)" min="5000" max="5000000">
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Thể loại</label>
                    <select name="theloai" class="form-control">
                      <option value="Coffee">Coffee</option>
                      <option value="Maindish">Bữa chính</option>
                      <option value="Drinks">Đồ uống</option>
                      <option value="Desserts">Tráng miệng</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Hình ảnh sản phẩm</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="hinhanh" id="customFile" required>
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Từ khóa sản phẩm</label>
                    <input type="text" name="tukhoa" class="form-control" placeholder="Từ khóa sản phẩm" required>
                  </div>
                  <div class="form-group">
                    <label>Mô tả tóm tắt</label>
                    <textarea name="tomtat" class="form-control ckeditor" rows="7" placeholder="mô tả tóm tắt" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea name="chitiet" class="form-control ckeditor" rows="7" placeholder="mô tả chi tiết" required></textarea>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <input type="submit" class="btn btn-success" value="Thêm">
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