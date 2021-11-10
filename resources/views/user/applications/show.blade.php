@extends('layouts.dashboard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='dashboard' :user="$user"></x-user__sidebar>
@endsection
@section('page-header')
<div class="frow w-100 p-4 txt-m txt-b txt-custom-blue">{{$user->name}}!</div>
@endsection

@section('data')

@if($application->mode==0)

<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">National Application : {{$application->id}}</div>
      <a href="{{url('user_dashboard')}}">
         <div class="frow txt-s txt-grey centered">
            <div class="fcol box-25 circular bg-orange centered"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
            <div class="ml-2">Close</div>
         </div>
      </a>
   </div>

   <div class="w-100 rw-100 txt-grey txt-s">Created at {{$application->created_at}}</div>
   <!-- table header -->
   <div class="frow mid-left border-bottom mt-3">
      <div class="w-10 txt-s txt-grey">Sr.</div>
      <div class="w-40 txt-s txt-grey">University</div>
      <div class="w-50 txt-s txt-grey">Courses</div>
   </div>

   <div class="fcol w-100 rw-100">
      @php $sr=1; @endphp
      @foreach($application->universities() as $university)
      <div class="fcol border-bottom w-100 rw-100 py-2">
         <div class="frow stretched  w-100 rw-100">
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
   </div>
   <div class="frow mid-right txt-grey mt-2">Total Charges: {{$application->universities()->count()}}<i data-feather='dollar-sign' class="feather-xsmall"></i></div>
</div>
@elseif($application->mode==1)
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">International Application : {{$application->id}}</div>
      <a href="{{url('user_dashboard')}}">
         <div class="frow txt-s txt-grey centered">
            <div class="fcol box-25 circular bg-orange centered"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
            <div class="ml-2">Close</div>
         </div>
      </a>
   </div>

   <div class="w-100 rw-100 txt-grey txt-s">Created at {{$application->created_at}}</div>
   <!-- table header -->
   <div class="frow mid-left border-bottom mt-3">
      <div class="w-10 txt-s txt-grey">Sr.</div>
      <div class="w-40 txt-s txt-grey">Country</div>
      <div class="w-50 txt-s txt-grey">Courses</div>
   </div>

   <div class="fcol w-100 rw-100">
      @php $sr=1; @endphp
      @foreach($application->countries() as $country)
      <div class="fcol border-bottom w-100 rw-100 py-2">
         <div class="frow stretched  w-100 rw-100">
            <div class="w-10">{{$sr++}}. </div>
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


@endsection

@section('profile')
<x-profile__strength :user="$user"></x-profile__strength>
@endsection