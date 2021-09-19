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
      <a href="{{route('faculties.index')}}">faculties </a><span class="mx-1"> / </span>
      edit
   </div>
</div>
@endsection
@section('page-content')

<div class="container-60">

   <form action="{{route('faculties.update',$faculty)}}" method='post'>
      @csrf
      @method('PATCH')

      <div class="fcol mt-5">
         <div class="fancyinput w-100 my-4">
            <input type="text" name='name' placeholder="faculty name" value='{{$faculty->name}}' required>
            <label>Faculty Name</label>
         </div>

         <div class="frow mid-right">
            <button type="submit" class="btn btn-success">Update</button>
         </div>
   </form>

</div>

@endsection