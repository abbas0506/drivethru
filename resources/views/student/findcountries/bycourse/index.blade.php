@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='findcountry'></x-student.sidebar>
@endsection

@section('page-title')
Find University - <span class="txt-12 px-2">search by course name</span>
@endsection

@section('content')
<ul class="page-nav">
   <li>
      <a href="{{route('findcountriesbycourse.index')}}">By Name</a>
   </li>
   <li class="active">By Course</li>
</ul>
<div class="bg-light p-4">

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

   <ul class="ml-3 txt-s txt-grey">
      <li>Select your field of interest</li>
      <li>Choose optional for advance search</li>
   </ul>

   <div class="mt-4">
      <form id='form' action="{{route('findcountriesbycourse_search')}}" method='get'>
         @csrf

         <!-- filed of interest -->

         <div class="fancyselect" id='fieldofinterest' class="mt-4">
            <select name='course_id' required>
               <option value="">Select a field</option>
               @foreach($courses as $course)
               <option value="{{$course->id}}">{{$course->name}}</option>
               @endforeach
            </select>
            <label>Field of Interest</label>
         </div>


         <div class="mt-4" id='optional'>
            <div class="frow txt-s txt-orange mb-2">
               <div><i data-feather='filter' class="feather-xsmall mr-2"></i></div>
               <div class="text-center">Advanced Search (optional)</div>
            </div>

            <div class="frow align-center rmb-2">
               <input type='checkbox' name='edufree' class="mr-2">
               Education - free
            </div>

            <div class="frow stretched mt-3 auto-col">
               <div class="fancyinput w-48 rmb-2">
                  <input type="number" name='minstudycost' placeholder="Min Study Cost">
                  <label for="">Min Study Cost ($)</label>
               </div>
               <div class="fancyinput w-48 rmb-2">
                  <input type="number" name='maxstudycost' placeholder="Max Study Cost">
                  <label for="">Max Study Cost ($)</label>
               </div>
            </div>
            <div class="frow stretched mt-3 auto-col">
               <div class="fancyinput w-48 rmb-2">
                  <input type="number" name='minlivingcost' placeholder="Min Living Cost">
                  <label for="">Minimum Living Cost ($)</label>
               </div>
               <div class="fancyinput w-48">
                  <input type="number" name='maxlivingcost' placeholder="Max Living Cost Fee">
                  <label for="">Maximum Living Cost ($)</label>
               </div>
            </div>
            <div class="frow justify-end mt-3">
               <button type='submit' class="btn btn-primary">Search</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection

@section('promotion')
<x-student.newspanel :advertisement="$advertisement"></x-student.newspanel>
@endsection