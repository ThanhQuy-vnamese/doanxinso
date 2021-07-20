@extends('Backend.layouts.indexadmin')

@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @if(Auth::user()->chucvu == 'admin')
          <div class="col-lg-2 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h4>
                  <?php
                    $tong = 0;
                    foreach($tongtien as $t)
                    {
                      $tong = $tong + $t->tongtien;
                    }
                    echo number_format($tong);
                  ?> Đ
                <sup style="font-size: 20px"></sup></h4>

                <p>Doanh thu</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ URL::route('quanlydoanhthu')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>{{$donhang}}</h4>
                <p>Tổng đơn hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ URL::route('quanlyhoadon')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>{{$khachhang}}</h4>
                <p>Tài khoản đăng kí</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ URL::route('capnhatkhachhang')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>{{$datban}}</h4>
                <p>Đặt bàn</p>
              </div>
              <div class="icon">
                <i class="fas fa-handshake"></i>
              </div>
              <a href="{{ URL::route('booktable')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>{{$demphanhoi}}</h4>
                <p>Khách hàng phản hồi</p>
              </div>
              <div class="icon">
                <i class="far fa-envelope-open"></i>
              </div>
              <a href="{{ URL::route('phanhoikhachhang')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          @elseif(Auth::user()->chucvu == 'staff')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                    $tong = 0;
                    foreach($tongtien as $t)
                    {
                      $tong = $tong + $t->tongtien;
                    }
                    echo number_format($tong);
                  ?> Đ
                <sup style="font-size: 20px"></sup></h3>

                <p>Doanh thu</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$donhang}}</h3>
                <p>Tổng đơn hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ URL::route('quanlyhoadon1')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$donhangdaduyet}}</h3>
                <p>Đơn hàng đã duyệt</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ URL::route('duyethoadon1')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$datban}}</h3>
                <p>Đặt bàn</p>
              </div>
              <div class="icon">
                <i class="fas fa-handshake"></i>
              </div>
              <a href="{{ URL::route('booktable1')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          @endif
        </div>
        
        <div class="row">
          <section class="col-lg-7 connectedSortable">
            
            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Danh sách công việc
                </h3>

                <div class="card-tools">
                  {{ $congviectrongngay->links()}}
                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  @if($demcongviec==0)
                    <center>Chưa có công việc nào !!</center>
                  @else
                    @foreach($congviectrongngay as $d)
                      <li>
                        <span class="handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        
                        @if($d->trangthai == "Đã hoàn thành")
                          
                            <div class="icheck-primary d-inline ml-2">
                              <input type="checkbox" value="Đã hoàn thành" class="checkcv" name="checkcv" id="{{$d->id}}" checked>
                              <label for="{{$d->id}}"></label>
                            </div>
                          
                        @else
                          <div class="icheck-primary d-inline ml-2">
                            <input type="checkbox" value="Đã hoàn thành" class="checkcv" name="checkcv" id="{{$d->id}}">
                            <label for="{{$d->id}}"></label>
                          </div>
                        @endif
                        
                        <span class="text" >{!!$d->tencongviec!!}</span>
                        <small class="badge badge-success"><i>start</i> {!!date('F j, Y, g:i a',strtotime($d->ngaybatdau))!!}</small>
                        <small class="badge badge-success"><i>finish</i> {!!date('F j, Y, g:i a',strtotime($d->ngayketthuc))!!}</small>
                        <small class="badge badge-success"><i class="far fa-clock"></i>
                          <?php
                            
                            $date1 = $current;
                            $date2 = $d->ngayketthuc;
                          
                            $diff1 = strtotime($date2) - strtotime($date1);
                            if($diff1>0)
                            {
                              $diff = abs(strtotime($date2) - strtotime($date1));
                              $years = floor($diff / (365*60*60*24));
                              $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                              $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
                              $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
                              $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
                              $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                              echo $years." years, ".$months." months, ".$days." days, ".$hours." hours, ".$minutes." minutes, ".$seconds." seconds";
                            }
                            else
                            {
                              echo 'Đã kết thúc';
                            }
                          ?>
                        </small>
                        <div class="tools">
                          @if(Auth::user()->chucvu == 'admin')
                            <a class="xoacongviec" href="{{ URL::route('xoacongviec',$d->id)}}"><i class="fas fa-trash"></i></a>
                          @endif
                          
                        </div>
                      </li>
                    @endforeach
                  @endif
                  
                  
                  <!--<li>-->
                  <!--  <span class="handle">-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--  </span>-->
                  <!--  <div  class="icheck-primary d-inline ml-2">-->
                  <!--    <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>-->
                  <!--    <label for="todoCheck2"></label>-->
                  <!--  </div>-->
                  <!--  <span class="text">Make the theme responsive</span>-->
                  <!--  <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>-->
                  <!--  <div class="tools">-->
                  <!--    <i class="fas fa-edit"></i>-->
                  <!--    <i class="fas fa-trash-o"></i>-->
                  <!--  </div>-->
                  <!--</li>-->
                  
                  <!--<li>-->
                  <!--  <span class="handle">-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--  </span>-->
                  <!--  <div  class="icheck-primary d-inline ml-2">-->
                  <!--    <input type="checkbox" value="" name="todo3" id="todoCheck3">-->
                  <!--    <label for="todoCheck3"></label>-->
                  <!--  </div>-->
                  <!--  <span class="text">Let theme shine like a star</span>-->
                  <!--  <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>-->
                  <!--  <div class="tools">-->
                  <!--    <i class="fas fa-edit"></i>-->
                  <!--    <i class="fas fa-trash-o"></i>-->
                  <!--  </div>-->
                  <!--</li>-->
                  
                  <!--<li>-->
                  <!--  <span class="handle">-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--  </span>-->
                  <!--  <div  class="icheck-primary d-inline ml-2">-->
                  <!--    <input type="checkbox" value="" name="todo4" id="todoCheck4">-->
                  <!--    <label for="todoCheck4"></label>-->
                  <!--  </div>-->
                  <!--  <span class="text">Let theme shine like a star</span>-->
                  <!--  <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>-->
                  <!--  <div class="tools">-->
                  <!--    <i class="fas fa-edit"></i>-->
                  <!--    <i class="fas fa-trash-o"></i>-->
                  <!--  </div>-->
                  <!--</li>-->
                  
                  <!--<li>-->
                  <!--  <span class="handle">-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--  </span>-->
                  <!--  <div  class="icheck-primary d-inline ml-2">-->
                  <!--    <input type="checkbox" value="" name="todo5" id="todoCheck5">-->
                  <!--    <label for="todoCheck5"></label>-->
                  <!--  </div>-->
                  <!--  <span class="text">Check your messages and notifications</span>-->
                  <!--  <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>-->
                  <!--  <div class="tools">-->
                  <!--    <i class="fas fa-edit"></i>-->
                  <!--    <i class="fas fa-trash-o"></i>-->
                  <!--  </div>-->
                  <!--</li>-->
                  
                  <!--<li>-->
                  <!--  <span class="handle">-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--    <i class="fas fa-ellipsis-v"></i>-->
                  <!--  </span>-->
                  <!--  <div  class="icheck-primary d-inline ml-2">-->
                  <!--    <input type="checkbox" value="" name="todo6" id="todoCheck6">-->
                  <!--    <label for="todoCheck6"></label>-->
                  <!--  </div>-->
                  <!--  <span class="text">Let theme shine like a star</span>-->
                  <!--  <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>-->
                  <!--  <div class="tools">-->
                  <!--    <i class="fas fa-edit"></i>-->
                  <!--    <i class="fas fa-trash-o"></i>-->
                  <!--  </div>-->
                  <!--</li>-->
                  
                </ul>
                @if(Auth::user()->chucvu == 'admin')
                  <div class="form-group">
                    <label>Tên công việc:</label>
  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right tencongviec">
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Thời gian bắt đầu:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                          </div>
                          <input type="datetime-local" class="form-control float-right start" >
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Thời gian kết thúc:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                          </div>
                          <input type="datetime-local" class="form-control float-right finish" >
                        </div>
                      </div>
                    </div>
                  </div>
              
              </div>
              
              <div class="card-footer clearfix">
                  <button type="button" class="btn btn-info float-right addcv"><i class="fas fa-plus"></i> Thêm công việc</button>
              </div>
              @endif
            </div>
            
            <!-- DIRECT CHAT -->
            <!--<div class="card direct-chat direct-chat-warning">-->
            <!--  <div class="card-header">-->
            <!--    <h3 class="card-title">Direct Chat</h3>-->

            <!--    <div class="card-tools">-->
            <!--      <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">3</span>-->
            <!--      <button type="button" class="btn btn-tool" data-card-widget="collapse">-->
            <!--        <i class="fas fa-minus"></i>-->
            <!--      </button>-->
            <!--      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"-->
            <!--              data-widget="chat-pane-toggle">-->
            <!--        <i class="fas fa-comments"></i>-->
            <!--      </button>-->
            <!--      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>-->
            <!--      </button>-->
            <!--    </div>-->
            <!--  </div>-->
              
            <!--  <div class="card-body">-->
            <!--    <div class="direct-chat-messages">-->
                  
            <!--      <div class="direct-chat-msg">-->
            <!--        <div class="direct-chat-infos clearfix">-->
            <!--          <span class="direct-chat-name float-left">Alexander Pierce</span>-->
            <!--          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>-->
            <!--        </div>-->
            <!--        <img class="direct-chat-img" src="{{asset('public/images/user1.jpg')}}" alt="message user image">-->
            <!--        <div class="direct-chat-text">-->
            <!--          Is this template really for free? That's unbelievable!-->
            <!--        </div>-->
            <!--      </div>-->
                  
            <!--      <div class="direct-chat-msg right">-->
            <!--        <div class="direct-chat-infos clearfix">-->
            <!--          <span class="direct-chat-name float-right">Sarah Bullock</span>-->
            <!--          <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>-->
            <!--        </div>-->
            <!--        <img class="direct-chat-img" src="{{asset('public/images/user3-128x128.jpg')}}" alt="message user image">-->
            <!--        <div class="direct-chat-text">-->
            <!--          You better believe it!-->
            <!--        </div>-->
            <!--      </div>-->
                  
            <!--    </div>-->
                
            <!--    <div class="direct-chat-contacts">-->
            <!--      <ul class="contacts-list">-->
            <!--        <li>-->
            <!--          <a href="#">-->
            <!--            <img class="contacts-list-img" src="{{asset('public/images/user1.jpg')}}">-->
            <!--            <div class="contacts-list-info">-->
            <!--              <span class="contacts-list-name">-->
            <!--                Count Dracula-->
            <!--                <small class="contacts-list-date float-right">2/28/2015</small>-->
            <!--              </span>-->
            <!--              <span class="contacts-list-msg">How have you been? I was...</span>-->
            <!--            </div>-->
            <!--          </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--          <a href="#">-->
            <!--            <img class="contacts-list-img" src="{{asset('public/images/user7-128x128.jpg')}}">-->

            <!--            <div class="contacts-list-info">-->
            <!--              <span class="contacts-list-name">-->
            <!--                Sarah Doe-->
            <!--                <small class="contacts-list-date float-right">2/23/2015</small>-->
            <!--              </span>-->
            <!--              <span class="contacts-list-msg">I will be waiting for...</span>-->
            <!--            </div>-->
            <!--          </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--          <a href="#">-->
            <!--            <img class="contacts-list-img" src="{{asset('public/images/user3-128x128.jpg')}}">-->

            <!--            <div class="contacts-list-info">-->
            <!--              <span class="contacts-list-name">-->
            <!--                Nadia Jolie-->
            <!--                <small class="contacts-list-date float-right">2/20/2015</small>-->
            <!--              </span>-->
            <!--              <span class="contacts-list-msg">I'll call you back at...</span>-->
            <!--            </div>-->
            <!--          </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--          <a href="#">-->
            <!--            <img class="contacts-list-img" src="{{asset('public/images/user5-128x128.jpg')}}">-->

            <!--            <div class="contacts-list-info">-->
            <!--              <span class="contacts-list-name">-->
            <!--                Nora S. Vans-->
            <!--                <small class="contacts-list-date float-right">2/10/2015</small>-->
            <!--              </span>-->
            <!--              <span class="contacts-list-msg">Where is your new...</span>-->
            <!--            </div>-->
            <!--          </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--          <a href="#">-->
            <!--            <img class="contacts-list-img" src="{{asset('public/images/user6-128x128.jpg')}}">-->

            <!--            <div class="contacts-list-info">-->
            <!--              <span class="contacts-list-name">-->
            <!--                John K.-->
            <!--                <small class="contacts-list-date float-right">1/27/2015</small>-->
            <!--              </span>-->
            <!--              <span class="contacts-list-msg">Can I take a look at...</span>-->
            <!--            </div>-->
            <!--          </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--          <a href="#">-->
            <!--            <img class="contacts-list-img" src="{{asset('public/images/user8-128x128.jpg')}}">-->

            <!--            <div class="contacts-list-info">-->
            <!--              <span class="contacts-list-name">-->
            <!--                Kenneth M.-->
            <!--                <small class="contacts-list-date float-right">1/4/2015</small>-->
            <!--              </span>-->
            <!--              <span class="contacts-list-msg">Never mind I found...</span>-->
            <!--            </div>-->
            <!--          </a>-->
            <!--        </li>-->
                    
            <!--      </ul>-->
            <!--    </div>-->
            <!--  </div>-->
              
            <!--  <div class="card-footer">-->
            <!--    <form action="" method="post" enctype="multipart/form-data">-->
            <!--      {{ csrf_field() }}-->
            <!--      <div class="input-group">-->
            <!--        <input type="text" name="message" placeholder="Type Message ..." class="form-control">-->
            <!--        <span class="input-group-append">-->
            <!--          <input type="submit" class="btn btn-primary" value="Sent">-->
            <!--        </span>-->
            <!--      </div>-->
            <!--    </form>-->
            <!--  </div>-->
              
            <!--</div>-->
            @if(Auth::user()->chucvu == 'admin' || Auth::user()->chucvu == 'staff')
                <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Khách hàng nhận thưởng</h3>

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
                    <tr align="center">
                      <th>Tên khách hàng</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Check</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($thongtinkhachhang as $c)
                      @foreach($khachhangnhanthuong as $h)
                        @if($h->id_thongtindangki == $c->id)
                            <tr align="center">
                              @if(Auth::user()->chucvu == 'admin')
                              <td><a href="{{ URL::route('detailcustomer',$c->id)}}">{{$c->firstname}} {{$c->lastname}}</a></td>
                              @elseif(Auth::user()->chucvu == 'staff')
                              <td><a href="{{ URL::route('detailcustomer1',$c->id)}}">{{$c->firstname}} {{$c->lastname}}</a></td>
                              @endif
                              <td>{{$c->email}}</td>
                              <td>{{$c->sdt}}</td>
                              <td>
                                @if(Auth::user()->chucvu == 'admin')
                                  <a href="{{ URL::route('resetdiemthuong',$h->id)}}">
                                    <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-user-check nav-icon"></i></button>
                                  </a>
                                @elseif(Auth::user()->chucvu == 'staff')
                                  <a href="{{ URL::route('resetdiemthuong1',$h->id)}}">
                                    <button type="button" class="btn btn-primary btn-success btn-sm"><i class="fas fa-user-check nav-icon"></i></button>
                                  </a>
                                @endif
                              </td>
                            </tr>
                        @endif
                      @endforeach
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-header">
                <div class="card-tools">
                  {{ $khachhangnhanthuong->links()}}
                </div>
              </div>
            </div>
            @endif
          </section>
          
          <section class="col-lg-5 connectedSortable">

            <div class="card bg-gradient-success">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <div class="card-tools">
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body pt-0">
                <div id="calendar" style="width: 100%"></div>
              </div>
            </div>
            
            @if(Auth::user()->chucvu == 'admin' || Auth::user()->chucvu == 'staff')
                <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Sản phẩm mới</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                @foreach($sanphammoi as $m)
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    <li class="item">
                      <div class="product-img">
                          <img src="../public/images/{{$m->hinhanh}}" alt="Product Image" class="img-size-50">
                      </div>
                      <div class="product-info">
                        @if(Auth::user()->chucvu == 'admin')
                          <a href="{{ URL::route('chucnangcapnhatsanpham',$m->id)}}" class="product-title">{{$m->tenmonan}}</a>
                        @elseif(Auth::user()->chucvu == 'staff')
                          <a href="" class="product-title">{{$m->tenmonan}}</a>
                        @endif
                          <span class="badge badge-warning float-right">New</span>
                        <span class="product-description">
                            {{$m->mota}}
                        </span>
                      </div>
                    </li>
                  </ul>
                @endforeach
              </div>
              <div class="card-header">
                <div class="card-tools">
                  {{ $sanphammoi->links()}}
                </div>
              </div>
            </div>
            @endif
            
            @if(Auth::user()->chucvu == 'admin' || Auth::user()->chucvu == 'staff')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Sản phẩm khuyến mãi</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    @foreach($sanphamkhuyenmai as $m)
                      <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                          <div class="product-img">
                              <img src="../public/images/{{$m->hinhanh}}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            @if(Auth::user()->chucvu == 'admin')
                              <a href="{{ URL::route('chucnangcapnhatsanpham',$m->id)}}" class="product-title">{{$m->tenmonan}}</a>
                            @elseif(Auth::user()->chucvu == 'staff')
                              <a href="" class="product-title">{{$m->tenmonan}}</a>
                            @endif
                              <span class="badge badge-success float-right">{{$m->khuyenmai}}</span>
                              <span class="badge float-right"><strike>{{$m->gia}}</strike></span>
                            <span class="product-description">
                                {{$m->mota}}
                            </span>
                          </div>
                        </li>
                      </ul>
                    @endforeach
                  </div>
                  <div class="card-header">
                    <div class="card-tools">
                      {{ $sanphamkhuyenmai->links()}}
                    </div>
                  </div>
                </div>
            @endif    
                <!-- Map card -->
            <div class="card bg-gradient-primary">
                  <div class="card-footer bg-transparent">
                    <div class="row">
                      <div class="col-4 text-center">
                        <div id="sparkline-1"></div>
                        <div class="text-white">Visitors</div>
                      </div>
                      <div class="col-4 text-center">
                        <div id="sparkline-2"></div>
                        <div class="text-white">Online</div>
                      </div>
                      <div class="col-4 text-center">
                        <div id="sparkline-3"></div>
                        <div class="text-white">Sales</div>
                      </div>
                    </div>
                  </div>
                </div>
            

          </section>
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>

