@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='findcountry' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">Find Country</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-findcountry__navbar activeItem='apply'></x-findcountry__navbar>
</div>
@endsection

@section('graph')

@endsection
@section('data')
<!-- create new acadmeic -->

<div class="fcol w-100 rw-100 p-4 bg-white rounded">
   <div class="frow w-100 rw-100">
      <div>
         <span class="txt-custom-blue txt-b border-bottom border-2">Apply Through Us</span>
      </div>
   </div>
   @if(!$user->hasFinishedProfile())
   <div class="frow w-100 rw-100 p-5 centered">
      <div class="mr-5"><i data-feather='meh' class="feather-large mx-1 txt-orange"></i></div>
      <div class="text-justify">
         Your profile has been found incomplete. We need your personal as well as academic details
         for the processing of your applicaiton. So, first complete your profile and then visit this page again.
         <a href="{{route('profiles.create')}}" class="txt-blue"> Click here </a> to complete your profile.
      </div>
   </div>
   @elseif($courses->count()>0)
   <div class="frow w-100 rw-100 py-2 txt-grey th border-bottom">
      <div class="fcol w-20 rw-30 txt-s txt-b">Course</div>
      <div class="fcol w-80 rw-70">
         <div class="frow">
            <div class="hw-50 rw-80 txt-s txt-b">University</div>
            <div class="w-15 txt-s txt-b rhide">Loc.</div>
            <div class="w-15 txt-s txt-b rhide">Type</div>
            <div class="w-10 txt-s txt-b rhide">Fee</div>
            <div class="w-10 rw-20 txt-s text-center txt-b">Apply</div>
         </div>
      </div>
   </div>
   @php $sr=1; @endphp
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
            <div class="w-10 rw-20 txt-s text-center chk-apply"><input type="checkbox" name='chk' value="{{$row->university_id}}-{{$row->course_id}}" onclick="updateChkCount()"></div>
         </div>
         @endforeach
         @else
         <div class="frow rw-100 txt-s border-bottom py-1">No university offers this course</div>
         @endif
      </div>
   </div>
   @endforeach
   <button class="btn btn-primary mt-3" id='applyNow' onclick="postData()">Apply Now <sup><span id='chkCount'></span></sup></button>
   @endif
</div>

@endsection

@section('social')
<x-sidebar__news></x-sidebar__news>
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