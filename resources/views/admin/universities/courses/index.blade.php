@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Universities</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('universities.index')}}">Universities </a> <span class="mx-1"> / </span> Courses</div>
</div>
@endsection
@section('page-content')

<!-- display record save, del, update message if any -->
@if ($errors->any())
<div class="alert alert-danger mx-10 mt-2">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
<br />
@endif

<div class="container" style="width:60% !important">

   <!-- step naviagation  -->
   <div class="frow mb-5 p-3 auto-col border bg-lightsky">
      <div class="navstep hw-50">
         <a href="{{route('universities.edit', $university)}}">
            <div class="roundbtn">@if($university->step1==1) <i data-feather='check' class="feather-small"></i> @else 1 @endif</div>
         </a>
         <div class="super-underline">Basic Info</div>

      </div>
      <div class="navstep hw-50 active">
         <div class="roundbtn">@if($university->step2==1) <i data-feather='check' class="feather-small"></i> @else 2 @endif</div>
         <div class="super-underline">Course Feeding</div>
      </div>
      <div class="navstep">
         <a href="{{route('universities.index')}}">
            <div class="roundbtn"><i data-feather='pause' class="feather-xsmall"></i></div>
         </a>
      </div>
   </div>


   @php
   $logo_url=url("/images/universities/".$university->logo);
   @endphp
   <!-- form input -->
   <div class="frow mid-left">
      <div class="txt-l mr-4">{{$university->name}}</div><img src={{$logo_url}} alt='flag' id='flag_img' width=30 height=30 class='rounded-circle'>
   </div>
   <div class="frow mid-right my-1">
      <a href="#" onclick="toggle_addslider()"><i data-feather='plus-circle' class="feather-small mx-1 mb-1"></i>Add New Course</a>
   </div>
   @foreach($university->faculties() as $faculty)
   <div class="frow card my-2">
      <div class="card-header txt-b">
         {{$faculty->name}}
      </div>
      <div class="card-body px-5">
         @foreach($faculty->unicourses() as $unicourse)
         <div class="frow">
            <div class="fcol mid-left w-90">{{$unicourse->course->name}}</div>
            <div class="fcol mid-right w-10">
               <div class="frow stretched">
                  <div><a href="{{route('unicourses.edit',$unicourse)}}"> <i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div>
                  <div>
                     <form action="{{route('unicourses.destroy', $unicourse)}}" method="POST" id='deleteform{{$unicourse->id}}'>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$unicourse->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   @endforeach



   <!-- add slider -->

   <div class="slider" id='addslider'>

      <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggle_addslider()"><i data-feather='x' class="feather-xsmall"></i></div>
      <div class="frow centered my-4 txt-b">Add Course</div>
      <form action="{{route('unicourses.store')}}" method="POST">
         @csrf
         <input type="text" name='university_id' value='{{$university->id}}' hidden>
         <div class="fancyselect my-3 w-100">
            <select id="faculty_id" onchange="loadLevelsAndCourses(event)">
               <option value="-1">Select faculty</option>
               @foreach($faculties as $faculty)
               <option value="{{$faculty->id}}">{{$faculty->name}}</option>
               @endforeach
            </select>
            <label>Faculty</label>
         </div>

         <div class="fancyselect my-3 w-100">
            <select id="level_id" onchange="loadCoursesOnly(event)">

            </select>
            <label>Level</label>
         </div>
         <div class="fancyselect my-3 w-100">
            <select id="course_id" name="course_id">

            </select>
            <label>Course</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="number" name='duration' min=0 placeholder="Duration" required>
            <label>Duration</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="number" name='fee' min=0 placeholder="Fee" required>
            <label>Fee</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="number" name='studycost' min=0 placeholder="Study cost" required>
            <label>Study Cost</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="text" name='criteria' placeholder="Criteria" required>
            <label>Criteria</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="text" name='requirement' placeholder="Requirment" required>
            <label>Requirements</label>
         </div>
         <div class="frow mid-right my-4">
            <button type="submit" class="btn btn-success">Add</button>
         </div>
      </form>

   </div> <!-- slider ends -->

   <!-- EDIT SLIDER -->

   <div class="slider" id='editslider'>

      <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggle_editslider()"><i data-feather='x' class="feather-xsmall"></i></div>
      <div class="frow centered my-4 txt-b">Edit Course</div>
      <form action="{{route('unicourses.update',$unicourse)}}" method="POST">
         @csrf
         <input type="text" name='edit_id' hidden>
         <div class="frow h5 my-2 centered" id='edit_course'></div>
         <div class="fancyinput my-3 w-100">
            <input type="number" id="edit_duration" name='duration' min=0 placeholder="Duration" required>
            <label>Duration</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="number" id="edit_fee" name='fee' min=0 placeholder="Fee" required>
            <label>Fee</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="number" id="edit_studycost" name='studycost' min=0 placeholder="Study cost" required>
            <label>Study Cost</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="text" id="edit_criteria" name='criteria' placeholder="Criteria" required>
            <label>Criteria</label>
         </div>
         <div class="fancyinput my-3 w-100">
            <input type="text" id='edit_requirement' name='requirement' placeholder="Requirment" required>
            <label>Requirements</label>
         </div>
         <div class="frow mid-right my-4">
            <button type="submit" class="btn btn-success">Update</button>
         </div>
      </form>

   </div> <!-- slider ends -->

</div>
@endsection

@section('script')
<script lang="javascript">
function toggle_addslider() {
   $("#addslider").toggleClass('slide-left');
}

function toggle_editslider(id, course, duration, fee, studycost, criteria, requirement) {
   $('#edit_id').val(id);
   $('#edit_course').html(course);
   $('#edit_duration').val(duration);
   $('#edit_fee').val(fee);
   $('#edit_studycost').val(studycost);
   $('#edit_criteria').val(criteria);
   $('#edit_requirement').val(requirement);
   $("#editslider").toggleClass('slide-left');
}

function delme(formid) {
   event.preventDefault();
   Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
      if (result.value) {
         //submit corresponding form
         $('#deleteform' + formid).submit();
      }
   });
}

function loadLevelsAndCourses(event) {
   var token = $("meta[name='csrf-token']").attr("content");
   var faculty_id = $('#faculty_id').val();
   $.ajax({
      type: 'POST',
      url: "fetchLevelsAndCoursesByFacultyId",
      data: {
         "faculty_id": faculty_id,
         "_token": token,

      },
      success: function(response) {
         //
         $('#level_id').html(response.level_options);
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

function loadCoursesOnly(event) {
   var token = $("meta[name='csrf-token']").attr("content");
   var faculty_id = $('#faculty_id').val();
   var level_id = $('#level_id').val();
   $.ajax({
      type: 'POST',
      url: "fetchCoursesByFacultyAndLevelId",
      data: {
         "faculty_id": faculty_id,
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
</script>
@endsection