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
   <section class="about mini_header">
      <x-navbar></x-navbar>
   </section>
   <section class="section-80 block">
      <div class="title">We are pleased to welcome you at DriveThru</div>
      <div class="row">
         <div class="col w-45 txt-j mt-4">
            <p class="txt-14 txt-j mt-4">
               We ensure you trust and recommended a pathway to a bright future ahead.
               With utmost commitment and kaizen approach, we acknowledge our candidate's valuable preferences to fit in top-ranked universities.
               The platform of DRIVETHRU will ensure the right candidate to the right university.
               Our platform provides sufficient information and services that empower you to take a lead in your academic career.
            </p>
         </div>
         <div class="col">
            <img src="/images/about/1.jpg" alt="" width="300" height="250">
         </div>

      </div>
      <!-- 2nd row -->
      <div class="row">
         <div class="col">
            <img src="/images/about/2.jpg" alt="" width="350" height="250">
         </div>
         <div class="col w-45 txt-j mt-4">
            <h2>Vision</h2>
            <p class="txt-14 txt-j mt-4">
               DriveThru wants to excel is terms of its brand recognition throughout the country, the stronger the brand image, more likely are the chances of customer retentions and newly acquires. Our vision is to be the undisputed provider of Online services for our clients, excelling in quality of service, agility and responsiveness to the changing demands of the business.
            </p>
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