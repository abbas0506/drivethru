@extends('layouts.simple')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='counselling' :user="$user"></x-user__sidebar>
@endsection

@section('data')
<!-- counselling success -->
<div class="fcol w-70 rw-80 h-90 centered text-justify">
   <div class="txt-custom-blue mb-2"><i data-feather='smile' class="feather-large mx-1 txt-custom-blue"></i></div>
   <div class="txt-custom-blue txt-l txt-b mb-4">Hi!</div>
   <div class="mb-2 txt-m text-justify">
      Thanks for reaching out!.
      Our support represetatives will soon check your message and will respond to you as soon as possible.
      We shall get back to you within few hours.
   </div>
   <div class="txt-b txt-m mt-3">Regards</div>
   <div class="txt-b txt-m mt-1">Team DriveThru</div>

   <div class="border-top mt-3 pt-2 "><a class='btn btn-primary' href="{{route('counselling.show',$counselling)}}">Ok, I Got</a></div>
</div>

@endsection