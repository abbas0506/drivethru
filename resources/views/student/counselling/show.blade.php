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
<div class="page-centered w-70 bg-light p-4 border">
   <a href="{{route('counselling.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>
   <div class="frow lh-30 my-3">
      <div style="border-bottom:3px #F68656 solid">Free Counselling Session</div>
   </div>
   <div class="frow my-1 txt-grey">
      Track ID: {{$counselling->id}}
   </div>
   <div class="frow my-1 txt-grey">
      Posted at: {{$counselling->created_at}}
   </div>
   <div class="frow my-3 txt-grey">Your query:</div>
   <div class="px-4">
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
         @if($counselling->query)
         <li>{{$counselling->query}}</li>
         @endif
      </ul>
   </div>
   @if($counselling->response)
   <div class="my-2 px-2 txt-red">
      <h5>Reply</h5>
      <p class="txt-s">{{$counselling->response}}</p>
   </div>
   @endif
   <div class="mt-2 float-right">
      <a href="{{route('counselling.index')}}" class="btn btn-primary">OK</a>
   </div>

</div>
@endsection