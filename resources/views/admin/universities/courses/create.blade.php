@extends('layouts.admin')
@section('header')
<x-admin.header></x-admin.header>
@endsection
@section('page-content')
<!-- display record save, del, update message if any -->
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
<section class="page-content">
   <div class='w-70 mx-auto txt-l my-5 '>National Universities <span class="txt-s ml-2"> - {{$university->name}} - new course </span> </div>

   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-university__profile :university=$university></x-university__profile>
      </div>

      <div class="w-70 p-4 border relative">
         <div class="frow stretched">
            <div class="frow txt-m txt-orange">Add New Course</div>
            <a href="{{route('unicourses.index')}}">
               <div class="top-right-icon circular-20">
                  <i data-feather='x' class="feather-xsmall mb-1"></i>
               </div>
            </a>
         </div>

         <!-- data form -->
         <form action="{{route('unicourses.store')}}" method="POST">
            @csrf
            <input type="text" name='university_id' id='university_id' value='{{$university->id}}' hidden>
            <div class="frow w-100 rw-100 mt-5 stretched auto-col">
               <div class="fancyselect w-48 rw-100">
                  <select id="faculty_id" onchange="fetchXUnicoursesByFacultyId(event)">
                     <option value="-1">Select faculty</option>
                     @foreach($faculties as $faculty)
                     <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                     @endforeach
                  </select>
                  <label>Faculty</label>
               </div>
               <div class="fancyselect w-48 rw-100">
                  <select id="course_id" name="course_id" required>
                     <!-- will be loaded on runtime after level selection -->
                  </select>
                  <label>Course</label>
               </div>
            </div>

            <div class="frow w-100 rw-100 mt-3 stretched auto-col">
               <div class="fancyinput w-20">
                  <input type="number" name='duration' min=0 max=10 placeholder="Duration" value='4' class='text-center' required>
                  <label>Duration (yr)</label>
               </div>
               <div class="fancyinput w-20">
                  <input type="number" name='fee' min=0 max=10000 placeholder="Fee (k)" value='1' class='text-center' required>
                  <label>Fee (k)</label>
               </div>
               <div class="fancyinput w-55">
                  <input type="text" name='criteria' placeholder="Criteria" value='60% Fsc' required>
                  <label>Criteria</label>
               </div>
            </div>
            <div class="fancyinput my-3 w-100">
               <input type="text" name='requirement' placeholder="Requirment" value='CNIC, domicile, academics, 4 pics' required>
               <label>Requirements</label>
            </div>
            <div class="frow mid-right mt-4">
               <button type="submit" class="btn btn-success">Add</button>
            </div>
         </form>
      </div>
   </div>

   @endsection

   @section('script')
   <script lang="javascript">
   function fetchXUnicoursesByFacultyId(event) {
      var token = $("meta[name='csrf-token']").attr("content");
      var faculty_id = $('#faculty_id').val();
      var university_id = $('#university_id').val();
      $.ajax({
         type: 'POST',
         url: "{{route('fetchXUnicoursesByFacultyId')}}",
         data: {
            "faculty_id": faculty_id,
            "university_id": university_id,
            "_token": token,

         },
         success: function(response) {

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