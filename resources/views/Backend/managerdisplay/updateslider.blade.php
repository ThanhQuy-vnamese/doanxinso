@extends('Backend.layouts.indexadmin')
@section('content')


  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">capnhatslider</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>Form</b></h3>
              </div>
              
              <form role="form" action="{!! route('postcapnhatslider',$slide->id) !!}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên slide</label>
                    <input type="text" name="tenslider" class="form-control" placeholder="Tên slide" value="{{$slide->tenslider}}">
                  </div>
                  
                  <div class="form-group">
                    <label>Hình ảnh </label>
                        <p>
                            <img src="../../public/images/{{$slide->hinhanhslide}}" width="400px" height="300px" style="border-radius:10px;">
                        </p>
                      <input type="file" class="form-control" name="hinhanh">
                  </div>
                  
                  <div class="form-group">
                    <label>Tiêu đề</label>
                    <textarea name="tieudeslider" class="form-control ckeditor" rows="6">{!!$slide->tieude!!}</textarea>
                  </div>
                  
                  <div class="form-group">
                    <label>Mô tả slider</label>
                    <textarea name="motaslider" class="form-control ckeditor" rows="6">{!!$slide->mota!!}</textarea>
                  </div>
                  
                  <div class="form-group">
                    <label>Hiện thị</label>
                        <select name="trangthai" class="form-control">
                            <option value="show">Hiện thị slider</option>
                            <option value="hidden">Ẩn slider</option>
                    </select>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Cập nhật">
                  <a href="{{ URL::route('chucnangxoaslide',$slide->id)}}" class="btn btn-primary">Xóa</a>
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