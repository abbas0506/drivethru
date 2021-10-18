@extends('layouts.main')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-sidebar activeItem='findcountry' :user="$user"></x-sidebar>
@endsection

@section('page-title')
Find Country
@endsection

@section('page-navbar')
<x-finduni_navbar activeItem='preference'></x-finduni_navbar>
@endsection

@section('graph')
Graph section
@endsection


@section('data')
<form id='form' action="{{route('findcountries.store')}}" method='post'>
   @csrf
   <div class="bg-light p-4 rounded">
      <div class="frow auto-col">
         <div class="mr-3"><input type="checkbox" name='mode' value='manual' checked> Manual Search</div>
         <div><input type="checkbox" name='mode' value='expert'> Expert Search <span class="txt-orange txt-s">(recommended)</span></div>
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