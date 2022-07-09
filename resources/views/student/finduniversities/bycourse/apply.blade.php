@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='finduniversity'></x-student.sidebar>
@endsection

@section('page-title')
Find University - <span class="txt-12 px-2">by course - apply</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4 border">
   <!-- close icon -->
   <a href="{{route('finduniversitiesbyname.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>
   <div class="frow txt-custom-blue txt-b"><span class="border-bottom border-silver">Apply Through Us</span></div>
   @if(!$user->hasFinishedProfile())
   <div class="frow p-5 centered">
      <div class="mr-5"><i data-feather='meh' class="feather-large mx-1 txt-orange"></i></div>
      <div class="text-justify">
         Your profile has been found incomplete. We need your personal as well as academic details
         for the processing of your applicaiton. So, first complete your profile and then visit this page again.
         <a href="{{route('profiles.create')}}" class="txt-blue"> Click here </a> to complete your profile.
      </div>
   </div>

   @elseif($courses->count()>0)
   <div class="frow lh-30 mt-4 txt-grey th border-bottom border-silver">
      <div class="w-20 rw-30 txt-s txt-b">Course</div>
      <div class="flex-grow">
         <div class="frow">
            <div class="w-50 txt-s txt-b">University</div>
            <div class="w-15 txt-s txt-b rhide">Loc.</div>
            <div class="w-15 txt-s txt-b rhide">Type</div>
            <div class="w-10 txt-s txt-b rhide">Fee</div>
            <div class="w-10 rw-20 txt-s txt-center txt-b">Apply</div>
         </div>
      </div>
   </div>
   @php $sr=1; @endphp
   @foreach($courses as $course)
   <div class="frow lh-30">
      <div class="w-20 rw-30 txt-s txt-b ">{{$course->name}}</div>
      <div class="flex-grow">

         @if($universities->where('course_id',$course->id)->count()>0)

         @foreach($universities->where('course_id',$course->id) as $row)
         <div class="frow align-center tr border-bottom border-silver">
            <div class="w-50 txt-s">{{$row->university}}</div>
            <div class="w-15 txt-s rhide">{{$row->city}}</div>
            <div class="w-15 txt-s rhide">{{$row->type}}</div>
            <div class="w-10 txt-s rhide">{{$row->fee}}</div>
            <div class="w-10 rw-20 txt-s txt-center chk-apply"><input type="checkbox" name='chk' value="{{$row->university_id}}-{{$row->course_id}}" onclick="updateChkCount()"></div>
         </div>
         @endforeach
         @else
         <div class="frow txt-s border-bottom border-silver lh-30">No university offers this course</div>
         @endif
      </div>
   </div>
   @endforeach
   <button class="btn btn-primary mt-3" id='applyNow' onclick="postData()">Apply Now <sup><span id='chkCount'></span></sup></button>
   @endif
</div>
</div>
@endsection

<form action="{{route('applications.store')}}" method="post" id='applicationForm'>
   @csrf
   <input type="hidden" name='search_mode' value="bycourse">
   <input type="hidden" name='course_id' value="{{$course->id}}">
   <input type="hidden" name='ids' id='_ids'>
</form>

<!-- script goes here -->
@section('script')
<script lang="javascript">
   function updateChkCount() {
      var chkArray = [];
      var chks = document.getElementsByName('chk');
      chks.forEach((chk) => {
         if (chk.checked) chkArray.push(chk.value);
      })

      if (chkArray.length > 0)
         document.getElementById("chkCount").innerHTML = "+" + chkArray.length;
      else
         document.getElementById("chkCount").innerHTML = "";
   }

   function postData() {

      var ids = [];
      var chks = document.getElementsByName('chk');
      chks.forEach((chk) => {
         if (chk.checked) ids.push(chk.value);
      })

      $('#_ids').val(ids);
      $('#applicationForm').submit();
   }
</script>
@endsection