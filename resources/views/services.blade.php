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
   <section class="services mini_header">
      <x-navbar></x-navbar>
   </section>
   <section class="section-80">

      <div class="row">
         <div class="col">
            <img src="/images/services/1.jpg" alt="" width="300" height="250">
         </div>

         <div class="col w-45 txt-j">
            <!-- <div class="title">Services</div> -->
            <p class="txt-10 txt-j">Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for
               students applyingin both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processesDrivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your
               partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes
            </p>
         </div>
      </div>
   </section>

   <section class="section-80">
      <div class="title">Our Services</div>
      <div class="row">
         <div class="col w-30 block">
            <div class="content">
               <img src="/images/services/logo.jpg" alt="" width="100" hight="100">
               <h4 class="mt-3">One Stop Patform</h4>
               <p class="txt-12 txt-j mt-4">Drivethru.pk provides complete resource packages for students applying in both National and International universities. </p>
            </div>

         </div>
         <div class="col w-30 block">
            <div class="content">
               <img src="/images/services/logo.jpg" alt="" width="100" hight="100">
               <h4 class="mt-3">One Stop Patform</h4>
               <p class="txt-12 txt-j mt-4">Drivethru.pk provides complete resource packages for students applying in both National and International universities. </p>
            </div>

         </div>
         <div class="col w-30 block">
            <div class="content">
               <img src="/images/services/logo.jpg" alt="" width="100" hight="100">
               <h4 class="mt-3">One Stop Patform</h4>
               <p class="txt-12 txt-j mt-4">Drivethru.pk provides complete resource packages for students applying in both National and International universities. </p>
            </div>

         </div>
      </div>
      <div class="row mt-4">
         <div class="col w-30 block">
            <div class="content">
               <img src="/images/services/logo.jpg" alt="" width="100" hight="100">
               <h4 class="mt-3">One Stop Patform</h4>
               <p class="txt-12 txt-j mt-4">Drivethru.pk provides complete resource packages for students applying in both National and International universities. </p>
            </div>

         </div>
         <div class="col w-30 block">
            <div class="content">
               <img src="/images/services/logo.jpg" alt="" width="100" hight="100">
               <h4 class="mt-3">One Stop Patform</h4>
               <p class="txt-12 txt-j mt-4">Drivethru.pk provides complete resource packages for students applying in both National and International universities. </p>
            </div>

         </div>
         <div class="col w-30 block">
            <div class="content">
               <img src="/images/services/logo.jpg" alt="" width="100" hight="100">
               <h4 class="mt-3">One Stop Patform</h4>
               <p class="txt-12 txt-j mt-4">Drivethru.pk provides complete resource packages for students applying in both National and International universities. </p>
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