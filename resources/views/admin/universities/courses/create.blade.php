@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Universities</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span>
      <a href="{{route('universities.index')}}">Universities </a> <span class="mx-1"> / </span> Create New
   </div>
</div>
@endsection
@section('page-content')

@if ($errors->any())
<div class="alert alert-danger mt-5">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
<br />
@endif

<div class="frow w-100 bg-custom-light p-4 rw-100 auto-col stretched">
   <div class="fcol w-72 rw-100 py-4 px-5 bg-white ">
      <div class="frow stretched">
         <div class="frow txt-b txt-m txt-orange">Add New Course</div>
         <a href="{{route('unicourses.index')}}">
            <div class="frow centered box-30 bg-orange circular txt-white hoverable">
               <i data-feather='x' class="feather-xsmall"></i>
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
            <div class="fancyinput w-15 rw-100">
               <input type="number" name='duration' min=0 max=10 placeholder="Duration" value='4' required>
               <label>Duration (yr)</label>
            </div>
            <div class="fancyinput w-20 rw-100">
               <input type="number" name='fee' min=0 max=10000 placeholder="Fee (k)" value='1' required>
               <label>Fee (k)</label>
            </div>
            <div class="fancyinput w-60 rw-100">
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
   <!-- right hand profile bar -->
   <div class="fcol hw-25 bg-white p-4 rw-100">
      <x-university__profile :university=$university></x-university__profile>
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