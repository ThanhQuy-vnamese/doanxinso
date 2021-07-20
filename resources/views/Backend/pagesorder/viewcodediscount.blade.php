@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mã khuyến mãi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">makhuyenmai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bảng</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-sm table-hover text-nowrap">
                  <thead>                  
                    <tr align="center">
                      <th>ID</th>
                      <th>Tên mã khuyến mãi</th>
                      <th>Tên Code</th>
                      <th>Số lượng</th>
                      <th>Tính năng mã</th>
                      <th>Phần trăm giảm</th>
                      <th>Sửa</th>
                      <th>Xóa</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($makhuyenmai as $s)
                    <tr align="center">
                      <td>{{$s->id}}</td>
                      <td>{{$s->tenma}}</td>
                      <td>{{$s->magiam}}</td>
                      <td>{{$s->soluong}}</td>
                      <td>{{$s->tinhnangma}}</td>
                      @if($s->tinhnangma=="giamtheophantram")
                      <td>{{$s->phantramgiam}}%</td>
                      @else
                      <td>${{$s->phantramgiam}}%</td>
                      @endif
                      <td style="width:85px">
                        <a href="{{ URL::route('chucnangcapnhatmakhuyenmai',$s->id)}}">
                          <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                        </a>
                      </td>
                      <td style="width:85px">
                        <a href="{{ URL::route('chucnangxoamakhuyenmai',$s->id)}}">
                          <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-header">
                <div class="card-tools">
                  {{ $makhuyenmai->links()}}
                </div>
              </div>
              </div>
              <a href="{{ URL::route('themmagiamgia')}}">
                <button type="button" class="btn btn-primary btn-success">Thêm mã khuyến mãi</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  
@endsection