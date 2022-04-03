@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='counselling'></x-student.sidebar>
@endsection

@section('page-title')
Career Counselling - <span class="txt-12 px-2">recent successful activity</span>
@endsection
@section('content')

<!-- create new acadmeic -->
<div class="page-centered w-70 bg-white p-4">
   <div class="frow lh-30 mb-3 space-between">
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

   <!-- 

   <div class="frow p-1 mid-left">
      <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option1'></div>
      <div class="fcol w-90 rw-90 mid-left"></div>
   </div>
   <div class="frow p-1 mid-left">
      <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option2' @if($counselling->option2==1) checked @endif></div>
      <div class="fcol w-90 rw-90 mid-left">I want to enquire about national univeristy</div>
   </div>
   <div class="frow p-1 mid-left">
      <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option3'></div>
      <div class="fcol w-90 rw-90 mid-left">I am facing website usage issue</div>
   </div>
   <div class="frow p-1 mid-left">
      <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option4'></div>
      <div class="fcol w-90 rw-90 mid-left">I am facing fee payment issue</div>
   </div>
   <div class="frow p-1 mid-left">
      <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option5'></div>
      <div class="fcol w-90 rw-90 mid-left">I want to seek general information</div>
   </div>
   <div class="frow p-1 mid-left">
      <div class="fcol w-15 rw-15 centered"><input type="checkbox" id='qrydetail' value="1"></div>
      <div class="fcol w-90 rw-90 mid-left">
         <textarea name="qrydetail" id="" rows="3" class="w-80" placeholder="I would like to express my query in words (upto 300 characters)"></textarea>
      </div>
   </div> -->
</div>


@endsection

@section('profile')
<x-sidebar__news></x-sidebar__news>
@endsection