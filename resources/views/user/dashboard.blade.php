@extends('layouts.dashboard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
$pic_url=url(asset("images/users/".$user->pic));
@endphp

@section('sidebar')
<x-user__sidebar activeItem='dashboard' :user="$user"></x-user__sidebar>
@endsection

<style>
.bg-national-mini {
   background-image: url("{{asset('images/bg/national.jpg')}}");
   background-repeat: no-repeat;
   background-size: cover;
   background-size: 100% 100%;
}

.bg-international-mini {
   background-image: url("{{asset('images/bg/international.jpg')}}");
   background-repeat: no-repeat;
   background-size: cover;
   background-size: 100% 100%;
}
</style>

@section('page-header')
<div class="frow w-100 p-4 my-3 txt-m txt-b txt-smoke @if(session('mode')==0) bg-national-mini @else bg-international-mini @endif" style='border-radius:5px'>Welcome, {{$user->name}}!</div>
@endsection

@section('data')
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">My Applications</div>
      <div class="frow txt-s txt-grey centered">
         <div class="fcol circular-20 border-0 bg-green centered"><i data-feather='refresh-ccw' class="feather-xsmall txt-white"></i></div>
         <div class="ml-2">Refresh this section</div>

      </div>
   </div>
   <!-- table header -->
   <div class="frow mid-left border-bottom mt-3">
      <div class="w-15 txt-s txt-silver">ID</div>
      <div class="w-50 txt-s txt-grey">Created At</div>
      <div class="w-20 txt-s txt-grey">Charges</div>
      <div class="w-15 txt-s text-center txt-grey">...</div>
   </div>

   <div class="fcol w-100 rw-100">
      @foreach($user->applications() as $application)
      <div class="frow w-100 tr mid-left py-1 border-bottom">
         <div class="w-15 txt-s">{{$application->id}}</div>
         <div class="w-50 txt-s">{{$application->created_at}}</div>
         <div class="w-20 txt-s">@if($application->ispaid) Paid @else {{$application->charges}} &nbsp<span class="badge badge-info">pay</span> @endif</div>
         <div class="w-15 txt-s text-center">
            <a href="{{route('applications.show',$application)}}">
               <i data-feather='eye' class="feather-xsmall text-primary"></i>
            </a>
            &nbsp
            <a href="{{route('application_download',['id'=>$application->id])}}" target="_blank">
               <i data-feather='download' class="feather-xsmall txt-orange"></i>
            </a>
         </div>
      </div>
      @endforeach
   </div>
</div>

<div class="fcol w-100 rw-100 bg-white p-4 mt-3">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">My Counselling Requests</div>
      <div class="frow txt-s txt-grey centered">
         <div class="fcol circular-20 border-0 bg-green centered"><i data-feather='refresh-ccw' class="feather-xsmall txt-white"></i></div>
         <div class="ml-2">Refresh this section</div>

      </div>
   </div>
   <!-- table header -->
   <div class="frow mid-left border-bottom mt-3">
      <div class="w-15 txt-s txt-silver">ID</div>
      <div class="w-50 txt-s txt-grey">Created At</div>
      <div class="w-20 txt-s txt-grey">Status</div>
      <div class="w-15 txt-s txt-grey text-center">View</div>
   </div>

   <div class="fcol w-100 rw-100">
      @foreach($user->counsellings() as $counselling)
      <div class="frow w-100 tr mid-left py-1 border-bottom">
         <div class="w-15 txt-s">{{$counselling->id}}</div>
         <div class="w-50 txt-s">{{$counselling->created_at}}</div>
         <div class="w-20 txt-s">@if($counselling->status==0) Pending @else Finished @endif </div>
         <div class="w-15 txt-s text-center">
            <a href="{{route('counselling.show',$counselling)}}">
               <i data-feather='eye' class="feather-xsmall text-primary"></i>
            </a>
            &nbsp
         </div>
      </div>
      @endforeach
   </div>
</div>
@endsection

@section('profile')
<!-- profile -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">PROFILE STRENGTH</div>
   <div class="frow w-100 rw-100 centered">
      <div class="fcol border circular-50">
         <img src="{{$pic_url}}" alt="" class="user-avatar-lg rounded-circle" width='50' height='50'>
      </div>
   </div>

   <div class='progress my-3' style='height:5px'>
      <div class='progress-bar' style='width:50%'> </div>
   </div>
   <div class="frow w-100 rw-100 stretched">
      <div class="txt-s">Profile Picture</div>
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">
      <div class="txt-s">Personal Information</div>
      @if($user->hasProfile())
      <div class="fcol circular-15 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif

   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">
      <div class="txt-s">Academic Information</div>
      @if($user->hasAcademics())
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif

   </div>

   <div class="frow w-100 rw-100 pt-2 mt-2 border-top stretched">
      <div class="txt-s"></div>
      <div class="frow">
         <a href="{{route('profiles.index')}}">
            <div class="txt-green txt-b">Update Profile</div>
         </a>
         <div class="fcol centered"><i data-feather='chevron-right' class="feather-xsmall txt-green"></i> </div>
      </div>

   </div>
</div>

<!-- suggestions for user -->
<div class="fcol w-100 rw-100 bg-white mt-3 p-4">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">SUGGESTED TO YOU</div>
   <div class="frow w-100 rw-100 stretched">
      <div class="frow">
         <div class="box-20 mr-2 bg-light-grey"></div>
         <div class="txt-s">Apply Through Us</div>
      </div>
      <div class="txt-s"><i data-feather='chevron-right' class="feather-small txt-orange"></i> </div>
   </div>
   <div class="frow w-100 rw-100 stretched my-2">
      <div class="frow">
         <div class="box-20 mr-2 bg-light-grey"></div>
         <div class="txt-s">Get Top Universities Report - Free</div>
      </div>
      <div class="txt-s"><i data-feather='chevron-right' class="feather-small txt-orange"></i> </div>
   </div>
</div>

@endsection