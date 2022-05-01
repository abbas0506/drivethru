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
<div class="bg-light p-4">
   <ul class="ml-3 txt-s txt-grey">
      <li>Part of university name is also acceptable</li>
      <li>Capital or small letters will not affect search result</li>
   </ul>
   <div class="fancy-search-grow my-4">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative;top:5px; right:24px"></i>
   </div>

   <div>
      @if($universities->count()>0)
      <div class="frow p-1 mt-2 border-bottom border-silver tr txt-s txt-grey">
         <div class="w-10">Sr. </div>
         <div class="w-50"> University </div>
         <div class="w-20">Location </div>
         <div class="w-20 txt-center">Type</div>
      </div>

      @php $sr=1; @endphp
      @foreach($universities as $university)

      <div class="frow txt-s p-1 lh-30 border-bottom border-silver tr">
         <div class="w-10">{{$sr++}} </div>
         <div class="w-50 txt-red"><a href="{{route('finduniversitiesbyname.show', $university->id)}}"> {{$university->name}}</a></div>
         <div class="w-20"> {{$university->city->name}} </div>
         <div class="w-20 txt-center">{{$university->type}}</div>
      </div>
      @endforeach
      @else
      <!-- no university found -->
      <div class="txt-red txt-center mt-2">
         Database is empty
      </div>
      @endif
   </div>
</div>

@endsection

@section('promotion')
<div class="mt-4">
   <x-student.newspanel :advertisement="$advertisement"></x-student.newspanel>
</div>

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
         $(this).addClass('hidden');
      } else {
         $(this).removeClass('hidden');
      }
   });
}
</script>
@endsection