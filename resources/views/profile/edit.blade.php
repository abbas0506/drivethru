@extends('layouts.dashboard')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-sidebar_national activeItem='dashboard' :user="$user"></x-sidebar_national>
@endsection

@section('page-header')
<div class="frow w-100 p-4 mt-3 txt-m txt-b txt-smoke">{{$user->name}}!</div>
@endsection

@section('data')
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">My Applications</div>
      <div class="frow txt-s txt-grey centered">
         <div class="fcol box-25 circular bg-green centered"><i data-feather='refresh-ccw' class="feather-xsmall txt-white"></i></div>
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

   <div class="frow w-100 rw-100">
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
@endsection

@section('profile')
<!-- suggestions for user -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">SUGGESTED TO YOU</div>

   <div class="frow w-100 rw-100 stretched">
      <div class="frow">
         <div class="box-20 mr-2 bg-light-grey"></div>
         <div class="txt-s">Apply for International University</div>
      </div>
      <div class="txt-s"><i data-feather='chevron-right' class="feather-small txt-orange"></i> </div>
   </div>
   <div class="frow w-100 rw-100 stretched my-2">
      <div class="frow">
         <div class="box-20 mr-2 bg-light-grey"></div>
         <div class="txt-s">Top Universities Report - Free</div>
      </div>
      <div class="txt-s"><i data-feather='chevron-right' class="feather-small txt-orange"></i> </div>
   </div>
</div>

<!-- profile -->
<div class="fcol w-100 rw-100 bg-white p-4 mt-3">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">PROFILE STRENGTH</div>
   <div class="frow w-100 rw-100 centered">
      <div class="fcol box-50 border circular">
         <img src="{{url('storage/images/logos/logo2.png')}}" alt="" class="user-avatar-lg" width='50' height='50'>
      </div>
   </div>

   <div class='progress my-3' style='height:5px'>
      <div class='progress-bar' style='width:50%'> </div>
   </div>
   <div class="frow w-100 rw-100 stretched">
      <div class="txt-s">Profile Picture</div>
      <div class="fcol box-15 circular centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">
      <div class="txt-s">Personal Information</div>
      <div class="fcol box-15 circular centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">
      <div class="txt-s">Academic Information</div>
      <div class="fcol box-15 circular centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>
   <div class="frow w-100 rw-100 py-2 mt-2 border-top stretched">
      <div class="txt-s"></div>
      <div class="frow">
         <div class="txt-green txt-b">Update Profile</div>
         <div class="fcol centered"><i data-feather='chevron-right' class="feather-xsmall txt-green"></i> </div>
      </div>

   </div>

</div>
@endsection