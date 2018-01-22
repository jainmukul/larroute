<!DOCTYPE html>
<html>
<head>
  @include('template/admin/assets/admin_head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Include header-->
      @include('template/admin/assets/admin_header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      @include('template/admin/assets/admin_sidebar')
  </aside>

     <!-- Yeild content-->
      @yield('content')
      
   <!-- Yeild content end-->
  
  <footer class="main-footer">
      @include('template/admin/assets/admin_footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      @include('template/admin/assets/admin_control_sidebar')
  </aside> 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('template/admin/assets/admin_footer_js')
<!-- footer js Include here-->
</body>
</html>

