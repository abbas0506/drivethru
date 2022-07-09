@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='findcountry'></x-student.sidebar>
@endsection

@section('page-title')
Find Country - <span class="txt-12 px-2">search by name</span>
@endsection

@section('content')
<ul class="page-nav">
   <li class="active">By Name</li>
   <li>
      <a href="{{route('findcountriesbycourse.index')}}">By Course</a>
   </li>
</ul>
<div class="bg-light p-4 border">
   <ul class="ml-3 txt-s txt-grey">
      <li>Part of country name is also acceptable</li>
      <li>Capital or small letters will not affect search result</li>
   </ul>
   <div class="fancy-search-grow my-4">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative;top:5px; right:24px"></i>
   </div>

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

   <div class="">
      @if($countries->count()>0)
      <div class="frow lh-30 mt-2 border-bottom border-silver tr txt-s txt-grey">
         <div class="w-10">Sr. </div>
         <div class="w-50"> Country </div>
         <div class="w-20 text-right flex-grow">Study Cost (<i data-feather='dollar-sign' class="feather-xsmall"></i>)</div>
         <div class="w-20 text-right rhide">Living Cost (<i data-feather='dollar-sign' class="feather-xsmall"></i>)</div>
      </div>

      @php $sr=1; @endphp
      @foreach($countries as $country)

      <div class="frow lh-30 border-bottom border-silver tr">
         <div class="w-10 txt-s">{{$sr++}} </div>
         <div class="w-50 txt-red"><a href="{{route('findcountriesbyname.show', $country->id)}}"> {{$country->name}}</a></div>
         <div class="w-20 text-right txt-s flex-grow"> {{$country->studycost()}} </div>
         <div class="w-20 text-right txt-s rhide">{{$country->livingcost()}}</div>
      </div>
      @endforeach
      @else
      <!-- no country found -->
      <div class="frow w-100 rw-100 mt-2 txt-orange centered">
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