@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hóa đơn đã duyệt</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">hoadondaduyet</li>
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
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(Auth::user()->chucvu == 'admin')
                <table class="table table-sm table-hover text-nowrap">
                  <thead>                  
                    <tr align="center">
                      <th>Mã hóa đơn</th>
                      <th>Mã khách hàng</th>
                      <th>Tên khách hàng</th>
                      <th>Tổng tiền</th>
                      <th>Ngày xuất hóa đơn</th>
                      <th>Ngày duyệt hóa đơn</th>
                      <th>Sản phẩm đã mua</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <div class="out"></div>
                    @foreach($duyethoadon as $d)
                      <tr align="center">
                        <td>HD_{!!$d->mahd!!}</td>
                        <td>
                           {!!$d->makh!!}
                        </td>
                        <td>
                            @if($d->fullname)
                                {!!$d->fullname!!}
                            @else
                                {!!$d->firstname!!} {!!$d->lastname!!}
                            @endif
                        </td>
                        <td>{!!number_format($d->tongtien)!!} VND</td>
                        <td>
                            {!!date('F j, Y, g:i a',strtotime($d->ngayxuathoadon))!!}
                        </td>
                        <td>
                            {!!date('F j, Y, g:i a',strtotime($d->created_at))!!}
                        </td>
                        <td style="width:85px">
                            <button type="button" class="btn btn-success btn-sm btn1" id="{{$d->mahd}}"><i class="fas fa-eye nav-icon"></i></button>
                        </td>
                        <td style="width:85px">
                          <a href="{{ URL::route('xoaduyethoadon',$d->id)}}"> 
                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                @elseif(Auth::user()->chucvu == 'staff')
                  <table class="table table-sm table-hover text-nowrap">
                  <thead>                  
                    <tr align="center">
                      <th>Mã hóa đơn</th>
                      <th>Mã khách hàng</th>
                      <th>Tên khách hàng</th>
                      <th>Tổng tiền</th>
                      <th>Ngày xuất hóa đơn</th>
                      <th>Ngày duyệt hóa đơn</th>
                      <th>Sản phẩm đã mua</th>
                    </tr>
                  </thead>
                  <tbody>
                     <div class="out"></div>
                    @foreach($duyethoadon as $d)
                      <tr align="center">
                        <td>HD_{!!$d->mahd!!}</td>
                        <td>
                           {!!$d->makh!!}
                        </td>
                        <td>
                            @if($d->fullname)
                                {!!$d->fullname!!}
                            @else
                                {!!$d->firstname!!} {!!$d->lastname!!}
                            @endif
                        </td>
                        <td>{!!number_format($d->tongtien)!!} VND</td>
                        <td>
                            {!!date('F j, Y, g:i a',strtotime($d->ngayxuathoadon))!!}
                        </td>
                        <td>
                            {!!date('F j, Y, g:i a',strtotime($d->created_at))!!}
                        </td>
                        <td style="width:85px">
                            <button type="button" class="btn btn-success btn-sm btn1" id="{{$d->mahd}}"><i class="fas fa-eye nav-icon"></i></button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
                  <div class="card-header">
                    
                  </div>
              </div>
              @if(Auth::user()->chucvu == 'admin')
                <a href="{{URL::route('xoatatcaduyethoadon')}}">
                  <button type="button" class="btn btn-primary btn-success">Xóa tất cả</button>
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
    	  var id = $(this).attr('id');
    		var _token = $('input[name="_token"]').val();
    		
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('sanphamdamua') }}",
	    			data:{
	    				id:id,_token:_token
	    			},
	    			success:function(data){
	              		$('.out').html(data);
	              }
	    		});
	    });
    	
    });
</script>
@elseif(Auth::user()->chucvu == 'staff')
<script language="javascript">
    $(document).ready(function(){
    	
    	$(".btn1").click(function(){
    	  var id = $(this).attr('id');
    		var _token = $('input[name="_token"]').val();
    		
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('sanphamdamua1') }}",
	    			data:{
	    				id:id,_token:_token
	    			},
	    			success:function(data){
	              		$('.out').html(data);
	              }
	    		});
	    });
    	
    });
</script>
@endif
@endsection