@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='findcountry' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">{{$country->name}}</div>
@endsection

@section('page-subtitle')
<div class="frow text-justify txt-s">{{$country->intro}}</div>
@endsection
@section('page-navbar')
@endsection

@section('data')
<div class="w-100 rw-100 bg-light p-4">
   <div class="frow w-100 rw-100 mid-right">
      <a href="{{route('findcountry_countrydetail',$country->id)}}" target="_blank">
         <div class="frow mid-left txt-s btn-orange">
            <div class="">Download</div>
            <div><i data-feather='download' class="feather-small ml-2"></i></div>
         </div>
      </a>
   </div>
   <div class="frow w-100 rw-100">
      <div class="w-30 rw-50 txt-b">Currency: </div>
      <div class="w-70 rw-50">{{$country->currency}}</div>
   </div>

   <div class="frow w-100 rw-100 mt-2">
      <div class="w-30 rw-50 txt-b">Visa Required: </div>
      <div class="w-70 rw-50">@if($country->visafree) No @else Yes @endif</div>
   </div>
   @if(!$country->visafree)
   <div class="frow w-100 rw-100 mt-2">
      <div class="w-30 rw-50 txt-b">Visa Duration: </div>
      <div class="w-70 rw-50">{{$country->visaduration}} years</div>
   </div>
   @endif

   <div class="frow w-100 rw-100 mt-2">
      <div class="w-30 rw-50 txt-b">Education: </div>
      <div class="w-70 rw-50">@if($country->edufree) Free @else Not Free @endif</div>
   </div>
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Job Description: </div>
      <div class="w-70 rw-100">{{$country->jobdesc}}</div>
   </div>
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Life There: </div>
      <div class="w-70 rw-100">{{$country->lifethere}}</div>
   </div>
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Visa Docs: </div>
      <div class="fcol w-70 rw-100">
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
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Admission Docs: </div>
      <div class="fcol w-70 rw-100">
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
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Scholarships Offered: </div>
      <div class="fcol w-70 rw-100">
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

   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Favourite Courses: </div>
      <div class="fcol w-70 rw-100">
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
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Study Cost: </div>
      <div class="fcol w-70 rw-100">
         @if($country->studycosts()->count()>0)
         <ul>
            @foreach($country->studycosts() as $studycost)
            <li>{{$studycost->level->name}}: &nbsp {{$studycost->minfee}}- {{$studycost->maxfee}} k$</li>
            @endforeach
         </ul>
         @else
         <div class="txt-s txt-orange">List of study costs not available</div>
         @endif
      </div>
   </div>
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Living Cost: </div>
      <div class="fcol w-70 rw-100">
         @if($country->livingcosts()->count()>0)
         <ul>
            @foreach($country->livingcosts() as $livingcost)
            <li>{{$livingcost->expensetype->name}}: &nbsp {{$livingcost->minexp}}- {{$livingcost->maxexp}} k$</li>
            @endforeach
         </ul>
         @else
         <div class="txt-s txt-orange">List of study costs not available</div>
         @endif
      </div>
   </div>
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Living Cost Desc: </div>
      <div class="w-70 rw-100">{{$country->livingcostdesc}}</div>
   </div>

</div>
@endsection