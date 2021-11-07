@extends('layouts.dashboard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='dashboard' :user="$user"></x-user__sidebar>
@endsection

@section('page-header')
<div class="frow w-100 p-4 txt-m txt-b txt-custom-blue" style='border-radius:5px'>{{$user->name}}!</div>
@endsection

@section('data')
<!-- create new acadmeic -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="frow txt-grey txt-m mid-left">
         <div class="mr-2">Acadmeic Detail</div>
         <a href="{{route('academics.create')}}">
            <div class="fcol centered btn-rounded-custom-blue px-2 txt-s">+ Add New</div>
         </a>
      </div>
      <div class="frow txt-s centered">
         <a href="{{route('profiles.index')}}">
            <div class="fcol circular-25 border-0 bg-green centered">
               <i data-feather='arrow-left' class="feather-xsmall txt-white"></i>
            </div>
         </a>
         <div class="ml-2 txt-grey">Back</div>
      </div>
   </div>

   <div class="frow w-100 rw-100 txt-s txt-smoke py-2 mt-3">
      <div class="w-5">Sr </div>
      <div class="w-20">Level</div>
      <div class="w-10">Pass Year</div>
      <div class="w-30">BISE/Uni</div>
      <div class="w-10">Roll No.</div>
      <div class="w-15">Marks</div>
      <div class="w-10 ">Actions</div>
   </div>

   @php $sr=1; @endphp
   @foreach($user->academics() as $academic)
   <div class="frow w-100 rw-100 txt-s">
      <div class="w-5">{{$sr++}}. </div>
      <div class="w-20">{{$academic->level->name}}</div>
      <div class="w-10">{{$academic->passyear}}</div>
      <div class="w-30">{{$academic->biseuni}}</div>
      <div class="w-10">{{$academic->rollno}}</div>
      <div class="w-15">{{$academic->obtained}}/{{$academic->total}}</div>
      <div class="w-10 text-center">
         <div class="frow">
            <a href="{{route('academics.edit',$academic)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a>
            <div>
               <form action="{{route('academics.destroy',$academic)}}" method="POST" id='del_form{{$sr}}'>
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



@endsection

@section('profile')
<x-profile__strength :user="$user"></x-profile__strength>
@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">

</script>
@endsection