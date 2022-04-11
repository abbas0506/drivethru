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
   <div class='w-70 mx-auto txt-l my-5 '>National Universities <span class="txt-s ml-2"> - {{$university->name}} - edit course </span> </div>

   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-university__profile :university=$university></x-university__profile>
      </div>

      <div class="fcol w-60 p-4 border relative">
         <div class="frow stretched">
            <div class="frow txt-m txt-orange">Edit Course</div>
            <a href="{{route('unicourses.index')}}">
               <div class="top-right-icon circular-20">
                  <i data-feather='x' class="feather-xsmall mb-1"></i>
               </div>
            </a>
         </div>

         <!-- data form -->


         <form action="{{route('unicourses.update',$unicourse)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="frow h5 my-4 border-left border-info pl-2" style='border-width:5px !important'>{{$unicourse->course->name}}</div>
            <div class="frow my-3 stretched">
               <div class="fcol w-15">
                  <div class="fancyinput w-100">
                     <input type="number" name='duration' min=0 max=20 placeholder="Duration" value='{{$unicourse->duration}}' required>
                     <label>Duration</label>
                  </div>
               </div>
               <div class="fcol w-20">
                  <div class="fancyinput w-100">
                     <input type="number" name='fee' min=0 max='10000' placeholder="Fee" value='{{$unicourse->fee}}' required>
                     <label>Fee ($)</label>
                  </div>
               </div>
               <div class="fancyinput w-60 rw-100">
                  <input type="text" name='criteria' placeholder="Criteria" value='{{$unicourse->criteria}}' required>
                  <label>Criteria</label>
               </div>
            </div>


            <div class="fancyinput my-3 w-100">
               <input type="text" name='requirement' placeholder="Requirment" value='{{$unicourse->requirement}}' required>
               <label>Requirements</label>
            </div>
            <div class="frow mid-right my-4">
               <button type="submit" class="btn btn-success">Update</button>
            </div>
         </form>
      </div>
   </div>
</section>
@endsection