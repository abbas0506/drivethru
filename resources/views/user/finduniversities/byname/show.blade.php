@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='findUni' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">{{$university->name}}</div>
@endsection

@section('page-subtitle')
<div class="frow text-justify txt-s">{{$university->city->name}}</div>
@endsection
@section('page-navbar')
@endsection

@section('data')
<div class="w-100 rw-100 bg-light p-4">
   <div class="frow mid-right">
      <div class="mr-2 txt-grey">Download</div>
      <a href="#">
         <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='download' class="feather-xsmall txt-white"></i></div>
      </a>

   </div>
   <!-- report content goes here -->
   <div class="frow w-100 rw-100 mt-4">
      <div class="w-30 rw-50 txt-b">Type: </div>
      <div class="w-70 rw-50">{{$university->type}}</div>
   </div>
   <div class="frow w-100 rw-100">
      <div class="w-30 rw-50 txt-b">Ranking: </div>
      <div class="w-70 rw-50">{{$university->rank}}</div>
   </div>
   <div class="frow w-100 rw-100 mt-2 auto-col">
      <div class="w-30 rw-100 txt-b">Courses: </div>
      <div class="w-70 rw-100">
         @if($university->unicourses()->count()>0)
         @foreach($university->unicourses() as $unicourse)
         <li>{{$unicourse->course->name}}</li>
         @endforeach
         @else
         <div class="txt-s txt-orange">List of courses not available</div>
         @endif
      </div>
   </div>

</div>
@endsection
<!-- script goes here -->
@section('script')
<script lang="javascript">

</script>
@endsection