@extends('layouts.index')

@section('header')
<section class="contact mini_header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')
<section class="section-80 index-page block">
   <div class="title red-underline my-5">Contact Us</div>
   <div class="row my-5">
      <div class="col half">
         <p class="txt-l mt-4">
            <span class="txt-red">Drivethru</span> is providing admission services in both National and International admissions throughout the year. We are offering
            admissions in 175+ National HEC Recognized Universities and Universities from 18+ International Countries. Ourteam is available 24/7, through all the mediums, to process all your admissions.
         </p>
      </div>
      <div class="col half">
         <img src="{{asset('/images/contact/1.png')}}" alt="">
      </div>

   </div>

   <div class="support row mt-5">
      <!-- 1st col -->
      <div class="col txt-j mt-4">
         <h3>General Support</h3>
         <div class="row mt-3 txt-l">
            <div class="v-center p-3"><i data-feather="mail" class="feather-small feather-red"></i></div>
            <div class="txt-l">
               <h4>Email Address</h4>
               <p>inofrmation@drivethru.pk</p>
            </div>
         </div>

         <div class="row mt-5 txt-l">
            <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
            <div>
               <h4>Phone</h4>
               <p>+92 345 75 15 152</p>
            </div>
         </div>

         <div class="row mt-5 txt-l">
            <div class="v-center p-3"><i data-feather="map-pin" class="feather-small feather-red"></i></div>
            <div>
               <h4>Address</h4>
               <p>Lahore City</p>
            </div>
         </div>
      </div>
      <!-- 2nd col -->

      <div class="col txt-j mt-4">
         <h3>
            Admission Support
         </h3>
         <div class="row txt-l mt-3">
            <div class="v-center p-3"><i data-feather="mail" class="feather-small feather-red"></i></div>
            <div class="txt-l">
               <h4>Email Address</h4>
               <p>admissions@drivethru.pk</p>
            </div>
         </div>

         <div class="row mt-5 txt-l">
            <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
            <div>
               <h4>Phone</h4>
               <p>+92 316 45 15 249</p>
            </div>
         </div>

         <div class="row mt-5 txt-l">
            <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
            <div>
               <h4>Phone 2</h4>
               <p>(+088)589-102</p>
            </div>
         </div>
      </div>
      <!-- 3rd col -->
      <div class="col txt-j mt-4">
         <h3>
            Technical Support
         </h3>
         <div class="row txt-l mt-3">
            <div class="v-center p-3"><i data-feather="mail" class="feather-small feather-red"></i></div>
            <div class="txt-l">
               <h4>Email Address</h4>
               <p>help@drivethru.pk</p>
            </div>
         </div>

         <div class="row mt-5 txt-l">
            <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
            <div>
               <h4>Phone</h4>
               <p>(+088)589-8745</p>
            </div>
         </div>

         <div class="row mt-5 txt-l">
            <div class="v-center p-3"><i data-feather="phone" class="feather-small feather-red"></i></div>
            <div>
               <h4>Phone 2</h4>
               <p>(+088)589-102</p>
            </div>
         </div>

      </div>
   </div>
</section>
@endsection
@section('footer')
<section class="footer">
   <x-index.footer></x-index.footer>
</section>
@endsection