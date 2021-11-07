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

<div class="fcol w-100 rw-100 p-4 bg-white rounded">
   <div class="frow w-100 rw-100">
      <div>
         <span class="txt-custom-blue txt-b border-bottom border-2">Search result</span>
      </div>
   </div>

   @if($universities->count()>0)

   <div class="frow p-1 mt-2 border-bottom tr txt-s txt-grey">
      <div class="w-10">Sr. </div>
      <div class="w-40"> Unviersity </div>
      <div class="w-20 text-right">Location</div>
      <div class="w-15 text-center">Type</div>
      <div class="w-15 text-right">Fee</div>
   </div>

   @php $sr=1; @endphp
   @foreach($universities as $university)

   <div class="frow p-1 border-bottom tr">
      <div class="w-10">{{$sr++}} </div>
      <div class="w-40"><a href="{{route('finduniversitiesbyname.show', $university->id)}}" class="text-primary"> {{$university->name}}</a></div>
      <div class="w-20 text-right"> {{$university->city->name}}</div>
      <div class="w-15 text-center">{{$university->type}}</div>
      <div class="w-15 text-right">fee</div>
   </div>
   @endforeach
   @else
   <!-- no country found -->
   <div class="frow w-100 rw-100 mt-2 txt-orange centered">
      Database has no matching record
   </div>
   @endif
</div>

@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">

</script>
@endsection