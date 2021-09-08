@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Primary Feed</div>
   <div class='frow txt-s text-info'>Click an option to feed data</div>
</div>
@endsection
@section('page-content')

<div class="container p-5" style="width:60% !important">
   <div class="frow border rounded relative">
      <div class="fcol p-5">
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('documents.index')}}">Document Types</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="http://">Scholarship Types</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="http://">Counselling Types</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="http://">Counselling Status</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('levels.index')}}">Course Levels</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('faculties.index')}}">Faculties</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="http://">Cuorses</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="http://">Applicaiton Status</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="http://">Test Types</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="http://">Cities</a></div>
      </div>
      <div class="absolute" style="top:-20px; left:10px; font-size:xx-large"><span class="lnr lnr-cog"></span></div>

   </div>

</div>
@endsection