@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='finduniversity'></x-student.sidebar>
@endsection

@section('page-title')
Find University - <span class="txt-12 px-2">{{$university->name}}</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4">
   <!-- close icon -->
   <a href="{{route('finduniversitiesbyname.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>

   <div class="frow centered border-bottom border-silver pb-3">
      <div class="frow">
         <a href="{{route('finduniversitiesbyname_report',$university)}}" target="_blank">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='download' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Download</div>
      </div>
      <div class="mx-3">|</div>

      <div class="frow">
         <a href="{{route('finduniversitiesbyname_apply',$university)}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Apply</div>
      </div>
   </div>
   <!-- report content goes here -->
   <div class="frow p-4 auto-col">
      <div class="w-30">
         <img src="{{url(asset('images/universities/'.$university->logo))}}" alt='logo' width=70 height=70 class='rounded-circle'>
      </div>
      <div class="flex-grow">
         <div class="frow">
            <div class="txt-b w-30 rw-40">Name: </div>
            <div class="">{{$university->name}}</div>
         </div>
         <div class="frow">
            <div class="txt-b w-30 rw-40">Location: </div>
            <div class="">{{$university->city->name}}</div>
         </div>
         <div class="frow">
            <div class="txt-b w-30 rw-40">Type: </div>
            <div class="">{{$university->type}}</div>
         </div>
         <div class="frow">
            <div class="txt-b w-30 rw-40">Rank: </div>
            <div class="">{{$university->rank}}</div>
         </div>
      </div>

   </div>

   <div class="txt-b lh-30">Offered Courses: </div>
   @if($university->unicourses()->count()>0)
   <div class="frow txt-grey bg-silver lh-30 txt-s">
      <div class="w-30">Course</div>
      <div class="w-20">Criteria</div>
      <div class="w-15">Fee (Rs)</div>
      <div class="w-20 hide-sm">Last Merit</div>
      <div class="flex-grow">Closing</div>
   </div>
   @foreach($university->unicourses() as $unicourse)
   <div class="frow txt-s lh-30">
      <div class="w-30">{{$unicourse->course->name}}</div>
      <div class="w-20">{{$unicourse->criteria}}</div>
      <div class="w-15">{{$unicourse->fee}} k</div>
      <div class="w-20 hide-sm">{{$unicourse->lastmerit}}</div>
      <div class="flex-grow">{{$unicourse->closing}}</div>
   </div>
   @endforeach
   @else
   <div class="txt-s txt-orange">List of courses not available</div>
   @endif


</div>
@endsection