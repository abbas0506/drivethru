@extends('layouts.welcome')
@section('page')

<!-- Slider Section Start -->
<div class="rs-slider main-home">
   <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false"
      data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true" data-md-device-dots="false">
      <div class="slider-content slide1">
         <div class="container">
            <div class="content-part">
               <div class="sl-sub-title wow bounceInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">175+ National Universities AND Universities From 18+ countries</div>
               <h1 class="sl-title wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">Pakistan’s only One-Click Application Form.</h1>
               <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                  <a class="readon orange-btn main-home" href="{{url('signin')}}">Apply Now</a>
               </div>
            </div>
         </div>
      </div>
      <div class="slider-content slide2">
         <div class="container">
            <div class="content-part">
               <div class="sl-sub-title wow bounceInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">Pakistan one of its kind Ed-Tech Tribune</div>
               <h1 class="sl-title wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">Integrative Platform for National & international Universities</h1>
               <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                  <a class="readon orange-btn main-home" href="{{url('signup')}}">Sign up</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Features Section start -->
   <div id="rs-features" class="rs-features main-home">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-12 md-mb-30">
               <div class="features-wrap">
                  <div class="icon-part">
                     <img src="assets/images/features/icon/3.png" alt="">
                  </div>
                  <div class="content-part">
                     <h4 class="title">
                        <span class="watermark">Opportunities</span>
                     </h4>
                     <p class="dese">
                        Around The Globe
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-12 md-mb-30">
               <div class="features-wrap">
                  <div class="icon-part">
                     <img src="assets/images/features/icon/2.png" alt="">
                  </div>
                  <div class="content-part">
                     <h4 class="title">
                        <span class="watermark">Admissions</span>
                     </h4>
                     <p class="dese">
                        National and international
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-12">
               <div class="features-wrap">
                  <div class="icon-part">
                     <img src="assets/images/features/icon/1.png" alt="">
                  </div>
                  <div class="content-part">
                     <h4 class="title">
                        <span class="watermark">Consultation</span>
                     </h4>
                     <p class="dese">
                        Pre and Post Admissions
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Features Section End -->
</div>
<!-- Slider Section End -->

<!-- Degree Section Start -->
<div class="rs-degree style1 modify gray-bg pt-100 pb-70 md-pt-70 md-pb-40">
   <div class="container">
      <div class="row y-middle">
         <div class="col-lg-4 col-md-6 mb-30">
            <div class="sec-title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
               <div class="sub-title primary">DRIVETHRU</div>
               <h2 class="title mb-0"> WHO WE</h2>
               <h1 class="title mb-0"> ARE?</h1>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 mb-30">
            <div class="degree-wrap">
               <img src="assets/images/degrees/1.jpg" alt="">
               <div class="title-part">
                  <h4 class="title">Introduction</h4>
               </div>
               <div class="content-part">
                  <h4 class="title"><a href="#">Introduction</a></h4>
                  <p class="desc">An ed-tech firm, leading students to their desired National or International destination for higher studies. </p>
                  <div class="btn-part">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 mb-30">
            <div class="degree-wrap">
               <img src="assets/images/degrees/2.jpg" alt="">
               <div class="title-part">
                  <h4 class="title">Specification</h4>
               </div>
               <div class="content-part">
                  <h4 class="title"><a href="#">Specification</a></h4>
                  <p class="desc"> Thorough counselling for students, University applying services, Scholarship details, Visa Services for International Admissions. </p>
                  <div class="btn-part">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 mb-30">
            <div class="degree-wrap">
               <img src="assets/images/degrees/3.jpg" alt="">
               <div class="title-part">
                  <h4 class="title">National universities</h4>
               </div>
               <div class="content-part">
                  <h4 class="title"><a href="#">National universities</a></h4>
                  <p class="desc">Complete FREE information about Universities, Fee Structures, Offered degree programs, Eligibility Criteria, Entrance exams and Scholarships. </p>
                  <div class="btn-part">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 mb-30">
            <div class="degree-wrap">
               <img src="assets/images/degrees/4.jpg" alt="">
               <div class="title-part">
                  <h4 class="title">International universities</h4>
               </div>
               <div class="content-part">
                  <h4 class="title"><a href="#">International universities</a></h4>
                  <p class="desc">Free of cost Information about Study Cost, Living cost, Job opportunities, Admission requirements, Scholarships, Visa process and much more. </p>
                  <div class="btn-part">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 mb-30">
            <div class="degree-wrap">
               <img src="assets/images/degrees/5.jpg" alt="">
               <div class="title-part">
                  <h4 class="title">Personalized report</h4>
               </div>
               <div class="content-part">
                  <h4 class="title"><a href="#">Personalized report</a></h4>
                  <p class="desc">Drivethru will generate a free personalized report for user according to filed unified application form for making their analysis easy. </p>
                  <div class="btn-part">
                     <a href="#">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Degree Section End -->
<!-- CTA Section Start -->
<div class="rs-cta main-home">
   <div class="partition-bg-wrap">
      <div class="container">
         <div class="row">
            <div class="offset-lg-6 col-lg-6 pl-70 md-pl-15">
               <div class="sec-title3 mb-40">
                  <h2 class="title white-color mb-16">Mentor</h2>
                  <div class="desc white-color pr-100 md-pr-0">Drivethru.pk is a multi-dimensional solution of higher education requirements for students. From providing vast, authentic Information of 175+ HEC Recognized Universities to Admissions in 18+ International Countries, to applying on their behalf, Drivethru is proving to be rigmarole saver in case of both National and International admissions.</div>
               </div>
               <div class="btn-part">
                  <a class="readon orange-btn transparent" href="#">MR HASSAAN TARIQ</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- CTA Section End -->

<!-- Faq Section Start -->
<div class="rs-faq-part style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 padding-0">
            <div class=" main-part">
               <div class="title mb-40 md-mb-15">
                  <h2 class="text-part">Frequently Asked Questions</h2>
               </div>
               <div class="faq-content">
                  <div class="accordion" id="accordionExample">
                     <div class="accordion-item card">
                        <div class="accordion-header card-header" id="headingOne">
                           <button class="accordion-button card-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What service do you offer/provide?</button>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                           <div class="accordion-body card-body">Drivethru provides information about 175+ National and International Universities from 17+ countries, for FREE. Admission applying services, Career counselling, Visa services. </div>
                        </div>
                     </div>
                     <div class="accordion-item card">
                        <div class="accordion-header card-header" id="headingTwo">
                           <button class="card-link accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How much do you charge?</button>
                        </div>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                           <div class="accordion-body card-body">We provide complete information about National and International admissions, FREE OF COST. If you proceed for admission we will apply on your behalf in these Universities, then we charge $1/ University ($1=150 pkr). </div>
                        </div>
                     </div>
                     <div class="accordion-item card">
                        <div class="accordion-header card-header" id="headingThree">
                           <button class="card-link accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How can I book an appointment?</button>
                        </div>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                           <div class="accordion-body card-body">User can book an appointment with us through website You can reach us via WhatsApp in office timing 9:00-5:00 at following Contact Number. +92 316 4515249, +92 345 7515152.
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item card">
                        <div class="accordion-header card-header" id="headingFour">
                           <button class="card-link accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Where can I get this Information?</button>
                        </div>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                           <div class="accordion-body card-body">By creating a free login user can extract every information they want. User can also leave a message on social media profiles or user can contact our Student Advisor on mentioned WhatsApp in office timings to get complete Information.</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 padding-0">
            <div class="img-part media-icon orange-color">
               <a class="popup-videos" href="#">
                  <i class="fa fa-play"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection