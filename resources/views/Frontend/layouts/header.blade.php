    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="{{ URL::route('home')}}">Coffee<small>1998</small></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto"> 
              <li class="nav-item active"><a href="{{ URL::route('home')}}" class="nav-link">Trang chủ</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Đặt hàng</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="{{ URL::route('datbannhanh')}}">Đặt bàn nhanh</a>
                  <a class="dropdown-item" href="{{ URL::route('shopdatban',)}}">Đặt tiệc</a>
                  <a class="dropdown-item" href="{{ URL::route('shopgiaohang')}}">Giao hàng</a>
                </div>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thực đơn</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="{{ URL::route('cacmonchinh')}}">Các món chính</a>
                  <a class="dropdown-item" href="{{ URL::route('combo')}}">Các Combo</a>
                </div>
              </li>
              
              <li class="nav-item"><a href="{{ URL::route('service')}}" class="nav-link">Dịch vụ</a></li>
              <li class="nav-item"><a href="{{ URL::route('blog')}}" class="nav-link">Tin tức</a></li>
              <!--<li class="nav-item dropdown">-->
              <!--  <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop & đặt bàn</a>-->
              <!--  <div class="dropdown-menu" aria-labelledby="dropdown04">-->
              <!--    <a class="dropdown-item" href="{{ URL::route('shopdatban')}}">Shop</a>-->
              <!--    @if(Cart::subtotal()!=0)-->
              <!--    <a class="dropdown-item" href="{{ URL::route('cart')}}">Giỏ hàng</a>-->
              <!--    @else-->
              <!--    <a class="dropdown-item" title="You do not have the product" href="#">Giỏ hàng</a>-->
              <!--    @endif-->
                  
              <!--  @if(Auth::check())-->
              <!--      <a class="dropdown-item" href="{{ URL::route('totalhandcart')}}">Hóa đơn</a>-->
              <!--  @endif-->
                  

              <!--  @if(Auth::check())-->
              <!--      <a class="dropdown-item" href="{{ URL::route('listordercancel')}}">Đơn hàng đã hủy</a>-->
              <!--  @endif-->
                  
              <!--  </div>-->
              <!--</li>-->
              <li class="nav-item"><a href="{{ URL::route('contact')}}" class="nav-link">Liên hệ</a></li>
              
                @if(Cart::subtotal()!=0)
                    <li class="nav-item cart dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{!!Cart::count()!!}</small></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{ URL::route('cart')}}">Giỏ hàng</a>
                            @if(Auth::check())
                                <a class="dropdown-item" href="{{ URL::route('totalhandcart')}}">Hóa đơn</a>
                            @endif
                            @if(Auth::check())
                                <a class="dropdown-item" href="{{ URL::route('listordercancel')}}">Đơn hàng đã hủy</a>
                            @endif
                        </div>
                    </li>
                    <!--<li class="nav-item cart"><a href="{{ URL::route('cart')}}" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{!!Cart::count()!!}</small></span></a></li>-->
                @else
                    <li class="nav-item cart dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{!!Cart::count()!!}</small></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" title="You do not have the product" href="#">Giỏ hàng</a>
                            @if(Auth::check())
                                <a class="dropdown-item" href="{{ URL::route('totalhandcart')}}">Hóa đơn</a>
                            @endif
                            @if(Auth::check())
                                <a class="dropdown-item" href="{{ URL::route('listordercancel')}}">Đơn hàng đã hủy</a>
                            @endif
                        </div>
                    </li>
                @endif
                  
            
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span></a>

                @if(Auth::check())
                  <div class="dropdown-menu dropdown-user" aria-labelledby="dropdown04">
                    <a class="dropdown-item">Xin chào {{Auth::user()->username}}</a>
                    <a class="dropdown-item" href="{{ URL::route('membersetting')}}">Thông tin thành viên</a>
                    <a class="dropdown-item" href="{{ URL::route('rewardpoints')}}">Điểm thưởng</a>
                    <a class="dropdown-item" href="{{ URL::route('loginget')}}">Đăng nhập</a>
                    <a class="dropdown-item" href="{{ URL::route('logout')}}">Đăng xuất</a>
                  </div>
                @else
                  <div class="dropdown-menu dropdown-user" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="#">Thông tin thành viên</a>
                    <a class="dropdown-item" href="{{ URL::route('loginget')}}">Đăng nhập</a>
                    <a class="dropdown-item" href="#">Đăng xuất</a>
                  </div>
                @endif
              </li>
            </ul>

          </div>
          </div>
      </nav>

    