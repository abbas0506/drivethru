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

<div class="frow w-100 bg-custom-light p-4 rw-100 auto-col stretched">
   <div class="fcol w-72 rw-100 py-4 px-5 bg-white ">
      <div class="frow stretched">
         <div class="frow mid-left">
            <div class="txt-l mr-4">{{$university->name}}</div><img src="{{url(asset('images/universities/'.$university->logo))}}" alt='flag' id='flag_img' width=30 height=30 class='rounded-circle'>
         </div>
         <a href="{{route('unicourses.index')}}">
            <div class="frow centered box-30 bg-orange circular txt-white hoverable">
               <i data-feather='x' class="feather-xsmall"></i>
            </div>
         </a>
      </div>

      <!-- data form -->


      <form action="{{route('unicourses.update',$unicourse)}}" method="POST">
         @csrf
         @method('PATCH')
         <div class="frow h5 my-4 border-left border-info pl-2" style='border-width:5px !important'>{{$unicourse->course->name}}</div>
         <div class="frow my-3 stretched">
            <div class="fcol w-15">
               <div class="fancyinput w-100">
                  <input type="number" name='duration' min=0 max=20 placeholder="Duration" value='{{$unicourse->duration}}' required>
                  <label>Duration</label>
               </div>
            </div>
            <div class="fcol w-20">
               <div class="fancyinput w-100">
                  <input type="number" name='fee' min=0 max='10000' placeholder="Fee" value='{{$unicourse->fee}}' required>
                  <label>Fee (k$)</label>
               </div>
            </div>
            <div class="fancyinput w-60 rw-100">
               <input type="text" name='criteria' placeholder="Criteria" value='{{$unicourse->criteria}}' required>
               <label>Criteria</label>
            </div>
         </div>


         <div class="fancyinput my-3 w-100">
            <input type="text" name='requirement' placeholder="Requirment" value='{{$unicourse->requirement}}' required>
            <label>Requirements</label>
         </div>
         <div class="frow mid-right my-4">
            <button type="submit" class="btn btn-success">Update</button>
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
function validate() {
   var name = $('#name').val()
   var rank = $('#rank').val()

   var msg = '';

   if (name == '') msg = 'Country name is required';
   else if (rank == '') msg = "Rank is required";
   else if (rank <= 0) msg = "Rank value invalid";

   if (msg != '') {
      Toast.fire({
         icon: 'warning',
         title: msg
      });
      return false;
   }
}

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


function loadLevelsAndCourses(event) {
   var token = $("meta[name='csrf-token']").attr("content");
   var faculty_id = $('#faculty_id').val();
   $.ajax({
      type: 'POST',
      url: "{{route('fetchLevelsAndCoursesByFacultyId')}}",
      data: {
         "faculty_id": faculty_id,
         "_token": token,

      },
      success: function(response) {

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