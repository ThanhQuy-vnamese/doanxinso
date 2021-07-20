@extends('Backend.layouts.indexadmin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý doanh thu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quanlydoanhthu</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hand-holding-usd"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Doanh thu trong ngày</span>
                <span class="info-box-number">
                  <?php
                    $tong = 0;
                    foreach($tongtien as $t)
                    {
                      $tong = $tong + $t->tongtien;
                    }
                    echo number_format($tong);
                  ?> VND
                </span>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng đơn hàng đã duyệt</span>
                <span class="info-box-number">{{$donhang}}</span>
              </div>
            </div>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <!-- fix for small devices only -->
          <!--<div class="col-12 col-sm-6 col-md-3">-->
          <!--  <div class="info-box mb-3">-->
          <!--    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>-->
          <!--    <div class="info-box-content">-->
          <!--      <span class="info-box-text">Likes</span>-->
          <!--      <span class="info-box-number">41,410</span>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Thống kê</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <!--<div class="card-body">-->
              <!--  <div class="row">-->
              <!--    <div class="col-md-8">-->
              <!--      <p class="text-center">-->
              <!--        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>-->
              <!--      </p>-->

              <!--      <div class="chart">-->
                      <!-- Sales Chart Canvas -->
              <!--        <canvas id="salesChart" height="180" style="height: 180px;"></canvas>-->
              <!--      </div>-->
                    <!-- /.chart-responsive -->
              <!--    </div>-->
                  <!-- /.col -->
              <!--    <div class="col-md-4">-->
              <!--      <p class="text-center">-->
              <!--        <strong>Goal Completion</strong>-->
              <!--      </p>-->

              <!--      <div class="progress-group">-->
              <!--        Add Products to Cart-->
              <!--        <span class="float-right"><b>160</b>/200</span>-->
              <!--        <div class="progress progress-sm">-->
              <!--          <div class="progress-bar bg-primary" style="width: 80%"></div>-->
              <!--        </div>-->
              <!--      </div>-->
                    <!-- /.progress-group -->

              <!--      <div class="progress-group">-->
              <!--        Complete Purchase-->
              <!--        <span class="float-right"><b>310</b>/400</span>-->
              <!--        <div class="progress progress-sm">-->
              <!--          <div class="progress-bar bg-danger" style="width: 75%"></div>-->
              <!--        </div>-->
              <!--      </div>-->

                    <!-- /.progress-group -->
              <!--      <div class="progress-group">-->
              <!--        <span class="progress-text">Visit Premium Page</span>-->
              <!--        <span class="float-right"><b>480</b>/800</span>-->
              <!--        <div class="progress progress-sm">-->
              <!--          <div class="progress-bar bg-success" style="width: 60%"></div>-->
              <!--        </div>-->
              <!--      </div>-->

                    <!-- /.progress-group -->
              <!--      <div class="progress-group">-->
              <!--        Send Inquiries-->
              <!--        <span class="float-right"><b>250</b>/500</span>-->
              <!--        <div class="progress progress-sm">-->
              <!--          <div class="progress-bar bg-warning" style="width: 50%"></div>-->
              <!--        </div>-->
              <!--      </div>-->
                    <!-- /.progress-group -->
              <!--    </div>-->
                  <!-- /.col -->
              <!--  </div>-->
                <!-- /.row -->
              <!--</div>-->
              <!-- ./card-body -->
              <!--<div class="card-footer">-->
              <!--  <div class="row">-->
              <!--    <div class="col-sm-3 col-6">-->
              <!--      <div class="description-block border-right">-->
              <!--        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>-->
              <!--        <h5 class="description-header">$35,210.43</h5>-->
              <!--        <span class="description-text">TOTAL REVENUE</span>-->
              <!--      </div>-->
                    <!-- /.description-block -->
              <!--    </div>-->
                  <!-- /.col -->
              <!--    <div class="col-sm-3 col-6">-->
              <!--      <div class="description-block border-right">-->
              <!--        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>-->
              <!--        <h5 class="description-header">$10,390.90</h5>-->
              <!--        <span class="description-text">TOTAL COST</span>-->
              <!--      </div>-->
                    <!-- /.description-block -->
              <!--    </div>-->
                  <!-- /.col -->
              <!--    <div class="col-sm-3 col-6">-->
              <!--      <div class="description-block border-right">-->
              <!--        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>-->
              <!--        <h5 class="description-header">$24,813.53</h5>-->
              <!--        <span class="description-text">TOTAL PROFIT</span>-->
              <!--      </div>-->
                    <!-- /.description-block -->
              <!--    </div>-->
                  <!-- /.col -->
              <!--    <div class="col-sm-3 col-6">-->
              <!--      <div class="description-block">-->
              <!--        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>-->
              <!--        <h5 class="description-header">1200</h5>-->
              <!--        <span class="description-text">GOAL COMPLETIONS</span>-->
              <!--      </div>-->
                    <!-- /.description-block -->
              <!--    </div>-->
              <!--  </div>-->
                <!-- /.row -->
              <!--</div>-->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Đơn hàng mới nhất</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Mã hóa đơn</th>
                      <th>Mục</th>
                      <th>Trạng thái</th>
                      <th>Ngày lên đơn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hoadon as $h)
                        <tr>
                          <td><a href="pages/examples/invoice.html">HD_{{$h->id}}</a></td>
                              <td>
                                @foreach($chitiethoadon as $c)
                                    @if($c->iddonhang == $h->id)
                                        {{$c->tensanpham}};</br>
                                    @endif
                                @endforeach
                              </td>
                          <td><span class="badge badge-success">{{$h->trangthaidonhang}}</span></td>
                          <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20">{{date('F j, Y, g:i a',strtotime($h->created_at))}}</div>
                          </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer clearfix">
                <a href="{{ URL::route('quanlyhoadon')}}" class="btn btn-sm btn-info float-right">View All Orders</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sản phẩm bán chạy trong ngày</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($sanphambanchay as $s)
                @foreach($sanpham as $m)
                @if($s->masanpham == $m->id)
                  <li class="item">
                    <div class="product-img">
                        <img src="../public/images/{{$m->hinhanh}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="" class="product-title">{{$m->tenmonan}}
                        <span class="badge badge-warning float-right">{{$s->soluong}}</span></a>
                      <span class="product-description">
                          {{$m->mota}}
                      </span>
                    </div>
                  </li>
                @endif
                @endforeach
                @endforeach
                </ul>
              </div>
              <div class="card-header">
                <div class="card-tools">
                  {{ $sanphambanchay->links()}}
                </div>
              </div>
              
              <div class="card-footer clearfix">
                <a href="{{ URL::route('deletesanphambanchay')}}" class="btn btn-sm btn-info float-right">Delete all</a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

@endsection

