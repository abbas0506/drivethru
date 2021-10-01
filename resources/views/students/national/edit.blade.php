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
<div class="navitem txt-s active">Select Universities</div>
<div class="navitem txt-s">Preview </div>
@endsection

@section('graph')
Graph section
@endsection

@section('data')
<form id='form' action="{{route('fetchUniversitiesByCourseId')}}" method='get'>
   @csrf
   <div class="frow mid-left">
      <input type="checkbox" name='isexpert'>
      <div class="ml-2 txt-orange">Show me expert recommended universities <i data-feather='thumbs-up' class="feather-xsmall"></i></div>
   </div>
   <div class="frow stretched mt-4">
      <div class="fancyselect w-48">
         <select id="level_id" onchange="loadCourses(event)" required>
            <option value="-1">Select a level</option>
            @foreach($levels as $level)
            <option value="{{$level->id}}" @if($selected_course->level->id==$level->id)selected @endif>{{$level->name}}</option>
            @endforeach
         </select>
         <label>Level</label>
      </div>
      <div class="fancyselect w-48">
         <select name="course_id" id="course_id" onchange="loadUniversities()">
            @foreach($courses as $course)
            <option value="{{$course->id}}" @if($selected_course->id==$course->id)selected @endif>{{$course->name}}</option>
            @endforeach
         </select>
         <label for="">Course</label>
      </div>
   </div>
</form>

@if($universities->count()>0)
<div class="frow stretched mt-3">
   <div class="fancyselect w-48">
      <select name="city_id" id="city" onchange="filter()">
         <option value="">Select a location</option>
         @foreach($cities as $city)
         <option value="{{$city->id}}">{{$city->name}}</option>
         @endforeach
      </select>
      <label for="">Location</label>
   </div>
   <div class="fancyselect w-48">
      <select name="fee" id="fee" onchange="filter()">
         <option value="">Select fee range</option>
         <option value="0">upto 50 k</option>
         <option value="1">50 k - 1 lac</option>
         <option value="2">1 lac - 2 lac</option>
         <option value="3">2 lac - 3 lac</option>
         <option value="4">3 lac - 4 lac</option>
         <option value="5">4 lac - 5 lac</option>
         <option value="6">5 lac - 10 lac</option>
         <option value="7">Above 10 lac</option>
      </select>
      <label for="">Estimated Fee (Rs)</label>
   </div>
</div>
<div class="w-100 hr my-4"></div>
<div class="frow w-100 my-4 stretched">
   <div class="fancy-search-grow-full">
      <input type="text" id='name' placeholder="Search" autocomplete="off" oninput="filter()"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
   </div>
   <div class="frow fancyselect-underline">
      <i data-feather='filter' class="feather-xsmall"></i>
      <select name="type" id="type" onchange="filter()">
         <option value="">Show all</option>
         <option value="public">Public only</option>
         <option value="private">Private only</option>
      </select>
      <label></label>
   </div>
   <div class="frow centered rounded p-1 txt-xs bg-orange text-light hoverable"><i data-feather='upload' class="feather-small"></i> <span id='chkCount'></span> </div>
</div>

<div class="frow th border-bottom">
   <div class="rw-10 txt-s txt-b">Sr</div>
   <div class="rw-50 txt-s txt-b">University</div>
   <div class="rw-15 txt-s txt-b">Loc.</div>
   <div class="rw-15 txt-s txt-b">Fee (k)</div>
   <div class="rw-10 txt-s txt-b"><i data-feather='check-square' class="feather-xsmall"></i></div>
</div>
@php $sr=1; @endphp


@foreach($universities as $university)
<div class="frow tr border-bottom">
   <div class="rw-10 txt-s">{{$sr++}}</div>
   <div class="rw-50 txt-s">{{$university->name}}</div>
   <div class="rw-10 txt-s hide">{{$university->type}}</div>
   <div class="rw-15 txt-s">{{$university->city->name}}</div>
   <div class="rw-15 txt-s hide">{{$university->minfee()}}</div>
   <div class="rw-15 txt-s hide">{{$university->maxfee()}}</div>
   <div class="rw-15 txt-s">{{$university->minfee()}}-{{$university->maxfee()}}</div>

   <div class="rw-10 txt-s"><input type="checkbox" name='chk' value="{{$university->id}}" onclick="updateChkCount()"></div>
</div>
@endforeach
@else
<div class="frow centered mt-4 p-2 border-top">No university offers this course</div>
@endif
@endsection
<!-- script goes here -->
@section('script')
<script lang="javascript">
// 

function filter() {
   //read user input
   var name = $('#name').val().toLowerCase();
   var type = $('#type').val().toLowerCase();;
   var city = $('#city').val();
   if (city) city = $('#city option:selected').text().toLowerCase(); //if city not selected
   var fee = $('#fee').val();
   var minfee, maxfee, highest = 100000; //highest to be 10 curore
   if (fee) {
      if (fee == 0) {
         minfee = 0;
         maxfee = 50;
      } else if (fee == 1) {
         minfee = 51;
         maxfee = 100;
      } else if (fee == 2) {
         minfee = 101;
         maxfee = 200;
      } else if (fee == 3) {
         minfee = 201;
         maxfee = 300;
      } else if (fee == 4) {
         minfee = 301;
         maxfee = 400;
      } else if (fee == 5) {
         minfee = 401;
         maxfee = 500;
      } else if (fee == 6) {
         minfee = 501;
         maxfee = 1000;
      } else {
         minfee = 1001;
         maxfee = highest;
      }
   } else { //if no fee selected 
      minfee = 0
      maxfee = highest
   }

   if (city) {
      $('.tr').each(function() {
         if (!(
               $(this).children().eq(1).prop('outerText').toLowerCase().includes(name) &&
               $(this).children().eq(2).prop('outerText').toLowerCase().includes(type) &&
               $(this).children().eq(3).prop('outerText').toLowerCase().includes(city) &&
               Number($(this).children().eq(5).prop('outerText')) < maxfee
            )) {
            $(this).addClass('hide');
         } else {
            $(this).removeClass('hide');
         }
      });
   } else {
      $('.tr').each(function() {
         if (!(
               $(this).children().eq(1).prop('outerText').toLowerCase().includes(name) &&
               $(this).children().eq(2).prop('outerText').toLowerCase().includes(type) &&
               Number($(this).children().eq(5).prop('outerText')) < maxfee

            )) {
            $(this).addClass('hide');
         } else {
            $(this).removeClass('hide');
         }
      });
   }

}

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

function loadUniversities() {
   $('form').submit();
}

function updateChkCount() {
   var chkArray = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) chkArray.push(chk.value);
   })

   document.getElementById("chkCount").innerHTML = "+" + chkArray.length;
}
</script>
@endsection