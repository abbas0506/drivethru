<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Drivethru</title>
   <link rel="icon" href="{{ asset('/images/logo/favicon.ico') }}">

   <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
   <link href="{{ asset('/css/fa.css') }}" rel="stylesheet">
   <link href="{{ asset('/css/index_responsive.css')}}" rel="stylesheet">

   <script src="{{ asset('/js/feather.min.js')}}"></script>
   <script src="{{ asset('/js/app.js') }}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
   @yield('header')
   @yield('content')
   @yield('footer')
   @yield('script')

   <!-- Messenger Chat plugin Code -->
   <div id="fb-root"></div>

   <!-- Your Chat plugin code -->
   <div id="fb-customer-chat" class="fb-customerchat">
   </div>

   <script>
   var chatbox = document.getElementById('fb-customer-chat');
   chatbox.setAttribute("page_id", "103096905391237");
   chatbox.setAttribute("attribution", "biz_inbox");
   </script>

   <!-- Your SDK code -->
   <script>
   window.fbAsyncInit = function() {
      FB.init({
         xfbml: true,
         version: 'v13.0'
      });
   };

   (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   </script>

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
</body>


</html>