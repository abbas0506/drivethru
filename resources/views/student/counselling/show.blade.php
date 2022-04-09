@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='counselling'></x-student.sidebar>
@endsection

@section('page-title')
Career Counselling - <span class="txt-12 px-2">view detail</span>
@endsection
@section('content')

<!-- create new acadmeic -->
<div class="page-centered w-70 bg-white p-4">
   <a href="{{route('counselling.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>
   <div class="frow lh-30 my-3 space-between">
      <span style="border-bottom:3px #F68656 solid">Free Counselling Session</span>
      <div class="">
         @if($counselling->status==0) <i data-feather='clock' class="feather-medium txt-red"></i>
         @else <i data-feather='check' class="feather-medium mx-1 txt-success"></i>
         @endif
      </div>
   </div>
   <div class="frow my-1 txt-grey">
      Track ID: {{$counselling->id}}
   </div>
   <div class="frow my-1 txt-grey">
      Posted at: {{$counselling->created_at}}
   </div>
   <div class="frow my-3 txt-grey">
      Following query items have been posted for the session
   </div>
   <div class="p-4">
      <ul>
         @if($counselling->option1==1)
         <li>I want to enquire about international admission</li>
         @endif
         @if($counselling->option2==1)
         <li>I want to enquire about national univeristy</li>
         @endif
         @if($counselling->option3==1)
         <li>I am facing website usage issue</li>
         @endif
         @if($counselling->option4==1)
         <li>I am facing fee payment issue</li>
         @endif
         @if($counselling->option5==1)
         <li>I want to seek general information</li>
         @endif
         @if($counselling->querydetail)
         <li>{{$counselling->querydetail}}</li>
         @endif
      </ul>
   </div>
   <div class="mt-2 float-right">
      <a href="{{route('counselling.index')}}" class="btn btn-primary">OK</a>
   </div>

</div>
@endsection