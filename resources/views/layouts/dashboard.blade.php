<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{asset('/css/app.css')}}" rel="stylesheet">
   <link href="{{asset('/css/student.css')}}" rel="stylesheet">
   <link href="{{asset('/css/student_responsive.css')}}" rel="stylesheet">
   <script src="{{asset('/js/app.js')}}"></script>
   <script src="{{asset('/js/autoformat.js')}}"></script>
   <script src="{{asset('/js/feather.min.js')}}"></script>

   <meta name="csrf-token" content="{{ csrf_token() }}" />

   <title>DriveThru</title>
</head>

<body class="bg-custom-light">

   <section class="global-header-section">
      <x-student.header></x-student.header>
   </section>

   @yield('sidebar')
   <div class="frow user-page px-4">
      <!-- 20% blank colum well behind sidebar in order to place page data section at right place-->
      <div class="fcol w-20 rhide"></div>
      <div class="fcol w-80">
         <div class="frow page-header">
            @yield('page-header')
         </div>
         <div class="frow w-100 auto-col">
            <div class="fcol w-70 rw-100 mr-3">
               @yield('data')
            </div>

            <div class="fcol w-30 rw-100">
               @yield('profile')
            </div>
         </div>
      </div>

      <script>
      feather.replace();

      function toggle_sidebar() {
         $('.sidebar').toggleClass('show');
      }
      </script>
      @yield('script')
</body>

</html>