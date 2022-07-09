@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='findcountry'></x-student.sidebar>
@endsection

@section('page-title')
Find Country - <span class="txt-12 px-2">apply for - {{$country->name}}</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4 border">
   <!-- close icon -->
   <a href="{{route('findcountriesbyname.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>
   <div class="frow txt-custom-blue txt-b"><span class="border-bottom">Apply Through Us</span></div>
   @if(!$user->hasFinishedProfile())
   <div class="frow p-5 centered">
      <div class="mr-5"><i data-feather='meh' class="feather-large mx-1 txt-orange"></i></div>
      <div class="txt-j">
         Your profile has been found incomplete. We need your personal as well as academic details
         for the processing of your applicaiton. So, first complete your profile and then visit this page again.
         <a href="{{route('profiles.create')}}" class="txt-blue"> Click here </a> to complete your profile.
      </div>
   </div>
   @elseif($country->favcourses()->count()>0)
   <div class="frow lh-30 mt-4 border-bottom border-silver tr txt-s txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-70"> Course </div>
      <div class="w-20 txt-center">Apply</div>
   </div>

   @php $sr=1; @endphp
   @foreach($country->favcourses() as $favcourse)

   <div class="frow lh-30 align-center border-bottom border-silver tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-70">{{$favcourse->course->name}}</div>
      <div class="w-20 txt-center chk-apply"><input type="checkbox" name='chk' value="{{$favcourse->course->id}}" onclick="updateChkCount()"></div>
   </div>
   @endforeach
   <button class="btn btn-primary mt-3" id='applyNow' onclick="postData()">Apply Now <sup><span id='chkCount'></span></sup></button>
   @endif

   @endsection

   <form action="{{route('applications.store')}}" method="post" id='applicationForm'>
      @csrf
      <input type="hidden" name='search_mode' value="byname">
      <input type="hidden" name='country_id' value="{{$country->id}}">
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
         var token = $("meta[name='csrf-token']").attr("content");

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