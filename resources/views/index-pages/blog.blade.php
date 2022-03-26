@extends('layouts.index')

@section('header')
<section class="blog mini_header">
   <x-navbar></x-navbar>
</section>
@endsection
@section('content')
<section class="section-80 block myblog">
   <div class="title">OUR BLOGS</div>
   <div class="row">
      <!-- 1st blog -->
      <div class="col w-45 txt-j mt-4">
         <img src="{{asset('/images/blog/1.jpg')}}" alt="" width="400" height="250">
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
         <img src="{{asset('/images/blog/2.jpg')}}" alt="" width="400" height="250">
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
         <img src="{{asset('/images/blog/3.jpg')}}" alt="" width="400" height="250">
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
         <img src="{{asset('/images/blog/4.jpg')}}" alt="" width="400" height="250">
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
@endsection
@section('footer')
<section class="footer">
   <x-footer></x-footer>
</section>
@endsection