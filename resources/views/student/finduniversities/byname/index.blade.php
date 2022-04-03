@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='finduniversity'></x-student.sidebar>
@endsection

@section('page-title')
Find University - <span class="txt-12 px-2">search by name</span>
@endsection

@section('content')
<ul class="page-nav">
   <li class="active">By Name</li>
   <li>
      <a href="{{route('finduniversitiesbycourse.index')}}">By Course</a>
   </li>
</ul>
<!-- <div class="frow px-4 lh-40 mb-2 bg-light">
   <div class="frow btn-rounded-custom-orange centered txt-s mr-3"><i data-feather='check' class="feather-small mr-2"></i>By Name </div>
   <a href="{{route('finduniversitiesbycourse.index')}}">
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable">By Course</div>
   </a>
</div> -->
<div class="bg-light p-4">
   <ul class="ml-3 txt-grey">
      <li>Part of university name is also acceptable</li>
      <li>Capital or small letters will not affect search result</li>
   </ul>
   <div class="fancy-search-grow my-4">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative;top:5px; right:24px"></i>
   </div>

   <div class="">
      @if($universities->count()>0)
      <div class="frow p-1 mt-2 border-bottom border-silver tr txt-s txt-grey">
         <div class="w-10">Sr. </div>
         <div class="w-50"> University </div>
         <div class="w-20 text-right">Location </div>
         <div class="w-20 text-right">Type</div>
      </div>

      @php $sr=1; @endphp
      @foreach($universities as $university)

      <div class="frow p-1 border-bottom border-silver tr">
         <div class="w-10">{{$sr++}} </div>
         <div class="w-50"><a href="{{route('finduniversitiesbyname.show', $university->id)}}" class="text-primary"> {{$university->name}}</a></div>
         <div class="w-20 text-right txt-s"> {{$university->city->name}} </div>
         <div class="w-20 text-right txt-s">{{$university->type}}</div>
      </div>
      @endforeach
      @else
      <!-- no university found -->
      <div class="frow w-100 rw-100 mt-2 txt-orange centered">
         Database is empty
      </div>
      @endif
   </div>
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