@extends('Frontend.layouts.index')

@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ URL::to('/') }}/public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Chi tiết hóa đơn giao hàng</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Hoadongiaohang</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    
    {{ csrf_field() }}
    @if($shipping)
        <section class="ftco-section contact-section">
          <div class="container mt-5">
            <div class="row block-9">
    			<div class="col-md-7 billing-form p-3 p-md-3 ftco-animate ftco-bg-dark">
    			    <h3 class="mb-4 billing-heading">1998 Coffee</h3>
    				<div class="row">
                        <div class="col-md-12 mb-4">
            	              <h3>Cảm ơn bạn đã mua hàng tại 1998 coffee</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <p><span style="font-size:20px">Thông tin nhận hàng</span></p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><span>Họ và tên:</span> <a style="color:#e6b800">{{$thongtincanhan->firstname}} {{$thongtincanhan->lastname}}</a></p>
                                <p><span>Địa chỉ:</span> <a style="color:#e6b800">{{$thongtincanhan->diachi}}</a></p>
                                <p><span>Điện thoại:</span> <a style="color:#e6b800">{{$thongtincanhan->sdt}}</a></p>
                                <p><span>Email:</span> <a style="color:#e6b800">{{$thongtincanhan->email}}</a></p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><span style="font-size:20px">Hình thức thanh toán</span></p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p>
                                    @if($payment->phuongthuc == 'VNPay')
                                        {{$payment->phuongthuc}} - Thanh toán online VNPAY
                                    @else
                                        Thanh toán khi nhận hàng
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <p><span style="font-size:20px">Thông tin Thanh toán</span>(click to edit)</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><span>Họ và tên:</span> <a contenteditable data-edit_name="{{$shipping->id}}" class="ten" style="color:#e6b800">
                                    @if($shipping->fullname)
                                        {{$shipping->fullname}}
                                    @else
                                        {{$shipping->firstname}} {{$shipping->lastname}}
                                    @endif
                                    </a></p>
                                <p><span>Địa chỉ:</span> <a class="diachi" style="color:#e6b800">{{$shipping->diachiship}}</a></p>
                                <p><span>Điện thoại:</span> <a contenteditable data-edit_dt="{{$shipping->id}}" class="sdt" style="color:#e6b800">{{$shipping->dienthoai}}</a></p>
                                <p><span>Email:</span> <a contenteditable data-edit_email="{{$shipping->id}}" class="email" style="color:#e6b800">{{$shipping->email}}</a></p>
                                <p><span>Ghi chú:</span> <a contenteditable data-edit_ghichu="{{$shipping->id}}" class="ghichu" style="color:#e6b800">{{$shipping->tinnhan}}</a></p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><span style="font-size:20px">Hình thức vận chuyển</span></p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p>Giao hàng tận nơi</p>
                            </div>
                        </div>
                    </div>
    			</div>
    		<div class="col-md-1"></div>
            <div class="col-md-4 billing-form p-3 p-md-4 ftco-animate ftco-bg-dark">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h1 style="font-size:30px">Đơn hàng:</h1>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Món hàng:</span> 
                            @foreach($chitietdonhang as $c)
                                </br><a style="color:#e6b800">{{$c->soluong}} {{$c->tensanpham}} - {{$c->gia * $c->soluong}} VND</a>
                            @endforeach
                        </p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Tạm tính:</span> 
                            
                            <a style="color:#e6b800">
                                <?php
                                        $tamtinh = 0;
                                        foreach($chitietdonhang as $c)
                                        {
                                            $tamtinh = $tamtinh + $c->soluong*$c->gia;
                                        }
                                        echo $tamtinh;
                                    ?>
                                VND
                            </a>
                        </p>
                        <p><span>Phí vận chuyển:</span>  <a style="color:#e6b800">
                                    <?php
                                        $tamtinh1 = 0;
                                        foreach($chitietdonhang as $c)
                                        {
                                            $tamtinh1 = $tamtinh1 + $c->soluong*$c->gia;
                                        }
                                        
                                        echo $donhang->tongdonhang-$tamtinh1;
                                    ?>
                                    VND
                        </a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span style="font-size:25px">Tổng cộng: 
                            <?php
                                echo $donhang->tongdonhang;
                            ?>
                            VND
                        </span></p>
                    </div>
                    
                    <div class="cart-detail ftco-bg-dark p-3 p-md-4">
        				<p>
            				<button type="button" class="btn btn-primary py-3 px-4 cancelshipping">Hủy đơn hàng</button>
        				</p>
        				<p>
        				    <a href="{{ URL::route('shopgiaohang')}}">
            				    <button type="button" class="btn btn-primary py-3 px-4">Đặt thêm giao hàng mới</button>
            				</a>
        				</p>
        			</div>
        			
                </div>
            </div>
        </div>
        </div>
        </section>
    @endif
    
    <div id="map"></div>

