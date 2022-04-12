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
   <div class='w-70 mx-auto txt-l my-5 '>National Universities <span class="txt-s ml-2"> - {{$university->name}} -courses </span> </div>

   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-university__profile :university=$university></x-university__profile>
      </div>
      <div class="w-70 p-4 border">
         <div class="frow mb-4">
            <div class="txt-b txt-m txt-orange mr-3">List of Courses</div>
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
   </div>
</section>
@endsection