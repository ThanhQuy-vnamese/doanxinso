@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bảng sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">bangsanpham</li>
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
                <h3 class="card-title">Table</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right value" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default btn1"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="search">
                <table class="table table-bordered table-hover ">
                  <thead>                  
                    <tr align="center" class="text-nowrap">
                      <th>ID</th>
                      <th>Tên sản phẩm</th>
                      <th>Hình ảnh</th>
                      <th>Thể loại</th>
                      <th>Giá</th>
                      <th>Giá khuyến mãi</th>
                      <th>Sản phẩm mới</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      @foreach($sanpham as $s)
                      <tr align="center">
                        <td>{{$s->id}}</td>
                        <td>{{$s->tenmonan}}</td>
                        <td>
                            <img src="../public/images/{{$s->hinhanh}}" width="50px" height="50px" style="border-radius:10px;">
                        </td>
                        <td>{{$s->theloai}}</td>
                        <td>{{$s->gia}}$</td>
                        <td>{{$s->khuyenmai}}$</td>
                        @if($s->sanphammoi==1)
                          <td>Có</td>
                        @else
                          <td>Không</td>
                        @endif
                      </tr>
                      @endforeach
                    
                  </tbody>
                </table>
                </div>
              </div>
              <div class="card-header">
                <div class="card-tools">
                  {{ $sanpham->links()}}
                </div>
              </div>
              </div>
              
              <form action="{!! route('importcsv') !!}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="file" name="file" accept=".xlsx"></br></br>
                  <input type="submit" value="Import file excel" name="import_csv" class="btn btn-warning">
                </form>
                </br>
                
               <form action="{!! route('exportcsv') !!}" method="POST">
                  {{ csrf_field() }}
                  <input type="submit" value="Export file excel" name="export_csv" class="btn btn-success">
              </form>
              </br>
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
	    	var value = $('.value').val();
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
	    			url:"{{ route('timkiemsanpham') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search').html(data);
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
	    	var value = $('.value').val();
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
	    			url:"{{ route('timkiemsanpham1') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search').html(data);
	              }
	    		});
	      }
	    });
    	
    });
</script>
@endif
@endsection