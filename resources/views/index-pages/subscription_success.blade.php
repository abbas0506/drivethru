@extends('layouts.index')

@section('header')
<section class="header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')
<section class="signup-confirmation">
   <div class="msg-body">
      <div class="title">Congratulation</div>
      <div class="desc">You have successfully subscribed our newsletter </div>
      <div class="btn btn-red w-20"><a href="{{url('/')}}">Go to Main</a></div>

   </div>
</section>

@endsection