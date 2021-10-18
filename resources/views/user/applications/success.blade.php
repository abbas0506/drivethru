@extends('layouts.main')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='findUni' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
Success
@endsection

@section('page-navbar')
<x-finduni__navbar activeItem='apply'></x-finduni__navbar>
@endsection


@section('data')
<div class="frow centered hw-100 mt-5">
   <div class="fcol w-80 rw-80 centered">
      <div class="txt-blue txt-m">Congratulations</div>
      <div class="mt-1 text-justify">You have successfully applied for the selected courses. Your application ID is {{$application->id}}.
         For further processing, you need to pay {{$application->charges}} as processing charges. Feel free to choose any payment option like Jazzcash, Easypaisa, Online banking, manual etc. </div>
      <div class="mt-2"><a class='btn btn-primary' href="{{url('user_dashboard')}}">Ok</a></div>
   </div>
</div>

@endsection