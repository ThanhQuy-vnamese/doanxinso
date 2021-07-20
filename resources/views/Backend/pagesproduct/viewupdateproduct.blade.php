@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">quanlysanpham</li>
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
                  <table class="table table-bordered table-hover ">
                    <thead>                  
                      <tr align="center" class="text-nowrap">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Thể loại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($sanpham as $s)
                      <tr align="center">
                        <td>{{$s->id}}</td>
                        <td>{{$s->tenmonan}}</td>
                        <td><img src="../public/images/{{$s->hinhanh}}" width="50px" height="50px" style="border-radius:10px;"></td>
                        <td>{{$s->theloai}}</td>
                          <td style="width:85px">
                            <a href="{{ URL::route('chucnangcapnhatsanpham',$s->id)}}">
                              <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                            </a>
                          </td>
                          <td style="width:85px">
                            <a href="{{ URL::route('chucnangxoa',$s->id)}}">
                              <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                            </a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-header">
                <h3 class="card-title">Trang</h3>
                <div class="card-tools">
                  {{ $sanpham->links()}}
                </div>
              </div>
              </div>

            </div>
              
          </div>
        </div>
      </div>
    </section>
  </div>  
  <style type="text/css">
    .normal-wr {
        width: 190px;
        word-wrap: normal;
    }
  </style>
@endsection

@section('script')
@if(Auth::user()->chucvu == 'admin')
<script language="javascript">
    $(document).ready(function(){
    	
    	$(".btn1").click(function(){
	    	var value1 = $('.value1').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(value1);
    		// alert(_token);
	      if(value1 == '')
	      {
	      	alert('Bạn chưa nhập!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('timkiemchucnangbangsanpham') }}",
	    			data:{
	    				value1:value1,_token:_token
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
	    	var value1 = $('.value1').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(value1);
    		// alert(_token);
	      if(value1 == '')
	      {
	      	alert('Bạn chưa nhập!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('timkiemchucnangbangsanpham1') }}",
	    			data:{
	    				value1:value1,_token:_token
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