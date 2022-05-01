@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='finduniversity'></x-student.sidebar>
@endsection

@section('page-title')
Find University - <span class="txt-12 px-2">by course - search result</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4">
   <!-- close icon -->
   <a href="{{route('finduniversitiesbyname.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>

   <!-- search result -->
   <div class="frow centered border-bottom border-silver pb-3">
      <div class="frow">
         <a href="{{route('finduniversitiesbycourse_report')}}" target="_blank">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='download' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Download</div>
      </div>
      <div class="mx-3">|</div>

      <div class="frow">
         <a href="{{route('finduniversitiesbycourse_apply',)}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-2">Apply</div>
      </div>
   </div>

   <div class="frow py-2 txt-grey th border-bottom border-silver">
      <div class="w-20 rw-30 txt-s txt-b">Course</div>
      <div class="flex-grow">
         <div class="frow">
            <div class="w-50 rw-80 txt-s txt-b">University</div>
            <div class="w-15 txt-s txt-b flex-grow">Loc.</div>
            <div class="w-15 txt-s txt-b rhide">Type</div>
            <div class="w-10 txt-s txt-b rhide">Fee (Rs)</div>
            <!-- <div class="w-10 rw-20 txt-s text-center txt-b chk-apply hide">Apply</div> -->
         </div>
      </div>

   </div>

   @foreach($courses as $course)
   <div class="frow lh-30">
      <div class="fcol w-20 rw-30 txt-s txt-b ">{{$course->name}}</div>
      <div class="flex-grow">

         @if($universities->where('course_id',$course->id)->count()>0)

         @foreach($universities->where('course_id',$course->id) as $row)
         <div class="frow tr border-bottom border-silver">
            <div class="w-50 rw-80 txt-s">{{$row->university}}</div>
            <div class="w-15 txt-s flex-grow">{{$row->city}}</div>
            <div class="w-15 txt-s rhide">{{$row->type}}</div>
            <div class="w-10 txt-s rhide">{{$row->fee}} k</div>
            <!-- <div class="w-10 rw-20 txt-s text-center chk-apply hide"><input type="checkbox" name='chk' value="{{$row->university_id}}-{{$row->course_id}}" onclick="updateChkCount()"></div> -->
         </div>
         @endforeach
         @else
         <div class="frow txt-s border-bottom border-silver">No university offers this course</div>
         @endif
      </div>
   </div>
   @endforeach

</div>
@endsection