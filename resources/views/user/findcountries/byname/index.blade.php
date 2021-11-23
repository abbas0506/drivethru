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
<div class="page-title">Find Country</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-findcountrybyname__navbar activeItem='find'></x-findcountrybyname__navbar>
</div>
@endsection

@section('graph')

@endsection


@section('data')

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

<div class="frow border py-3 px-4 mb-2">
   <div class="frow btn-rounded-custom-orange centered px-3 txt-s mr-3"><i data-feather='check' class="feather-small mr-2"></i>By Name </div>
   <a href="{{route('findcountriesbycourse.index')}}">
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable" onclick="toggleMe()">By Course</div>
   </a>
</div>
<div class="fcol my-2 p-4 mid-left bg-light">
   <ul>
      <li>Part of country name is also acceptable</li>
      <li>Capital or small letters will not affect search result</li>
   </ul>
   <div class="frow w-100 fancy-search-grow bg-light ml-4">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; top:7px;right:24px"></i>
   </div>
</div>

<div class="my-2 w-100 rw-100 bg-light p-4">
   @if($countries->count()>0)
   <div class="frow p-1 mt-2 border-bottom tr txt-s txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-50"> Country </div>
      <div class="w-20 text-right">Study Cost (<i data-feather='dollar-sign' class="feather-xsmall"></i>)</div>
      <div class="w-20 text-right">Living Cost (<i data-feather='dollar-sign' class="feather-xsmall"></i>)</div>
   </div>

   @php $sr=1; @endphp
   @foreach($countries as $country)

   <div class="frow p-1 border-bottom tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-50"><a href="{{route('findcountriesbyname.show', $country->id)}}" class="text-primary"> {{$country->name}}</a></div>
      <div class="w-20 text-right txt-s"> {{$country->studycost()}} </div>
      <div class="w-20 text-right txt-s">{{$country->livingcost()}}</div>
   </div>
   @endforeach
   @else
   <!-- no country found -->
   <div class="frow w-100 rw-100 mt-2 txt-orange centered">
      Database is empty
   </div>
   @endif
</div>

@endsection

@section('social')
<x-sidebar__news></x-sidebar__news>
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