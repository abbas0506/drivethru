<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <script src="/js/feather.min.js"></script>
   <link rel="stylesheet" href="/css/test.css">
   <!-- <link rel="stylesheet" href="/css/test.css"> -->
</head>

<body>
   <section>
      <nav class="nav global light">
         <img src="/images/logo/dark.png" alt="" href="" width="150">
         <div class="nav-links" id='nav-links'>
            <i data-feather="x" class="feather-small feather-red" onclick="hidemenu()"></i>
            <!-- main menu -->
            <ul>
               <li class="has-submenu">
                  <ul>
                     <input type="checkbox" id='country-toggle' class="invisible" />
                     <li>
                        <label for="country-toggle">
                           <img src="/images/icons/pakistan-flag.png" alt="" width="25">
                           <span>National</span>
                           <i data-feather="chevron-down" class="feather-xxsmall" onclick="showmenu()"></i>
                           <!-- <span class="caret"></span> -->
                        </label>
                     </li>

                     <!-- submenu -->
                     <li class="submenu">
                        <ul>
                           <li> <img src="/images/icons/pakistan-flag.png" alt="" width="25"> National Mode </li>
                           <li> <img src="/images/icons/globe.png" alt="" width="25"> International Mode</li>
                        </ul>
                     </li>

                  </ul>
               </li>
               <li><a href=""><i data-feather='bell' class="feather-small" onclick=""></i></a></li>
               <li><img src="/images/icons/user-avatar.png" alt="" width="22"></li>

            </ul>
         </div>
         <i data-feather="menu" class="feather-small feather-light" onclick="showmenu()"></i>
      </nav>



      <!-- <div class="header">
         <div class="logo"><img src="/images/logo/dark.png" alt="" width="150"></div>
         <div class="menubar">
            <ul class="main-menu">
                <li>National Mode<span class="caret down"></span></li> -->
      <!-- <li>
         <label for="user-mode-switch" class="flex v-center">
            <img src="/images/icons/pakistan-flag.png" alt="" width="25">
            National
            <span class="caret down"></span>
         </label>
      </li>


      <input type="checkbox" id='user-mode-switch' class="user-mode-switch" />
      <li>
         <ul class="dropdown user-mode-dropdown">
            <li> <img src="/images/icons/pakistan-flag.png" alt="" width="25"> National Mode </li>
            <li> <img src="/images/icons/globe.png" alt="" width="22"> International Mode</li>
         </ul>
      </li>
      <li><i data-feather='bell' class="feather-small" onclick=""></i></li>

      </ul>

      </div>

      </div> -->
   </section>

</body>
<script>
feather.replace();
</script>

</html>