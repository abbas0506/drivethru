@extends('layouts.student')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-sidebar_national activeItem='applications' :user="$user"></x-sidebar_national>
@endsection

@section('page-title')
Application ({{$application->id}})
@endsection


@section('page-navbar')
<div class="frow txt-s">Created at {{$application->created_at}}</div>
@endsection

@section('graph')
<div class="frow">
   <div class="frow txt-xl txt-b centered txt-orange">{{$application->universities()->count()}}<i data-feather='dollar-sign' class="feather-small txt-orange"></i> </div>
   @if(!$application->ispaid)
   <div class="fcol centered ml-2 p-2 txt-s btn btn-sm btn-info"> Pay</div>
   @else
   <div class="fcol centered ml-2 txt-s">(paid)</div>
   @endif
</div>

@endsection
@section('data')
<div class="bg-light p-4">
   <div class="frow mid-left border-bottom txt-s txt-b stretched">
      <div>University</div>
      <div>Charges</div>
   </div>
   @foreach($application->universities() as $university)
   <div class="fcol border-bottom w-100 rw-100 py-2">
      <div class="frow stretched  w-100 rw-100">
         <div>{{$university->name}}</div>
         <div>1<i data-feather='dollar-sign' class="feather-xsmall"></i></div>
      </div>
      @foreach($application->appdetails()->where('university_id',$university->id) as $appdetail)
      <div class="frow ml-4 txt-s">- {{$appdetail->course->name}}</div>
      @endforeach
   </div>
   @endforeach
   <div class="frow mid-right txt-b mt-2">Total: {{$application->universities()->count()}}<i data-feather='dollar-sign' class="feather-xsmall"></i></div>

</div>

@endsection