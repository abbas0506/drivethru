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
@if ($errors->any())
<div class="alert alert-danger mt-5">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
<br />
@elseif(session('success'))
<script>
Swal.fire({
   icon: 'success',
   title: "Successful",
   showConfirmButton: false,
   timer: 1500
});
</script>
@endif

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
   @elseif($country->favcourses()->count()>0)
   <div class="frow p-1 mt-4 border-bottom tr txt-s txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-70 rw-70"> Course </div>
      <div class="w-20 rw-20 text-center">Apply</div>
   </div>

   @php $sr=1; @endphp
   @foreach($country->favcourses() as $favcourse)

   <div class="frow p-1 border-bottom tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-70 rw-70">{{$favcourse->course->name}}</div>
      <div class="w-20 rw-20 text-center chk-apply"><input type="checkbox" name='chk' value="{{$favcourse->course->id}}" onclick="updateChkCount()"></div>
   </div>
   @endforeach
   <button class="btn btn-primary mt-3" id='applyNow' onclick="postData()">Apply Now <sup><span id='chkCount'></span></sup></button>
   @endif
</div>

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