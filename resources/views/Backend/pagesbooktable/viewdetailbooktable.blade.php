

@extends('Backend.layouts.indexadmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết đơn hàng đặt bàn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">trangchu</a></li>
              <li class="breadcrumb-item active">chitietdatban</li>
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
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Tên khách hàng</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" name="ten" class="form-control" value="{!!$booking->yourname!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Mã khách hàng</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" name="makh" class="form-control" value="{!!$booking->idkhachhang!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Số điện thoại</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                  </div>
                                  <input type="text" name="sdt" value="{!!$booking->sdt!!}" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="text" name="email" class="form-control" value="{!!$booking->email!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Tin nhắn</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="sdt" value="{!!$booking->tinnhan!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Hình thức thanh toán</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                                  </div>
                                  <input type="text" name="hinhthuctt" class="form-control" value="{!!$phuongthucthanhtoan->phuongthuc!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Số người</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="sdt" value="{!!$booking->songuoi!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Số lượng bàn</label>
                                <div class="input-group">
                                  <input type="text" name="hinhthuctt" class="form-control" value="{!!$booking->soluongban!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Ngày nhận bàn</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="sdt" value="{!!$booking->ngay!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Thời gian nhận bàn</label>
                                <div class="input-group">
                                  <input type="text" name="hinhthuctt" class="form-control" value="{!!$booking->thoigian!!}">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Loại bàn</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="sdt" value="{!!$booking->loaiban!!}">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Địa chỉ nhận hàng</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="shippingto" value="Dùng tại nhà hàng">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
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
                    @foreach($chitietdonhang as $c)
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
                    @endforeach
                    <tr align="center">
                        <td></td>
                        <td></td>
                        <td><label>Số lượng:</label></td>
                        <td>
                            <?php
                                $dem = 0;
                                foreach($chitietdonhang as $c)
                                {
                                    $dem = $dem + $c->soluong;
                                }
                                echo $dem;
                            ?>
                        </td>
                        <td><label>Tổng tiền:</label></td>
                        <td>
                            <?php
                                $tongtiensanpham = 0;
                                foreach($chitietdonhang as $c)
                                {
                                        $tongtiensanpham = $tongtiensanpham + $c->gia*$c->soluong;
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
                              <input type="text" name="ngaylaphd" class="form-control" value="{!!$donhang->created_at!!}" disabled >
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
                              <input type="text" name="mahd" class="form-control" value="HD_{!!$donhang->id!!}" disabled >
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Trạng thái đơn hàng</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-alt"></i></span>
                              </div>
                              <input type="text" name="trangthai" class="form-control" value="{{$donhang->trangthaidonhang}}" disabled >
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
                          <span class="input-group-text">VND</span>
                        </div>
                        <input type="text" name="tongtien" class="form-control" value="
                            <?php
                                $tongtiensanpham = 0;
                                foreach($chitietdonhang as $c)
                                {
                                        $tongtiensanpham = $tongtiensanpham + $c->gia*$c->soluong;
                                }
                                echo $tongtiensanpham;
                            ?>
                        " disabled >
                      </div>
                    </div>
                  </div>
                  
                        <?php
                            if($demchitietdonhang>=1)
                            {
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
                            }
                            elseif($donhang->tongdonhang == 50000)
                            {
                                $giadatcocsanphamsaukhigiam = $donhang->tongdonhang;
                            }
                            else
                            {
                                $giadatcocsanphamsaukhigiam = $donhang->tongdonhang/2;
                            }
                                
                        ?>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tổng hóa đơn</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">VND</span>
                        </div>
                        <input type="text" name="thanhtien" class="form-control" value="
                          <?php
                    				echo number_format($donhang->tongdonhang);
                    	    ?>
                        " disabled >
                      </div>
                    </div>
                  </div>
                  
                  @if($demchitietdonhang>=1)
                      @if($tiendu<=50000 && $tiendu>0)
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Hoàn trả khách</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">VND</span>
                            </div>
                            <input type="text" name="thanhtien" class="form-control" value="
                              <?php
                        				echo 50000;
                        	    ?>
                            " disabled >
                          </div>
                        </div>
                      </div>
                      @endif
                  @endif
                  
                  @if($demchitietdonhang>=1)
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Khách trả sau</label>
                      <h6><i>(Bao gồm mã giãm giá và đã đặt cọc)</i></h6>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">VND</span>
                        </div>
                        <input type="text" name="thanhtien" class="form-control" value="
                          <?php
                    				echo $giadatcocsanphamsaukhigiam;
                    	    ?>
                        " disabled >
                      </div>
                    </div>
                  </div>
                  @else
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label>Trả sau</label>
                      <h6><i>(Bao gồm mã giãm giá, phí vận chuyển và đặt cọc)</i></h6>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">VND</span>
                        </div>
                        <input type="text" name="thanhtien" class="form-control" value="
                          <?php
                    				echo $giadatcocsanphamsaukhigiam;
                    	    ?>
                        " disabled >
                      </div>
                    </div>
                  </div>
                  @endif
                  
                  
                </div>
              </div>
              
              @if(Auth::user()->chucvu == 'admin')
                <div class="card-success">
                  <div class="row">
                      
                    <div class="col-sm-4" align="left">
                      <div class="form-group">      
                          <a target="blank" href="{{ URL::route('printorder',$donhang->id)}}">
                            <button type="button" class="btn btn-success"><b>In hóa đơn</b></button>
                          </a>
                      </div>
                    </div>
                    
                    <div class="col-sm-4" align="left">
                      <div class="form-group">      
                          <a target="blank" href="{{ URL::route('printproduct',$donhang->id)}}">
                            <button type="button" class="btn btn-success"><b>Xuất món</b></button>
                          </a>
                      </div>
                    </div>
                    
                    <div class="col-sm-4" align="right">
                      <div class="form-group">      
                          <a href="{{ URL::route('postduyethoadon',$donhang->id)}}">
                            <button type="button" class="btn btn-success"><b>Duyệt HD</b></button>
                          </a>
                      </div>
                    </div>
                    
                  </div>
                </div>
              @elseif(Auth::user()->chucvu == 'staff')
                <div class="card-success">
                  <div class="row">
                    <div class="col-sm-4" align="left">
                      <div class="form-group">      
                          <a target="blank" href="{{ URL::route('printorder1',$donhang->id)}}">
                            <button type="button" class="btn btn-success"><b>In hóa đơn</b></button>
                          </a>
                      </div>
                    </div>
                    
                    <div class="col-sm-4" align="left">
                      <div class="form-group">      
                          <a target="blank" href="{{ URL::route('printproduct1',$donhang->id)}}">
                            <button type="button" class="btn btn-success"><b>Xuất món</b></button>
                          </a>
                      </div>
                    </div>
                    
                    <div class="col-sm-4" align="right">
                      <div class="form-group">      
                          <a href="{{ URL::route('postduyethoadon1',$donhang->id)}}">
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