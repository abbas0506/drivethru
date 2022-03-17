<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DriveThru</title>
   <link href="/css/index.css" rel="stylesheet">
   <link href="/css/index_responsive.css" rel="stylesheet">
   <link href="/css/index_pages.css" rel="stylesheet">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="/js/feather.min.js"></script>

</head>

<body>
   <section class="contact mini_header">
      <x-navbar></x-navbar>
   </section>
   <section class="section-80">
      <img src="/images/contact/1.png" alt="" width="400">
      <div class="row mt-5">
         <!-- 1st col -->
         <div class="col txt-j mt-4">
            <h2>
               General
            </h2>
            <div class="row mt-3 txt-l">
               <div class="v-center p-3"><i data-feather="mail" class="feather-small feather-red"></i></div>
               <div class="txt-l">
                  <h4>Email Address</h4>
                  <p>inofrmation@drivethru.pk</p>
               </div>
            </div>

            <div class="row mt-5 txt-l">
               <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
               <div>
                  <h4>Phone</h4>
                  <p>+92 345 75 15 152</p>
               </div>
            </div>

            <div class="row mt-5 txt-l">
               <div class="v-center p-3"><i data-feather="map-pin" class="feather-small feather-red"></i></div>
               <div>
                  <h4>Address</h4>
                  <p>Lahore City</p>
               </div>
            </div>
         </div>
         <!-- 2nd col -->

         <div class="col txt-j mt-4">
            <h2>
               Admission
            </h2>
            <div class="row txt-l mt-3">
               <div class="v-center p-3"><i data-feather="mail" class="feather-small feather-red"></i></div>
               <div class="txt-l">
                  <h4>Email Address</h4>
                  <p>admissions@drivethru.pk</p>
               </div>
            </div>

            <div class="row mt-5 txt-l">
               <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
               <div>
                  <h4>Phone</h4>
                  <p>+92 316 45 15 249</p>
               </div>
            </div>

            <div class="row mt-5 txt-l">
               <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
               <div>
                  <h4>Phone 2</h4>
                  <p>(+088)589-102</p>
               </div>
            </div>
         </div>
         <!-- 3rd col -->
         <div class="col txt-j mt-4">
            <h2>
               Emergency
            </h2>
            <div class="row txt-l mt-3">
               <div class="v-center p-3"><i data-feather="mail" class="feather-small feather-red"></i></div>
               <div class="txt-l">
                  <h4>Email Address</h4>
                  <p>help@drivethru.pk</p>
               </div>
            </div>

            <div class="row mt-5 txt-l">
               <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
               <div>
                  <h4>Phone</h4>
                  <p>(+088)589-8745</p>
               </div>
            </div>

            <div class="row mt-5 txt-l">
               <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
               <div>
                  <h4>Phone 2</h4>
                  <p>(+088)589-102</p>
               </div>
            </div>

         </div>
      </div>
   </section>

   <section class="footer">
      <x-footer></x-footer>
   </section>
</body>
<script>
feather.replace();
var navlinks = $('#nav-links')

function hidemenu() {
   // navlinks.style.right = "-300px";
   // navlinks.style.translateX = "100%";
   $('#nav-links').toggleClass('slide-left');
}

function showmenu() {
   // navlinks.style.right = "0";
   $('#nav-links').toggleClass('slide-left');
}

// function showOrhide(event) {
//    event.target.toggleClass('show');
//    event.target.toggleClass
// }
$('.question').click(function() {
   $active = $(this);
   $('.question').each(function() {
      if ($(this).hasClass('show'))
         $(this).removeClass('show');
      $active.addClass('show')

   })

})
</script>

</html>