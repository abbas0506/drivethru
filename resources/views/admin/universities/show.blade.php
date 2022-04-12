@extends('layouts.admin')
@section('header')
<x-admin.header></x-admin.header>
@endsection
@section('page-content')
<!-- display record save, del, update message if any -->
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
<section class="page-content">
   <div class='w-70 mx-auto txt-l my-5 '>Universities <span class="txt-s ml-2"> - {{$university->name}} </span> </div>
   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-university__profile :university=$university></x-university__profile>
      </div>
      <div class="w-70 py-4 px-5 bg-white border relative">
         <a href="{{route('universities.edit', $university)}}">
            <div class="top-right-icon circular-20">
               <i data-feather='edit-2' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b txt-m">Basic Profile </div>
         <div class="frow mt-3">
            <div class="w-20 txt-b">Name:</div>
            <div class="">{{$university->name}}</div>
         </div>
         <div class="frow mt-3">
            <div class="w-20 txt-b">City:</div>
            <div class="">{{$university->city->name}}</div>
         </div>
         <div class="frow mt-3">
            <div class="w-20 txt-b">Type</div>
            <div class="">{{$university->type}}</div>
         </div>
         <div class="frow mt-3">
            <div class="w-20 txt-b">Rank:</div>
            <div class="">{{$university->rank}}</div>
         </div>

      </div>
   </div>
</section>
@endsection