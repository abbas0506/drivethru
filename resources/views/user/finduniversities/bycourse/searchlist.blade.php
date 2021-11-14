@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='finduniversity' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">Search Result</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-finduniversity__navbar activeItem='report'></x-finduniversity__navbar>
</div>
@endsection

@section('graph')
@endsection

@section('data')

<!-- search option -->
<div class="fcol w-100 rw-100 px-4 bg-light">
   <div class="frow w-100 rw-100 py-3 border-bottom centered">
      <div class="frow">
         <a href="{{route('finduniversitiesbycourse_report')}}" target="_blank">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='download' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-3">Get Free Report</div>
      </div>
      <div class="mx-5">|</div>

      <div class="frow">
         <a href="{{route('finduniversitiesbycourse_apply',)}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-3">Apply Through Us</div>
      </div>
   </div>
   <div class="frow w-100 rw-100 py-2 txt-grey th border-bottom">
      <div class="fcol w-20 rw-30 txt-s txt-b">Course</div>
      <div class="fcol w-80 rw-70">
         <div class="frow">
            <div class="hw-50 rw-80 txt-s txt-b">University</div>
            <div class="w-15 txt-s txt-b rhide">Loc.</div>
            <div class="w-15 txt-s txt-b rhide">Type</div>
            <div class="w-10 txt-s txt-b rhide">Fee (k)</div>
            <div class="w-10 rw-20 txt-s text-center txt-b chk-apply hide">Apply</div>
         </div>
      </div>

   </div>

   @foreach($courses as $course)
   <div class="frow w-100 py-2">
      <div class="fcol w-20 rw-30 txt-s txt-b ">{{$course->name}}</div>
      <div class="fcol w-80 rw-70">

         @if($universities->where('course_id',$course->id)->count()>0)

         @foreach($universities->where('course_id',$course->id) as $row)
         <div class="frow rw-100 tr border-bottom py-1">
            <div class="hw-50 rw-80 txt-s">{{$row->university}}</div>
            <div class="w-15 txt-s rhide">{{$row->city}}</div>
            <div class="w-15 txt-s rhide">{{$row->type}}</div>
            <div class="w-10 txt-s rhide">{{$row->fee}}</div>
            <div class="w-10 rw-20 txt-s text-center chk-apply hide"><input type="checkbox" name='chk' value="{{$row->university_id}}-{{$row->course_id}}" onclick="updateChkCount()"></div>
         </div>
         @endforeach
         @else
         <div class="frow rw-100 txt-s border-bottom py-1">No university offers this course</div>
         @endif
      </div>
   </div>
   @endforeach
</div>
@endsection

@section('social')
<x-sidebar__news></x-sidebar__news>
@endsection