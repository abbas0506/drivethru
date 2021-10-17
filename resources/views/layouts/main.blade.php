<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/app.css" rel="stylesheet">
   <script src="/js/app.js"></script>
   <script src="/js/autoformat.js"></script>
   <script src="/js/feather.min.js"></script>
   <script src="{{ asset('js/echarts.min.js')}}" type="text/javascript"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}" />

   <title>DriveThru</title>

</head>

<body class="bg-custom-light">
   <div class="frow w-100 user-header">
      <div class="frow centered w-20">
         <div class="fcol centered">
            <img src="{{url('storage/images/logos/logo1.png')}}" alt="" class="app-logo">
         </div>
      </div>
      @yield('topbar')

   </div>

   @yield('sidebar')
   <div class="frow user-page px-4">
      <!-- 20% blank colum well behind sidebar in order to place page data section at right place-->
      <div class="fcol w-20 rhide"></div>
      <div class="fcol w-80">
         <div class="frow page-header">
            <div class="fcol rw-80">
               <div class="page-title">@yield('page-title')</div>
               <div class="page-navbar">@yield('page-navbar')</div>
            </div>
            <div class="fcol rw-20 centered">@yield('graph')</div>
         </div>
         <div class="frow w-100 page-body auto-col">
            <div class="fcol w-70 rw-100 mr-3">
               @yield('data')
            </div>
            <!-- 20 social panel on large screen -->
            <div class="fcol w-30 rw-100 page-social">
               <div class="social-news">
                  <div class="social-icon">
                     <div class="fb"><i data-feather='facebook' class="feather-small" onclick=""></i></div>
                  </div>
                  <div class="social-text">Join us on facebook. we have a lot of fun for u</div>
               </div>
               <div class="social-news mt-3">
                  <div class="social-icon">
                     <div class="twitter"><i data-feather='twitter' class="feather-small" onclick=""></i></div>
                  </div>
                  <div class="social-text">Join us on twitter. we have a lot of fun for u</div>
               </div>
               <div class="social-news mt-3">
                  <div class="social-icon">
                     <div class="twitter"><i data-feather='tv' class="feather-small" onclick=""></i></div>
                  </div>
                  <div class="social-text">Join us on twitter. we have a lot of fun for u</div>
               </div>


            </div>

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