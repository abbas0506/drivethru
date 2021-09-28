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
      <div class='frow w-100 mid-right p-1'>
         <div class="box-25 text-center bg-orange text-white circular hoverable show-sm" onclick="toggle_sidebar()"><i data-feather='x' class="feather-small"></i></div>
         <!-- <div class="frow relative centered box-30 bg-orange circular txt-white hoverable" onclick="toggle_sidebar()" style='right: 0px; z-index:2'><i data-feather='x' class="feather-xsmall"></i></div> -->
      </div>

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
   <div class="frow user-page px-4">
      <!-- 20% blank colum well behind sidebar in order to place page data section at right place-->
      <div class="fcol w-20 hide-sm"></div>
      <div class="fcol w-80">
         <div class="frow page-header">
            <div class="fcol w-80">
               <div class="page-title">Page title</div>
               <div class="page-navbar">
                  <div class="navitem active">Active</div>
                  <div class="navitem">inactive</div>
                  <div class="navitem">inactive</div>
               </div>

            </div>
            <div class="fcol w-20 centered">Graph Section</div>
         </div>


         <div class="frow w-100 page-body auto-col">
            <div class="fcol w-80 page-data">
               <div class="bg-light rounded p-4">
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>
                  <div>Hello</div>

               </div>
            </div>
            <div class="fcol w-20 page-social">
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
      feather.replace()

      function toggle_sidebar() {
         $('.user-sidebar').toggleClass('disappear');
      }
      </script>
</body>

</html>