@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='finduniversity'></x-student.sidebar>
@endsection

@section('page-title')
Find University - <span class="txt-12 px-2">{{$university->name}} - apply</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4">
   <!-- close icon -->
   <a href="{{route('finduniversitiesbyname.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>
   <div class="frow txt-custom-blue txt-b"><span class="border-bottom">Apply Through Us</span></div>
   @if(!$user->hasFinishedProfile())
   <div class="frow p-5 centered">
      <div class="w-20 txt-c mr-5"><i data-feather='meh' class="feather-large mx-1 txt-orange"></i></div>
      <div class="text-justify">
         Your profile has been found incomplete. We need your personal as well as academic details
         for the processing of your applicaiton. So, first complete your profile and then visit this page again.
         <a href="{{route('profiles.create')}}" class="txt-red"> Click here </a> to complete your profile.
      </div>
   </div>
   <!-- if univeristy data exists -->
   @elseif($university->unicourses()->count()>0)
   <div class="frow p-1 mt-4 border-bottom border-silver txt-s txt-grey">
      <div class="w-40 rw-50">Course </div>
      <div class="w-15 rw-20 text-right rhide">Fee</div>
      <div class="w-15 text-right rhide">Last Merit</div>
      <div class="w-20 rw-30 text-right">Closing</div>
      <div class="flex-grow txt-c">Apply</div>
   </div>
   @foreach($university->unicourses() as $unicourse)
   <div class="frow p-1 border-bottom border-silver txt-s tr">
      <div class="w-40 rw-50">{{$unicourse->course->name}}</div>
      <div class="w-15 text-right hide-sm"> {{$unicourse->fee}} k</div>
      <div class="w-15 text-right hide-sm">{{$unicourse->lastmerit}}</div>
      <div class="w-20 rw-30 text-right">{{$unicourse->closing}}</div>
      <div class="flex-grow txt-c chk-apply"><input type="checkbox" name='chk' value="{{$unicourse->id}}" onclick="updateChkCount()"></div>
   </div>
   @endforeach
   <button class="btn btn-primary mt-3" id='applyNow' onclick="postData()">Apply Now <sup><span id='chkCount'></span></sup></button>
   @endif
</div>

@endsection

<form action="{{route('applications.store')}}" method="post" id='applicationForm'>
   @csrf
   <input type="hidden" name='search_mode' value="byname">
   <input type="hidden" name="university_id" value='{{$university->id}}'>
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