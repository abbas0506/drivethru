@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='finduniversity' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">{{$university->name}}</div>
@endsection

@section('page-subtitle')
<div class="frow text-justify txt-s">{{$university->city->name}}</div>
@endsection
@section('page-navbar')
@endsection

@section('data')
<div class="w-100 rw-100 bg-light px-4">
   <div class="frow w-100 rw-100 p-3 border-bottom mid-right">
      <div class="frow">
         <a href="{{route('finduniversitiesbyname_report',$university)}}" target="_blank">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='download' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Download Free Report</div>
      </div>
      <div class="mx-4">|</div>

      <div class="frow">
         <a href="{{route('finduniversitiesbyname_apply',$university)}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Apply Through Us</div>
      </div>
   </div>
   <!-- report content goes here -->
   <div class="frow w-100 rw-100 mt-4">
      <div class="w-20 rw-40 txt-b">Type: </div>
      <div class="w-80 rw-60">{{$university->type}}</div>
   </div>
   <div class="frow w-100 rw-100">
      <div class="w-20 rw-40 txt-b">Ranking: </div>
      <div class="w-80 rw-60">{{$university->rank}}</div>
   </div>
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-20 rw-100 txt-b">Courses: </div>
      <div class="w-80 rw-100">
         @if($university->unicourses()->count()>0)
         <div class="frow w-100 rw-100 txt-grey">
            <div class="w-50">Course</div>
            <div class="w-15">Fee</div>
            <div class="w-20">Last Merit</div>
            <div class="w-15">Closing</div>
         </div>
         @foreach($university->unicourses() as $unicourse)
         <div class="frow w-100 rw-100">
            <div class="w-50">{{$unicourse->course->name}}</div>
            <div class="w-20">{{$unicourse->fee}}</div>
            <div class="w-15">{{$unicourse->lastmerit}}</div>
            <div class="w-15">{{$unicourse->closing}}</div>
         </div>
         @endforeach
         @else
         <div class="txt-s txt-orange">List of courses not available</div>
         @endif
      </div>
   </div>

</div>
@endsection