@endsection


@section('script')
@if(Auth::user()->chucvu == 'admin')
<script language="javascript">
   $(document).ready(function(){

    $(".addcv").click(function(){
    		var tencongviec = $('.tencongviec').val();
    		var start = $('.start').val();
    		var finish = $('.finish').val();
    		var _token = $('input[name="_token"]').val();
    		// alert(tencongviec);
    		// alert(start);
    		// alert(finish);
    		// alert(_token);
    		$.ajax({
    			type:'POST',
    			url:"{{ route('postthemcongviec') }}",
    			data:{
    				tencongviec:tencongviec,start:start,finish:finish,_token:_token
    			},
    			success:function(data){
              		location.reload();
              },
    		});
    	});
    	
    	$('.checkcv').bind('click', function() {
        if($(this).is(":checked")) {
        		var check = $(this).attr('id');
        		var val = $(this).val();
        		var _token = $('input[name="_token"]').val();
        		// alert(check);
        		// alert(val);
        		// alert(_token);
        		$.ajax({
        			type:'POST',
        			url:"{{ route('postcheckhoanhthanh') }}",
        			data:{
        				check:check,val:val,_token:_token
        			},
        			success:function(data){
                  		location.reload();
                  },
        		});
        }
    });
    	
   });
   
   
</script>
@elseif(Auth::user()->chucvu == 'staff')
<script language="javascript">
   $(document).ready(function(){
    	
    	$('.checkcv').bind('click', function() {
        if($(this).is(":checked")) {
        		var check = $(this).attr('id');
        		var val = $(this).val();
        		var _token = $('input[name="_token"]').val();
        		// alert(check);
        		// alert(val);
        		// alert(_token);
        		$.ajax({
        			type:'POST',
        			url:"{{ route('postcheckhoanhthanh1') }}",
        			data:{
        				check:check,val:val,_token:_token
        			},
        			success:function(data){
                  		location.reload();
                  },
        		});
        }
    });
    	
   });
   
   
</script>
@endif
@endsection

