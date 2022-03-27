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
      <div class="desc">You have successfully created an account with DriveThru family where you'll find simple one step solution for all of your higher education requirements in national as well as inernational universities from education couselling to vetted admission process. </div>
      <div class="btn-red w-20"><a href="{{url('signin')}}">Sign In Now</a></div>

   </div>

   <!-- <div class="copyright">
      ALL RIGHTS RESERVED &copy; COPY RIGHTS 2021 <span class="txt-skyblue">PRIVACY POLICY </span>
   </div> -->
</section>

@endsection