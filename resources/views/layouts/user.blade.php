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

   <!-- app header -->
   <div class="flexrow auto-col content-mid-left border-bottom  app-header">
      <div class="flexrow hw-60 content-mid-left space-around auto-resize">
         <div><img src="/images/logo.svg" alt="" width=100 height=50></div>
         <div class="text-primary txt-s"><a href="#">Home</a> </div>
         <div class="text-primary txt-s"><a href="#">Serives</a></div>
         <div class="text-primary txt-s"><a href="#">Contact Us</a></div>
         <div class="text-primary txt-s"><a href="#">About Us</a></div>
      </div>
      <div class="btn btn-primary hw-20 txt-s auto-resize mx-5">Swith to international</div>

      <!-- diplay current user name -->
      <div class="flexrow content-mid-right hw-20 txt-sm">
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