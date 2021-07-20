@extends('Frontend.layouts.loginindex')

@section('content')
<div class="container demo-1">
	<div class="content">
        <div id="large-header" class="large-header">
			<h1>1998Coffee</h1>
				<div class="main-agileits">
				<!--form-stars-here-->
						<div class="form-w3-agile">
							<h2>THÔNG TIN TÀI KHOẢN</h2>
							<form action="{!! route('membersettingpost') !!}" method="post"> <div class="form-sub-w3">
								<input type = "hidden" name = "_token" value = "{{csrf_token()}} ">
									<LABEL style="color:#fff">Họ</LABEL>
									<input type="text" name="tendau" placeholder="First Name" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('firstname')}}" minlength="2" maxlength="32" required />
								</div>
								<div class="form-sub-w3">
									<LABEL style="color:#fff">Tên</LABEL>
									<input type="text" name="tencuoi" placeholder="Last Name" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('lastname')}}" minlength="2" maxlength="32" required/>
								</div>
								<div class="form-sub-w3">
									<LABEL style="color:#fff">Email</LABEL>
									<input type="text" name="Email" placeholder="Email" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('email')}}" required/>
								</div>
								<div class="form-sub-w3">
									<LABEL style="color:#fff">Địa chỉ</LABEL>
									<input type="text" name="diachi" placeholder="Address" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('diachi')}}" minlength="2" maxlength="1000" required />
								</div>
								<div class="form-sub-w3">
									<LABEL style="color:#fff">Số điện thoại</LABEL>
									<input type="text" name="sdt" placeholder="Phone" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('sdt')}}" minlength="10" maxlength="11" required/>
								</div>
								<div class="form-sub-w3">
									<LABEL style="color:#fff">Tài khoản</LABEL>
									<input type="text" name="username" placeholder="Username" value="{{DB::table('tabdangkis')->where('id','=',$user->id_thongtindangki)->value('usename')}}" minlength="2" maxlength="32" required/>
								</div>
								<div class="form-sub-w3">
									<input type="checkbox" id="changePassword" name="checkboxpass">
									<LABEL style="color:#fff">Thay đổi mật khẩu</LABEL>
									<input type="password" class="disabledCheckboxes" disabled="disabled" name="thaydoipass" placeholder="Change password" disabled="" minlength="6" maxlength="8" required/>
								</div>
								<div class="form-sub-w3">
									<LABEL style="color:#fff" class="disabledCheckboxes" disabled="disabled">Nhập lại mật khẩu</LABEL>
									<input type="password" class="disabledCheckboxes" disabled="disabled" name="thaydoipassagain" placeholder="Type again password" disabled="" minlength="6" maxlength="8" required/>
								</div>

								<!--<p class="p-bottom-w3ls">Quên Password?<a class href="#">  Click Tại đây</a></p>-->
								<div class="clear"></div>
								<div class="submit-w3l">
									<input type="submit" value="Cập nhật">
								</div>
							</form>
							<div class="social w3layouts">
								<div class="heading">
									<h5>Đăng nhập với</h5>
									<div class="clear"></div>
								</div>
								<div class="icons">
									<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
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
<script>
		$(document).ready(function(){
			$('.disabledCheckboxes').toggle();
			$("#changePassword").click(function(){
				$('.disabledCheckboxes').toggle();
				if($('.disabledCheckboxes').is(':disabled'))
				{
					$('.disabledCheckboxes').removeAttr('disabled');
				}
				else
				{
					$('.disabledCheckboxes').attr('disabled', 'disabled');
				}
			});
		});
	</script>
@endsection
