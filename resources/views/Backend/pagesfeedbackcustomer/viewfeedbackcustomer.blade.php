@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Phản hồi khách hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">phanhoikhachhang</li>
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
                <h3 class="card-title">Danh sách thư phản hồi</h3>
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
                      <th>Tên khách hàng</th>
                      <th>Email</th>
                      <th>Chủ đề</th>
                      <th>Nội dung</th>
                      <th>Ngày lập</th>
                      <th>Trạng thái</th>
                      <th>Phản hồi</th>
                      <th>Xóa</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($binhluan as $s)
                    <tr align="center">
                      <td>{!!$s->hoten!!}</td>
                      <td>{!!$s->email!!}</td>
                      <td>{!!$s->chude!!}</td>
                      <td>{!!$s->tinnhan!!}</td>
                      <td>{!!date('F j, Y',strtotime($s->created_at))!!}</td>
                      <td>
                          @if($s->noidungphanhoi)
                            Đã phản hồi
                          @else
                            Chưa phản hồi
                          @endif
                      </td>
                      <td style="width:85px">
                          <a href="{{ URL::route('chitietphanhoikhachhang',$s->id)}}">
                            <button type="button" class="btn btn-success btn-sm"><i class="far fa-comment-dots"></i></button>
                          </a>
                      </td>
                      <td style="width:85px">
                          <a href="{{ URL::route('xoaphanhoikhachhang',$s->id)}}">
                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                          </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
                  <div class="card-header">
                    <div class="card-tools">
                        {{ $binhluan->links()}}
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  
@endsection