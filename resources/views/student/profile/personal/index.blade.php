@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='dashboard'></x-student.sidebar>
@endsection

@section('page-title')
{{$user->name}} - <span class="txt-12 px-2">complete profile</span>
@endsection
@section('content')

@if($user->profile())
<!-- profile exists, now edit -->
<div class="bg-white p-4 relative">
   <div class="top-right-icon circular-20">
      <a href="{{route('profiles.edit',$user->profile())}}">
         <i data-feather='edit-2' class="feather-xsmall"></i>
      </a>
   </div>
   <div class="frow txt-b txt-14 lh-30 txt-red">Personal Info</div>
   <div class="frow stretched auto-col">
      <div class="fcol w-48 mt-3">
         <div class="txt-s">Father</div>
         <div class="">{{$user->profile()->fname}}</div>
      </div>
      <div class="fcol w-48 mt-3">
         <div class="txt-s">Mother</div>
         <div class="">{{$user->profile()->mname}}</div>
      </div>
   </div>
   <div class="frow stretched auto-col">
      <div class="fcol w-48 mt-3">
         <div class="txt-s">CNIC</div>
         <div class="">{{$user->profile()->cnic}}</div>
      </div>
      <div class="fcol w-48 mt-3">
         <div class="txt-s">Passport</div>
         <div class="">{{$user->profile()->passport}}</div>
      </div>
   </div>
   <div class="frow stretched auto-col">
      <div class="fcol w-48 mt-3">
         <div class="txt-s">Gender</div>
         <div class="">{{$user->profile()->gender}}</div>
      </div>
      <div class="fcol w-48 mt-3">
         <div class="txt-s">Date of birth (mm/dd/yyyy)</div>
         <div class="">{{date_format($user->profile()->dob,'m/d/Y')}}</div>
      </div>
   </div>
   <div class="frow w-100 rw-100 mt-3 stretched auto-col">
      <div class="fcol w-48 mt-3">
         <div class="txt-s">Religion</div>
         <div class="">{{$user->profile()->religion}}</div>
      </div>
      <div class="fcol w-48 mt-3">
         <div class="txt-s">Blood Group</div>
         <div class="">{{$user->profile()->bloodgroup}}</div>
      </div>
   </div>
   <div class="fcol w-100 rw-100 mt-3">
      <div class="txt-s">Address</div>
      <div class="">{{$user->profile()->address}}</div>
   </div>
</div>

<!-- profile exists, show academic details as well-->

<div class="bg-white p-4 mt-3 relative">
   <div class="top-right-icon circular-20">
      <a href="{{route('academics.index')}}">
         <i data-feather='edit-2' class="feather-xsmall"></i>
      </a>
   </div>
   <div class="frow txt-b txt-14 lh-30 txt-red">Academic Detail</div>
   @if($user->hasAcademics())
   <!-- academics exist -->
   <div class="frow txt-s txt-grey py-2">
      <div class="w-10">Sr </div>
      <div class="w-20">Level</div>
      <div class="w-10">Year</div>
      <div class="w-30">BISE/Uni</div>
      <div class="w-10">Roll No.</div>
      <div class="w-10">Marks</div>
   </div>

   @php $sr=1; @endphp
   @foreach($user->academics() as $academic)
   <div class="frow txt-s lh-30">
      <div class="w-10">{{$sr++}}. </div>
      <div class="w-20">{{$academic->level->name}}</div>
      <div class="w-10">{{$academic->passyear}}</div>
      <div class="w-30">{{$academic->biseuni}}</div>
      <div class="w-10">{{$academic->rollno}}</div>
      <div class="w-10">{{$academic->obtained}}/{{$academic->total}}</div>
   </div>
   @endforeach

   @else
   <!-- academic details not available -->
   <div class="frow border-top centered p-2">
      No academic detail exists
   </div>
   @endif
</div>

@else
<!-- profile does not exist -->
<div class="bg-white p-5">
   <div class="frow">
      <div>
         <span class="txt-blue txt-b border-bottom border-2">Profile Incomplete</span>
      </div>
   </div>
   <div class="txt-center my-4"><i data-feather='meh' class="feather-xlarge txt-orange"></i></div>
   <div class="frow space-between centered">
      <div class="text-justify">
         Your profile has been found incomplete. We need your personal as well as academic details
         for the processing of your applicaiton. So, first complete your profile and then visit this page again.
         <a href="{{route('profiles.create')}}" class="txt-blue"> Click here </a> to complete your profile.
      </div>
   </div>
</div>
@endif

@endsection

@section('promotion')
<x-student.profile :user="$user"></x-student.profile>
@endsection