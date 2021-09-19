@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Universities</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span>
      <a href="{{route('universities.index')}}">universities </a> <span class="mx-1"> / </span>
      <a href="{{route('universities.edit',$university)}}">{{$university->name}} </a> <span class="mx-1"> / </span>
      <a href="{{route('unicourses.index')}}" class="mr-1">courses</a> <span class="mx-1"> / </span>
      {{$unicourse->course->name}} / Edit
   </div>
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

<div class="container-60">

   @php
   $logo_url=url("/images/universities/".$university->logo);
   @endphp
   <!-- form input -->
   <div class="frow mid-left my-4">
      <div class="txt-l mr-4">{{$university->name}}</div><img src={{$logo_url}} alt='flag' id='flag_img' width=30 height=30 class='rounded-circle'>
   </div>

   <form action="{{route('unicourses.update',$unicourse)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="frow h5 my-4 border-left border-info pl-2" style='border-width:5px !important'>{{$unicourse->course->name}}</div>
      <div class="frow my-3 stretched">
         <div class="fcol w-32">
            <div class="fancyinput w-100">
               <input type="number" name='duration' min=0 max=20 placeholder="Duration" value='{{$unicourse->duration}}' required>
               <label>Duration</label>
            </div>
         </div>
         <div class="fcol w-32">
            <div class="fancyinput w-100">
               <input type="number" name='minfee' min=0 max='10000' placeholder="minimum fee" value='{{$unicourse->minfee}}' required>
               <label>Min Fee (k)</label>
            </div>
         </div>
         <div class="fcol w-32">
            <div class="fancyinput w-100">
               <input type="number" name='maxfee' min=0 max=10000 placeholder="maximum fee" value='{{$unicourse->maxfee}}' required>
               <label>Max Fee (k)</label>
            </div>
         </div>
      </div>

      <div class="fancyinput my-3 w-100">
         <input type="text" name='criteria' placeholder="Criteria" value='{{$unicourse->criteria}}' required>
         <label>Criteria</label>
      </div>
      <div class="fancyinput my-3 w-100">
         <input type="text" name='requirement' placeholder="Requirment" value='{{$unicourse->requirement}}' required>
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