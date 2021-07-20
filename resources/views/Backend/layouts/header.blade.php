<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    @if(Auth::user()->chucvu == 'admin')
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ URL::route('dashboardadmin')}}" class="nav-link">Trang chủ</a>
        </li>
      </ul>
    @elseif(Auth::user()->chucvu == 'staff')
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ URL::route('dashboardstaff')}}" class="nav-link">Trang chủ</a>
        </li>
      </ul>
    @elseif(Auth::user()->chucvu == 'chef')
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ URL::route('dashboardchef')}}" class="nav-link">Trang chủ</a>
        </li>
      </ul>
    @endif

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('public/images/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('public/images/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('public/images/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('public/images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-family:verdana">1998 Coffee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      @if(Auth::user()->chucvu == 'admin')
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('public/images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <div class="d-block" style="color:#ffffff;"><a href="{{ URL::route('detailadmin',Auth::user()->id_thongtindangki)}}">Admin: {{Auth::user()->username}}</a>
              <a href="{{ URL::route('loginadmin')}}" ><i class="fas fa-sign-out-alt" alt="logout"></i></a>
            </div>
          </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <a href="{{ URL::route('dashboardadmin')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
        </a>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Sản phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('themsanpham')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::route('capnhatsanpham')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Tài khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('capnhatkhachhang')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tài khoản khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::route('capnhatnguoiquantri')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tài khoản quản trị</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::route('capnhatnhanvien')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tài khoản nhân viên</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ URL::route('quanlyblog')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý tin tức - sự kiện
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ URL::route('quanlyphong')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý phòng
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý hóa đơn
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('booktable')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hóa đơn đặt bàn</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('danhsachgiaohang')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hóa đơn giao hàng</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('duyethoadon')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hóa đơn đã duyệt</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('capnhatmakhuyenmai')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mã khuyến mãi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('phivanchuyen')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vận chuyển</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="{{ URL::route('quanlydoanhthu')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Doanh thu
              </p>
            </a>
          </li>
          
          <!--<li class="nav-item has-treeview">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-edit"></i>-->
          <!--    <p>-->
          <!--      Quản lý trang-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{ URL::route('pagehome')}}" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Home</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{ URL::route('quanlyblog')}}" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Menu</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{ URL::route('quanlyblog')}}" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Services</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{ URL::route('quanlyblog')}}" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Blog</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{ URL::route('quanlyblog')}}" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>About</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{ URL::route('quanlyblog')}}" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Shop</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{ URL::route('quanlyblog')}}" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Contact</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{ URL::route('quanlyblog')}}" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>login</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Bảng dữ liệu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('bangsanpham')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bảng sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::route('bangkhachhang')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bảng khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::route('bangnhanvien')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bảng nhân viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::route('bangquantri')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bảng người quản trị</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      @elseif(Auth::user()->chucvu == 'staff')
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('public/images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info"> 
            <div class="d-block" style="color:#ffffff;">Staff: {{Auth::user()->username}}
              <a href="{{ URL::route('loginstaff')}}" ><i class="fas fa-sign-out-alt" alt="logout"></i></a>
            </div>
            
            
          </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <a href="{{ URL::route('dashboardstaff')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
        </a>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Tài khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('capnhatkhachhang1')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tài khoản khách hàng</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ URL::route('quanlyblog1')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý tin tức - sự kiện
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý hóa đơn
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('laphoadon')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lập hóa đơn</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('quanlyhoadon1')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hóa đơn đặt hàng</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('duyethoadon1')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hóa đơn đã duyệt</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ URL::route('booktable1')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý đặt bàn
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ URL::route('danhsachgiaohang1')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý giao hàng
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Bảng dữ liệu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::route('bangsanpham1')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bảng sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::route('bangkhachhang1')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bảng khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::route('bangnhanvien1')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bảng nhân viên</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
          
        </ul>
      </nav>
      @elseif(Auth::user()->chucvu == 'chef')
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('public/images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info"> 
            <div class="d-block" style="color:#ffffff;">Staff: {{Auth::user()->username}}
              <a href="{{ URL::route('loginchef')}}" ><i class="fas fa-sign-out-alt" alt="logout"></i></a>
            </div>
            
            
          </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <a href="{{ URL::route('dashboardchef')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
        </a>
          

          <li class="nav-item has-treeview">
            <a href="{{ URL::route('booktable2')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý đặt bàn
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ URL::route('danhsachgiaohang2')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý giao hàng
              </p>
            </a>
          </li>
        </ul>
      </nav>
      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>