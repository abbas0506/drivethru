<nav class="global-header">
   <i data-feather="menu" class="feather-small hide-lg px-3" onclick="toggle_sidebar()"></i>
   <div class="logo">
      <img src="{{asset('/images/logo/dark.png')}}" alt="" href="" width="150">
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
                     <img src="{{asset('/images/icons/pakistan-flag.png')}}" alt="" width="25">
                     <span class="hide-sm txt-14">National Mode</span>
                     <i data-feather="chevron-down" class="feather-xsmall" onclick="showmenu()"></i>
                     <!-- <span class="caret"></span> -->
                  </label>
               </li>
               <!-- submenu -->
               <li class="submenu">
                  <ul>
                     <li><a href="{{url('switch/1')}}"><img src="{{asset('/images/icons/globe.png')}}" alt="" width="22"> International Mode</a></li>
                  </ul>
               </li>
               @else
               <li>
                  <label for="country-toggle">
                     <img src="{{asset('/images/icons/globe.png')}}" alt="" width="25">
                     <span class="hide-sm txt-14">International Mode</span>
                     <i data-feather="chevron-down" class="feather-xsmall" onclick="showmenu()"></i>
                     <!-- <span class="caret"></span> -->
                  </label>
               </li>
               <!-- submenu -->
               <li class="submenu">
                  <ul>
                     <li><a href="{{url('switch/0')}}"><img src="{{asset('/images/icons/pakistan-flag.png')}}" alt="" width="22"> International Mode</a></li>
                  </ul>
               </li>
               @endif

            </ul>
         </li>
         <li><a href=""><i data-feather='bell' class="feather-small" onclick=""></i></a></li>
         <li><a href="/">Main Website</a></li>


      </ul>

   </div>
</nav>