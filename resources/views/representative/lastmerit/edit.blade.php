@extends('layouts.representative')

@section('page-content')
<section class='page-content'>
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

   <div class='w-60 mx-auto txt-l my-5 '> <span class="lnr lnr-graduation-hat mr-3"></span> Last Merit - <span class="txt-s">{{$unicourse->university->name}} - {{$unicourse->course->name}} - edit</span></div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('closing.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul>
            <li>Be wise while updating last merit of the course</li>
            <li>System applies no cross checking on the merit score</li>
         </ul>
      </div>

      <div class="my-3">

         <form action="{{route('lastmerit.update',$unicourse)}}" method='post'>
            @csrf
            @method('PATCH')
            <div class="fcol">
               <div class="fancyinput mt-3 w-100">
                  <input type='text' name='lastmerit' placeholder="Last Merit e.g 54.3" required value='{{$unicourse->lastmerit}}' pattern="[0-9.]+">
                  <label>Last Merit </label>
               </div>

               <div class="frow mid-right mt-3">
                  <button type="submit" class="btn btn-success">Update</button>
               </div>
         </form>
      </div>

      @endsection