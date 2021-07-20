@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bảng nhân viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">bangnhanvien</li>
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
            <div class="col-md-11">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tài khoản nhân viên</h3>
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
              <div class="card-body table-responsive p-0">
                <div class="search1">
                  <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Chức vụ</th>
                        <th>ID_thongtincanhan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($taikhoan as $s)
                      <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->username}}</td>
                        <td>{{$s->password}}</td>
                        @if($s->chucvu=='staff')
                          <td>Staff</td>
                        @else
                          <td>Guest</td>
                        @endif
                        <td>{{$s->id_thongtindangki}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-header">
                <div class="card-tools">
                  {{ $taikhoan->links()}}
                </div>
              </div>
            </div>
        </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông tin nhân viên</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right value2" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default btn2"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <div class="search2">
                  <table class="table table-bordered table-hover text-nowrap">
                    <thead>                  
                      <tr>
                        <th>ID</th>
                        <th>Họ & tên lót</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($nhanvien as $s)
                      <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->firstname}}</td>
                        <td>{{$s->lastname}}</td>
                        <td>{{$s->email}}</td>
                        <td>{{$s->diachi}}</td>
                        <td>{{$s->sdt}}</td>
                        <td>{{$s->usename}}</td>
                        <td>{{$s->password}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-header">
                <div class="card-tools">
                  {{ $nhanvien->links()}}
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
	    	var value1 = $('.value1').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(value1);
    		// alert(_token);
    		// alert(wards);
    		// alert(_token);
	      if(value1 == '')
	      {
	      	alert('Bạn chưa nhập!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('timkiemtaikhoanstaff') }}",
	    			data:{
	    				value1:value1,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	      }
	    });
	    
	    $(".btn2").click(function(){
	    	var value2 = $('.value2').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(value2);
    		// alert(_token);
    		// alert(wards);
    		// alert(_token);
    		if(value2 == '')
	      {
	      	alert('Bạn chưa nhập!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('timkiemthongtinstaff') }}",
	    			data:{
	    				value2:value2,_token:_token
	    			},
	    			success:function(data){
	              		$('.search2').html(data);
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
    		// alert(wards);
    		// alert(_token);
	      if(value1 == '')
	      {
	      	alert('Bạn chưa nhập!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('timkiemtaikhoanstaff1') }}",
	    			data:{
	    				value1:value1,_token:_token
	    			},
	    			success:function(data){
	              		$('.search1').html(data);
	              }
	    		});
	      }
	    });
	    
	    $(".btn2").click(function(){
	    	var value2 = $('.value2').val();
    		var _token = $('input[name="_token"]').val();
    // 		alert(value2);
    // 		alert(_token);
    		// alert(wards);
    		// alert(_token);
    		if(value2 == '')
	      {
	      	alert('Bạn chưa nhập!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('timkiemthongtinstaff1') }}",
	    			data:{
	    				value2:value2,_token:_token
	    			},
	    			success:function(data){
	              		$('.search2').html(data);
	              }
	    		});
	      }
	     
	    });
    	
    });
</script>
@endif
@endsection