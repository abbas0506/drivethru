@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='findcountry' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
Find Country
@endsection

@section('page-navbar')

<x-findcountry__navbar activeItem='preference'></x-findcountry__navbar>

@endsection

@section('graph')

@endsection
@section('data')
<!-- create new acadmeic -->
<div class="fcol w-100 rw-100 bg-white p-4">
   @if($data->count()>0)
   <div class="frow my-4 mid-left fancy-search-grow">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
   </div>
   <div class="frow p-2 mt-2 border-bottom tr txt-grey">
      <div class="fcol mid-left w-10">Sr. </div>
      <div class="fcol mid-left w-70"> Country </div>
      <div class="fcol centered w-20">Download</div>
   </div>

   @php $sr=1; @endphp
   @foreach($data as $row)

   <div class="frow p-2 border-bottom tr">
      <div class="fcol mid-left w-10">{{$sr++}} </div>
      <div class="fcol mid-left w-70"> {{$row->country}}</div>
      <div class="fcol centered w-20">
         <a href="#" target="_blank"><i data-feather='download' class="feather-xsmall mx-1 txt-orange"></i></a>
      </div>
   </div>
   @endforeach
   @else
   <!-- no country found -->
   <div class="frow w-100 rw-100">
      <span class="txt-custom-blue border-bottom border-2">Search result for <b>{{$country}}</b></span>
   </div>
   <div class="frow w-100 rw-100 mt-2 txt-orange centered">
      No such country found in database
   </div>
   @endif
</div>

@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">
$('#optional').collapse('show')
$("#mode").change(function() {
   $('#searchinput').toggleClass('hide');
   $('#fieldofinterest').toggleClass('hide');
   if ($(this).prop('checked')) {
      $('#optional').collapse('hide')

   } else {
      $('#optional').collapse('show')
   }
});
</script>
@endsection