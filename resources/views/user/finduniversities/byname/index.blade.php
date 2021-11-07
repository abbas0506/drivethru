@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='finduniversity' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">Find University</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-finduniversity__navbar activeItem='find'></x-finduniversity__navbar>
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

<div class="frow my-2">
   <div class="frow btn-rounded-custom-orange centered px-3 txt-s mr-3"><i data-feather='check' class="feather-small mr-2"></i>By Name </div>
   <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable ">By Course</div>
</div>

<form id='form' action="{{route('finduniversitiesbyname_fetch')}}" method='get'>
   @csrf
   <div class="bg-light p-4 rounded mb-3">
      <div class="fcol txt-grey w-100 rw-100 mt-2">
         <ul class="">
            <li>Part of university name is also acceptable</li>
         </ul>
      </div>
      <div class="frow w-100 rw-100 stretched">
         <div class="frow w-100 mid-left fancy-search-grow" id='searchinput'>
            <input type="text" name='name' placeholder="Type university name" oninput="search(event)" style='width:80%!important; margin-left:20px' required>
            <i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
         </div>
         <div class=""><button type='submit' class="btn btn-sm btn-primary">Search</button></div>
      </div>
   </div>
</form>
@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">

</script>
@endsection