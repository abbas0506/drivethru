@extends('layouts.student')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@section('sidebar')
<x-sidebar_national activeItem='findUni'></x-sidebar_national>
@endsection

@section('page-title')
Search Result
@endsection

@section('page-navbar')
<div class="navitem txt-s"><a href="{{route('finduniversity.index')}}">1-Set Preference</a></div>
<div class="navitem txt-s active"><a href="{{url('finalizeApplication')}}">2-Get Report</a></div>
<div class="navitem txt-s">3-Apply</div>
@endsection

@section('graph')
<span class='txt-orange'>Download Report <i data-feather='download' class="feather-xsmall ml-1"></i></span>
@endsection

@section('data')
@foreach($courses as $course)
<div class="frow h5 mt-3">{{$course->name}}</div>

@if($data->where('course_id',$course->id)->count()>0)
<div class="frow th border-bottom mt-2">
   <div class="rw-10 txt-s txt-b">Sr</div>
   <div class="rw-50 txt-s txt-b">University</div>
   <div class="rw-10 txt-s txt-b">Loc.</div>
   <div class="rw-10 txt-s txt-b">Type</div>
   <div class="rw-10 txt-s txt-b">Fee (k)</div>
   <div class="rw-10 txt-s txt-b hide"><i data-feather='check-square' class="feather-xsmall"></i></div>
</div>
@php $sr=1; @endphp
@foreach($data->where('course_id',$course->id)->sortBy('type') as $row)
<div class="frow tr border-bottom py-1">
   <div class="rw-10 txt-s">{{$sr++}}</div>
   <div class="rw-50 txt-s">{{$row->university}}</div>
   <div class="rw-10 txt-s">{{$row->city}}</div>
   <div class="rw-10 txt-s">{{$row->type}}</div>
   <div class="rw-10 txt-s">{{$row->fee}}</div>

   <div class="rw-10 txt-s hide"><input type="checkbox" name='chk' value="{{$row->id}}" onclick="updateChkCount()"></div>
</div>
@endforeach
@else
<div class="frow centered mt-4 p-2 border-top">No university offers this course</div>
@endif
@endforeach
@endsection
<!-- script goes here -->
@section('script')
<script lang="javascript">
// 


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

function updateChkCount() {
   var chkArray = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) chkArray.push(chk.value);
   })

   document.getElementById("chkCount").innerHTML = "+" + chkArray.length;
}
</script>
@endsection