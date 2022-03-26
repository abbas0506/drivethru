@extends('layouts.index')

@section('header')
<section class="header">
   <x-navbar></x-navbar>
   <div class="app-msg">
      <p>175+ Universities from Pakistan and 18+ other Countries</p>
      <h1>Single-Click Application Form</h1>
      <button class="btn-red">Apply Now</button>
   </div>
</section>
@endsection
@section('content')
<section class="who">
   <div class="title">Who we are?</div>
   <div class="content">We are an ed-tech firm, leading students to their national as well as international destinations for their higher studies.
      We provide sufficient information and services that empower you to take a lead in your academic career. <br>
      We believe in <b>right candidate to right university</b>
   </div>
</section>

<section class="offer">
   <div class="title">What we offer?</div>
   <div class="row">
      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/3.png')}}" alt="">
         </div>
         <div class="content">
            <h1>Oppertunities</h1>
            <p>Around the globe</p>
         </div>
      </div>

      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/2.png')}}" alt="">
         </div>
         <div class="content">
            <h1>Admissions</h1>
            <p>National & International</p>
         </div>
      </div>

      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/1.png')}}" alt="">
         </div>
         <div class="content">
            <h1>Consultation</h1>
            <p>Pre and post admission</p>
         </div>
      </div>
   </div>
</section>

<section class="services">
   <div class="title">Our Services</div>
   <div class="row">
      <div class="col">
         <div class="content">
            <h1>Universities Info</h1>
            <p>Free of cost information about fee structures, offered degree programs, eligibility criteria, entrance exams and scholarships.</p>
         </div>
         <div class="title">Universities Info</div>
      </div>
      <div class="col">
         <div class="content">
            <h1>Single Click Application</h1>
            <p>Hazzle free single click application for national as well as international admissions.</p>
         </div>
         <div class="title">Single Click Application</div>
      </div>
      <div class="col">
         <div class="content">
            <h1>Personalized Reports</h1>
            <p>We generate a free of cost user specific report on the basis of user's own preferences.</p>
         </div>
         <div class="title">Personalized Reports</div>
      </div>
   </div>
</section>

<!-- <section class="mentor">
      <h1 class="title">Our Mentor</h1>
      <div class="row">
         <div class="col">
            <img src="/images/mentor/mentor2-01.png" alt="" width=300>
         </div>
         <div class="col">
            <div class="content">
               <h1>Mr. Hassan Tariq</h1>
               <p>Drivethru.pk is a multi-dimensional solution of higher education requirements for students. From providing vast, authentic Information of 175+ HEC Recognized Universities to Admissions in 18+ International Countries, to applying on their behalf, Drivethru is proving to be rigmarole saver in case of both National and International admissions.</p>
            </div>
         </div>
   </section> -->
<!-- FAQ -->
<section class="faq">
   <div class="row">
      <div class="col">
         <h2>Frequently Asked Questions</h2>
         <div class="question show">
            <div class="q"> <i data-feather="bell" class="feather-small"></i> What service do you offer/provide? </div>
            <div class="ans">Drivethru provides information about 175+ National and International Universities from 17+ countries, for FREE. Admission applying services, Career counselling, Visa services.</div>

         </div>
         <div class="question">
            <div class="q"><i data-feather="bell" class="feather-small"></i> How much do you charge? </div>
            <div class="ans">We provide complete information about National and International admissions, FREE OF COST. If you proceed for admission we will apply on your behalf in these Universities, then we charge $1/ University ($1=150 pkr).</div>
         </div>
         <div class="question">

            <div class="q"><i data-feather="bell" class="feather-small"></i> How can I book an appointment?</div>
            <div class="ans">User can book an appointment with us through website You can reach us via WhatsApp in office timing 9:00-5:00 at following Contact Number. +92 316 4515249, +92 345 7515152.</div>
         </div>
         <div class="question">
            <div class="q"><i data-feather="bell" class="feather-small"></i> Where can I get this Information? </div>
            <div class="ans">By creating a free login user can extract every information they want. User can also leave a message on social media profiles or user can contact our Student Advisor on mentioned WhatsApp in office timings to get complete Information.</div>
         </div>

      </div>
      <div class="col">
         <video width="400" controls autoplay muted>
            <source src="{{asset('/videos/github.mp4')}}" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
         </video>
      </div>
</section>
@endsection
@section('footer')
<section class="footer">
   <x-footer></x-footer>
</section>
@endsection