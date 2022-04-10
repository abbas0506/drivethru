<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Drivethru</title>
   <link rel="icon" href="{{ asset('/images/logo/favicon.ico') }}">
   <link href="{{asset('/css/student.css')}}" rel="stylesheet">
   <link href="{{asset('/css/fancyinput.css')}}" rel="stylesheet">
   <link href="{{asset('/css/student_responsive.css')}}" rel="stylesheet">
   <!-- <script src="{{asset('/js/app.js')}}"></script> -->
   <script src="{{asset('/js/jquery.min.js')}}"></script>
   <script src="{{asset('/js/autoformat.js')}}"></script>
   <script src="{{asset('/js/feather.min.js')}}"></script>

   <meta name="csrf-token" content="{{ csrf_token() }}" />

   <title>DriveThru</title>
</head>

<body>
   <section class="global-header-section">
      <x-student.header></x-student.header>
   </section>
   @yield('sidebar')
   <section class="data-section">
      <div class="title-bar">
         @yield('page-title')
      </div>
      <div class="data-container">
         <div class='content-panel'>
            @yield('content')
         </div>
         <div class='promotion-panel'>
            @yield('promotion')
         </div>
      </div>
   </section>

   <script>
   feather.replace();

   function toggle_sidebar() {
      $('.sidebar').toggleClass('show');
   }
   </script>
   @yield('script')
</body>

</html>