@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='finduniversity' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">Find University</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-finduniversitybycourse__navbar activeItem='find'></x-finduniversitybycourse__navbar>
</div>
@endsection

@section('graph')

@endsection


@section('data')

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

<div class="frow txt-m px-4 py-3 bg-light mb-2">
   <a href="{{route('finduniversitiesbyname.index')}}">
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable mr-3" onclick="toggleMe()">By Name</div>
   </a>
   <div class="frow btn-rounded-custom-orange centered px-3 txt-s"><i data-feather='check' class="feather-small mr-2"></i>By Course</div>

</div>
<div>
   <div class="fcol my-2 p-4 mid-left bg-light">
      <ul>
         <li>Select faculty and then choose course</li>
         <li>Course 1 is compulsory; all other fields are optional</li>
      </ul>
   </div>
   <form id='form' action="{{route('finduniversitiesbycourse_search')}}" method='get'>
      @csrf

      <div class="bg-light p-4 rounded">
         <div class="frow txt-orange">Tell us your field of interest</div>
         <!-- course 1 -->
         <div class="frow mid-left mt-4 auto-col">
            <div class="frow w-100 rw-100 auto-col stretched">
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
                  <select name="course_id1" id="course_id1" required>
                     <option value=""></option>
                  </select>
                  <label for="">Course 1 *</label>
               </div>
            </div>

         </div>

         <!-- course 2 -->
         <div class="frow mid-left mt-3 auto-col">
            <div class="frow w-100 rw-100 stretched auto-col">
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
                  <label for="">Course 2</label>
               </div>
            </div>
         </div>
         <!-- course 3 -->
         <div class="frow mid-left mt-3 auto-col">
            <div class="frow w-100 rw-100 stretched auto-col">
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
                  <label for="">Course 3</label>
               </div>
            </div>
         </div>
      </div>
      <div class="bg-light mt-3 p-4 rounded">
         <div class="frow w-100 rw-100 txt-s txt-orange rmb-3">
            <div><i data-feather='filter' class="feather-xsmall"></i></div>
            <div class="ml-2">Advanced Search options</div>
         </div>

         <div class="frow w-100 mt-3 stretched auto-col">
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
      <div class="frow mid-right mt-3"><button type='submit' class="btn btn-primary">Next</button></div>
   </form>
</div>
@endsection

@section('social')
<x-sidebar__news></x-sidebar__news>
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