<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title', config('app.name'))</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

<link rel="stylesheet" href="{{ asset('custom/css/bootstrap.min.css') }}">
<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('custom/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('custom/css/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('custom/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('custom/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('custom/css/responsive.css') }}">

<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900" rel="stylesheet">


{{-- it comflict so comment it nav bar css  <link href="{{ mix(Spark::usesRightToLeftTheme() ? 'css/app-rtl.css' : 'css/app.css') }}" rel="stylesheet"> --}}

<!-- Scripts -->
@yield('scripts', '')

<!-- Global Spark Object -->
<script>
    window.Spark = <?php echo json_encode(array_merge(
        Spark::scriptVariables(), []
    )); ?>;
</script>

</head>
<body>
<div id="spark-app" v-cloak>
    <!-- Navigation -->
    @if (Auth::check())
        @include('spark::nav.user')
    @else
        @include('spark::nav.guest')
    @endif

    <!-- Start : Body part change per page -->
    @yield('content')
    <!-- End : Body part change per page -->

    <!-- Application Level Modals -->
    @if (Auth::check())
        @include('spark::modals.notifications')
        @include('spark::modals.support')
        @include('spark::modals.session-expired')
    @endif
    
    @include('spark::nav.footer')

</div>

<script src="{{ asset('custom/js/jquery.min.js') }}"></script> 
<script src="{{ asset('custom/js/jquery-3.2.1.min.js') }}"></script> 
<script src="{{ asset('custom/js/all.js') }}"></script> 
<script src="{{ asset('custom/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('custom/js/owl.carousel.js') }}"></script>


<script >
$(document).ready(function() {
 
  $(".slider").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
       dots: false,
      items : 1,
      loop: true,
        navClass: ['tg-btnprev', 'tg-btnnext'],
        navContainerClass: 'old-prod',
        navText: [
            '<span><i class="fa fa-angle-left fa-2x"></i></span>',
            '<span><i class="fa fa-angle-right fa-2x"></i></span>',
        ]     
 
  });
 
});
</script>
<script >
    $(document).ready(function() {
 
  $(".test-mon").owlCarousel({
      slideSpeed : 300,
      paginationSpeed : 400,
      items : 1,     
      nav: false,
      dots: true
  });
 
});
</script>


<script >
$(document).ready(function() {
 
  $(".brand").owlCarousel({ 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,     
      margin:15,
      items : 5,
      dots: false,
      loop: true,
        navClass: ['tg-btnprev', 'tg-btnnext'],
        navContainerClass: 'old-prod',
        navText: [
            '<span><i class="fa fa-angle-left fa-2x"></i></span>',
            '<span><i class="fa fa-angle-right fa-2x"></i></span>',
        ] ,
        responsive : {
            0 : {
                items : 1,
            },
            480 : {
                items : 3,
            },
            768 : {
                items : 5,
            }
        }
   
 
  }); 
});
</script>



<script src="{{ mix('js/app.js') }}"></script>
<script src="/js/sweetalert.min.js"></script>

</body>
</html>