<nav class="global-header">
   <i data-feather="menu" class="feather-small hide-lg px-3" onclick="toggle_sidebar()"></i>
   <div class="logo">
      <a href="/">
         <img src="{{asset('/images/logo/dark.png')}}" alt="" href="">
      </a>
   </div>

   <div class="nav-links" id='nav-links'>
      <!-- main menu -->
      <ul>


         <li class="has-submenu">
            <ul>
               <input type="checkbox" id='country-toggle' class="hidden" />
               @if(session('mode')==0)
               <li>

                  <label for="country-toggle">
                     <!-- <img src="{{asset('/images/icons/pakistan-flag.png')}}" alt="" width="25"> -->
                     <!-- <span class="hide-sm"><img src="{{asset('/images/icons/national.png')}}" alt="" width="80"></span>
                     <i data-feather="chevron-down" class="feather-xsmall" onclick="showmenu()"></i> -->
                     <img src="{{asset('/images/icons/national.png')}}" alt="" width="100" onclick="showmenu()">

                     <!-- <span class="caret"></span> -->
                  </label>
               </li>

               <!-- submenu -->
               <li class="submenu">
                  <ul>
                     <!-- <li><a href="{{url('switch/1')}}"><img src="{{asset('/images/icons/international.png')}}" alt="" width="80">International Panel</a></li> -->
                     <li class="txt-c"><a href="{{url('switch/1')}}">Switch to International Panel</a></li>
                  </ul>
               </li>
               @else
               <li>
                  <label for="country-toggle">
                     <!-- <img src="{{asset('/images/icons/globe.png')}}" alt="" width="25"> -->
                     <img src="{{asset('/images/icons/international.png')}}" alt="" width="100" onclick="showmenu()">
                  </label>
               </li>
               <!-- submenu -->
               <li class="submenu">
                  <ul>
                     <!-- <li><a href="{{url('switch/0')}}"><img src="{{asset('/images/icons/pakistan-flag.png')}}" alt="" width="22"> National Mode</a></li> -->
                     <li><a href="{{url('switch/0')}}">Switch to Natioal Mode</a></li>
                  </ul>
               </li>
               @endif

            </ul>
         </li>
         <li><a href="/"><span class="lnr lnr-home"></span></a></li>
         <li><a href=""><span class="lnr lnr-alarm"></span></a></li>
         <li><a href="{{url('signout')}}"><span class="lnr lnr-power-switch"></span></a></li>
      </ul>

   </div>
</nav>