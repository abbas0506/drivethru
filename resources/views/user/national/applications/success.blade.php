@extends('layouts.simple')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
@if(session('mode')==0)
<x-user__sidebar activeItem='finduniversity' :user="$user"></x-user__sidebar>
@else
<x-user__sidebar activeItem='findcountry' :user="$user"></x-user__sidebar>
@endif
@endsection

@section('data')
<div class="fcol w-70 rw-80 h-90 centered text-justify">
   <div class="mb-2"><i data-feather='smile' class="feather-large mx-1 txt-orange"></i></div>
   <div class="txt-custom-blue txt-l txt-b mb-4">Congratulation!</div>
   <div class="mb-2 text-justify"><u><strong> Your application No. {{$application->id}} has been successfully submitted.</strong></u>
      For further processing, you need to pay {{$application->charges}} as processing charges.
      Feel free to choose any payment option like JazzCash, Easypaisa, Online Banking, Manual Deposit etc.
   </div>
   <div><a class='btn btn-primary' href="{{url('user_dashboard')}}">Ok, I Got</a></div>
</div>
@endsection