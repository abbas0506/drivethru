@extends('layouts.student')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@section('sidebar')
<x-sidebar_national activeItem='applications'></x-sidebar_national>
@endsection

@section('page-title')
Applications
@endsection

@section('page-navbar')
<div class="frow txt-s">({{$applications->count()}}) applications found</div>
@endsection


@section('data')
<div class="bg-light p-4">
   <div class="frow mid-left border-bottom">
      <div class="w-15 txt-s txt-b">ID</div>
      <div class="w-50 txt-s txt-b">Created At</div>
      <div class="w-20 txt-s txt-b">Charges</div>
      <div class="w-15 txt-s text-center txt-b">...</div>
   </div>
   @foreach($applications as $application)
   <div class="frow tr mid-left py-1 border-bottom">
      <div class="w-15 txt-s">{{$application->id}}</div>
      <div class="w-50 txt-s">{{$application->created_at}}</div>
      <div class="w-20 txt-s">@if($application->ispaid) Paid @else {{$application->charges}} &nbsp<span class="badge badge-info">pay</span> @endif</div>
      <div class="w-15 txt-s text-center">
         <a href="{{route('applications.show',$application)}}">
            <i data-feather='eye' class="feather-xsmall text-primary"></i>
         </a>
         &nbsp
         <a href="{{route('application_download',['id'=>$application->id])}}" target="_blank">
            <i data-feather='download' class="feather-xsmall txt-orange"></i>
         </a>
      </div>
   </div>
   @endforeach
</div>

@endsection