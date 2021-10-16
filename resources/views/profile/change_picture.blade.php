@extends('layouts.dashboard')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-sidebar_national activeItem='dashboard' :user="$user"></x-sidebar_national>
@endsection

@section('page-header')
<div class="frow w-100 p-4 mt-3 txt-m txt-b txt-smoke">{{$user->name}}!</div>
@endsection

@section('data')
Change picture

@endsection

@section('profile')
<x-profile__panel :user="$user"></x-profile__panel>
@endsection