@extends('layouts.index')

@section('header')
<section class="header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')

<div class="page-centered-msg">
   <h2>Congratulation</h2>
   <div class="msg">You have successfully created an account with DriveThru family where you'll find simple one step solution for all of your higher education requirements in national as well as inernational universities from education couselling to vetted admission process. </div>
   <div class="mt-3"><a href="{{url('signin')}}" class="btn">Sign In Now</a></div>
</div>

@endsection