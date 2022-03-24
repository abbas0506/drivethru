<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <script src="/js/feather.min.js"></script>
   <link rel="stylesheet" href="/css/test.css">
</head>

<body>
   <section class="header-section">
      <div class="header">
         <div class="logo"><img src="/images/logo/dark.png" alt="" width="150"></div>
         <div class="menubar">
            <ul class="main-menu">
               <!-- <li>National Mode<span class="caret down"></span></li> -->
               <li>
                  <label for="user-mode-switch" class="flex v-center">
                     <img src="/images/icons/pakistan-flag.png" alt="" width="25">
                     National
                     <span class="caret down"></span>
                  </label>
               </li>

               <!-- <li><img src="/images/icons/pakistan-flag.png" alt="" width="25"></li>
                     <li>National Mode</li>
                     <li><label for="user-mode-switch"><i data-feather='chevron-down' class="feather-small"></i></label></li>-->
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

      </div>
   </section>

</body>
<script>
   feather.replace();
</script>

</html>