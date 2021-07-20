@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tài khoản khách hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">taikhoankhachhang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    {!! csrf_field() !!}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bảng</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right value1" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default btn1"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="search1">
                  <table class="table table-sm table-hover text-nowrap">
                    <thead>                  
                      <tr align="center">
                        <th>ID</th>
                        <th>Họ & tên</th>
                        <th>Email</th>
                        <th>sdt</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(Auth::user()->chucvu == 'admin')
                        @foreach($khachhang as $s)
                        <tr align="center">
                          <td>{{$s->id}}</td>
                          <td>
                            <a href="{{ URL::route('detailcustomer',$s->id)}}">
                                @if($s->firstname  || $s->lastname)
                                    {{$s->firstname}} {{$s->lastname}}
                                @else
                                    {{$s->fullname}}
                                @endif
                            </a>
                          </td>
                          <td>{{$s->email}}</td>
                          <td>{{$s->sdt}}</td>
                          <td style="width:85px">
                            <a href="{{ URL::route('chucnangcapnhatkhachhang',$s->id)}}">
                              <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                            </a>
                          </td>
                          <td style="width:85px">
                            <a href="{{ URL::route('chucnangxoakhachhang',$s->id)}}">
                              <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      @elseif(Auth::user()->chucvu == 'staff')
                        @foreach($khachhang as $s)
                          <tr align="center">
                            <td>{{$s->id}}</td>
                            <td>
                              <a href="{{ URL::route('detailcustomer1',$s->id)}}">{{$s->firstname}} {{$s->lastname}}</button></a>
                            </td>
                            <td>{{$s->email}}</td>
                            <td>{{$s->sdt}}</td>
                            <td style="width:85px">
                              <a href="{{ URL::route('chucnangcapnhatkhachhang1',$s->id)}}">
                                <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                              </a>
                            </td>
                            <td style="width:85px">
                              <a href="{{ URL::route('chucnangxoakhachhang1',$s->id)}}">
                                <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-header">
                <div class="card-tools">
                  {{ $khachhang->links()}}
                </div>
              </div>
              </div>
              @if(Auth::user()->chucvu == 'admin')
                <a href="{{ URL::route('themkhachhang')}}">
                  <button type="button" class="btn btn-primary btn-success">Thêm khách hàng</button>
                </a>
              @elseif(Auth::user()->chucvu == 'staff')
                <a href="{{ URL::route('themkhachhang1')}}">
                  <button type="button" class="btn btn-primary btn-success">Thêm khách hàng</button>
                </a>
              @endif
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  
@endsection

@section('script')
@if(Auth::user()->chucvu == 'admin')
<script language="javascript">
    $(document).ready(function(){
    	
    	$(".btn1").click(function(){
	    	var value = $('.value1').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(value);
    		// alert(_token);
    		// alert(wards);
    		// alert(_token);
	      if(value == '')
	      {
	      	alert('Bạn chưa nhập!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('timkiemchucnangbangkhachhang') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	      }
	    });
    	
    });
</script>
@elseif(Auth::user()->chucvu == 'staff')
<script language="javascript">
    $(document).ready(function(){
    	
    	$(".btn1").click(function(){
	    	var value = $('.value1').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(value);
    		// alert(_token);
    		// alert(wards);
    		// alert(_token);
	      if(value == '')
	      {
	      	alert('Bạn chưa nhập!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('timkiemchucnangbangkhachhang1') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	      }
	    });
    	
    });
</script>
@endif
@endsection