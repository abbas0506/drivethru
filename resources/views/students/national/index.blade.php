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
<div class="navitem txt-s active">Choose a course to see which universities offer the course?</div>
@endsection

@section('graph')
Graph section
@endsection

@section('input')
<div class="bg-light p-4 rounded">
   <form id='form' action="{{route('fetchUniversitiesByCourseId')}}" method='get'>
      @csrf

      <div class="fcol mid-left">
         <div class="">DrvieThru Expert knows which universities are the most suitable for you</div>
         <div class="txt-orange"><input type="checkbox" name='isexpert'> Ok, show me expert recommended universities <i data-feather='thumbs-up' class="feather-xsmall"></i></div>

      </div>
      <div class="frow stretched mt-4">
         <div class="fancyselect w-48">
            <select id="faculty_id" onchange="loadCourses(event)" required>
               <option value="-1">Select a faculty</option>
               @foreach($faculties as $faculty)
               <option value="{{$faculty->id}}">{{$faculty->name}}</option>
               @endforeach
            </select>
            <label>Faculty</label>
         </div>
         <div class="fancyselect w-48">
            <select name="course_id" id="course_id" onchange="loadUniversities()">
               <option value=""></option>
            </select>
            <label for="">Course</label>
         </div>
      </div>

   </form>
</div>
@endsection

@section('filters')
<div class="bg-light mt-3 p-4 rounded relative">
   <div class="absolute" style="top:-10px; left:10px;"><i data-feather='filter' class="feather-xsmall"></i> (optional)</div>
   <div class="frow stretched">
      <div class="fancyselect w-48">
         <select name="city_id" id="city" onchange="filter()">
            <option value="">Select a location</option>
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
         </select>
         <label for="">Location</label>
      </div>
      <div class="frow fancyselect w-48">
         <select name="type" id="type" onchange="filter()">
            <option value="">Show all</option>
            <option value="public">Public only</option>
            <option value="private">Private only</option>
         </select>
         <label>Public / Private</label>
      </div>

   </div>
   <div class="frow stretched mt-3">
      <div class="fancyinput w-48">
         <input type="number" name='minfee' placeholder="Minimum Fee">
         <label for="">Minimum Fee (Rs)</label>
      </div>
      <div class="fancyinput w-48">
         <input type="number" name='maxfee' placeholder="Maximum Fee">
         <label for="">Maximum Fee (Rs)</label>
      </div>
   </div>
   <div class="frow mid-right mt-3"><button class="btn btn-sm btn-primary">Search</button></div>
</div>

@endsection
<!-- script goes here -->
@section('script')
<script lang="javascript">
function loadCourses(event) {
   var token = $("meta[name='csrf-token']").attr("content");
   var faculty_id = $('#faculty_id').val();
   $.ajax({
      type: 'POST',
      url: "fetchCoursesByFacultyId",
      data: {
         "faculty_id": faculty_id,
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
</script>
@endsection