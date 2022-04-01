@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar></x-student.sidebar>
@endsection

@section('page-title')
Profile - <span class="txt-12 px-2">academic detail</span>
@endsection

@section('content')
<!-- create new acadmeic -->
<div class="page-centered w-50 bg-white p-4">
   <div class="frow stretched">
      <div class="frow txt-grey txt-m">
         <div class="txt-grey txt-m lh-40">Academic Detail</div>
         <a href="{{route('profiles.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall"></i>
            </div>
         </a>

         <a href="{{route('academics.create')}}" class="ml-3">
            <div class="fcol circular-25 border-0 bg-green centered">
               <i data-feather='plus' class="feather-xsmall txt-white"></i>
            </div>
         </a>
      </div>
   </div>

   <div class="frow txt-s txt-grey py-2 mt-3">
      <div class="w-10">Sr </div>
      <div class="w-20">Level</div>
      <div class="w-10 hide-sm">Pass Year</div>
      <div class="w-30">BISE/Uni</div>
      <div class="w-10 hide-sm">Roll No.</div>
      <div class="w-10">Marks</div>
      <div class="w-10 ">Actions</div>
   </div>

   @php $sr=1; @endphp
   @foreach($user->academics() as $academic)
   <div class="frow txt-s">
      <div class="w-10">{{$sr++}}. </div>
      <div class="w-20">{{$academic->level->name}}</div>
      <div class="w-10 hide-sm">{{$academic->passyear}}</div>
      <div class="w-30">{{$academic->biseuni}}</div>
      <div class="w-10 hide-sm">{{$academic->rollno}}</div>
      <div class="w-10">{{$academic->obtained}}/{{$academic->total}}</div>
      <div class="w-10">
         <div class="frow centered">
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