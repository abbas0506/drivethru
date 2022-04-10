@extends('layouts.admin')

@section('header')
<x-admin.header></x-admin.header>
@endsection

@section('page-content')
<section class="page-content">
   <div class="w-60 mx-auto mt-5">
      <div class='txt-l my-5'>Faculties <span class="txt-m ml-2"> - {{$course->faculty->name}} - course edit</span> </div>
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
</section>
@endsection