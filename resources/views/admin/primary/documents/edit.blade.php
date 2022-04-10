@extends('layouts.admin')

@section('header')
<x-admin.header></x-admin.header>
@endsection

@section('page-content')
<section class="page-content">
   <div class="w-60 mx-auto mt-5">
      <div class='txt-l my-4'>Visa Documents <span class="txt-m ml-2"> - edit</span> </div>
      <form action="{{route('documents.update',$document)}}" method='post'>
         @csrf
         @method('PATCH')

         <div class="fcol mt-5">
            <div class="fancyinput w-100 my-4">
               <input type="text" name='name' placeholder="document name" value='{{$document->name}}' required>
               <label>Document Name</label>
            </div>

            <div class="frow mid-right">
               <button type="submit" class="btn btn-success">Update</button>
            </div>
      </form>
   </div>
</section>
@endsection