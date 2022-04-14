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

   <div class='w-60 mx-auto txt-l my-5 '> <span class="lnr lnr-calendar-full mr-3"></span> Closing Date - <span class="txt-s">{{$unicourse->university->name}} - {{$unicourse->course->name}} - edit</span></div>
   <div class="w-60 mx-auto">
      <div class="txt-b">Instructions:</div>
      <ul>
         <li>Be wise while setting closing date of the course</li>
         <li>System applies no cross checking on the said date</li>
      </ul>
      <div class="frow w-30 fancy-search-grow bg-light relative">
         <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; top:7px;left:12px"></i>
      </div>

      <div class="my-2">

         <form action="{{route('closing.update',$unicourse)}}" method='post'>
            @csrf
            @method('PATCH')
            <div class="fcol">
               <div class="fancyinput mt-3 w-100">
                  <input type='date' name='closing' placeholder="Closing date" required value='{{$unicourse->closing}}'>
                  <label>Closing </label>
               </div>

               <div class="frow mid-right mt-3">
                  <button type="submit" class="btn btn-success">Update</button>
               </div>
         </form>
      </div>

      @endsection