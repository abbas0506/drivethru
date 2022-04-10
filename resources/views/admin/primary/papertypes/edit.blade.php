@extends('layouts.admin')

@section('header')
<x-admin.header></x-admin.header>
@endsection

@section('page-content')
<section class="page-content">

   <div class="w-60 mx-auto mt-5">
      <div class='txt-l my-4'>Cities <span class="txt-m ml-2"> - edit</span> </div>
      <form action="{{route('papertypes.update',$papertype)}}" method='post'>
         @csrf
         @method('PATCH')

         <div class="fcol mt-5">
            <div class="fancyinput w-100 my-4">
               <input type="text" name='name' placeholder="paper type" value='{{$papertype->name}}' required>
               <label>Paper Type</label>
            </div>

            <div class="frow mid-right">
               <button type="submit" class="btn btn-success">Update</button>
            </div>
      </form>

   </div>
</section>
@endsection