@extends('layouts.index')

@section('header')
<section class="about mini_header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')
<section class="section-80 index-page block">
   <div class="title red-underline my-5">About</div>
   <div class="row desc my-5">
      <div class="col half">
         <p class="txt-l mt-4">
            <span class="txt-red">Drivethru</span> is providing admission services in both National and International admissions throughout the year. We are offering
            admissions in 175+ National HEC Recognized Universities and Universities from 18+ International Countries. Ourteam is available 24/7, through all the mediums, to process all your admissions.
         </p>
      </div>
      <div class="col half">
         <img src="{{asset('/images/about/1.png')}}" alt="">
      </div>

   </div>
   <!-- 2nd row -->
   <div class="title red-underline">Mission</div>
   <div class="row">
      <div class="col mission txt-j">
         <h3>FIND UNIVERSITY</h3>
         <p class="txt-j mt-4">
            Intermediate students face issues regarding decision making about their future scope of studies and which university should they go to continue their education. To make a
            clear decision, the student must have insight about the potential universities that he/she is considering to choose for admission. Drivethru provides them with complete information of 175+ National Universities and 18+ International countries for their higher education...
         </p>
      </div>
   </div>
   <div class="title red-underline">Vision</div>
   <div class="row">
      <div class="col vision txt-j">
         <h3>FIND UNIVERSITY</h3>
         <p class="txt-j mt-3">
            Intermediate students face issues regarding decision making about their future scope of studies and which university should they go to continue their education. To make a
            clear decision, the student must have insight about the potential universities that he/she is considering to choose for admission. Drivethru provides them with complete information of 175+ National Universities and 18+ International countries for their higher education.
            Intermediate students face issues, regarding decision making about their future scope of studies and which university should they go to continue their education. To make a clear decision, the student must have insights about the potential universities that he/she is considering to choose for admission. .</p>
      </div>

   </div>

</section>
@endsection
@section('footer')
<section class="footer">
   <x-index.footer></x-index.footer>
</section>
@endsection