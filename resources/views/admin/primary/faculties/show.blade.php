@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Faculties</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home</a> <span class="mx-1"> / </span>
      <a href="{{url('primary')}}">primary data </a> <span class="mx-1"> / </span>
      <a href="{{url('faculties')}}">faculties </a> <span class="mx-1"> / </span>
      {{$faculty->name}}
   </div>
</div>
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

<div class="container-75 mt-3">

   <div class="frow stretched bg-custom-light relative">
      <a href="{{route('faculties.index')}}">
         <div class="fcol centered circular-20 bg-orange border-0 absolute" style="top:10px; right:10px"><i data-feather='x' class="feather-xsmall mx-1 txt-white"></i></div>
      </a>
      <div class="fcol w-40 bg-light border top-left p-4">
         <div class="txt-l txt-center border-bottom">{{$faculty->name}}</div>

         <!-- Add New Section  -->
         <div class="mt-4 w-100" id='addsection'>
            <div class="txt-b txt-orange">Add New Course</div>
            <form action="{{route('courses.store')}}" method='post'>
               @csrf
               <input type="hidden" name='faculty_id' value="{{$faculty->id}}">
               <div class="fcol w-100 mt-3">
                  <div class="fancyinput w-100">
                     <input type="text" name='name' class='w-100' placeholder="Enter new course name" required>
                     <label for="Name">Course Name</label>
                  </div>
                  <div class="w-100 mt-3">
                     <button type="submit" class="btn btn-primary">Add New</button>
                  </div>
               </div>
            </form>
         </div>

      </div>
      <div class="fcol w-60 p-4">
         <!-- page content -->
         <div class="frow px-2 py-1 mb-2 txt-b txt-s border-bottom">
            <div class="fcol mid-left w-10">Sr </div>
            <div class="fcol mid-left w-90">Course Name </div>
         </div>
         @php $sr=1; @endphp
         @foreach($faculty->courses() as $course)
         <div class="frow px-2 my-2 txt-s tr">
            <div class="fcol mid-left w-10">{{$sr++}} </div>
            <div class="fcol mid-left w-80"> {{$course->name}} </div>
            <div class="fcol mid-right w-10">
               <div class="frow stretched">
                  <a href="{{route('courses.edit', $course)}}">
                     <i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue" onclick="editme('{{$course->id}}','{{$course->name}}')"></i>
                  </a>
                  <div>
                     <form action="{{route('courses.destroy',$course)}}" method="POST" id='del_form{{$sr}}'>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$sr}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>

</div>
@endsection