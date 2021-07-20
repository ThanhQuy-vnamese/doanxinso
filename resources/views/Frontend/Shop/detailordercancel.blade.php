@extends('Frontend.layouts.index')

@section('content')

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url({{ URL::to('/') }}/public/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Chi tiết hủy hóa đơn</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">trangchu</a></span> <span>chitiethuyhoadon</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    
    {{ csrf_field() }}
    
        <section class="ftco-section contact-section">
          <div class="container mt-5">
            <div class="row block-9">
                <div class="col-md-1"></div>
    			<div class="col-md-6 billing-form p-3 p-md-3 ftco-animate ftco-bg-dark">
    			    <h3 class="mb-4 billing-heading">1998 Coffee</h3>
    				<div class="row">
                        <div class="col-md-12 mb-4">
            	              <h3>Đơn hàng đã hủy của bạn</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12 mb-3">
                                <p><span style="font-size:20px">Thông tin khách hàng</span></p>
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
                                    @else
                                        {{$payment->phuongthuc}} - Thanh toán khi nhận hàng
                                    @endif
                                </p>
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
                                ?> VND
                            </a>
                        </p>
                        <p><span>Trạng thái thanh toán:</span>
                            <a style="color:#e6b800">{{$donhang->trangthaidonhang}}</a>
                        </p>
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span style="font-size:25px">Tổng cộng: 
                            <?php
                                if($donhang->hoantratien=="Hoàn trả 50% số tiền cọc")
                                {
                                    $tamtinh1 = 0;
                                    foreach($chitietdonhang as $c)
                                    {
                                        $tamtinh1 = $tamtinh1 + $c->soluong*$c->gia;
                                    }
                                        
                                    echo ($donhang->tongdonhang*50)/100;
                                }
                                else
                                {
                                    $tamtinh1 = 0;
                                    foreach($chitietdonhang as $c)
                                    {
                                        $tamtinh1 = $tamtinh1 + $c->soluong*$c->gia;
                                    }
                                        
                                    echo $donhang->tongdonhang;
                                }      
                            ?> VND
                        </span></p>
                        
                        <p><span style="font-size:20px">Hoàn trả: 
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
                                @if($giacacsanpham == 0)
                                    @if($donhang->tongdonhang == 50000)
                                       0 
                                    @elseif($donhang->tongdonhang > 50000)
                                        <?php
                                            echo $donhang->tongdonhang/2;
                                        ?>  
                                    @endif
                                @elseif($donhang->hoantratien =="Hoàn trả 100% số tiền thanh toán")
                                    <?php
                                        echo $donhang->tongdonhang;
                                    ?>
                                @elseif($donhang->hoantratien == NULL)
                                    0
                                @else
                                    <?php
                                        echo $giadatcocsanphamsaukhigiam;
                                    ?>
                                @endif
                            </a> VND
                        </span></p>
                    </div>
        			
                </div>
            </div>
        </div>
        </div>
        </section>
    
    <div id="map"></div>

@endsection