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
            <div class="main-menu">
               <!-- <div>National Mode<span class="caret down"></span></div> -->
               <div class="main-menu-item has-submenu">
                  <label for="country-toggle-chk">
                     <img src="/images/icons/pakistan-flag.png" alt="" width="25">
                     National
                     <span class="caret down"></span>
                  </label>
                  <input type="checkbox" id='country-toggle-chk' class="invisible" />
                  <div class="submenu">
                     <div> <img src="/images/icons/pakistan-flag.png" alt="" width="25"> National Mode </div>
                     <div> <img src="/images/icons/globe.png" alt="" width="22"> International Mode</div>
                  </div>
               </div>

               <!-- <div><img src="/images/icons/pakistan-flag.png" alt="" width="25"></div>
                     <div>National Mode</div>
                     <div><label for="country-toggle"><i data-feather='chevron-down' class="feather-small"></i></label></div>-->

               <div main-menu-item><i data-feather='bell' class="feather-small" onclick=""></i></div>

            </div>

         </div>

      </div>
   </section>

</body>
<script>
feather.replace();
</script>

</html>