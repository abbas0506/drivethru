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
   <section class="admission mini_header">
      <x-navbar></x-navbar>
   </section>
   <section class="section-80">
      <div class="title">Admission</div>
      <div class="row">
         <div class="col w-45 txt-j">
            Text not provided. Text not provided. Text not provided. Text not provided. Text not provided. Text not provided.
            Text not provided. Text not provided. Text not provided. Text not provided. Text not provided. Text not provided.
            Text not provided. Text not provided. Text not provided. Text not provided. Text not provided.
         </div>

         <div class="col">

            <img src="/images/admission/1.jpg" alt="" width="350">

         </div>

      </div>
   </section>

   <section class="section-80">
      <div class="row">
         <div class="col w-45 block">
            <div class="content">
               <div class="txt-red">NATIONAL</div>
               <div class="txt-blue txt-20 txt-b">ADMISSION</div>
               <img src="/images/admission/2.jpg" alt="" width="300" hight="150">
               <h2 class="mt-3">Prepare Yourself</h2>
               <p class="txt-10 txt-j mt-4">Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for
                  students
                  applying
                  in both
                  National and International universities. Drivethru.pk is your partner, let us take care of all your admission processesDrivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take
                  care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes
               </p>
            </div>

         </div>
         <div class="col w-45 block">
            <div class="content">
               <div class="txt-red">INTERNATIONAL</div>
               <div class="txt-blue txt-20 txt-b">ADMISSION</div>
               <img src="/images/admission/3.jpg" alt="" width="300" hight="150">
               <h2 class="mt-3">Admission Formalities</h2>
               <p class="txt-10 txt-j mt-4">Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for
                  students
                  applying in both
                  National and International universities. Drivethru.pk is your partner, let us take care of all your admission processesDrivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take
                  care of all your admission processes Drivethru.pk provides complete resource packages for students applying in both National and International universities. Drivethru.pk is your partner, let us take care of all your admission processes
               </p>
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