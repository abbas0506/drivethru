@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('/admin')}}">Home </a>
      <span class="mx-1"> / </span>
      <a href="{{route('countries.index')}}">countries </a>
      <span class="mx-1"> / </span>
      <a href="{{route('countries.edit',$country)}}">{{$country->name}}</a>
      <span class="mx-1"> / </span>
      <a href="{{route('livingcosts.index')}}">living cost</a><span class="mx-1"> / edit </span>
   </div>
</div>
@endsection
@section('page-content')

<div class="container-60">

   <form action="{{route('livingcosts.update',$livingcost)}}" method='post'>
      @csrf
      @method('PATCH')

      <div class="my-4">
         <span class="txt-l border-bottom border-thick border-info" style="border-width:3px!important;">
            {{$country->name}}
         </span>
      </div>

      <div class="fcol w-100 my-4">
         <div class="frow txt-m">{{$livingcost->expensetype->name}}</div>
      </div>
      <div class="frow stretched my-2">
         <div class="fancyinput w-48">
            <input type="number" name='minexp' placeholder="minimum cost" value='{{$livingcost->minexp}}' required>
            <label>Min Cost (k)</label>
         </div>
         <div class="fancyinput w-48">
            <input type="number" name='maxexp' placeholder="maximum cost" value='{{$livingcost->maxexp}}' required>
            <label>Max Cost (k)</label>
         </div>
      </div>
      <div class="frow mid-right my-5">
         <button type="submit" class="btn btn-success">Update</button>
      </div>
   </form>

</div>

@endsection