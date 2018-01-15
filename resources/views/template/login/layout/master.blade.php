<!DOCTYPE>

<html>
<head>
   @include('template.login.assets.head')
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  
  <!-- /.login-box-body -->
  @yield('content')
</div>

<!-- /.login-box -->
<!--footer js-->
@include('template.login.assets.footer')
<!-- end footer-->

</body>
</html>