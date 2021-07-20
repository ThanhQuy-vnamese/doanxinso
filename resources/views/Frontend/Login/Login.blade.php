@extends('Frontend.layouts.loginindex')

@section('content')
<div class="container demo-1">
	<div class="content">
        <div id="large-header" class="large-header">
			<h1>1998Coffee</h1>
				<div class="main-agileits">
				<!--form-stars-here-->
						<div class="form-w3-agile">
							<h2>Đăng nhập</h2>

							<!--@if(session('thongbao'))
								<div style="color:#fff">{{ Session::get('thongbao')}}</div>
							@endif-->

							<form action="{!! route('Loginpost') !!}" method="post"> 
								<div class="form-sub-w3">
										<input type="text" name="email" placeholder="Email " required />
									<div class="icon-w3">
										<i class="fa fa-user" aria-hidden="true"></i>
									</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="password" placeholder="Mật khẩu" required />
									<div class="icon-w3">
										<i class="fa fa-unlock-alt" aria-hidden="true"></i>
									</div>
								</div>
								<p class="p-bottom-w3ls1">Tài khoản mới?<a class href="{{ URL::route('register')}}">Đăng kí ngay</a></p>
								<div class="clear"></div>
								<div class="submit-w3l">
									<input type="submit" value="Đăng nhập">
								</div>
							</form>
							<div class="social w3layouts">
								<div class="heading">
									<h5>Đăng nhập với</h5>
									<div class="clear"></div>
								</div>
								<div class="icons">
									<a href="{{URL('auth/redirect/facebook')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<!--//form-ends-here-->
				</div><!-- copyright -->
					<div class="copyright w3-agile">
						<p> Cảm ơn bạn đã ghé thăm trang web 1998Coffee của chúng tôi</p>
					</div>
					<!-- //copyright --> 
        </div>
	</div>
</div>
@endsection
