<!DOCTYPE html>
<html lang="en">
<head>
<title>1998Coffee Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Clean Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />

<!-- css files -->
<link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{asset('public/css/stylelogin.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/css/stylelogin2.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->

<!-- online fonts -->
<link href="{{asset('https://fonts.googleapis.com/css?family=Sirin+Stencil')}}" rel="stylesheet">
<!-- online fonts -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- sweet alert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- sweet alert2 -->

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<body>

	@yield('content')
	@include('sweet::alert')

</body>
</html>