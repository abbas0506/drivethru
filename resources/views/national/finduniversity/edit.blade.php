@extends('layouts.main')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-sidebar activeItem='findUni' :user="$user"></x-sidebar>
@endsection

@section('page-title')
Search Result
@endsection

@section('page-navbar')
<x-finduni_navbar activeItem='apply'></x-finduni_navbar>
@endsection

@section('graph')
<a href="{{route('finduni_download')}}" target="_blank">
   <span class='txt-orange'>Download Report <i data-feather='download' class="feather-xsmall ml-1"></i></span>
</a>
@endsection

@section('data')
<!-- search option -->
<div class="frow my-3 mid-left fancy-search-grow">
   <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
</div>
<div class="frow th border-bottom">
   <div class="fcol w-20 rw-30 txt-s txt-b">Course</div>
   <div class="fcol w-80 rw-70">
      <div class="frow">
         <div class="hw-50 rw-80 txt-s txt-b">University</div>
         <div class="w-15 txt-s txt-b rhide">Loc.</div>
         <div class="w-15 txt-s txt-b rhide">Type</div>
         <div class="w-10 txt-s txt-b rhide">Fee (k)</div>
         <div class="w-10 rw-20 txt-s text-center txt-b chk-apply hide">Apply</div>
      </div>
   </div>

</div>

@foreach($courses as $course)
<div class="frow w-100">
   <div class="fcol w-20 rw-30 txt-s txt-b ">{{$course->name}}</div>
   <div class="fcol w-80 rw-70">

      @if($data->where('course_id',$course->id)->count()>0)

      @foreach($data->where('course_id',$course->id) as $row)
      <div class="frow rw-100 tr border-bottom py-1">
         <div class="hw-50 rw-80 txt-s">{{$row->university}}</div>
         <div class="w-15 txt-s rhide">{{$row->city}}</div>
         <div class="w-15 txt-s rhide">{{$row->type}}</div>
         <div class="w-10 txt-s rhide">{{$row->fee}}</div>
         <div class="w-10 rw-20 txt-s text-center chk-apply hide"><input type="checkbox" name='chk' value="{{$row->university_id}}-{{$row->course_id}}" onclick="updateChkCount()"></div>
      </div>
      @endforeach
      @else
      <div class="frow rw-100 txt-s border-bottom py-1">No university offers this course</div>
      @endif
   </div>
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
@endsection
<form action="{{route('applications.store')}}" method="post" id='applicationForm'>
   @csrf
   <input type="hidden" name='ids' id='_ids'>
</form>
<!-- script goes here -->
@section('script')
<script lang="javascript">
   function search(event) {
      var searchtext = event.target.value.toLowerCase();
      $('.tr').each(function() {
         if (!(
               $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext)
            )) {
            $(this).addClass('hide');
         } else {
            $(this).removeClass('hide');
         }
      });
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

   function toggleApply() {
      $('#applyThroughUs').toggleClass('hide');
      $('#cancelApply').toggleClass('hide');
      $('#applyNow').toggleClass('hide');
      $('.chk-apply').each(function() {
         $(this).toggleClass('hide');
      });
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