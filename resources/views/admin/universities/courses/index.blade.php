@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Universities</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span>
      <a href="{{route('universities.index')}}">Universities </a> <span class="mx-1"> / </span> Create New
   </div>
</div>
@endsection
@section('page-content')

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

<div class="frow w-100 bg-custom-light p-4 rw-100 auto-col stretched">
   <div class="fcol w-72 rw-100 py-4 px-5 bg-white ">
      <div class="frow stretched mb-4">
         <div class="frow mid-left">
            <div class="txt-b txt-m txt-orange">List of Courses</div>
         </div>
         <a href="{{route('unicourses.create')}}">
            <div class="frow centered box-30 bg-orange circular txt-white hoverable">
               <i data-feather='plus' class="feather-xsmall"></i>
            </div>
         </a>
      </div>

      @if($university->faculties()->count()>0)
      @foreach($university->faculties() as $faculty)
      <div class="frow card my-2">
         <div class="card-header txt-b">
            {{$faculty->name}}
         </div>
         <div class="card-body px-5">
            @foreach($faculty->unicourses() as $unicourse)
            <div class="frow">
               <div class="fcol mid-left w-70">{{$unicourse->course->name}}</div>
               <div class="fcol mid-left w-20">{{$unicourse->fee}} k</div>
               <div class="fcol mid-right w-10">
                  <div class="frow stretched">
                     <div><a href="{{route('unicourses.edit',$unicourse)}}"> <i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div>
                     <div>
                        <form action="{{route('unicourses.destroy', $unicourse)}}" method="POST" id='deleteform{{$unicourse->id}}'>
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$unicourse->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
      @endforeach
      @else
      <div class="frow border-top centered txt-orange my-4">No course found</div>
      @endif
   </div>
   <!-- right hand profile bar -->
   <div class="fcol hw-25 bg-white p-4 rw-100">
      <x-university__profile :university=$university></x-university__profile>
   </div>
</div>

@endsection