@extends('layouts.admin')
@section('header')

<style>
.bg-page-banner {
   background-image: url("{{asset('images/banner/1.jpg')}}");
   background-size: 100% 100%;
   /* background-repeat: no-repeat; */
}
</style>


<div class="fcol w-100 bg-page-banner top-mid">
   <div class="w-100">
      <x-representative__header></x-representative__header>
   </div>
   <div class="container">
      <div class="fcol h-90 w-100 centered">
         <div class="display-4 txt-b txt-orange ">Representative Panel</div>
         <div class="txt-m txt-j txt-white">--</div>

      </div>
   </div>

</div>
@endsection