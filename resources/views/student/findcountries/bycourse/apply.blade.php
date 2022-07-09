@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='findcountry'></x-student.sidebar>
@endsection

@section('page-title')
Find University - <span class="txt-12 px-2">search by course name</span>
@endsection

@section('content')
<div class="page-centered w-70 bg-light p-4 border">
   <!-- close icon -->
   <a href="{{route('finduniversitiesbyname.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>

   <div class="frow txt-custom-blue txt-b"><span class="border-bottom">Apply Through Us</span></div>
   @if(!$user->hasFinishedProfile())
   <div class="frow p-5 centered">
      <div class="mr-5"><i data-feather='meh' class="feather-large mx-1 txt-orange"></i></div>
      <div class="text-justify">
         Your profile has been found incomplete. We need your personal as well as academic details
         for the processing of your applicaiton. So, first complete your profile and then visit this page again.
         <a href="{{route('profiles.create')}}" class="txt-blue"> Click here </a> to complete your profile.
      </div>
   </div>
   @elseif($countries->count()>0)
   <div class="frow lh-30 mt-4 border-bottom border-silver tr txt-s txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-40 rw-50"> Country </div>
      <div class="w-20 rw-20 txt-r rhide">Study Cost($)</div>
      <div class="w-20 txt-r rhide">Living Cost($)</div>
      <div class="w-10 rw-20 flex-grow txt-r">Apply</div>
   </div>

   @php $sr=1; @endphp
   @foreach($countries as $country)

   <div class="frow lh-30 align-center border-bottom border-silver tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-40 rw-50">{{$country->name}}</div>
      <div class="w-20 rw-20 txt-r rhide "> {{$country->studycost()}}</div>
      <div class="w-20 txt-r rhide">{{$country->livingcost()}}</div>
      <div class="w-10 flex-grow txt-r chk-apply"><input type="checkbox" name='chk' value="{{$country->id}}" onclick="updateChkCount()"></div>
   </div>
   @endforeach
   <button class="btn btn-primary mt-3" id='applyNow' onclick="postData()">Apply Now <sup><span id='chkCount'></span></sup></button>
   @endif
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