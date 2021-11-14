@extends('layouts.dashboard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='counselling' :user="$user"></x-user__sidebar>
@endsection

@section('page-header')
<div class="fcol">
   <div class="frow w-100 py-2 mt-1 txt-m txt-b txt-custom-blue">Career Counselling</div>
   <div class="frow txt-s txt-grey">We provide free counselling service to all</div>
</div>

@endsection

@section('data')

<!-- create new acadmeic -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow my-2 mid-left txt-b txt-m txt-orange">
      <span style="border-bottom:3px #F68656 solid">Free Counselling Session</span>
      <div class="btn-rounded-custom-blue txt-s ml-5 px-4">
         @if($counselling->status==0) Pending
         @else Finished
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
   <div>
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