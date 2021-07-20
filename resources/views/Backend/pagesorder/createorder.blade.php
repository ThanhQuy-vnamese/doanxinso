@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tạo hóa đơn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">taohoadon</li>
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
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">Sản phẩm</h3>
        
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>Multiple</label>
                          <select name="monan" class="duallistbox sanpham" multiple="multiple">
                            @foreach($sanpham as $s)
                                <option value="{{$s->id}}">{{$s->tenmonan}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2">
                            <button class="btn btn-success datngay" style="width:100%;">Đặt ngay</button>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success shiphang" style="width:100%;">Ship hàng</button>
                        </div>
                    </div>
                  </div>
                </div>
                
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  
  
  <script>
  $(function () {
    //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    
        $(".shiphang").click(function(){
	    	var value = $('.sanpham').val();
    		var _token = $('input[name="_token"]').val();
            // alert(value);
            // alert(_token);
    		// alert(wards);
    		// alert(_token);
    	  if(value == '')
	      {
	      	alert('Bạn chưa chọn sản phẩm!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('postshipdonhang') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		window.location="{{ route('shipdonhang') }}";
	              }
	    		});
	      }
	     
	    });
	
	    $(".datngay").click(function(){
	    	var value = $('.sanpham').val();
    		var _token = $('input[name="_token"]').val();
            // alert(value);
            // alert(_token);
    		// alert(wards);
    		// alert(_token);
    	  if(value == '')
	      {
	      	alert('Bạn chưa chọn sản phẩm!!!');
	      }
	      else
	      {
	      	$.ajax({
	    			type:'POST',
	    			url:"{{ route('postlaphoadon') }}",
	    			data:{
	    				value:value,_token:_token
	    			},
	    			success:function(data){
	              		window.location="{{ route('shipdonhang') }}";
	              }
	    		});
	      }
	     
	    });
    
  })
</script>
@endsection