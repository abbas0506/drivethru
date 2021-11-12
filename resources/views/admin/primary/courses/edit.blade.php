@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Faculties</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a><span class="mx-1"> / </span>
      <a href="{{url('primary')}}">primary data</a><span class="mx-1"> / </span>
      <a href="{{route('faculties.index')}}">Faculties </a><span class="mx-1"> / </span>
      {{$course->faculty->name}}
   </div>
</div>
@endsection
@section('page-content')

<div class="container-60">
   <div class="w-100 bg-light px-4 pb-2 my-4 border-left border-2 border-success">
      <div class="txt-b txt-orange">{{$course->faculty->name}}</div>
      <div class="txt-s txt-grey">Edit course name</div>
   </div>
   <form action="{{route('courses.update',$course)}}" method='post'>
      @csrf
      @method('PATCH')
      <div class="fancyinput my-4 w-100">
         <input type="text" name='name' placeholder="course name" value='{{$course->name}}' required>
         <label for="Name">Course Name</label>
      </div>
      <div class="frow mid-right">
         <button type="submit" class="btn btn-success">Update</button>
      </div>
   </form>
</div>

@endsection