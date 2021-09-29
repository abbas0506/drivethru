@extends('layouts.student')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@section('sidebar')
<x-sidebar_national activeItem='findUni'></x-sidebar_national>
@endsection

@section('page-title')
Find University
@endsection

@section('page-navbar')
<div class="navitem txt-s">Find most suitable universities for you and download free report</div>
@endsection

@section('graph')
Graph section
@endsection

@section('data')
<div class="frow fancyinput w-100">
   <input type="text" placeholder="Type university name here" class="w-100">
   <i data-feather='search' class="feather-small" style="position:relative; right:24px; top:15px"></i>
   <label>Univerisity Name</label>
</div>
<div class="frow centered my-3"> - OR -</div>
<div class="frow stretched">
   <div class="fancyselect w-48">
      <select name="" id="level_id" onchange="loadCourses(event)" required>
         <option value="-1">Select a level</option>
         @foreach($levels as $level)
         <option value="{{$level->id}}">{{$level->name}}</option>
         @endforeach
      </select>
      <label for="">Level</label>
   </div>
   <div class="fancyselect w-48">
      <select name="course_id" id="course_id">
         <option value=""></option>
      </select>
      <label for="">Course</label>
   </div>
</div>
<div class="frow stretched mt-3">
   <div class="fancyselect w-48">
      <select name="" id="">
         <option value="-1">Select a location</option>
         @foreach($cities as $city)
         <option value="{{$city->id}}">{{$city->name}}</option>
         @endforeach
      </select>
      <label for="">Location</label>
   </div>
   <div class="fancyselect w-48">
      <select name="" id="">
         <option value="-1">Select fee range</option>
         <option value="0">upto 50,000</option>
         <option value="1">upto 100,000</option>
         <option value="2">upto 1 million</option>
         <option value="2">upto 10 million</option>
         <option value="2">Above 10 million</option>
      </select>
      <label for="">Estimated Fee (Rs)</label>
   </div>
</div>
<div class="w-100 hr my-4"></div>
<div class="frow th border-bottom">
   <div class="rw-10 txt-s txt-b">Sr</div>
   <div class="rw-60 txt-s txt-b">University</div>
   <div class="rw-15 txt-s txt-b">Loc.</div>
   <div class="rw-15 txt-s txt-b">Fee</div>
</div>
@php $sr=1; @endphp
@foreach($universities as $university)
<div class="frow tr border-bottom">
   <div class="rw-10 txt-s">{{$sr++}}</div>
   <div class="rw-60 txt-s">{{$university->name}}</div>
   <div class="rw-15 txt-s">{{$university->city->name}}</div>
   <div class="rw-15 txt-s">2k</div>
</div>
@endforeach
@endsection
<!-- script goes here -->
@section('script')
<script lang="">
function loadCourses(event) {
   var token = $("meta[name='csrf-token']").attr("content");
   var level_id = $('#level_id').val();
   $.ajax({
      type: 'POST',
      url: "fetchCoursesByLevelId",
      data: {
         "level_id": level_id,
         "_token": token,

      },
      success: function(response) {
         //

         $('#course_id').html(response.course_options);

      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
         Toast.fire({
            icon: 'warning',
            title: errorThrown
         });
      }
   }); //ajax end
}
</script>
@endsection