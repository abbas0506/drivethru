@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar></x-student.sidebar>
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
      <div class="w-40">Created At</div>
      <div class="w-20">Type</div>
      <div class="w-15">Charges</div>
      <div class="w-15 text-center">...</div>
   </div>

   <div class="block">
      @foreach($user->applications()->sortByDesc('id') as $application)
      <div class="frow w-100 tr align-center txt-s py-1 border-bottom border-silver lh-30">
         <div class="w-10">{{$application->id}}</div>
         <div class="w-40">{{$application->created_at}}</div>
         <div class="w-20">@if($application->mode==0) National @else International @endif</div>
         <div class="w-15">@if($application->ispaid) Paid @else {{$application->charges}} &nbsp<a href="{{url('payments/create',$application)}}"> <span class="badge badge-info">pay</span></a> @endif</div>
         <div class="w-15text-center">
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