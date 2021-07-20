@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Giao hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">giaohang</li>
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
                <h3 class="card-title">Danh sách giao hàng</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right value1" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search btn1"></i></button>
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
                        <th>Mã giao hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        @if(Auth::user()->chucvu == 'admin' || Auth::user()->chucvu == 'staff')
                            <th>Xem</th>
                            <th>Xóa</th>
                        @else
                            <th>Xem</th>
                        @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($danhsachgiaohang as $s)
                    <tr align="center" style="font-size: 13px;">
                        <td>MA{!!$s->id!!}</td>
                        <td>{!!$s->firstname!!} {!!$s->lastname!!}</td>
                        <td>{!!$s->dienthoai!!}</td>
                        <td>{!!$s->diachiship!!}</td>
                        <td>{!!date('F j, Y',strtotime($s->created_at))!!}</td>
                        @foreach($donhang as $d)
                            @if($d->idshipping == $s->id)
                                <td>{!!$d->trangthaidonhang!!}</td>
                            @endif
                        @endforeach
                        
                        @if(Auth::user()->chucvu == 'admin' || Auth::user()->chucvu == 'staff')
                            <td style="width:85px">
                                @if(Auth::user()->chucvu == 'admin')
                                  <a href="{{ URL::route('xemgiaohang',$s->id)}}">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                  </a>
                                @elseif(Auth::user()->chucvu == 'staff')
                                  <a href="{{ URL::route('xemgiaohang1',$s->id)}}">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                  </a>
                                @endif
                            </td>
                            
                            <td style="width:85px">
                                @if(Auth::user()->chucvu == 'admin')
                                  <a href="{{ URL::route('xoagiaohang',$s->id)}}">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                  </a>
                                @elseif(Auth::user()->chucvu == 'staff')
                                  <a href="{{ URL::route('xoagiaohang1',$s->id)}}">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                  </a>
                                @endif
                            </td>
                        @else
                            <td style="width:85px">
                                @foreach($donhang as $d)
                                    @if($d->idshipping == $s->id)
                                        <a href="{{ URL::route('printproduct2',$d->id)}}">
                                            <button type="button" class="btn btn-success btn-sm">In bill</button>
                                        </a>
                                    @endif
                                @endforeach
                            </td>
                        @endif
                        
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div> 
              </div>
                  <div class="card-header">
                    <div class="card-tools">
                        {{ $danhsachgiaohang->links()}}
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

@section('script')
@if(Auth::user()->chucvu == 'admin')
<script language="javascript">
    $(document).ready(function(){
    	
    	$(".btn1").click(function(){
	    	var value = $('.value1').val();
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
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
	    			url:"{{ route('timkiemgiaohang') }}",
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
    // 		alert(value);
    // 		alert(_token);
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
	    			url:"{{ route('timkiemgiaohang1') }}",
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