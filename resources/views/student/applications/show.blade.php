@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='dashboard'></x-student.sidebar>
@endsection

@section('page-title')
Dashboard - <span class="txt-12 px-2">my applications - show</span>
@endsection

@section('content')

<div class="page-centered w-50 bg-light p-4">
   <a href="{{url('student-dashboard')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>

   <!-- if national mode -->
   @if($application->mode==0)
   <div><img src="{{asset('/images/icons/pakistan-flag.png')}}" width='22' class="mr-2"></div>
   <div class="txt-grey txt-m">
      Application : {{$application->id}}
      <a href="{{route('application_download',$application)}}" target="_blank" class="ml-3">
         <i data-feather='download' class="feather-small txt-orange"></i>
      </a>
   </div>
   <div class="txt-grey txt-s">Created at {{$application->created_at}}</div>
   <!-- table header -->
   <div class="frow mid-left border-bottom border-silver txt-s txt-grey mt-3">
      <div class="w-10">Sr.</div>
      <div class="w-40">University</div>
      <div class="w-50">Courses</div>
   </div>

   @php $sr=1; @endphp
   @foreach($application->universities() as $university)
   <div class="border-bottom border-silver lh-30">
      <div class="frow stretched">
         <div class="w-10">{{$sr++}}. </div>
         <div class="w-40">{{$university->name}}</div>
         <div class="fcol w-50">
            @foreach($application->national_applications()->where('university_id',$university->id) as $national)
            <div class="frow txt-s">{{$national->course->name}}</div>
            @endforeach

         </div>
      </div>
   </div>
   @endforeach
   <div class="txt-r mt-2">Total Charges: {{$application->universities()->count()}}<i data-feather='dollar-sign' class="feather-xsmall"></i></div>

   @elseif($application->mode==1)
   <div><img src="{{asset('/images/icons/globe.png')}}" width='20' class="mr-2"></div>
   <div class="txt-grey txt-m">
      Application : {{$application->id}}
      <a href="{{route('application_download',$application)}}" target="_blank" class="ml-3">
         <i data-feather='download' class="feather-small txt-orange"></i>
      </a>
   </div>
   <div class="txt-grey txt-s">Created at {{$application->created_at}}</div>
   <!-- table header -->
   <div class="frow mid-left border-bottom border-silver txt-s txt-grey mt-3">
      <div class="w-10">Sr.</div>
      <div class="w-40">Country</div>
      <div class="w-50">Courses</div>
   </div>
   @php $sr=1; @endphp
   @foreach($application->countries() as $country)
   <div class="border-bottom border-silver lh-30">
      <div class="frow stretched">
         <div class="w-10 txt-s">{{$sr++}}. </div>
         <div class="w-40">{{$country->name}}</div>
         <div class="fcol w-50">
            @foreach($application->international_applications()->where('country_id',$country->id) as $international_application)
            <div class="frow txt-s">{{$international_application->course->name}}</div>
            @endforeach

         </div>
      </div>
   </div>
   @endforeach
</div>
<div class="frow mid-right txt-grey mt-2">Total Charges: {{$application->countries()->count()}}<i data-feather='dollar-sign' class="feather-xsmall"></i></div>
</div>
@endif
</div>

@endsection