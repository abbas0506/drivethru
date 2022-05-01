<nav>
   <a href="/">
      <img src="{{asset('/images/logo/dark.png')}}" alt="" href="" class='app-header-logo'>
   </a>

   <div class="nav-links" id='nav-links'>
      <i data-feather="x" class="feather-small feather-red" onclick="hidemenu()"></i>
      <ul>
         <a href="/">
            <li>HOME</li>
         </a>
         <a href="admission">
            <li>ADMISSION</li>
         </a>
         <a href="services">
            <li>SERVICES</li>
         </a>
         <a href="about">
            <li>ABOUT</li>
         </a>
         <a href="blog">
            <li>BLOG</li>
         </a>
         <a href="contact">
            <li>CONTACT</li>
         </a>

         @if(session('user'))
         <a href="student-dashboard">
            <li>DASHBOARD</li>
         </a>
         @else
         <a href="signin">
            <li>LOGIN</li>
         </a>
         @endif


      </ul>
   </div>
   <i data-feather="menu" class="feather-small feather-light" onclick="showmenu()"></i>
</nav>
<div class="social-group-vertical">
   <a href="https://www.facebook.com/drivethruupk" target="_blank"><img src="{{asset('/images/icons/fb.png')}}" alt="" class="social-icon facebook"></a>
   <a href="https://wa.me/+923457515152" target="_blank"><img src=" {{asset('/images/icons/whatsapp.png')}}" alt="" class=" social-icon whatsapp"></a>
</div>