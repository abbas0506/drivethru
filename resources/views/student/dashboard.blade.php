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
      My Applications <div class="ml-3">@if(session('mode')==0) <img src="{{asset('/images/icons/pakistan-flag.png')}}" width="22"> @else <img src="{{asset('/images/icons/globe.png')}}" width="20"> @endif</div>
   </div>
   <!-- table header -->
   <div class="frow align-center border-bottom border-silver txt-s txt-grey lh-40">
      <div class="w-10">ID</div>
      <div class="w-50">Created At</div>
      <div class="w-20 txt-r">Charges</div>
      <div class="flex-grow txt-r">Status</div>
      <!-- <div class="w-10 txt-c">...</div> -->
   </div>

   <div class="block">
      @foreach($user->applications()->where('mode',session('mode'))->sortByDesc('id') as $application)
      <div class="frow w-100 tr align-center txt-s py-1 border-bottom border-silver lh-30">
         <div class="w-10 txt-red"><a href="{{route('applications.show',$application)}}">{{$application->id}}</a></div>
         <div class="w-50">{{$application->created_at}}</div>
         <div class="w-20 txt-r">{{$application->charges}} $ </div>
         <div class="flex-grow txt-r">@if($application->ispaid) Paid @else <a href="{{url('payments/create',$application)}}" class="btn btn-success txt-s"> pay</a> @endif</div>
         <!-- <div class="w-10 txt-c">
            <a href="{{route('applications.show',$application)}}">
               <i data-feather='eye' class="feather-xsmall text-primary"></i>
            </a>
            &nbsp
            <a href="{{route('application_download',$application)}}" target="_blank">
               <i data-feather='download' class="feather-xsmall txt-orange"></i>
            </a>
         </div> -->
      </div>
      @endforeach
   </div>
</div>

@endsection

@section('promotion')
<x-student.profile :user="$user"></x-student.profile>
@endsection