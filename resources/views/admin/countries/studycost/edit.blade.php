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
      <a href="{{route('countries.index')}}">Countries </a>
      <span class="mx-1"> / </span>
      <a href="{{route('countries.edit',$country)}}">{{$country->name}}</a>
      <span class="mx-1"> / </span>
      <a href="{{route('studycosts.index')}}">Study Cost</a><span class="mx-1"> / Edit </span>
   </div>
</div>
@endsection
@section('page-content')

<div class="container" style="width:60%">

   <form action="{{route('studycosts.update',$studycost)}}" method='post'>
      @csrf
      @method('PATCH')

      <div class="my-4">
         <span class="txt-l border-bottom border-thick border-info" style="border-width:3px!important;">
            {{$country->name}}
         </span>
      </div>

      <div class="fcol w-100 my-4">
         <div class="frow txt-m">{{$studycost->level->name}}</div>
      </div>
      <div class="frow stretched my-2">
         <div class="fancyinput w-48">
            <input type="number" name='minfee' placeholder="minimum cost" value='{{$studycost->minfee}}' required>
            <label>Min Cost</label>
         </div>
         <div class="fancyinput w-48">
            <input type="number" name='maxfee' placeholder="maximum cost" value='{{$studycost->maxfee}}' required>
            <label>Max Cost</label>
         </div>
      </div>
      <div class="frow mid-right my-5">
         <button type="submit" class="btn btn-success">Update</button>
      </div>
   </form>

</div>

@endsection