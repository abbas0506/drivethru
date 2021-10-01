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
<div class="navitem txt-s active">Choose where to apply?</div>
<div class="navitem txt-s">View list </div>
@endsection

@section('graph')
Graph section
@endsection

@section('data')
<form id='form' action="{{route('fetchUniversitiesByCourseId')}}" method='get'>
   @csrf
   <div class="frow mid-left">
      <input type="checkbox" name='isexpert'>
      <div class="ml-2 txt-orange">Expert search <i data-feather='thumbs-up' class="feather-xsmall"></i></div>
   </div>
   <div class="frow stretched mt-4">
      <div class="fancyselect w-48">
         <select id="level_id" onchange="loadCourses(event)" required>
            <option value="-1">Select a level</option>
            @foreach($levels as $level)
            <option value="{{$level->id}}">{{$level->name}}</option>
            @endforeach
         </select>
         <label>Level</label>
      </div>
      <div class="fancyselect w-48">
         <select name="course_id" id="course_id" onchange="loadUniversities()">
            <option value=""></option>
         </select>
         <label for="">Course</label>
      </div>
   </div>
</form>

@endsection
<!-- script goes here -->
@section('script')
<script lang="javascript">
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
</script>
@endsection