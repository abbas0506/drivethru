<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/app.css" rel="stylesheet">
   <script src="/js/app.js"></script>
   <script src="/js/feather.min.js"></script>
   <title>DriveThru</title>

</head>

<body class="bg-custom-light">
   <div class="frow w-100 user-header">
      <div class="frow centered w-20">
         <div class="fcol centered">
            <img src="{{url(asset('images/logos/app/colorful_0.png'))}}" alt="" class="app-logo">
         </div>
      </div>
      @yield('topbar')

   </div>

   @yield('sidebar')
   <div class="frow w-100 rw-100">
      <!-- 20% blank colum well behind sidebar in order to place page data section at right place-->
      <div class="fcol w-20 rhide"></div>
      <div class="fcol w-80 rw-100">
         <div class="frow w-100 rw-100 px-4 centered">
            @yield('data')
         </div>
      </div>
      <script>
         feather.replace();

         function toggle_sidebar() {
            $('.user-sidebar').toggleClass('disappear');
         }
      </script>
      @yield('script')
</body>

</html>