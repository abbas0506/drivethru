<nav class="horizontal-navbar px-4">
   <div class="logo">
      <img src="{{asset('images/logo/light.png')}}" width='150'>
   </div>
   <div class="nav-links">
      <ul>
         <li><span class="lnr lnr-cog mr-2"></span>Admin Panel</li>
         <li class="mx-4">|</li>
         <li><a href="{{url('admin')}}"><span class="lnr lnr-home"></span></a></li>
         <li><a href="{{url('admin/changepw')}}"><span class="lnr lnr-user"></span></a></li>
         <li><a href="http://"><span class="lnr lnr-alarm"></span></a></li>
         <li><a href="{{url('signout')}}"><span class="lnr lnr-power-switch"></span></a></li>
      </ul>
   </div>
</nav>