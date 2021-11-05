@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='findUni' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">Find University</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-finduni__navbar activeItem='preference'></x-finduni__navbar>
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

<!-- manual search section -->
<div id='manual_search_section' class="hide">

   <div class="frow my-2">
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable mr-3" onclick="toggleMe()">Auto Search</div>
      <div class="frow btn-rounded-custom-orange centered px-3 txt-s"><i data-feather='check' class="feather-small mr-2"></i>Manual Search </div>
   </div>

   <form id='form' action="{{route('fetchUniversities')}}" method='get'>
      @csrf
      <input type="checkbox" name='manual' checked hidden>
      <div class="bg-light p-4 rounded mb-3">
         <div class="fcol txt-grey w-100 rw-100 mt-2">
            <ul class="">
               <li>Part of university name is also acceptable</li>
            </ul>
         </div>
         <div class="frow w-100 rw-100 stretched">
            <div class="frow w-100 mid-left fancy-search-grow" id='searchinput'>
               <input type="text" name='university' placeholder="Type university name" oninput="search(event)" style='width:80%!important; margin-left:20px' required>
               <i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
            </div>
            <div class=""><button type='submit' class="btn btn-sm btn-primary">Search</button></div>
         </div>
      </div>
   </form>
</div>

<!-- auto search section -->

<div id='auto_search_section'>
   <div class="frow txt-m my-2 rounded">
      <div class="frow btn-rounded-custom-orange centered px-3 txt-s mr-3">Auto Search <i data-feather='check' class="feather-small ml-2"></i></div>
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable" onclick="toggleMe()">Manual Search</div>
   </div>

   <form id='form' action="{{route('fetchUniversities')}}" method='get'>
      @csrf
      <div class="bg-light p-4 rounded">
         <!-- course 1 -->
         <div class="frow mid-left mt-4 auto-col">
            <div class="w-20 rw-100 text-center txt-s txt-grey rmb-3">1<sup>st</sup> priority</div>
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
            <div class="w-20 rw-100 text-center txt-s txt-grey rmb-3">2<sup>nd</sup> priority</div>
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
            <div class="w-20 rw-100 text-center txt-s txt-grey rmb-3">3<sup>rd</sup> priority</div>
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
            <div class="fcol centered w-15 rw-100 txt-s txt-grey rmb-3">
               <div><i data-feather='filter' class="feather-xsmall"></i></div>
               <div class="text-center">Advanced Search (optional)</div>
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
</div>


@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">
function toggleMe() {
   $('#manual_search_section').toggleClass('hide');
   $('#auto_search_section').toggleClass('hide');
}

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