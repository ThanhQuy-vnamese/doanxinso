@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hóa đơn đặt hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">dondathang</li>
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
                <h3 class="card-title">Table</h3>
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
                      <th>Mã hóa đơn</th>
                      <th>Tên hóa đơn</th>
                      <th>Tên khách hàng</th>
                      <th>Tổng tiền</th>
                      <th>Ngày xuất hóa đơn</th>
                      <th>Ghi chú hóa đơn</th>
                      <th>View</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($hoadon as $s)
                    <tr align="center">
                      <td>HD_{!!$s->id!!}</td>
                      <td>
                          @foreach($chitiethoadon as $c)
                              @if($c->iddonhang == $s->id )
                                {!!$c->tensanpham!!};</br>
                              @endif
                          @endforeach
                      </td>
                      <td>
                            @if($s->idshipping == NULL)
                                @foreach($datban as $d)
                                    @if($d->id == $s->iddatban )
                                        {!!$d->yourname!!}
                                    @endif   
                                @endforeach
                            @else
                                @foreach($giaohang as $g)
                                      @if($g->id == $s->idshipping )
                                        @if($g->fullname)
                                            {!!$g->fullname!!}
                                        @else
                                            {!!$g->firstname!!} {!!$g->lastname!!}
                                        @endif
                                      @endif
                                  @endforeach
                            @endif
                      </td>
                      <td>{!!$s->tongdonhang!!} VND</td>
                      <td>{!!date('F j, Y, g:i a',strtotime($s->created_at))!!}</td>
                      <td>
                            @if($s->idshipping == NULL)
                                @foreach($datban as $d)
                                    @if($d->id == $s->iddatban )
                                        {!!$d->tinnhan!!}
                                    @endif   
                                @endforeach
                            @else
                                @foreach($giaohang as $g)
                                    @if($g->id == $s->idshipping )
                                        {!!$g->tinnhan!!}
                                    @endif
                                @endforeach
                            @endif
                          
                      </td>
                      <td style="width:85px">
                        @if(Auth::user()->chucvu == 'admin')
                          <a href="{{ URL::route('chitiethoadon',$s->id)}}">
                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                          </a>
                        @elseif(Auth::user()->chucvu == 'staff')
                          <a href="{{ URL::route('chitiethoadon1',$s->id)}}">
                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                          </a>
                        @endif
                      </td>
                      <td style="width:85px">
                        @if(Auth::user()->chucvu == 'admin')
                          <a href="{{ URL::route('chucnangxoahoadon',$s->id)}}">
                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash"></i></button>
                          </a>
                        @elseif(Auth::user()->chucvu == 'staff')
                          <a href="{{ URL::route('chucnangxoahoadon1',$s->id)}}">
                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash"></i></button>
                          </a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
                  <div class="card-header">
                    <div class="card-tools">
                        {{ $hoadon->links()}}
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