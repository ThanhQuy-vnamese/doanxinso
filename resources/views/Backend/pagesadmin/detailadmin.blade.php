@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin cá nhân</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">Thongtincanhan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$detailadmin1->firstname}} {{$detailadmin1->lastname}}</h3>
              </div>
              <!-- /.card-header -->
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
                        <td>{{$detailadmin1->firstname}} {{$detailadmin1->lastname}}</td>
                    </tr>
                    <tr>
                        <td><label>Email:</label></td>
                        <td>{{$detailadmin1->email}}</td>
                    </tr>
                    <tr>
                        <td><label>Địa chỉ:</label></td>
                        <td>{{$detailadmin1->diachi}}</td>
                    </tr>
                    <tr>
                        <td><label>Số điện thoại:</label></td>
                        <td>{{$detailadmin1->sdt}}</td>
                    </tr>
                    <tr>
                        <td><label>Tên tài khoản:</label></td>
                        <td>{{$detailadmin1->usename}}</td>
                    </tr>
                    <tr>
                        <td><label>Mật khẩu:</label></td>
                        <td>{{$detailadmin1->password}}</td>
                    </tr>
                    <tr>
                        <td><label>Chức vụ:</label></td>
                        <td>{{$detailadmin2->chucvu}}</td>
                    </tr>
                    <tr>
                        <td align="left">
                            <a href="{{ URL::route('chucnangcapnhatadmin',$detailadmin1->id)}}">
                                <button type="button" class="btn btn-success btn-sm">Cập nhật</button>
                            </a>
                        </td>
                        <td align="right">
                            <a href="{{ URL::route('chucnangxoaadmin',$detailadmin1->id)}}">
                                <button type="button" class="btn btn-success btn-sm">Xóa</button>
                            </a> 
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  
@endsection