@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý phòng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">quanlyphong</li>
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
                        <th>Tên phòng</th>
                        <th>Số lượng</th>
                        <th>Tiền phòng</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(Auth::user()->chucvu == 'admin')
                      @foreach($quanlyphong as $s)
                        <tr align="center">
                          <td>{{$s->id}}</td>
                          <td><label>{{$s->tenphong}}</label></td>
                          <td><label>{{$s->soluong}}</label></td>
                          <td>{{$s->tienphong}} VND</td>
                          <td style="width:85px">
                            <a href="{{ URL::route('chucnangcapnhatphong',$s->id)}}">
                              <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-edit nav-icon"></i></button>
                            </a>
                          </td>
                          <td style="width:85px">
                            <a href="{{ URL::route('chucnangxoaphong',$s->id)}}">
                              <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      <!--@elseif(Auth::user()->chucvu == 'staff')-->
                      <!--  @foreach($quanlyphong as $s)-->
                      <!--    <tr align="center">-->
                      <!--      <td>{{$s->id}}</td>-->
                      <!--      <td><label>{{$s->tenbaidang}}</label></td>-->
                      <!--      <td><img src="../public/images/{{$s->hinhanh}}" width="50px" height="50px" style="border-radius:10px;"></td>-->
                      <!--      <td>{{$s->nguoidang}}</td>-->
                      <!--      <td style="width:85px">-->
                      <!--        <a href="{{ URL::route('chucnangcapnhatphong1',$s->id)}}">-->
                      <!--          <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-edit nav-icon"></i></button>-->
                      <!--        </a>-->
                      <!--      </td>-->
                      <!--      <td style="width:85px">-->
                      <!--        <a href="{{ URL::route('chucnangxoaphong1',$s->id)}}">-->
                      <!--          <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt nav-icon"></i></button>-->
                      <!--        </a>-->
                      <!--      </td>-->
                      <!--    </tr>-->
                      <!--  @endforeach-->
                      @endif
                  </tbody>
                </table>
                </div>
              </div>
                  <div class="card-header">
                    <div class="card-tools">
                        {{ $quanlyphong->links()}}
                    </div>
                  </div>
              </div>
              @if(Auth::user()->chucvu == 'admin')
                <a href="{{ URL::route('themphong')}}">
                  <button type="button" class="btn btn-danger"><b></b>Thêm phòng</button>
                </a>
              <!--@elseif(Auth::user()->chucvu == 'staff')-->
              <!--  <a href="{{ URL::route('themphong1')}}">-->
              <!--    <button type="button" class="btn btn-danger"><b></b>Thêm phòng</button>-->
              <!--  </a>-->
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
	    			url:"{{ route('timkiemchucnangbangblog') }}",
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
<!--@elseif(Auth::user()->chucvu == 'staff')-->
<!--<script language="javascript">-->
<!--    $(document).ready(function(){-->
    	
<!--    	$(".btn1").click(function(){-->
<!--	    	var value = $('.value1').val();-->
<!--    		var _token = $('input[name="_token"]').val();-->
    		// alert(value);
    		// alert(_token);
    		// alert(wards);
    		// alert(_token);
<!--	      if(value == '')-->
<!--	      {-->
<!--	      	alert('Bạn chưa nhập!!!');-->
<!--	      }-->
<!--	      else-->
<!--	      {-->
<!--	      	$.ajax({-->
<!--	    			type:'POST',-->
<!--	    			url:"{{ route('timkiemchucnangbangblog1') }}",-->
<!--	    			data:{-->
<!--	    				value:value,_token:_token-->
<!--	    			},-->
<!--	    			success:function(data){-->
<!--	              		$('.search1').html(data);-->
<!--	              }-->
<!--	    		});-->
<!--	      }-->
<!--	    });-->
    	
<!--    });-->
<!--</script>-->
@endif
@endsection