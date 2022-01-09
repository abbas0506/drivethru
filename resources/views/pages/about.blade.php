@extends('layouts.welcome')
@section('page')

<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs breadcrumbs-overlay">
   <div class="breadcrumbs-img">
      <img src="assets/images/about/bg.jpg" alt="Breadcrumbs Image">
   </div>
</div>
<!-- Breadcrumbs End -->

<!-- About Section Start -->
<div id="rs-about" class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 order-last padding-0 md-pl-15 md-pr-15 md-mb-30">
            <div class="img-part">
               <img class="" src="assets/images/about/1.png" alt="About Image">
            </div>
         </div>
         <div class="col-lg-6 pr-70 md-pr-15">
            <div class="sec-title">
               <div class="sub-title orange"></div>
               <h2 class="mb-5 display-6">We are pleased to welcome you at DRIVETHRU.</h2>
               <div class="text-justify">We ensure you trust and recommended a pathway to a bright future ahead. With utmost commitment and kaizen approach, we acknowledge our candidate's valuable preferences to fit in top-ranked universities. The platform of DRIVETHRU will ensure the right candidate to the right university. Our platform provides sufficient information and services that empower you to take a lead in your academic career. </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 padding-0 md-pl-15 md-pr-15 md-mb-30">
            <div class="img-part">
               <img class="" src="assets/images/about/history.png" alt="About Image">
            </div>
            <ul class="nav nav-tabs histort-part" id="myTab" role="tablist">
               <li class="nav-item tab-btns single-history" role="presentation">
                  <a class="nav-link tab-btn active" href="#" id="about-history-tab" data-bs-toggle="tab" data-bs-target="#about-history" role="tab" aria-controls="about-history" aria-selected="true"><span class="icon-part"><i class="flaticon-eye"></i></span>Vision</a>
               </li>
               <li class="nav-item tab-btns single-history" role="presentation">
                  <a class="nav-link tab-btn" href="#" id="about-mission-tab" data-bs-toggle="tab" data-bs-target="#about-mission" role="tab" aria-controls="about-mission" aria-selected="false"><span class="icon-part"><i class="flaticon-flower"></i></span>Mission</a>
               </li>
               <li class="nav-item tab-btns single-history last-item" role="presentation">
                  <a class="nav-link tab-btn" href="#" id="about-admin-tab" data-bs-toggle="tab" data-bs-target="#about-admin" role="tab" aria-controls="about-admin" aria-selected="false"><span class="icon-part"><i class="flaticon-analysis"></i></span>Administration</a>
               </li>
            </ul>
         </div>
         <div class="col-lg-5 offset-lg-1">
            <div class="tab-content tabs-content" id="myTabContent">
               <div class="tab-pane tab fade show active" id="about-history" role="tabpanel" aria-labelledby="about-history-tab">
                  <div class="sec-title mb-25">
                     <h2 class="display-5">Vision</h2>
                     <div class="txt-m text-justify">DriveThru wants to excel is terms of its brand recognition throughout the country, the stronger the brand image, more likely are the chances of customer retentions and newly acquires. Our vision is to be the undisputed provider of Online services for our clients, excelling in quality of service, agility and responsiveness to the changing demands of the business.</div>
                  </div>
                  <div class="tab-img">
                     <img class="" src="assets/images/about/tab1.jpg" alt="Tab Image">
                  </div>
               </div>
               <div class="tab-pane fade" id="about-mission" role="tabpanel" aria-labelledby="about-mission-tab">
                  <div class="sec-title mb-25">
                     <h2 class="display-5">Mission</h2>
                     <div class="txt-m text-justify">Our mission is to satisfy the needs that all high school students in Pakistan have for quality Information Technology (IT) services for Online educational consultancy, in a way that is consistent with our values of excellence, efficiency, effectiveness and attention to details.</div>
                  </div>
                  <div class="tab-img">
                     <img class="" src="assets/images/about/tab2.jpg" alt="Tab Image">
                  </div>
               </div>
               <div class="tab-pane fade" id="about-admin" role="tabpanel" aria-labelledby="about-admin-tab">
                  <div class="sec-title mb-25">
                     <h2 class="display-5">Administration</h2>
                     <div class="txt-m text-justify">At vero eos et accusamus et iusto odio dignissimos ducimus qui blan ditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, sim ilique sunt in culpa.</div>
                  </div>
                  <div class="tab-img">
                     <img class="" src="assets/images/about/tab3.jpg" alt="Tab Image">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection