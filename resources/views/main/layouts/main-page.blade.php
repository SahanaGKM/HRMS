<!DOCTYPE html>
<html lang="en">
  @include('main.layouts.header-link')
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      @include('main.layouts.sidebar')
      <!-- End Sidebar -->

      <div class="main-panel">
        @include('main.layouts.top-nav')

        @yield('content')

        @include('main.layouts.footer')
      </div>

      <!-- Custom template | don't include it in your project! -->
      @include('main.layouts.theme-setting')
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    @include('main.layouts.footer-link')
  </body>
</html>
