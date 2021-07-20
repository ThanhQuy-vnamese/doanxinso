@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gửi phản hồi khách hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">guiphanhoikhachhang</li>
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
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"><b>Form</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{!! route('postphanhoiykienkhachhang',$detail->id) !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="card-body">
                    <table class="table table-sm table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width:200px">Mục</th>
                      <th>Thông tin</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td><label>Họ & tên:</label></td>
                        <td>{{$detail->hoten}}</td>
                    </tr>
                    <tr>
                        <td><label>Email:</label></td>
                        <td>{{$detail->email}}</td>
                    </tr>
                    <tr>
                        <td><label>Chủ đề:</label></td>
                        <td>{{$detail->chude}}</td>
                    </tr>
                    <tr>
                        <td><label>Nội dung:</label></td>
                        <td>{{$detail->tinnhan}}</td>
                    </tr>
                  </tbody>
                </table>
                    
                    
                  <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" name="tieude" class="form-control" placeholder="Tiêu đề" value="{{$detail->tieudephanhoi}}" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Tên cửa hàng</label>
                    <input type="text" name="tencuahang" class="form-control" value="1998 coffee" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Email</label>
                      <input type="text" class="form-control" name="emailadmin" value="{{Auth::user()->email}}" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Nội dung phản hồi ý kiến khách hàng</label>
                    <textarea name="noidungphanhoiykien" class="form-control ckeditor" rows="10" required>{{$detail->noidungphanhoi}}</textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-secondary" value="Phản hồi">
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