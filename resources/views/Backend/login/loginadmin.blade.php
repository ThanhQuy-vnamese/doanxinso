@extends('Backend.layouts.indexlogin')

@section('content')
<div class="container demo-1">
	<div class="content">
        <div id="large-header" class="large-header">
			<h1>1998Coffee</h1>
				<div class="main-agileits">
				<!--form-stars-here-->
						<div class="form-w3-agile">
							<h2>LOGIN ADMIN</h2>

							<form action="{!! route('Loginadminpost') !!}" method="post"> <div class="form-sub-w3">
									<input type="text" name="email" placeholder="Email " required />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="password" placeholder="mật khẩu" required />
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
								</div>
								<div class="clear"></div>
								<div class="submit-w3l">
									<input type="submit" value="Login">
								</div>
							</form>
						</div>
						<!--//form-ends-here-->
				</div><!-- copyright -->
					<div class="copyright w3-agile">
						<p>Chào mừng bạn đến trang admin!</p>
					</div>
					<!-- //copyright --> 
        </div>
	</div>
</div>
@endsection
