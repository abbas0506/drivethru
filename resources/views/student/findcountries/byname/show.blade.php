@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='findcountry'></x-student.sidebar>
@endsection

@section('page-title')
Find Country - <span class="txt-12 px-2">search result - {{$country->name}}</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4">
   <!-- close icon -->
   <a href="{{route('findcountriesbyname.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>

   <div class="frow centered border-bottom border-silver pb-3">
      <div class="frow">
         <a href="{{route('findcountriesbyname_report',$country)}}" target="_blank">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='download' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Download</div>
      </div>
      <div class="mx-3">|</div>

      <div class="frow">
         <a href="{{route('findcountriesbyname_apply', $country)}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Apply</div>
      </div>
   </div>

   <!-- report content goes here -->
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Education: </div>
      <div class="pl-4">@if($country->edufree) Free @else Not Free @endif</div>
   </div>
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Essential: </div>
      <div class="pl-4">{{$country->essential}}</div>
   </div>
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Job Description: </div>
      <div class="pl-4">{{$country->jobdesc}}</div>
   </div>
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Life There: </div>
      <div class="pl-4">{{$country->lifethere}}</div>
   </div>
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Visa Docs: </div>
      <div class="pl-4">
         @if($country->visadocs()->count()>0)
         <ul>
            @foreach($country->visadocs() as $visadoc)
            <li>{{$visadoc->doc->name}}</li>
            @endforeach
         </ul>
         @else
         <div class="txt-s txt-orange">List of documents not available</div>
         @endif
      </div>
   </div>
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Admission Docs: </div>
      <div class="pl-4">
         @if($country->admdocs()->count()>0)
         <ul>
            @foreach($country->admdocs() as $admdoc)
            <li>{{$admdoc->doc->name}}</li>
            @endforeach
         </ul>
         @else
         <div class="txt-s txt-orange">List of documents not available</div>
         @endif
      </div>
   </div>

   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Scholarships Offered: </div>
      <div class="pl-4">
         @if($country->scholarships()->count()>0)
         <ul>
            @foreach($country->scholarships() as $scholarshipoffer)
            <li>{{$scholarshipoffer->scholarship->name}}</li>
            @endforeach
         </ul>
         @else
         <div class="txt-s txt-orange">List of scholarships not available</div>
         @endif
      </div>
   </div>

   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Favourite Courses: </div>
      <div class="pl-4">
         @if($country->favcourses()->count()>0)
         <ul>
            @foreach($country->favcourses() as $favcourse)
            <li>{{$favcourse->course->name}}</li>
            @endforeach
         </ul>
         @else
         <div class="txt-s txt-orange">List of favourite courses not available</div>
         @endif
      </div>
   </div>
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Study Cost: </div>
      <div class="pl-4">
         @if($country->studycosts()->count()>0)
         <ul>
            @foreach($country->studycosts() as $studycost)
            <li>{{$studycost->level->name}}: &nbsp {{$studycost->minfee}}- {{$studycost->maxfee}} $</li>
            @endforeach
         </ul>
         @else
         <div class="txt-s txt-orange">List of study costs not available</div>
         @endif
      </div>
   </div>
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Living Cost: </div>
      <div class="pl-4">
         @if($country->livingcosts()->count()>0)
         <ul>
            @foreach($country->livingcosts() as $livingcost)
            <li>{{$livingcost->expensetype->name}}: &nbsp {{$livingcost->minexp}}- {{$livingcost->maxexp}} $</li>
            @endforeach
         </ul>
         @else
         <div class="txt-s txt-orange">List of study costs not available</div>
         @endif
      </div>
   </div>
   <div class="frow mt-3 auto-col">
      <div class="w-30 txt-b">Living Cost Desc: </div>
      <div class="pl-4">{{$country->livingcostdesc}}</div>
   </div>
</div>
</div>
@endsection