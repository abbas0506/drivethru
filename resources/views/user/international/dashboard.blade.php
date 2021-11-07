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

<style>
.bg-international-mini {
   background-image: url("{{asset('images/bg/international.jpg')}}");
   background-repeat: no-repeat;
   background-size: cover;
   background-size: 100% 100%;
}
</style>

@section('page-header')
<div class="frow w-100 p-4 my-3 txt-m txt-b txt-smoke bg-international-mini" style='border-radius:5px'>Welcome, {{$user->name}}!</div>
@endsection

@section('data')
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-custom-blue txt-m">
         My Applications
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
      <div class="txt-custom-blue txt-m">My Counselling Requests</div>
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
<!-- profile strength-->
<x-profile__strength :user="$user"></x-profile__strength>
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