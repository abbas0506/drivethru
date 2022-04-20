<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Drivethru</title>
   <link rel="icon" href="{{ asset('/images/logo/favicon.ico') }}">

   <link href="{{asset('/css/app.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

   <!-- external js files -->
   <script src="{{asset('/js/app.js')}}"></script>
   <script src="{{asset('/js/autoformat.js')}}"></script>
   <script src="{{asset('/js/feather.min.js')}}"></script>
   <script src="{{asset('/js/scrolltop.js')}}"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}" />

   <style>
   body {
      background-color: #f8fafc !important;
   }

   #scrollup_btn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;

   }
   </style>

</head>

<body data-spy="scroll" data-target=".spy" data-offset="200">
   <div class="relative">
      <x-representative.header></x-representative.header>
      @yield('page-content')
   </div>

   @yield('slider')
   @yield('script')

   <!-- for feather icons display -->
   <script>
   feather.replace()
   </script>

   <div id="scrollup_btn" class="box-30 bg-orange">up</div>

</body>

</html>