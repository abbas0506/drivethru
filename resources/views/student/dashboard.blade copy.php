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

<div class="block rw-100 bg-light p-4">
   <div class="frow w-100 rw-100  ">
      <div class="txt-custom-blue txt-m">
         My Applications
      </div>

   </div>
   <!-- table header -->
   <div class="frow align-center border-bottom border-silver lh-40 mt-3">
      <div class="w-10 txt-s txt-silver">ID</div>
      <div class="w-40 txt-s txt-grey">Created At</div>
      <div class="w-20 txt-s txt-grey">Type</div>
      <div class="w-15 txt-s txt-grey">Charges</div>
      <div class="w-15 txt-s text-center txt-grey">...</div>
   </div>

   <div class="block w-100 rw-100">
      @foreach($user->applications()->sortByDesc('id') as $application)
      <div class="frow w-100 tr align-center py-1 border-bottom border-silver lh-30">
         <div class="w-10 txt-s">{{$application->id}}</div>
         <div class="w-40 txt-s">{{$application->created_at}}</div>
         <div class="w-20 txt-s">@if($application->mode==0) National @else International @endif</div>
         <div class="w-15 txt-s">@if($application->ispaid) Paid @else {{$application->charges}} &nbsp<a href="{{url('payments/create',$application)}}"> <span class="badge badge-info">pay</span></a> @endif</div>
         <div class="w-15 txt-s text-center">
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