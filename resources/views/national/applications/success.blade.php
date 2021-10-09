@extends('layouts.student')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@section('sidebar')
<x-sidebar_national activeItem='findUni'></x-sidebar_national>
@endsection

@section('page-title')
Success
@endsection

@section('page-navbar')
<div class="navitem txt-s">Set Preference</div>
<div class="navitem txt-s">Get Report / Apply</div>
<div class="navitem txt-s active">3-Apply</div>
@endsection


@section('data')
<div class="frow centered hw-100 mt-5">
   <div class="fcol centered">
      <div class="txt-blue txt-m">Congratulations</div>
      <div class="">You have successfully applied for the selected courses. Your application ID is {{$application->id}}</div>
      <div class=""><a class='btn btn-primary' href="{{route('finduniversity.index')}}">Finish</a></div>
   </div>
</div>

@endsection