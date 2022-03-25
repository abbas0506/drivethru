@extends('layouts.index')

@section('header')
<section class="contact mini_header">
   <x-navbar></x-navbar>
</section>
@endsection
@section('content')
<section class="section-80">
   <img src="{{asset('/images/contact/1.png')}}" alt="" width="400">
   <div class="row mt-5">
      <!-- 1st col -->
      <div class="col txt-j mt-4">
         <h2>
            General
         </h2>
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
         <h2>
            Admission
         </h2>
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
         <h2>
            Emergency
         </h2>
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