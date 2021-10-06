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
<div class="navitem txt-s active">Select Universities</div>
<div class="navitem txt-s"><a href="{{url('finalizeApplication')}}">Finalize Process</a></div>
<div class="navitem txt-s">Download Report</div>
@endsection

@section('graph')
Graph section
@endsection

@section('data')
@if($data->count()>0)
<div class="frow th border-bottom mt-3">
   <div class="rw-10 txt-s txt-b">Sr</div>
   <div class="rw-50 txt-s txt-b">University</div>
   <div class="rw-10 txt-s txt-b">Loc.</div>
   <div class="rw-10 txt-s txt-b">Type</div>
   <div class="rw-10 txt-s txt-b">Fee (k)</div>
   <div class="rw-10 txt-s txt-b"><i data-feather='check-square' class="feather-xsmall"></i></div>
</div>
@php $sr=1; @endphp


@foreach($data as $row)
<div class="frow tr border-bottom">
   <div class="rw-10 txt-s">{{$sr++}}</div>
   <div class="rw-50 txt-s">{{$row->university}}</div>
   <div class="rw-10 txt-s">{{$row->city}}</div>
   <div class="rw-10 txt-s">{{$row->type}}</div>
   <div class="rw-10 txt-s">{{$row->fee}}</div>

   <div class="rw-10 txt-s"><input type="checkbox" name='chk' value="{{$row->id}}" onclick="updateChkCount()"></div>
</div>
@endforeach
@else
<div class="frow centered mt-4 p-2 border-top">No university offers this course</div>
@endif
@endsection
<!-- script goes here -->
@section('script')
<script lang="javascript">
// 

function filter() {
   //read user input
   var name = $('#name').val().toLowerCase();
   var type = $('#type').val().toLowerCase();;
   var city = $('#city').val();
   if (city) city = $('#city option:selected').text().toLowerCase(); //if city not selected
   var fee = $('#fee').val();
   var minfee, maxfee, course_fee, highest = 10000;

   if (fee) {
      if (fee == 0) {
         minfee = 0;
         maxfee = 50;
      } else if (fee == 1) {
         minfee = 51;
         maxfee = 100;
      } else if (fee == 2) {
         minfee = 101;
         maxfee = 200;
      } else if (fee == 3) {
         minfee = 201;
         maxfee = 300;
      } else if (fee == 4) {
         minfee = 301;
         maxfee = 400;
      } else if (fee == 5) {
         minfee = 401;
         maxfee = 500;
      } else if (fee == 6) {
         minfee = 501;
         maxfee = 1000;
      } else {
         minfee = 1001;
         maxfee = highest;
      }
   } else { //if no fee selected 
      minfee = 0
      maxfee = highest
   }

   if (city) {
      $('.tr').each(function() {
         course_fee = Number($(this).children().eq(4).prop('outerText'));
         if (!(
               $(this).children().eq(1).prop('outerText').toLowerCase().includes(name) &&
               $(this).children().eq(2).prop('outerText').toLowerCase().includes(type) &&
               $(this).children().eq(3).prop('outerText').toLowerCase().includes(city) &&
               course_fee >= minfee &&
               course_fee < maxfee
            )) {
            $(this).addClass('hide');
         } else {
            $(this).removeClass('hide');
         }
      });
   } else {
      $('.tr').each(function() {
         course_fee = Number($(this).children().eq(4).prop('outerText'));
         if (!(
               $(this).children().eq(1).prop('outerText').toLowerCase().includes(name) &&
               $(this).children().eq(2).prop('outerText').toLowerCase().includes(type) &&
               course_fee >= minfee &&
               course_fee < maxfee

            )) {
            $(this).addClass('hide');
         } else {
            $(this).removeClass('hide');
         }
      });
   }

}

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

function loadUniversities() {
   $('form').submit();
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