@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Courses</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a><span class="mx-1"> / </span>
      <a href="{{url('primary')}}">primary data</a><span class="mx-1"> / </span>
      <a href="{{route('courses.index')}}">courses </a><span class="mx-1"> / </span>
      edit
   </div>
</div>
@endsection
@section('page-content')

<div class="container-60">

   <form action="{{route('courses.update',$course)}}" method='post'>
      @csrf
      @method('PATCH')
      <div class="fcol my-5">
         <div class="fancyselect my-2 w-100">
            <select name="faculty_id">
               @foreach($faculties as $faculty)
               <option value="{{$faculty->id}}" @if($faculty->id==$course->faculty_id) selected @endif>{{$faculty->name}}</option>
               @endforeach
            </select>
            <label for="Name">Faculty</label>
         </div>
         <div class="fancyselect my-2 w-100">
            <select name="level_id" id='edit_level_id'>
               @foreach($levels as $level)
               <option value="{{$level->id}}" @if($level->id==$course->level_id) selected @endif>{{$level->name}}</option>
               @endforeach
            </select>
            <label for="Name">Level</label>
         </div>
         <div class="fancyinput my-2 w-100">
            <input type="text" name='name' placeholder="course name" value='{{$course->name}}' required>
            <label for="Name">Course Name</label>
         </div>
      </div>
      <div class="frow mid-right my-5">
         <button type="submit" class="btn btn-success">Update</button>
      </div>
   </form>


</div>

@endsection