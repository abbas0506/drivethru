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
   <style>
   .app-header {
      background-color: #f7f2ff;
   }
   </style>
</head>

<body>
   <div class="frow w-100 user-header">
      <div class="frow centered w-20">
         <div class="fcol centered">
            <img src="{{url('storage/images/logos/logo1.png')}}" alt="" class="app-logo">
         </div>
      </div>

      <div class="frow w-80 stretched mid-left">
         <div class=""><i data-feather='toggle-left' class="feather-small text-info mx-2" onclick=""></i>International Mode</div>
         <div class="frow user-top-navbar centered hide-sm">
            <div class="navitem active">About</div>
            <div class="navitem">Home</div>
            <div class="navitem">Blog</div>
            <div class="navitem">Contact Us</div>
         </div>
         <div class="frow pr-3">
            <div class="px-1"><i data-feather='bell' class="feather-small" onclick=""></i></div>
            <div class="px-1"><i data-feather='log-out' class="feather-small" onclick=""></i></div>
            <div class="my-auto mx-2 show-sm"><i data-feather='menu' class="feather-small" onclick="toggle_sidebar()"></i></div>
         </div>
      </div>
   </div>

   <!-- user sidebar -->
   <div class="fcol user-sidebar top-mid">
      <div><img src="{{url('storage/images/logos/logo2.png')}}" alt="" class="user-avatar-lg"></div>
      <div class="user-profile-id">ID:12345</div>
      <div class="frow centered">
         <div class="free-report-btn">Get Free Report</div>
      </div>
      <span class="w-75 hr mt-2"></span>
      <div class="navbar-item mt-4">
         <div class="navbar-ico"><i data-feather='edit-3' class="feather-small"></i></div>
         <div class="navbar-link">Profile</div>
      </div>
      <div class="navbar-item active">
         <div class="navbar-ico"><i data-feather='award' class="feather-small"></i></div>
         <div class="navbar-link">Find University</div>
      </div>
      <div class="navbar-item">
         <div class="navbar-ico"><i data-feather='download' class="feather-small"></i></div>
         <div class="navbar-link">Past Papers</div>
      </div>
      <div class="navbar-item">
         <div class="navbar-ico"><i data-feather='headphones' class="feather-small"></i></div>
         <div class="navbar-link">Career Counselling</div>
      </div>
   </div>
   <div class="frow">
      <!-- 20% blank colum well behind sidebar in order to place page data section at right place-->
      <div class="fcol w-20 hide-sm"></div>
      <div class="fcol w-80 h-90 user-page-body">
         <div class="frow stretched page-header">
            <div class="page-title">Page title</div>
            <div>Graph Section</div>
         </div>
         <!-- <div class="frow page-navbar">
            <div class="page-navitem active">Active</div>
            <div class="page-navitem">inactive</div>
            <div class="page-navitem">inactive</div>
         </div> -->

         <div class="frow w-100 h-90 auto-col">

            <div class="fcol w-80 h-90 page-data bg-light">

               <div>hfdashfkhdkjaskhfkhdaskh</div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>

               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>

               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>
               <div>hfdashfkhdkjaskhfkhdaskhfkhdskahfkhdka </div>

            </div>
            <div class="fcol w-20 page-social bg-info">dhsahdkhsa kashdkhsakdh</div>

         </div>

      </div>
   </div>

   <script>
   feather.replace()

   function toggle_sidebar() {
      $('.user-sidebar').toggleClass('disappear');
   }
   </script>
</body>

</html>