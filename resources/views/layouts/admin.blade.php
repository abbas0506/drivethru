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

   @yield('background-frame')
   <!-- Navbar -->
   <div class='frow h-15 bg-transparent txt-white mid-left px-10 stretched sticky-top'>

      <!-- small screen navigation menu    -->

      <!-- <div class='r-show' onclick="showResponsiveMenu()"><i data-feather='menu' class="feather-medium mr-2 txt-white"></i></div>
      <div id='responsive-menu' style="display:block; position:absolute; top:15vh; left:20px; " class='fcol w-90  bg-green'>
         <div data-toggle='collapse' data-target='#r_create_menu'>Create or Manage</div>
         <div class="collapse" id='r_create_menu'>
            <div class='txt-s ml-5'>Universities</div>
            <div class='txt-s ml-5'>Universities</div>

         </div>
         <div data-toggle='collapse' data-target='#r_monitor_menu'>Monitor</div>
         <div class="collapse" id='r_monitor_menu'>
            <div>Universities</div>
            <div>Universities</div>

         </div>
      </div> -->
      <div class='logo txt-m mr-auto'><img src="/images/logo/dark_logo.png" style="height:25px"></div>
      <div class="frow h-15 spaced-10">
         <div class="fcol centered menu-item r-hide">
            Create or Manage
            <div class='chevron-up-menu'></div>
            <div class='frow mega-menu p-5 auto-col overflow-auto'>
               <div class='chevron-up-mega'></div>
               <div class="fcol w-30 auto-resize">

                  <div class="mb-2 txt-b"><a href="{{route('countries.index')}}" class='menu-link'>Countries</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Visa check list</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Scholarship Types</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Job Categories</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Job Departments</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Document Types</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Admission check list</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Job Oppertunities</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Scholarships Avaialble</a></div>
               </div>
               <div class="fcol w-30 mx-2 auto-resize">
                  <div class="mb-2 txt-b"><a href="http://" class='menu-link'>Unviersities</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Faculties</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Course Titles</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Course Offering</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Course Level Titles</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Course Requirements</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Uni Admission Criteria</a></div>

               </div>
               <div class="fcol w-30 auto-resize">
                  <div class="mb-2"><a href="http://" class='menu-link'> Advertisement Info</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Faculties</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Course Titles</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Course Offering</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Course Level Titles</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Course Requirements</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Uni Admission Criteria</a></div>

               </div>

            </div>

         </div>
         <div class="fcol centered menu-item r-hide">
            Monitor Activity
            <div class='chevron-up-menu'></div>
            <div class='frow simple-menu p-3'>
               <div class="fcol">
                  <div class="mb-2"><a href="http://" class='menu-link'>Option 1</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Option 2</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Option 3</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Option 3</a></div>

               </div>

            </div>
         </div>
         <div class="fcol centered menu-item">
            <div class='relative'>
               <i data-feather='bell' class="feather-small mx-1 txt-white"></i>
               <div class='notification-count'></div>
            </div>
            <div class='chevron-up-menu'></div>
            <div class='frow simple-menu p-3'>
               <div class="fcol">
                  <div class="mb-2"><a href="http://" class='menu-link'>Notification 1</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Notification 1</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Notification 1</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Notification 1</a></div>

               </div>
            </div>

         </div>
         <div class="fcol centered txt-white menu-item">

            <div class='box-25 border border-light rounded-circle relative'>
               <span class="lnr lnr-user" style="position:absolute; top:4px; left:4px"></span>
            </div>

            <div class='chevron-up-menu'></div>
            <div class='frow simple-menu p-3'>
               <div class="fcol">
                  <div class="mb-2 txt-b"><a href="http://" class='menu-link'>Your Profile</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Change Password</a></div>
                  <div class="mb-2"><a href="http://" class='menu-link'>Sign out</a></div>

               </div>
            </div>
         </div>
      </div>
   </div> <!--    navbar ends -->


   @yield('page-content')

   <div id='scrollup_btn' onclick='scrolltop()' class="frow box-30 circular centered bg-orange hoverable txt-white hidden"><i data-feather='arrow-up' class="feather-xsmall"></i></div>

   <!-- for feather icons display -->
   <script>
   feather.replace()
   </script>



</body>

</html>