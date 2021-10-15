@extends('layouts.main')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-sidebar_national activeItem='dashboard' :user="$user"></x-sidebar_national>
@endsection

@section('page-title')
Profile
@endsection

@section('page-navbar')
<div class="navitem txt-s active">1-Personal Info</div>
<div class="navitem txt-s">2-Acdemic Info</div>
@endsection

@section('graph')
Graph section
@endsection

@section('data')
@if($user->profile()->count()>0)
edit me
@else
createnew
@endif
@endsection
<!-- script goes here -->
@section('script')
<script lang="javascript">

</script>
@endsection