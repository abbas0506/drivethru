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
<div class="page-title">Find Country</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-findcountrybycourse__navbar activeItem='report'></x-findcountrybycourse__navbar>
</div>
@endsection

@section('graph')

@endsection
@section('data')
<!-- create new acadmeic -->

<div class="fcol w-100 rw-100 p-4 bg-white rounded">
   <div class="frow w-100 rw-100">
      <div>
         <span class="txt-custom-blue txt-b border-bottom border-2">Search result</span>
      </div>
   </div>

   @if($countries->count()>0)

   <div class="frow w-100 rw-100 my-3 centered">
      <div class="frow">
         <a href="{{route('findcountriesbycourse_report')}}" target="_blank">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='download' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-3">Get Free Report</div>
      </div>
      <div class="mx-5">|</div>

      <div class="frow">
         <a href="{{route('findcountriesbycourse_apply')}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-3">Apply Through Us</div>
      </div>
   </div>

   <div class="frow p-1 mt-2 border-bottom tr txt-s txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-50"> Country </div>
      <div class="w-20 text-right">Study Cost</div>
      <div class="w-20 text-right">Living Cost</div>
   </div>

   @php $sr=1; @endphp
   @foreach($countries as $country)

   <div class="frow p-1 border-bottom tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-50"><a href="{{route('findcountriesbycourse_countrypreview', $country->id)}}" class="text-primary"> {{$country->name}}</a></div>
      <div class="w-20 text-right"> {{$country->studycost()}}</div>
      <div class="w-20 text-right">{{$country->livingcost()}}</div>
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

@section('social')
<x-sidebar__news></x-sidebar__news>
@endsection