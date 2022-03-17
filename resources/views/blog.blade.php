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
   <section class="blog mini_header">
      <x-navbar></x-navbar>
   </section>
   <section class="section-80 block myblog">
      <div class="title">OUR BLOGS</div>
      <div class="row">
         <!-- 1st blog -->
         <div class="col w-45 txt-j mt-4">
            <img src="/images/blog/1.jpg" alt="" width="400" height="250">
            <h2 class="mt-3">Services DriveThru Offers</h2>
            <div class="flex mt-1">
               <i data-feather="calendar" class="feather-small feather-red"></i>
               <span>January 01,2022</span>
               <i data-feather="user" class="feather-small feather-red"></i>
               <span>Adnan</span>
               <i data-feather="book" class="feather-small feather-red"></i>
               <span>University</span>
            </div>
            <p class="txt-14 txt-j mt-4">
               We are pleased to welcome you at DRIVETHRU. We ensure you trust and recommended a pathway to a bright future ahead. With utmost commitment and kaizen approach, we acknowledge our candidate's valuable preferences to fit in top-ranked universities....
            </p>
            <a href="">Continue reading &nbsp <i data-feather="arrow-right" class="feather-small"></i></a>
         </div>
         <!-- 2nd blog -->
         <div class="col w-45 txt-j mt-4">
            <img src="/images/blog/2.jpg" alt="" width="400" height="250">
            <h2 class="mt-3">National Admissions</h2>
            <div class="flex mt-1">
               <i data-feather="calendar" class="feather-small feather-red"></i>
               <span>January 01,2022</span>
               <i data-feather="user" class="feather-small feather-red"></i>
               <span>Adnan</span>
               <i data-feather="book" class="feather-small feather-red"></i>
               <span>University</span>
            </div>
            <p class="txt-14 txt-j mt-4">
               We are pleased to welcome you at DRIVETHRU. We ensure you trust and recommended a pathway to a bright future ahead. With utmost commitment and kaizen approach, we acknowledge our candidate's valuable preferences to fit in top-ranked universities....
            </p>
            <a href="">Continue reading &nbsp <i data-feather="arrow-right" class="feather-small"></i></a>
         </div>
      </div>
      <div class="row mt-5">
         <!-- 3rd blog -->
         <div class="col w-45 txt-j mt-4">
            <img src="/images/blog/3.jpg" alt="" width="400" height="250">
            <h2 class="mt-3">International Admissions</h2>
            <div class="flex mt-1">
               <i data-feather="calendar" class="feather-small feather-red"></i>
               <span>January 01,2022</span>
               <i data-feather="user" class="feather-small feather-red"></i>
               <span>Adnan</span>
               <i data-feather="book" class="feather-small feather-red"></i>
               <span>University</span>
            </div>
            <p class="txt-14 txt-j mt-4">
               We are pleased to welcome you at DRIVETHRU. We ensure you trust and recommended a pathway to a bright future ahead. With utmost commitment and kaizen approach, we acknowledge our candidate's valuable preferences to fit in top-ranked universities....
            </p>
            <a href="">Continue reading &nbsp <i data-feather="arrow-right" class="feather-small"></i></a>
         </div>
         <!-- 4th blog -->
         <div class="col w-45 txt-j mt-4">
            <img src="/images/blog/4.jpg" alt="" width="400" height="250">
            <h2 class="mt-3">While the lovely valley team work</h2>
            <div class="flex mt-1">
               <i data-feather="calendar" class="feather-small feather-red"></i>
               <span>January 01,2022</span>
               <i data-feather="user" class="feather-small feather-red"></i>
               <span>Adnan</span>
               <i data-feather="book" class="feather-small feather-red"></i>
               <span>University</span>
            </div>
            <p class="txt-14 txt-j mt-4">
               We are pleased to welcome you at DRIVETHRU. We ensure you trust and recommended a pathway to a bright future ahead. With utmost commitment and kaizen approach, we acknowledge our candidate's valuable preferences to fit in top-ranked universities....
            </p>
            <a href="">Continue reading &nbsp <i data-feather="arrow-right" class="feather-small"></i></a>
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