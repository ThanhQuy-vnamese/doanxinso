@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">chitietdonhang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    
    {{ csrf_field() }}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-success">
              <div class="card-header">
                  <h3 class="card-title">Thông tin người mua</h3>
              </div>
              @if($hoadon->idshipping != NULL)
                  @foreach($giaohang as $g)
                      @if($g->id == $hoadon->idshipping)
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-7">
                              <div class="form-group">
                                <label>Tên khách hàng</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" name="ten" class="form-control" value="{!!$g->firstname!!} {!!$g->lastname!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-group">
                                <label>Mã khách hàng</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" name="makh" class="form-control" value="{!!$hoadon->idkhachhang!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-7">
                              <div class="form-group">
                                <label>Địa chỉ</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                  </div>
                                  <input type="text" name="diachi" class="form-control" value="{!!$g->diachi!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="text" name="email" class="form-control" value="{!!$g->email!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-7">
                              <div class="form-group">
                                <label>Số điện thoại</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="sdt" value="{!!$g->dienthoai!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-group">
                                <label>Hình thức thanh toán</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  @if($payment->phuongthuc == "Payment after arrival of goods")
                                    <input type="text" name="hinhthuctt" class="form-control" value="Thanh toán sau khi nhận hàng">
                                  @else
                                    <input type="text" name="hinhthuctt" class="form-control" value="{!!$payment->phuongthuc!!}">
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Địa chỉ giao hàng</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="shippingto" value="{!!$g->diachiship!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      @endif
                  @endforeach
                @else
                    @foreach($datban as $d)
                      @if($d->id == $hoadon->iddatban)
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-7">
                              <div class="form-group">
                                <label>Tên khách hàng</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" name="ten" class="form-control" value="{!!$d->yourname!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-group">
                                <label>Mã khách hàng</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" name="makh" class="form-control" value="{!!$d->idkhachhang!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-7">
                              <div class="form-group">
                                <label>Địa chỉ</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                  </div>
                                  <input type="text" name="diachi" class="form-control" value="Không có">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="text" name="email" class="form-control" value="{!!$d->email!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-7">
                              <div class="form-group">
                                <label>Số điện thoại</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="sdt" value="{!!$d->sdt!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-group">
                                <label>Hình thức thanh toán</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" name="hinhthuctt" class="form-control" value="{!!$payment->phuongthuc!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Địa chỉ giao hàng</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="shippingto" value="Dùng tại nhà hàng">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      @endif
                    @endforeach
                @endif
            </div>
            
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
                <table class="table table-sm table-hover text-nowrap">
                  <thead>                  
                    <tr align="center">
                      <th>Mã sản phẩm</th>
                      <th>Tên sản phẩm</th>
                      <th>Size</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($chitiethoadon as $c)
                    @if($c->iddonhang == $hoadon->id)
                    <tr align="center">
                      <td>{!!$c->idsanpham!!}</td>
                      <td>{!!$c->tensanpham!!}</td>
                      <td>{!!$c->size!!}</td>
                      <td>{!!$c->soluong!!}</td>
                      <td>
                        @foreach($sanpham as $s)
                              @if($s->id == $c->idsanpham )
                                {!!$s->gia!!}
                              @endif
                          @endforeach
                          VND
                      </td>
                      <td>
                        @foreach($sanpham as $s)
                              @if($s->id == $c->idsanpham )
                                <?php
            						        		$total = $s->gia * $c->soluong;
            						        		echo $total;
            						        ?>
                              @endif
                          @endforeach
                          VND
                      </td>
                    </tr>
                    @endif
                    @endforeach
                    <tr align="center">
                        <td></td>
                        <td></td>
                        <td><label>Số lượng:</label></td>
                        <td>
                            <?php
                                $dem = 0;
                                foreach($chitiethoadon as $c)
                                {
                                  if($c->iddonhang == $hoadon->id)
                                  {
                                    $dem = $dem + $c->soluong;
                                  }
                                }
                                echo $dem;
                            ?>
                        </td>
                        <td><label>Tổng tiền:</label></td>
                        <td>
                            <?php
                                $tongtiensanpham = 0;
                                foreach($chitiethoadon as $c)
                                {
                                    if($c->iddonhang == $hoadon->id)
                                    {
                                        $tongtiensanpham = $tongtiensanpham + $c->gia*$c->soluong;
                                    }
                                }
                                echo $tongtiensanpham;
                            ?>
                            VND
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
            
            
            <div class="col-md-4">
              <div class="card card-danger">
                    <div class="card-body">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Ngày CT</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                              </div>
                              <input type="text" name="ngaylaphd" class="form-control" value="{!!$hoadon->created_at!!}" disabled >
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Mã HD</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                              </div>
                              <input type="text" name="mahd" class="form-control" value="HD_{!!$hoadon->id!!}" disabled >
                            </div>
                          </div>
                        </div>
                    </div>
              </div>
              
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Tổng hóa đơn</h3>
                </div>
                <div class="card-body">
                  <div class="col-sm-12">
                    <div class="form-group">      
                        <label>Thành tiền</label>    
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" name="tongtien" class="form-control" value="
                            <?php
                                $tongtiensanpham = 0;
                                foreach($chitiethoadon as $c)
                                {
                                    if($c->iddonhang == $hoadon->id)
                                    {
                                        $tongtiensanpham = $tongtiensanpham + $c->gia*$c->soluong;
                                    }
                                }
                                echo $tongtiensanpham;
                            ?>
                        " disabled >
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Thanh toán</label>
                      <h6><i>(Bao gồm mã giãm giá và phí vận chuyển)</i></h6>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" name="thanhtien" class="form-control" value="
                          <?php
                    				echo number_format($hoadon->tongdonhang);
                    	    ?>
                        " disabled >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              @if(Auth::user()->chucvu == 'admin')
                <div class="card-success">
                  <div class="row">
                    <div class="col-sm-6" align="left">
                      <div class="form-group">      
                          <a target="blank" href="{{ URL::route('printorder',$hoadon->id)}}">
                            <button type="button" class="btn btn-success"><b>In hóa đơn</b></button>
                          </a>
                      </div>
                    </div>
                    <div class="col-sm-6" align="right">
                      <div class="form-group">      
                          <a href="{{ URL::route('postduyethoadon',$hoadon->id)}}">
                            <button type="button" class="btn btn-success"><b>Duyệt hóa đơn</b></button>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
              @elseif(Auth::user()->chucvu == 'staff')
                <div class="card-success">
                  <div class="row">
                    <div class="col-sm-6" align="left">
                      <div class="form-group">      
                          <a target="blank" href="{{ URL::route('printorder1',$hoadon->id)}}">
                            <button type="button" class="btn btn-success"><b>In hóa đơn</b></button>
                          </a>
                      </div>
                    </div>
                    <div class="col-sm-6" align="right">
                      <div class="form-group">      
                          <a href="{{ URL::route('postduyethoadon1',$hoadon->id)}}">
                            <button type="button" class="btn btn-success"><b>Duyệt hóa đơn</b></button>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
              
            </div>
        
      </div>
    </section>
    
  </div>
  <!-- /.content-wrapper -->
  @endsection