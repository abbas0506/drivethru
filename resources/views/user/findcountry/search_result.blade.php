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
Find Country
@endsection

@section('page-navbar')

<x-findcountry__navbar activeItem='apply'></x-findcountry__navbar>

@endsection

@section('graph')

@endsection
@section('data')
<!-- create new acadmeic -->

<div class="fcol w-100 rw-100 p-4 rounded">
   <div class="frow w-100 rw-100 stretched">
      <div>
         <span class="txt-custom-blue txt-b border-bottom border-2">Search result</span>
      </div>
      <a href="http://">
         <div class="frow mid-left txt-orange">
            <div>Download Free Report </div>
            <div><i data-feather='download' class="feather-small mx-2"></i></div>

         </div>
      </a>

   </div>

   @if($countries->count()>0)
   <div class="frow p-1 mt-2 border-bottom tr txt-s txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-60"> Country </div>
      <div class="w-20 text-right">View</div>
      <div class="w-10 rw-10 text-center chk-apply hide">Apply</div>
   </div>

   @php $sr=1; @endphp
   @foreach($countries as $country)

   <div class="frow p-1 border-bottom tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-60"> {{$country->name}}</div>
      <div class="w-20 text-right view_ico">
         <a href="#" target="_blank"><i data-feather='eye' class="feather-xsmall mx-1 txt-custom-blue"></i></a>
      </div>
      <div class="w-10 rw-10 text-center chk-apply hide"><input type="checkbox" name='chk' value="{{$country->id}}" onclick="updateChkCount()"></div>
   </div>
   @endforeach

   <div class="frow centered mt-5">
      @if($user->hasFinishedProfile())
      <button class="btn btn-primary" id='applyThroughUs' onclick="toggleApply()">Apply Through Us</button>
      @else
      <button class="btn btn-primary" onclick="showProfileRequired()">Apply Through Us</button>
      @endif

      <button class="btn btn-primary hide" id='cancelApply' onclick="toggleApply()">Cancel</button>
      <button class="btn btn-success hide ml-2" id='applyNow' onclick="postUnicourseIds()">Apply Now <sup><span id='chkCount'></span></sup></button>
   </div>

   <div class="frow bg-info centered hide mt-5 p-4" id='profileRequired'>
      <div>Your profile has been found incomplete. We need your personal and academic details in order to process your application. So, first complete your profile and then visit this page again. <a href="{{route('profiles.index')}}" class="txt-white mx-2">Click here</a> to complete your profile.</div>
   </div>

   @else
   <!-- no country found -->
   <div class="frow w-100 rw-100">
      <span class="txt-custom-blue border-bottom border-2">Search result</span>
   </div>
   <div class="frow w-100 rw-100 mt-2 txt-orange centered">
      No such country found in database
   </div>
   @endif
</div>

@endsection

<form action="{{route('applications.store')}}" method="post" id='applicationForm'>
   @csrf
   <input type="hidden" name='ids' id='_ids'>
</form>

<!-- script goes here -->
@section('script')
<script lang="javascript">
function toggleApply() {
   $('#applyThroughUs').toggleClass('hide');
   $('#cancelApply').toggleClass('hide');
   $('#applyNow').toggleClass('hide');
   $('.chk-apply').each(function() {
      $(this).toggleClass('hide');
   });
   // $('.view_ico').each(function() {
   //    $(this).toggleClass('hide');
   // });
}

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


function postUnicourseIds() {
   var token = $("meta[name='csrf-token']").attr("content");

   var ids = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) ids.push(chk.value);
   })

   $('#_ids').val(ids);
   $('#applicationForm').submit();
}

function showProfileRequired() {
   $('#profileRequired').toggleClass('hide');
}
</script>
@endsection