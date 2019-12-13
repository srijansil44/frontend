<!-- Header  -->

@include('include.front_header')
<!-- Navigation -->
@include('include.front_nav')

<!-- Page Content -->
@include('include.flash_message')

                @yield('content')

    <!-- /.row -->
  <!--  Blog Footer  -->

@include('include.front_footer')