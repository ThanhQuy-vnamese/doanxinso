@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Phí vận chuyển</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">phivanchuyen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><b>Form</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                {{ csrf_field() }}
                <div class="card-body">
                  
                  <div class="form-group">
                    <label>Chọn Thành phố</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                    <select id="city" name="city" class="form-control choose city">
                        <option value="">--chọn thành phố--</option>
                        @foreach($city as $ci)
                            <option value="{{$ci->matp}}">{{$ci->nametinhthanhpho}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Chọn Quận huyện</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                    <select id="province" name="province" class="form-control choose province">
                        <option value="">--chọn quận huyện--</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Chọn Xã phường</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                      </div>
                    <select id="wards" name="wards" class="form-control wards">
                        <option value="">--chọn xã phường--</option>
                      </select>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label>Phí vận chuyển</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                      </div>
                      <input type="text" name="fee_ship" class="form-control fee_ship" placeholder="">
                    </div>
                  </div>
    
                </div>

                <div class="card-footer">
                  <button type="button" id="adddelivery" name="adddelivery" class="btn btn-success adddelivery">Thêm phí vận chuyển</button>
                </div>
              </form>
            </div>

            </div>

          <div class="col-md-6">

          </div>
          <div id="load_delivery">
            
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
 
@section('script')
<script language="javascript">
   $(document).ready(function(){
    
    fetch_delivery(); 
    
    function fetch_delivery()
    {
      var _token = $('input[name="_token"]').val();
      $.ajax({
    			type:'POST',
    			url:"{{ route('selectfeeship') }}",
    			data:{
    				_token:_token
    			},
    			success:function(data){
              	$('#load_delivery').html(data);	
              }
    		});
    }
    
    $(document).on('blur','.fee_feeship_edit',function(){
      var feeship_id = $(this).data('feeship_id');
      var feeship_value = $(this).text();
      var _token = $('input[name="_token"]').val();
    //   alert(feeship_id);
    //   alert(feeship_value);
      $.ajax({
    			type:'POST',
    			url:"{{ route('updatedelivery') }}",
    			data:{
    				feeship_id:feeship_id,feeship_value:feeship_value,_token:_token
    			},
    			success:function(data){
              		fetch_delivery(); 
              }
    		});
    });
    
    $(".adddelivery").click(function(){
    		var city = $('.city').val();
    		var province = $('.province').val();
    		var wards = $('.wards').val();
    		var fee_ship = $('.fee_ship').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(city);
    		$.ajax({
    			type:'POST',
    			url:"{{ route('insertdelivery') }}",
    			data:{
    				city:city,province:province,wards:wards,fee_ship:fee_ship,_token:_token
    			},
    			success:function(data){
              		fetch_delivery(); 
              },
          error:function(data){
              		alert("Đã tồn tại!!");
              		location.reload();
              }
    		});
    	});
    	
    $(".choose").on('change',function(){
    		var action = $(this).attr('id');
    	  var maid = $(this).val();
    	  var result = '';
    	  var _token = $('input[name="_token"]').val();
    	  if(action=='city')
    	  {
    	    result = 'province';
    	  }
    	  else
    	  {
    	    result = 'wards';
    	  }
    	  $.ajax({
    			type:'POST',
    			url:"{{ route('selectdelivery') }}",
    			data:{
    				action:action,maid:maid,_token:_token
    			},
    			success:function(data){
              		$('#'+result).html(data);
              }
    		});
    	 
    	});
    	
    // $(".btn1").click(function(){
	   // 	var value = $('.value1').val();
    // 		var _token = $('input[name="_token"]').val();
    // 		alert(value);
    // 		alert(_token);
    // 		// alert(wards);
    // 		// alert(_token);
	   //  // if(value == '')
	   //  // {
	   //  // 	alert('Bạn chưa nhập!!!');
	   //  // }
	   //  // else
	   //  // {
	   //  // 	$.ajax({
	   // 	// 		type:'POST',
	   // 	// 		url:"{{ route('timkiemvanchuyen') }}",
	   // 	// 		data:{
	   // 	// 			value:value,_token:_token
	   // 	// 		},
	   // 	// 		success:function(data){
	   //  //         		$('.search1').html(data);
	   //  //         }
	   // 	// 	});
	   //  // }
	   // });
    	
   });
   
   
   
</script>
@endsection