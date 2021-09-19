@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Primary Data</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('/admin')}}">Home</a><span class="mx-1"> / </span>primary data
   </div>
</div>
@endsection
@section('page-content')

<div class="container p-5" style="width:60% !important">
   <div class="frow border rounded relative">
      <div class="fcol p-5">
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('cities.index')}}">List of Cities</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('faculties.index')}}">List of Faculties</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('levels.index')}}">List of Study levels</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('courses.index')}}">List of Faculty Courses</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('documents.index')}}">List of documents required for visa or admission</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('scholarships.index')}}">Scholarship titles</a></div>

         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('councel_types.index')}}">Counselling request types</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('expensetypes.index')}}">Living Expense Types</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="{{route('papertypes.index')}}">Paper types - past papers</a></div>
         <div class='primary-option'><span class="lnr lnr-pointer-right"></span><a href="http://">Applicaiton statuses</a></div>
      </div>
      <div class="absolute" style="top:-20px; left:10px; font-size:xx-large"><span class="lnr lnr-cog"></span></div>

   </div>

</div>
@endsection