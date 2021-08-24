<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/app.css" rel="stylesheet">
   <link href="/fonts/icon-font/lineicons.css" rel="stylesheet">

   <!-- <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet"> -->
   <script src="/js/app.js"></script>
   <script src="/js/autoformat.js"></script>
   <script src="/js/feather.min.js"></script>


   <script src="{{ asset('js/echarts.min.js')}}" type="text/javascript"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}" />

   <title>DriveThru</title>
   <style>
   .app-header {
      background-image: url(".\\images\\admissions_1.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
      opacity: 0.75;
      /* background-color: #f7f2ff; */
   }
   </style>
</head>

<body>

   <!-- app header -->
   <div class="flexrow hw-100 content-mid-left border-bottom app-header r-px-5 auto-resize">
      <div class="mr-auto"><img src="/images/logo.svg" alt="" width=120 height=60></div>
      <!-- <div class="flexrow hw-60 content-mid-left space-between">

         <div class="flexrow hw-80 fancy-search-grow content-mid-left txt-s">
            <div class="flexrow hw-70 content-mid-left">
               <input type="text" placeholder="Country or City">
               <div class="box-20 search-ico ml-2">
                  <i data-feather='search' class="feather-xsmall"></i>
               </div>
            </div>
         </div>
         <div class="hw-20 r-show text-right">
            <a href="#navbar-vertical" data-toggle="collapse">
               <i data-feather='layers' class="feather-small mx-2" style="position:relative; top:-2px;"></i>
            </a>
         </div>
      </div>-->
      <div class="">
         <select name="" id="" class="form-control" style="background-color: transparent; outline:0; border:none; border-bottom:thin">
            <option value=""><span data-feather='zap' class="feather-xsmall mx-2"></span>National</option>
            <option value="">International</option>
         </select>
      </div>
   </div>
   <div id='navbar-vertical' class="collapse bg-info">
      <div class="flexcol r-px-5">
         <div class="txt-s my-1">Home</div>
         <div class="txt-s my-1">Services</div>
         <div class="txt-s my-1">Contact Us</div>
         <div class="txt-s my-1">About Us</div>
         <div class="txt-s my-1">Singout</div>
      </div>

   </div>
   <!-- page navigation -->
   <div class="flexrow hw-100 content-mid-left border-bottom auto-resize r-hide">

      <div class="text-primary txt-s px-4"><a href="#">Home</a> </div>
      <div class="text-primary txt-s px-4"><a href="#">Serives</a></div>
      <div class="text-primary txt-s px-4"><a href="#">Contact Us</a></div>
      <div class="text-primary txt-s px-4"><a href="#">About Us</a></div>

      <!-- diplay current user name -->
      <div class="flexrow content-mid-right px-4 txt-sm">
         @guest
         @if (Route::has('login'))
         <a href="{{ route('login') }}" class="mx-4">{{ __('Login')}}</a>
         @endif

         @else
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            welcome {{ Auth::user()->name }}
         </a>

         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
            </form>
         </div>

         @endguest

      </div>

   </div>

   <!-- content page -->
   <div class="flexrow w-100 auto-col">
      <div class="auto-resize bg-primary py-3 hw-15">
         @yield('sidebar')
      </div>
      <div class="border-left hw-70">
         @yield('page')
         @yield('modal')
      </div>
      <div class="auto-resize py-3 hw-15">
         @yield('socialbar')
      </div>
   </div>

   @yield('script')

   <script>
   feather.replace()
   </script>
</body>

</html>