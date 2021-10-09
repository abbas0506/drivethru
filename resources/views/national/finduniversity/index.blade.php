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
<div class="navitem txt-s active">
   <a href="{{route('finduniversity.index')}}">
      <div class="frow top-mid">
         <div class='badge badge-info p-1 mr-1'>1</div>
         <div>Course Preference</div>
      </div>
   </a>
</div>
<div class="navitem txt-s">
   <a href="{{route('finduniversity.index')}}">
      <div class="frow top-mid">
         <div class='badge badge-info p-1 mr-1'>2</div>
         <div>Get Report / Apply</div>
      </div>
   </a>
</div>

@endsection

@section('graph')
Graph section
@endsection


@section('data')
<form id='form' action="{{route('fetchUniversitiesByCourseId')}}" method='get'>
   @csrf
   <div class="bg-light p-4 rounded">
      <div class="frow auto-col">
         <div class="mr-3"><input type="checkbox" name='mode' value='manual' checked> Manual Search</div>
         <div><input type="checkbox" name='mode' value='expert'> Expert Search <span class="txt-orange txt-s">(recommended)</span></div>
      </div>
      <!-- course 1 -->
      <div class="frow mid-left mt-4 auto-col">
         <div class="w-20 rw-100 text-center txt-s txt-b rmb-3">1<sup>st</sup> priority</div>
         <div class="frow w-80 rw-100 auto-col stretched">
            <div class="fancyselect w-48 rw-100 rmb-2">
               <select onchange="loadCourses(event,1)" required>
                  <option value="-1">Select a faculty</option>
                  @foreach($faculties as $faculty)
                  <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                  @endforeach
               </select>
               <label>Faculty</label>
            </div>
            <div class="fancyselect w-48 rw-100">
               <select name="course_id1" id="course_id1">
                  <option value=""></option>
               </select>
               <label for="">Course</label>
            </div>
         </div>

      </div>

      <!-- course 2 -->
      <div class="frow mid-left mt-3 auto-col">
         <div class="w-20 rw-100 text-center txt-s txt-b rmb-3">2<sup>nd</sup> priority</div>
         <div class="frow w-80 rw-100 stretched auto-col">
            <div class="fancyselect w-48 rw-100 rmb-2">
               <select onchange="loadCourses(event,2)" required>
                  <option value="-1">Select a faculty</option>
                  @foreach($faculties as $faculty)
                  <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                  @endforeach
               </select>
               <label>Faculty</label>
            </div>
            <div class="fancyselect w-48 rw-100">
               <select name="course_id2" id="course_id2">
                  <option value=""></option>
               </select>
               <label for="">Course</label>
            </div>
         </div>
      </div>
      <!-- course 3 -->
      <div class="frow mid-left mt-3 auto-col">
         <div class="w-20 rw-100 text-center txt-s txt-b rmb-3">3<sup>rd</sup> priority</div>
         <div class="frow w-80 rw-100 stretched auto-col">
            <div class="fancyselect w-48 rw-100 rmb-2">
               <select onchange="loadCourses(event,3)" required>
                  <option value="-1">Select a faculty</option>
                  @foreach($faculties as $faculty)
                  <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                  @endforeach
               </select>
               <label>Faculty</label>
            </div>
            <div class="fancyselect w-48 rw-100">
               <select name="course_id3" id="course_id3" onchange="loadUniversities(3)">
                  <option value=""></option>
               </select>
               <label for="">Course</label>
            </div>
         </div>
      </div>
   </div>
   <div class="bg-light mt-3 p-4 rounded">

      <div class="frow w-100 centered stretched auto-col">
         <div class="fcol centered w-15 rw-100 txt-s txt-b rmb-3">
            <div><i data-feather='filter' class="feather-xsmall"></i></div>
            <div class="text-center">Optional Parameters</div>
         </div>
         <div class="w-80 rw-100">
            <div class="frow stretched auto-col">
               <div class="fancyselect w-48 rw-100 rmb-2">
                  <select name="city_id" id="city" onchange="filter()">
                     <option value="">Select a location</option>
                     @foreach($cities as $city)
                     <option value="{{$city->id}}">{{$city->name}}</option>
                     @endforeach
                  </select>
                  <label for="">Location</label>
               </div>
               <div class="frow fancyselect w-48 rw-100">
                  <select name="type" id="type" onchange="filter()">
                     <option value="">Show all</option>
                     <option value="public">Public only</option>
                     <option value="private">Private only</option>
                  </select>
                  <label>Public / Private</label>
               </div>

            </div>
            <div class="frow stretched mt-3 auto-col">
               <div class="fancyinput w-48 rw-100 rmb-2">
                  <input type="number" name='minfee' placeholder="Minimum Fee">
                  <label for="">Min Fee (Rs)</label>
               </div>
               <div class="fancyinput w-48 rw-100 rmb-2">
                  <input type="number" name='maxfee' placeholder="Maximum Fee">
                  <label for="">Max Fee (Rs)</label>
               </div>
            </div>

         </div>

      </div>

   </div>
   <div class="frow mid-right mt-3"><button type='submit' class="btn btn-primary">Next</button></div>
</form>
@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">
function loadCourses(event, priority) {
   var token = $("meta[name='csrf-token']").attr("content");
   var faculty_id = event.target.value;
   $.ajax({
      type: 'POST',
      url: "fetchCoursesByFacultyId",
      data: {
         "faculty_id": faculty_id,
         "_token": token,

      },
      success: function(response) {
         //

         if (priority == 1) $('#course_id1').html(response.course_options);
         if (priority == 2) $('#course_id2').html(response.course_options);
         if (priority == 3) $('#course_id3').html(response.course_options);

      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
         Toast.fire({
            icon: 'warning',
            title: errorThrown
         });
      }
   }); //ajax end
}

$('[name=mode]').change(function() {
   $('[name=mode]').not(this).prop('checked', false);
});
</script>
@endsection