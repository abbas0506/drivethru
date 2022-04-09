@extends('layouts.index')

@section('header')
<section class="header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')

<div class="page-centered-msg">
   <h2>Thanks for reaching out!.</h2>
   <div class="msg">Our support represetatives will soon check your message and will respond to you as soon as possible.<br>
      We shall get back to you within few hours. </div>
   <div class="mt-3"><a href="{{url('/')}}" class="btn">Go back to main</a></div>
</div>

@endsection