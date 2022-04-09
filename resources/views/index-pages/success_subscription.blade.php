@extends('layouts.index')

@section('header')
<section class="header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')
<div class="page-centered-msg">
   <i data-feather="smile" class="feather-large txt-skyblue"></i>
   <h2>Congratulation </h2>
   <div class="msg">You have successfully subscribed our newsletter </div>
   <div class="mt-3"><a href="{{url('/')}}" class="btn">Go back to main</a></div>

</div>
@endsection