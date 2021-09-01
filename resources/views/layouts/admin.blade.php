<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/app.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
   <!-- <link href="/fonts/icon-font/lineicons.css" rel="stylesheet"> -->
   <!-- <link href="/fonts/linear_icons/webfont/selection.json" rel="stylesheet"> -->
   <!-- <link href="/css/linear_icons.css" rel="stylesheet"> -->

   <!-- external js files -->
   <script src="js/app.js"></script>
   <script src="js/autoformat.js"></script>
   <script src="js/feather.min.js"></script>
   <script src="js/scrolltop.js"></script>
   <script src="js/carousel.js"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}" />

   <title>Drive Thru</title>

   <style>
   #scrollup_btn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;

   }
   </style>

</head>

<body>

   @yield('header')
   @yield('page-content')
   @yield('script')

   <!-- for feather icons display -->
   <script>
   feather.replace()
   </script>

   <div id="scrollup_btn" class="box-30 bg-orange">up</div>

</body>

</html>