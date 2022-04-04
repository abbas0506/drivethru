@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='finduniversity'></x-student.sidebar>
@endsection

@section('page-title')
Application Submission - <span class="txt-12 px-2">successful</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4">
   <div class="txt-center"><i data-feather='smile' class="feather-large txt-orange"></i></div>
   <div class="txt-custom-blue txt-l txt-b mb-4 txt-center">Congratulation!</div>
   <div class="mb-2 txt-j">Your application No. <strong>{{$application->id}} </strong>has been successfully submitted.
      For further processing, you need to pay {{$application->charges}} $ as processing charges.
      Feel free to choose any payment option like JazzCash, Easypaisa, Online Banking, Manual Deposit etc.
   </div>
   <div><a class='btn btn-primary float-right' href="{{url('student-dashboard')}}">Ok, I got</a></div>
</div>
@endsection