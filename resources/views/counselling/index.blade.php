@extends('layouts.dashboard')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-sidebar_national activeItem='counselling' :user="$user"></x-sidebar_national>
@endsection

@section('page-header')
<div class="fcol mt-3">
   <div class="frow w-100 pt-2 txt-m txt-b txt-custom-blue">Career Counselling</div>
   <div class="frow txt-s txt-grey">Book a free counseling session if u have any query about</div>
</div>

@endsection

@section('data')
<!-- create new acadmeic -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow my-4 mid-left fancy-search-grow">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
   </div>

   <div class="frow p-2 mt-2 border-bottom tr txt-grey">
      <div class="fcol mid-left w-10">Sr. </div>
      <div class="fcol mid-left w-70"> Paper </div>
      <div class="fcol centered w-20">Download</div>
   </div>

   @php $sr=1; @endphp


   <div class="frow p-2 border-bottom tr">
      <div class="fcol mid-left w-10"> </div>
      <div class="fcol mid-left w-70"> </div>
      <div class="fcol centered w-20">
         <a href="" target="_blank"><i data-feather='download' class="feather-xsmall mx-1 txt-orange"></i></a>
      </div>
   </div>

</div>


@endsection

@section('profile')
<x-profile__panel :user="$user"></x-profile__panel>
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