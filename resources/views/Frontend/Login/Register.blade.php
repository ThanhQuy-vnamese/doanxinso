@extends('Frontend.layouts.loginindex')

@section('content')
<div class="container demo-1">
	<div class="content">
        <div id="large-header" class="large-header">
			<h1>1998Coffee</h1>
				<div class="main-agileits">
				<!--form-stars-here-->
						<div class="form-w3-agile">
							<h2>Đăng ký ngay</h2>
							<form action="{!! route('dangki1') !!}" method="post">
								<div class="form-sub-w3">
									<input type="text" name="tendau" placeholder="Họ tên lót" minlength="2" maxlength="32" required/ value="{{old('tendau')}}">
								</div>
								<div class="form-sub-w3">
									<input type="text" name="tencuoi" placeholder="Tên" minlength="2" maxlength="32" required value="{{old('tencuoi')}}"/>
								</div>
								<div class="form-sub-w3">
									<input type="text" name="email" placeholder="Email" required value="{{old('email')}}"/>
								</div>
								<div class="form-sub-w3">
									<input type="text" name="diachi" placeholder="Địa chỉ" minlength="2" maxlength="1000" required value="{{old('diachi')}}"/>
								</div>
								<div class="form-sub-w3">
									<input type="text" name="sdt" placeholder="Số điện thoại" minlength="10" maxlength="11" required value="{{old('sdt')}}"/>
								</div>
								<div class="form-sub-w3">
									<input type="text" name="Username" placeholder="Tên tài khoản" minlength="2" maxlength="32" required value="{{old('Username')}}"/>
									<div class="icon-w3">
										<i class="fa fa-user" aria-hidden="true"></i>
									</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="Password" placeholder="Mật khẩu" required minlength="6" maxlength="8" value="{{old('Password')}}"/>
									<div class="icon-w3">
										<i class="fa fa-unlock-alt" aria-hidden="true"></i>
									</div>
								</div>
								<div class="clear"></div>
								<div class="submit-w3l">
									<input type="submit" value="Đăng ký" name="register">
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
						<p>Cảm ơn bạn đã ghé thăm trang web 1998Coffee của chúng tôi</p>
					</div>
					<!-- //copyright --> 
        </div>
	</div>
</div>
@endsection