@extends('layouts.index')

@section('header')
<section class="services mini_header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')
<section class="section-80 index-page block">
   <div class="title red-underline my-5">Services</div>
   <div class="row desc my-5">
      <div class="col half">
         <p class="txt-l mt-4">
            <span class="txt-red">Drivethru</span> is providing admission services in both National and International admissions throughout the year. We are offering admissions in 175+ National H EC Recognized Universities and Universities from 18+ International Countries. Our team is available 24/7, through all the mediums, to process all your admissions.
         </p>
         <a href="{{url('signup')}}"><button class="btn orange rounded mt-5" style="float:left">Signup</button></a>
      </div>
      <div class="col half">
         <img src="{{asset('/images/services/1.png')}}" alt="">
      </div>

   </div>
   <!-- 2nd row -->
   <div class="row mt-5">
      <div class="col fancy-pallet w-45">
         <div class="ico">
            <img src="{{asset('/images/icons/search.png')}}" alt="">
         </div>
         <div class="content">
            <h1>FIND UNIVERSITY</h1>
            <p>Intermediate students face issues, regrading decision making about their future scope of studies, and ....</p>
         </div>
         <div class="btn-blue"><a href="{{url('blog')}}"> Read More</a></div>
      </div>

      <div class="col fancy-pallet w-45">
         <div class="ico">
            <img src="{{asset('/images/icons/person-check.png')}}" alt="">
         </div>
         <div class="content">
            <h1>APPLY THROUGH US</h1>
            <p>Long, time consuming and complex admission forms are a bitter jump student make due to which they dont take interest ....</p>
         </div>
         <div class="btn-blue"><a href="{{url('blog')}}"> Read More</a></div>
      </div>
   </div>
   <!-- 2nd row -->
   <div class="row mt-5">
      <div class="col fancy-pallet w-45">
         <div class="ico">
            <img src="{{asset('/images/icons/person-message.png')}}" alt="">
         </div>
         <div class="content">
            <h1>CAREER COUNSELLING</h1>
            <p>With less insight about the universities and without a proper career counseling, students may take
               wrong decisions and end-up in a place where they shouldn’t be ....</p>
         </div>
         <div class="btn-blue"><a href="{{url('blog')}}"> Read More</a></div>
      </div>

      <div class="col fancy-pallet w-45">
         <div class="ico">
            <img src="{{asset('/images/icons/report-edit.png')}}" alt="">
         </div>
         <div class="content">
            <h1>PERSONALIZED REPORT</h1>
            <p>Personalized report as the name displays, is specific for each student containing all the available options for him according to his field, interest, location and budget ....</p>
         </div>
         <div class="btn-blue"><a href="{{url('blog')}}"> Read More</a></div>
      </div>
   </div>
   <!-- 3rd row -->
   <div class="row mt-5">
      <div class="col fancy-pallet w-45">
         <div class="ico">
            <img src="{{asset('/images/icons/dollar-sign.png')}}" alt="">
         </div>
         <div class="content">
            <h1>$1/UNIVERSITY</h1>
            <p>We do not charge anything for providing information. We charge $1 ($1=150/-) per
               university only for the applying process. There are no hidden charges included ....</p>
         </div>
         <div class="btn-blue"><a href="{{url('blog')}}"> Read More</a></div>
      </div>

      <div class="col fancy-pallet w-45">
         <div class="ico">
            <img src="{{asset('/images/icons/report.png')}}" alt="">
         </div>
         <div class="content">
            <h1>PAST PAPERS</h1>
            <p>Students face difficulty majorly in entrance exams while seeking admission to universities. Past papers help them to prepare for the exams in short time ....</p>
         </div>
         <div class="btn-blue"><a href="{{url('blog')}}"> Read More</a></div>
      </div>
   </div>

</section>

@endsection
@section('footer')
<section class="footer">
   <x-index.footer></x-index.footer>
</section>
@endsection