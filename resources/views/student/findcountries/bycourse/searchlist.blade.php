@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='findcountry'></x-student.sidebar>
@endsection

@section('page-title')
Find Country - <span class="txt-12 px-2">by course - search result</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4">
   <!-- close icon -->
   <a href="{{route('findcountriesbycourse.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>

   <!-- search result -->
   <div class="frow centered border-bottom border-silver border-silver pb-3">
      <div class="frow">
         <a href="{{route('findcountriesbycourse_report')}}" target="_blank">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='download' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Download</div>
      </div>
      <div class="mx-3">|</div>

      <div class="frow">
         <a href="{{route('findcountriesbycourse_apply')}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Apply</div>
      </div>
   </div>


   <div class="mt-3">
      <span class="txt-custom-blue txt-b border-bottom border-silver border-2">Search result : {{$course->name}}</span>
   </div>


   @if($countries->count()>0)


   <div class="frow lh-30 mt-2 border-bottom border-silver tr txt-s txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-50"> Country </div>
      <div class="w-20 text-right flex-grow ">Study Cost ($)</div>
      <div class="w-20 text-right rhide">Living Cost ($)</div>
   </div>

   @php $sr=1; @endphp
   @foreach($countries as $country)

   <div class="frow lh-30 border-bottom border-silver tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-50"><a href="{{route('findcountriesbycourse_countrypreview', $country->id)}}" class="text-primary"> {{$country->name}}</a></div>
      <div class="w-20 text-right flex-grow"> {{$country->studycost()}}</div>
      <div class="w-20 text-right rhide">{{$country->livingcost()}}</div>
   </div>
   @endforeach
   @else
   <!-- no country found -->
   <div class="frow w-100 rw-100 mt-2 txt-orange centered">
      Database has no matching record
   </div>
   @endif
</div>

@endsection