@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='counselling'></x-student.sidebar>
@endsection

@section('page-title')
Career Counselling - <span class="txt-12 px-2">recent activity</span>
@endsection

@section('content')

<!-- counselling success -->
<div class="page-centered w-70 txt-j">
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