@endsection

@section('script')
<script language="javascript">
   $(document).ready(function(){
       
    $(".cancelshipping").click(function(){
        swal({
            title: "Bạn có muốn hủy đơn hàng",
            text: "Hủy sẽ xóa tất cả thông tin giao hàng hiện tại",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Hủy",
            confirmButtonText: "Xác nhận",
            closeOnConfirm: false,
        }, function () {
            //swal("Deleted!", "Đã hủy thành công", "success");
            document.location.href="{!! route('cancelorder-shipping',$donhang->id); !!}";
        });
    })
    
    $(document).on('blur','.diachi',function(){
      var diachi_id = $(this).data('edit_add');
      var diachi_value = $(this).text();
      var _token = $('input[name="_token"]').val();
    //   alert(ten_id);
    //   alert(ten_value);
    //   alert(_token);
      $.ajax({
    			type:'POST',
    			url:"{{ route('updatediachishipping') }}",
    			data:{
    				diachi_id:diachi_id,diachi_value:diachi_value,_token:_token
    			},
    			success:function(data){
              		location.reload();
              }
    		});
    });
    
    $(document).on('blur','.ten',function(){
      var ten_id = $(this).data('edit_name');
      var ten_value = $(this).text();
      var _token = $('input[name="_token"]').val();
    //   alert(ten_id);
    //   alert(ten_value);
    //   alert(_token);
      $.ajax({
    			type:'POST',
    			url:"{{ route('updatetenshipping') }}",
    			data:{
    				ten_id:ten_id,ten_value:ten_value,_token:_token
    			},
    			success:function(data){
              		location.reload();
              }
    		});
    });
    
    $(document).on('blur','.sdt',function(){
      var dt_id = $(this).data('edit_dt');
      var dt_value = $(this).text();
      var _token = $('input[name="_token"]').val();
    //   alert(ten_id);
    //   alert(ten_value);
    //   alert(_token);
      $.ajax({
    			type:'POST',
    			url:"{{ route('updatesdtshipping') }}",
    			data:{
    				dt_id:dt_id,dt_value:dt_value,_token:_token
    			},
    			success:function(data){
              		location.reload();
              }
    		});
    });
    
    $(document).on('blur','.email',function(){
      var email_id = $(this).data('edit_email');
      var email_value = $(this).text();
      var _token = $('input[name="_token"]').val();
    //   alert(ten_id);
    //   alert(ten_value);
    //   alert(_token);
      $.ajax({
    			type:'POST',
    			url:"{{ route('updateemailshipping') }}",
    			data:{
    				email_id:email_id,email_value:email_value,_token:_token
    			},
    			success:function(data){
              		location.reload();
              }
    		});
    });
    
    $(document).on('blur','.ghichu',function(){
      var ghichu_id = $(this).data('edit_ghichu');
      var ghichu_value = $(this).text();
      var _token = $('input[name="_token"]').val();
    //   alert(ghichu_id);
    //   alert(ghichu_value);
    //   alert(_token);
      $.ajax({
    			type:'POST',
    			url:"{{ route('updateghichushipping') }}",
    			data:{
    				ghichu_id:ghichu_id,ghichu_value:ghichu_value,_token:_token
    			},
    			success:function(data){
              		location.reload();
              }
    		});
    });
    	
   });
   
   
   
</script>
@endsection