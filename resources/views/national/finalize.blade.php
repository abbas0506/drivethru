@extends('layouts.main')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@section('sidebar')
<x-sidebar activeItem='findUni'></x-sidebar>
@endsection

@section('page-title')
Finalize
@endsection

@section('page-navbar')
<div class="navitem txt-s active"></div>

@endsection

@section('graph')
Graph section
@endsection

@section('data')
<form id='form' action="" method='get'>
   @csrf
   <div class="frow mid-left">
      <div class="ml-2 txt-orange">You are one step away from downloading free report. Review the following carefully, you may edit or finalize the process here </div>

   </div>

   @endsection
   <!-- script goes here -->
   @section('script')
   <script lang="javascript">
      // 
   </script>
   @endsection