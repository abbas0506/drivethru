@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='finduniversity'></x-student.sidebar>
@endsection

@section('page-title')
Find University - <span class="txt-12 px-2">search by course name</span>
@endsection

@section('content')
<ul class="page-nav">
   <li class="active">By Course</li>
   <li>
      <a href="{{route('finduniversitiesbyname.index')}}">By Name</a>
   </li>
</ul>
<div class="bg-light p-4">

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



   <ul class="ml-3 txt-s txt-grey">
      <li>Select faculty and then choose course</li>
      <li>Course 1 is compulsory; all other fields are optional</li>
   </ul>

   <div class="mt-4">
      <form id='form' action="{{route('finduniversitiesbycourse_search')}}" method='get'>
         @csrf
         <div class="txt-orange">Tell us your field of interest</div>
         <!-- course 1 -->
         <div class="frow auto-col mt-3 stretched">
            <div class="fancyselect w-48">
               <select onchange="loadCourses(event,1)" required>
                  <option value="-1">Select a faculty</option>
                  @foreach($faculties as $faculty)
                  <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                  @endforeach
               </select>
               <label>Faculty</label>
            </div>
            <div class="fancyselect w-48">
               <select name="course_id1" id="course_id1" required>
                  <option value=""></option>
               </select>
               <label for="">Course 1 *</label>
            </div>
         </div>

         <!-- course 2 -->
         <div class="frow stretched mt-3 auto-col">
            <div class="fancyselect w-48">
               <select onchange="loadCourses(event,2)" required>
                  <option value="-1">Select a faculty</option>
                  @foreach($faculties as $faculty)
                  <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                  @endforeach
               </select>
               <label>Faculty</label>
            </div>
            <div class="fancyselect w-48">
               <select name="course_id2" id="course_id2">
                  <option value=""></option>
               </select>
               <label for="">Course 2</label>
            </div>
         </div>

         <!-- course 3 -->
         <div class="frow stretched mt-3 auto-col">
            <div class="fancyselect w-48">
               <select onchange="loadCourses(event,3)" required>
                  <option value="-1">Select a faculty</option>
                  @foreach($faculties as $faculty)
                  <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                  @endforeach
               </select>
               <label>Faculty</label>
            </div>
            <div class="fancyselect w-48">
               <select name="course_id3" id="course_id3" onchange="loadUniversities(3)">
                  <option value=""></option>
               </select>
               <label for="">Course 3</label>
            </div>
         </div>


         <div class="frow txt-s txt-orange mt-4">
            <div><i data-feather='filter' class="feather-xsmall"></i></div>
            <div class="ml-2">Advanced Search options</div>
         </div>

         <div class="frow mt-3 stretched auto-col">
            <div class="fancyselect w-48 ">
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
            <div class="fancyinput w-48">
               <input type="number" name='minfee' placeholder="Minimum Fee">
               <label for="">Min Fee (Rs)</label>
            </div>
            <div class="fancyinput w-48">
               <input type="number" name='maxfee' placeholder="Maximum Fee">
               <label for="">Max Fee (Rs)</label>
            </div>
         </div>
         <div class="mt-3">
            <button type='submit' class="btn btn-primary">Next</button>
         </div>
      </form>
   </div>
</div>
@endsection

@section('promotion')
<div class="mt-4">
   <x-student.newspanel :advertisement="$advertisement"></x-student.newspanel>
</div>
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
</script>
@endsection