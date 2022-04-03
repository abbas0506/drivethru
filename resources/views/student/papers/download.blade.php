@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='pastpapers'></x-student.sidebar>
@endsection

@section('page-title')
Past Papers - <span class="txt-12 px-2">download</span>
@endsection
@section('content')
<!-- create new acadmeic -->
<div class="bg-white p-4">
   <div class="frow my-3 fancy-search-grow">
      <input type="text" placeholder="Search" oninput="search(event)">
      <i data-feather='search' class="feather-small" style="position:relative; right:24; top:8px"></i>
   </div>

   <div class="frow p-2 mt-2 border-bottom border-silver tr txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-70"> Paper </div>
      <div class="w-20 txt-center">Download</div>
   </div>

   @php $sr=1; @endphp
   @foreach($papers as $paper)

   <div class="frow p-2 border-bottom border-silver tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-70"> {{$paper->papertype->name}} - {{$paper->year}} </div>
      <div class="w-20 txt-center">
         <a href="{{$paper->url}}" target="_blank"><i data-feather='download' class="feather-xsmall mx-1 txt-orange"></i></a>
      </div>
   </div>
   @endforeach
</div>
@endsection

@section('promotion')
<x-student.newspanel></x-student.newspanel>
@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">
function search(event) {
   var searchtext = event.target.value.toLowerCase();
   var str = 0;
   $('.tr').each(function() {
      if (!(
            $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext)
         )) {
         $(this).addClass('hide');
      } else {
         $(this).removeClass('hide');
      }
   });
}
</script>
@endsection