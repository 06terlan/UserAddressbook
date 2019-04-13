<!doctype html>
<html lang="en">
  <head>
    
	@include('header')
    
  </head>
  <body>
    <nav>
      @include('menu')
    </nav>
    <!-- START CONTAINER FLUID -->
    <div class="container">
        

        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        @yield('container')
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
    <!-- END CONTAINER FLUID -->

    @include('footer')
  </body>
</html>