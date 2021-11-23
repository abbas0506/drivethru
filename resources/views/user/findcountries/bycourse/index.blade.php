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
   <x-findcountrybycourse__navbar activeItem='find'></x-findcountrybycourse__navbar>
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

<div class="frow txt-m py-3 px-4 mb-2 bg-light">
   <a href="{{route('findcountriesbyname.index')}}">
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable mr-3" onclick="toggleMe()">By Name</div>
   </a>
   <div class="frow btn-rounded-custom-orange centered px-3 txt-s"><i data-feather='check' class="feather-small mr-2"></i>By Course</div>
</div>
<div>
   <form id='form' action="{{route('findcountriesbycourse_search')}}" method='get'>
      @csrf
      <div class="bg-light p-4 rounded">
         <!-- filed of interest -->
         <div class="frow mid-left mt-4 mb-2 auto-col">
            <div class="fancyselect w-100 rw-100" id='fieldofinterest'>
               <select name='course_id' required>
                  <option value="">Select a field</option>
                  @foreach($courses as $course)
                  <option value="{{$course->id}}">{{$course->name}}</option>
                  @endforeach
               </select>
               <label>Field of Interest</label>
            </div>
         </div>
      </div>
      <div class="bg-light mt-3 p-4 rounded" id='optional'>
         <div class="frow txt-s txt-orange mb-2">
            <div><i data-feather='filter' class="feather-xsmall mr-2"></i></div>
            <div class="text-center">Advanced Search (optional)</div>
         </div>

         <div class="frow stretched mt-3 auto-col">
            <div class="frow mid-left w-100 rw-100 rmb-2">
               <input type='checkbox' name='edufree' class="mr-2">
               Filter only those countries where education is free
            </div>
         </div>
         <div class="frow stretched mt-3 auto-col">
            <div class="fancyinput w-48 rw-100 rmb-2">
               <input type="number" name='minstudycost' placeholder="Min Study Cost">
               <label for="">Min Study Cost ($)</label>
            </div>
            <div class="fancyinput w-48 rw-100 rmb-2">
               <input type="number" name='maxstudycost' placeholder="Max Study Cost">
               <label for="">Max Study Cost ($)</label>
            </div>
         </div>
         <div class="frow stretched mt-3 auto-col">
            <div class="fancyinput w-48 rw-100 rmb-2">
               <input type="number" name='minlivingcost' placeholder="Min Living Cost">
               <label for="">Minimum Living Cost ($)</label>
            </div>
            <div class="fancyinput w-48 rw-100">
               <input type="number" name='maxlivingcost' placeholder="Max Living Cost Fee">
               <label for="">Maximum Living Cost ($)</label>
            </div>
         </div>
         <div class="frow mid-right mt-3">
            <button type='submit' class="btn btn-primary">Search</button>
         </div>
      </div>
   </form>
</div>
@endsection

@section('social')
<x-sidebar__news></x-sidebar__news>
@endsection