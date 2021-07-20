@extends('Frontend.layouts.index')

@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ URL::to('/') }}/public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Chi tiết hóa đơn đăt bàn</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">trangchu</a></span> <span>hoadondatban</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    
    {{ csrf_field() }}
    @if($donhang)
        <section class="ftco-section contact-section">
          <div class="container mt-5">
            <div class="row block-9">
    			<div class="col-md-7 billing-form p-3 p-md-3 ftco-animate ftco-bg-dark">
    			    <h3 class="mb-4 billing-heading">1998 Coffee</h3>
    				<div class="row">
                        <div class="col-md-12 mb-4">
            	              <h3>Cảm ơn bạn đã mua hàng ở 1998 coffee</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <p><span style="font-size:20px">Thông tin khách hàng đặt bàn</span></p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><span>Họ & Tên:</span> <a style="color:#e6b800">{{$thongtincanhan->firstname}} {{$thongtincanhan->lastname}}</a></p>
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
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <p><span style="font-size:20px">Thông tin thanh toán đặt bàn</span>(click to edit)</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><span>Họ & tên:</span> <a class="ten" style="color:#e6b800">{{$datban->yourname}}</a></p>
                                <!--contenteditable data-edit_name="{{$datban->id}}"-->
                                <p><span>Email:</span> <a contenteditable data-edit_email="{{$datban->id}}" class="email" style="color:#e6b800">{{$datban->email}}</a></p>
                                <p><span>Điện thoại:</span> <a contenteditable data-edit_dt="{{$datban->id}}" class="sdt" style="color:#e6b800">{{$datban->sdt}}</a></p>
                                <p><span>Số người:</span> <a class="sdt" style="color:#e6b800">{{$datban->songuoi}}</a></p>
                                @if($datban->soluongban == 1)
                                    <p><span>Số lượng bàn:</span> <a class="soluong" style="color:#e6b800">1 (bàn 2 người)</a></p>
                                @elseif($datban->soluongban == 2)
                                    <p><span>Số lượng bàn:</span> <a class="soluong" style="color:#e6b800">1 (bàn 2 người)</a></p>
                                @elseif($datban->soluongban == 3)
                                    <p><span>Số lượng bàn:</span> <a class="soluong" style="color:#e6b800">1 (bàn 4 người)</a></p>
                                @elseif($datban->soluongban == 4)
                                    <p><span>Số lượng bàn:</span> <a class="soluong" style="color:#e6b800">1 (bàn 4 người)</a></p>
                                @elseif($datban->soluongban == 5)
                                    <p><span>Số lượng bàn:</span> <a class="soluong" style="color:#e6b800">2 (bàn 4 người và bàn 2 người)</a></p>
                                @elseif($datban->soluongban == 6)
                                    <p><span>Số lượng bàn:</span> <a class="soluong" style="color:#e6b800">2 (bàn 4 người và bàn 2 người)</a></p>
                                @elseif($datban->soluongban == 7)
                                    <p><span>Số lượng bàn:</span> <a class="soluong" style="color:#e6b800">2 (bàn 4 người và bàn 4 người)</a></p>
                                @elseif($datban->soluongban == 8)
                                    <p><span>Số lượng bàn:</span> <a class="soluong" style="color:#e6b800">2 (bàn 4 người và bàn 4 người)</a></p>
                                @endif
                                <p><span>Ngày đến nhận bàn:</span> <a class="ngay" style="color:#e6b800">{{$datban->ngay}}</a></p>
                                <p><span>Thời gian nhận bàn:</span> <a class="thoigian" style="color:#e6b800">{{$datban->thoigian}}</a></p>
                                <p><span>Tin nhắn:</span> <a contenteditable data-edit_tinnhan="{{$datban->id}}" class="tinnhan" style="color:#e6b800">{{$datban->tinnhan}}</a></p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p><span style="font-size:20px">Hình thức</span></p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p>Dùng tại nhà hàng</p>
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
                        <p><span>Tạm tính: 
                            
                            <a style="color:#e6b800">
                                <?php
                                        $tamtinh = 0;
                                        foreach($chitietdonhang as $c)
                                        {
                                            $tamtinh = $tamtinh + $c->soluong*$c->gia;
                                        }
                                        echo $tamtinh;
                                    ?> 
                            </a>VND
                        </span></p>
                        
                        <p><span>Phí bàn {{$datban->loaiban}}:</span>
                            {{$tienphongnhahang->tienphong}} VND
                        </p>
                        
                        <p><span style="font-size:20px">Tổng cộng: 
                            <a style="color:#e6b800">
                                <?php
                                    echo $donhang->tongdonhang ;
                                ?>
                            </a> VND
                        </span></p>
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Trạng thái thanh toán:</span>
                            @if($tamtinh == 0)
                                <a style="color:#e6b800">{{$donhang->trangthaidonhang}} bàn - Không đặt món</a>
                            @else
                                <a style="color:#e6b800">{{$donhang->trangthaidonhang}} 50%</a>
                            @endif
                        </p>
                        <p><span style="font-size:20px">Trả sau: 
                            <a style="color:#e6b800">
                                <?php
                                    $giacacsanpham = 0;
                                    foreach($chitietdonhang as $c)
                                    {
                                        $giacacsanpham = $giacacsanpham + $c->soluong*$c->gia;
                                    }
                                    $tiendu = $donhang->tongdonhang - $giacacsanpham;
                                    if($tiendu == 0)
                                    {
                                        $giadatcocsanphamsaukhigiam = $donhang->tongdonhang/2;
                                    }
                                    elseif($tiendu < 50000)
                                    {
                                        $tiengiamgia = 50000 - $tiendu;
                                        $giadatcocsanphamsaukhigiam = ($giacacsanpham - $tiengiamgia)/2;
                                    }
                                    elseif($tiendu == 50000)
                                    {
                                        $giadatcocsanphamsaukhigiam = $giacacsanpham/2;
                                    }
                                    elseif($tiendu > 50000)
                                    {
                                        $giadatcocsanphamsaukhigiam = $donhang->tongdonhang/2;
                                    }
                                ?>
                                @if($tamtinh == 0)
                                    @if($datban->loaiban == "Bàn thường")
                                       0 
                                    @else
                                        <?php
                                            echo $donhang->tongdonhang/2;
                                        ?>
                                    @endif
                                @else
                                    <?php
                                        echo $giadatcocsanphamsaukhigiam;
                                    ?>
                                @endif
                            </a> VND
                        </span></p>
                        @if($tiendu<=50000 && $tiendu>0)
                            <p><span style="font-size:20px">Hoàn trả: 
                                <a style="color:#e6b800">
                                    50000
                                </a> VND
                            </span></p>
                        @endif
                    </div>
                    @if($dt < strtotime("+1 day",$ngaydatban))
                        <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                			<p>
                                <a>
                    				<button type="button" class="btn btn-primary py-3 px-4 cancelreservation">Hủy đơn hàng</button>
                    			</a>
                			</p>
            				<p>
                                <a href="{{ URL::route('shopdatban')}}">
                				    <button type="button" class="btn btn-primary py-3 px-4">Đặt thêm sản phẩm</button>
                				</a>
            				</p>
            			</div>
        			@endif
                </div>
            </div>
        </div>
        </div>
        </section>
    @endif
    
    <div id="map"></div>

