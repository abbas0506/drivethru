<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DriveThru</title>
   <link href="{{ asset('/css/index1.css') }}" rel="stylesheet">
   <link href="{{ asset('/css/index_responsive.css') }}" rel="stylesheet">
   <script src="{{ asset('/js/feather.min.js') }}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
   @yield('header')
   @yield('content')
   @yield('footer')
</body>
<script>
feather.replace();
var navlinks = $('#nav-links')

function hidemenu() {
   $('#nav-links').toggleClass('slide-left');
}

function showmenu() {
   $('#nav-links').toggleClass('slide-left');
}

$('.question').click(function() {
   $active = $(this);
   $('.question').each(function() {
      if ($(this).hasClass('show'))
         $(this).removeClass('show');
      $active.addClass('show')

   })

})
</script>

</html>