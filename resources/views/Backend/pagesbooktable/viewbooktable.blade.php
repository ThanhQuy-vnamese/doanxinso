@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Đặt bàn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">datban</li>
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
                <h3 class="card-title">Danh sách đặt bàn</h3>
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
                        <th>Mã đặt bàn</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ngày đến</th>
                        <th>Thời gian đến</th>
                        <th>Ngày đặt</th>
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
                    <?php 
                        echo "Ngày"." ".date('j-m-Y');
                    ?>
                    @foreach($booking as $s)
                        @if(date('d',strtotime($s->ngay)) == $ngayhientai)
                            <tr align="center">
                                <td>MA{!!$s->id!!}</td>
                                <td>{!!$s->yourname!!}</td>
                                <td>{!!$s->sdt!!}</td>
                                <td>{!!$s->email!!}</td>
                                <td>{!!date('F j, Y',strtotime($s->ngay))!!}</td>
                                <td>{!!$s->thoigian!!}</td>
                                <td>{!!date('F j, Y',strtotime($s->created_at))!!}</td>
                                @foreach($donhang as $d)
                                    @if($d->iddatban == $s->id)
                                        <td>{!!$d->trangthaidonhang!!}</td>
                                    @endif
                                @endforeach
                                
                                @if(Auth::user()->chucvu == 'admin' || Auth::user()->chucvu == 'staff')
                                    <td style="width:85px">
                                        @if(Auth::user()->chucvu == 'admin')
                                          <a href="{{ URL::route('xemdatban',$s->id)}}">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                          </a>
                                        @elseif(Auth::user()->chucvu == 'staff')
                                          <a href="{{ URL::route('xemdatban1',$s->id)}}">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye nav-icon"></i></button>
                                          </a>
                                        @endif
                                    </td>
                                    
                                    <td style="width:85px">
                                        @if(Auth::user()->chucvu == 'admin')
                                          <a href="{{ URL::route('xoadatban',$s->id)}}">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                          </a>
                                        @elseif(Auth::user()->chucvu == 'staff')
                                          <a href="{{ URL::route('xoadatban1',$s->id)}}">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                                          </a>
                                        @endif
                                    </td>
                                @else
                                    <td style="width:85px">
                                        @foreach($donhang as $d)
                                            @if($d->iddatban == $s->id)
                                                <a href="{{ URL::route('printproduct2',$d->id)}}">
                                                    <button type="button" class="btn btn-success btn-sm">In bill</button>
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
                  <div class="card-header">
                    <div class="card-tools">
                        {{ $booking->links()}}
                    </div>
                  </div>
              </div>
                <button type="button" class="btn btn-success left"><i class="fas fa-arrow-left"></i></button>
                
                <button type="button" class="btn btn-success now">Hiện tại</button>
                
                <button type="button" class="btn btn-success right"><i class="fas fa-arrow-right"></i></button>
                <button type="button" class="btn btn-success all">Hiện tất cả</button>
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
	    			url:"{{ route('timkiemdatban') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	      }
	    });
	    
	    $(".left").click(function(){
	    	var value = "left";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	      	    $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".now").click(function(){
	    	var value = "now";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	            $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".right").click(function(){
	    	var value = "right";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    // 		alert(wards);
    // 		alert(_token);
	  
	            $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".all").click(function(){
	    	var value = "all";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	      	    $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
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
	    			url:"{{ route('timkiemdatban1') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	      }
	    });
	    
	    $(".left").click(function(){
	    	var value = "left";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	      	    $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay1') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".now").click(function(){
	    	var value = "now";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	            $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay1') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".right").click(function(){
	    	var value = "right";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    // 		alert(wards);
    // 		alert(_token);
	  
	            $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay1') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".all").click(function(){
	    	var value = "all";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	      	    $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay1') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
    	
    });
</script>
@elseif(Auth::user()->chucvu == 'chef')
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
	    			url:"{{ route('timkiemdatban2') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	      }
	    });
    	
    	$(".left").click(function(){
	    	var value = "left";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	      	    $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay2') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".now").click(function(){
	    	var value = "now";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	            $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay2') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".right").click(function(){
	    	var value = "right";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    // 		alert(wards);
    // 		alert(_token);
	  
	            $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay2') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
	    
	    $(".all").click(function(){
	    	var value = "all";
    		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
	  
	      	    $.ajax({
	    			type:'POST',
	    			url:"{{ route('datbantheongay2') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	    });
    	
    });
</script>
@endif
@endsection