@endsection

@if($donhang)
    @section('script')
    <script language="javascript">
       $(document).ready(function(){
        
        $(".cancelreservation").click(function(){
            swal({
                title: "Bạn có muốn hủy đơn hàng",
                text: "Hủy sẽ xóa tất cả thông tin đặt bàn hiện tại",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Hủy",
                confirmButtonText: "Xác nhận",
                closeOnConfirm: false,
            }, function () {
                //swal("Deleted!", "Đã hủy thành công", "success");
                document.location.href="{!! route('cancelorder-reservation',$donhang->id); !!}";
            });
        })
        
        // $(document).on('blur','.ten',function(){
        //   var ten_id = $(this).data('edit_name');
        //   var ten_value = $(this).text();
        //   var _token = $('input[name="_token"]').val();
        // //   alert(ten_id);
        // //   alert(ten_value);
        // //   alert(_token);
        //   $.ajax({
        // 			type:'POST',
        // 			url:"{{ route('updatetendatban') }}",
        // 			data:{
        // 				ten_id:ten_id,ten_value:ten_value,_token:_token
        // 			},
        // 			success:function(data){
        //           		location.reload();
        //           }
        // 		});
        // });
        
        $(document).on('blur','.email',function(){
          var email_id = $(this).data('edit_email');
          var email_value = $(this).text();
          var _token = $('input[name="_token"]').val();
        //   alert(ten_id);
        //   alert(ten_value);
        //   alert(_token);
          $.ajax({
        			type:'POST',
        			url:"{{ route('updateemaildatban') }}",
        			data:{
        				email_id:email_id,email_value:email_value,_token:_token
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
        			url:"{{ route('updatesdtdatban') }}",
        			data:{
        				dt_id:dt_id,dt_value:dt_value,_token:_token
        			},
        			success:function(data){
                  		location.reload();
                  }
        		});
        });
        
        $(document).on('blur','.tinnhan',function(){
          var tinnhan_id = $(this).data('edit_tinnhan');
          var tinnhan_value = $(this).text();
          var _token = $('input[name="_token"]').val();
        //   alert(ten_id);
        //   alert(ten_value);
        //   alert(_token);
          $.ajax({
        			type:'POST',
        			url:"{{ route('updatetinnhandatban') }}",
        			data:{
        				tinnhan_id:tinnhan_id,tinnhan_value:tinnhan_value,_token:_token
        			},
        			success:function(data){
                  		location.reload();
                  }
        		});
        });
        	
       });
       
       
       
    </script>
    @endsection
@else
    @section('script')
    <script language="javascript">
       $(document).ready(function(){
        
        $(".cancelreservationfast").click(function(){
            swal({
                title: "Bạn có muốn hủy đơn hàng",
                text: "Hủy sẽ xóa tất cả thông tin đặt bàn hiện tại",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Hủy",
                confirmButtonText: "Xác nhận",
                closeOnConfirm: false,
            }, function () {
                //swal("Deleted!", "Đã hủy thành công", "success");
                document.location.href="{!! route('cancelorder-reservationfast',$datban->id); !!}";
            });
        })
        	
       });
       
       
       
    </script>
    @endsection

@endif