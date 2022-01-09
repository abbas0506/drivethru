<!DOCTYPE html>
<html lang="zxx">

<head>
   <!-- meta tag -->
   <meta charset="utf-8">
   <title>Drivethru.pk</title>
   <meta name="description" content="">
   <!-- responsive tag -->
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- favicon -->
   <link rel="apple-touch-icon" href="apple-touch-icon.png">
   <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav-orange.png">
   <!-- Bootstrap v5.0.2 css -->
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <!-- font-awesome css -->
   <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
   <!-- animate css -->
   <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
   <!-- owl.carousel css -->
   <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
   <!-- slick css -->
   <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
   <!-- off canvas css -->
   <link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css">
   <!-- linea-font css -->
   <link rel="stylesheet" type="text/css" href="assets/fonts/linea-fonts.css">
   <!-- flaticon css  -->
   <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css">
   <!-- magnific popup css -->
   <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
   <!-- Main Menu css -->
   <link rel="stylesheet" href="assets/css/rsmenu-main.css">
   <!-- spacing css -->
   <link rel="stylesheet" type="text/css" href="assets/css/rs-spacing.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- This stylesheet dynamically changed from style.less -->
   <!-- responsive css -->
   <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

   <link href="/css/app.css" rel="stylesheet">
   <!-- <script src="/js/app.js"></script> -->
   <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="defult-home">

   <!--Preloader area start here-->
   <div id="loader" class="loader orange-color">
      <div class="loader-container">
         <div class='loader-icon'>
            <img src="assets/images/pre-logo1.png" alt="">
         </div>
      </div>
   </div>
   <!--Preloader area End here-->

   <!-- Main content Start -->
   <div class="main-content">
      <!--Full width header Start-->
      <div class="full-width-header home8-style4 main-home">
         <!--Header Start-->
         <header id="rs-header" class="rs-header">
            <x-app__menu></x-app__menu>
            <x-canvas__menu></x-canvas__menu>
         </header>
         <!--Header End-->
      </div>
      <!--Full width header End-->

      <!-- Main content Start -->
      <!-- Breadcrumbs End -->
      @yield('page')

      <!-- faq Section Start -->
      <!-- Newsletter section start -->
      <div class="rs-newsletter style1 orange-color mb--90 sm-mb-0 sm-pb-70">
         <div class="container">
            <div class="newsletter-wrap">
               <div class="row y-middle">
                  <div class="col-lg-6 col-md-12 md-mb-30">
                     <div class="content-part">
                        <div class="sec-title">
                           <div class="title-icon md-mb-15">
                              <img src="assets/images/newsletter.png" alt="images">
                           </div>
                           <h2 class="title mb-0 white-color">Subscribe to Newsletter</h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <form class="newsletter-form">
                        <input type="email" name="email" placeholder="Enter Your Email" required="">
                        <button type="submit">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Newsletter section end -->

   </div>
   <!-- Main content End -->

   <!-- Footer Start -->
   <footer id="rs-footer" class="rs-footer home9-style main-home">
      <div class="footer-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                  <div class="footer-logo mb-30">
                     <a href="index.html"><img src="assets/images/lite-logo.png" alt=""></a>
                  </div>
                  <div class="textwidget pr-60 md-pr-15">
                     <p class="white-color">DriveThru.PK is a simple one-stop shop for all your higher education in (national and international) universities requirements from education counselling to vetted admission process.</p>
                  </div>
                  <ul class="footer_social">
                     <li>
                        <a href="https://web.facebook.com/Drivethruupk" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
                     </li>
                     <li>
                        <a href="https://www.twitter.com/Drivethrupk" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
                     </li>

                     <li>
                        <a href="https://www.pinterest.com/Drivethrupk" target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a>
                     </li>
                     <li>
                        <a href="https://www.linkedin.com/company/drivethrupk" target="_blank"><span><i class="fa fa-linkedin"></i></span></a>
                     </li>
                     <li>
                        <a href="https://www.instagram.com/Drivethrupk" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
                     </li>

                  </ul>
               </div>
               <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                  <h3 class="widget-title">Address</h3>
                  <ul class="address-widget">
                     <li>
                        <i class="flaticon-location"></i>
                        <div class="desc">Lahore Pakistan</div>
                     </li>
                     <li>
                        <i class="flaticon-call"></i>
                        <div class="desc">
                           <a href="tel:(+923457515152">(+92 345 75 15 152</a>
                        </div>
                     </li>
                     <li>
                        <i class="flaticon-email"></i>
                        <div class="desc">
                           <a href="mailto:support@drivethru.pk">help@drivethru.pk</a>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-12 col-sm-12 pl-50 md-pl-15 footer-widget md-mb-50">
                  <h3 class="widget-title">Courses</h3>
                  <ul class="site-map">
                     <li><a href="#">Courses</a></li>
                     <li><a href="#">Course Two</a></li>
                     <li><a href="#">Single Course</a></li>
                     <li><a href="#">Profile</a></li>
                     <li><a href="#">Login/Register</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                  <h3 class="widget-title">Recent Posts</h3>
                  <div class="recent-post mb-20">
                     <div class="post-img">
                        <img src="assets/images/footer/1.jpg" alt="">
                     </div>
                     <div class="post-item">
                        <div class="post-desc">
                           <a href="#">University while the lovely valley team work</a>
                        </div>
                        <span class="post-date">
                           <i class="fa fa-calendar"></i>
                           September 20, 2020
                        </span>
                     </div>
                  </div>
                  <div class="recent-post mb-20 md-pb-0">
                     <div class="post-img">
                        <img src="assets/images/footer/2.jpg" alt="">
                     </div>
                     <div class="post-item">
                        <div class="post-desc">
                           <a href="#">High school program starting soon 2021</a>
                        </div>
                        <span class="post-date">
                           <i class="fa fa-calendar-check-o"></i>
                           September 14, 2020
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="footer-bottom">
         <div class="container">
            <div class="row y-middle">
               <div class="col-lg-6 md-mb-20">
                  <div class="copyright">
                     <p>&copy; 2022 All Rights Reserved. Developed By <a href="http://drivethru.pk/">Drivethru.pk</a></p>
                  </div>
               </div>
               <div class="col-lg-6 text-end md-text-start">
                  <ul class="copy-right-menu">
                     <li><a href="#">Event</a></li>
                     <li><a href="#">Blog</a></li>
                     <li><a href="#">Contact</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- Footer End -->

   <!-- start scrollUp  -->
   <div id="scrollUp" class="orange-color">
      <i class="fa fa-angle-up"></i>
   </div>
   <!-- End scrollUp  -->

   <!-- Search Modal Start -->
   <div class="modal fade search-modal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
      <button type="button" class="close" data-bs-dismiss="modal">
         <span class="flaticon-cross"></span>
      </button>
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="search-block clearfix">
               <form>
                  <div class="form-group">
                     <input class="form-control" placeholder="Search Here..." type="text">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Search Modal End -->

   <!-- modernizr js -->
   <script src="assets/js/modernizr-2.8.3.min.js"></script>
   <!-- jquery latest version -->
   <script src="assets/js/jquery.min.js"></script>
   <!-- Bootstrap v5.0.2 js -->
   <script src="assets/js/bootstrap.min.js"></script>
   <!-- Menu js -->
   <script src="assets/js/rsmenu-main.js"></script>
   <!-- op nav js -->
   <script src="assets/js/jquery.nav.js"></script>
   <!-- owl.carousel js -->
   <script src="assets/js/owl.carousel.min.js"></script>
   <!-- Slick js -->
   <script src="assets/js/slick.min.js"></script>
   <!-- isotope.pkgd.min js -->
   <script src="assets/js/isotope.pkgd.min.js"></script>
   <!-- imagesloaded.pkgd.min js -->
   <script src="assets/js/imagesloaded.pkgd.min.js"></script>
   <!-- wow js -->
   <script src="assets/js/wow.min.js"></script>
   <!-- Skill bar js -->
   <script src="assets/js/skill.bars.jquery.js"></script>
   <script src="assets/js/jquery.counterup.min.js"></script>
   <!-- counter top js -->
   <script src="assets/js/waypoints.min.js"></script>
   <!-- video js -->
   <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
   <!-- magnific popup js -->
   <script src="assets/js/jquery.magnific-popup.min.js"></script>
   <!-- plugins js -->
   <script src="assets/js/plugins.js"></script>
   <!-- contact form js -->
   <script src="assets/js/contact.form.js"></script>
   <!-- main js -->
   <script src="assets/js/main.js"></script>
</body>

</html>