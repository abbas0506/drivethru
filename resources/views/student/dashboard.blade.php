@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='dashboard'></x-student.sidebar>
@endsection

@section('page-title')
Welcome, {{$user->name}}
@endsection
@section('content')

<div class="block bg-light p-4">
   <div class="frow lh-30 txt-blue txt-m">
      My Applications
   </div>
   <!-- table header -->
   <div class="frow align-center border-bottom border-silver txt-s txt-grey lh-40">
      <div class="w-10">ID</div>
      <div class="w-30">Created At</div>
      <div class="w-20">Type</div>
      <div class="w-15">Charges</div>
      <div class="flex-grow">Status</div>
      <div class="w-10 txt-c">...</div>
   </div>

   <div class="block">
      @foreach($user->applications()->sortByDesc('id') as $application)
      <div class="frow w-100 tr align-center txt-s py-1 border-bottom border-silver lh-30">
         <div class="w-10">{{$application->id}}</div>
         <div class="w-30">{{$application->created_at}}</div>
         <div class="w-20">@if($application->mode==0) <img src="{{asset('/images/icons/pakistan-flag.png')}}" width="22"> @else <img src="{{asset('/images/icons/globe.png')}}" width="20"> @endif</div>
         <div class="w-15">{{$application->charges}} <i data-feather='dollar-sign' class="feather-xsmall"></i></div>
         <div class="flex-grow">@if($application->ispaid) Paid @else <a href="{{url('payments/create',$application)}}" class="btn btn-success txt-s"> pay</a> @endif</div>
         <div class="w-10 txt-c">
            <a href="{{route('applications.show',$application)}}">
               <i data-feather='eye' class="feather-xsmall text-primary"></i>
            </a>
            &nbsp
            <a href="{{route('application_download',$application)}}" target="_blank">
               <i data-feather='download' class="feather-xsmall txt-orange"></i>
            </a>
         </div>
      </div>
      @endforeach
   </div>
</div>

@endsection

@section('promotion')
<x-student.profile :user="$user"></x-student.profile>
@endsection