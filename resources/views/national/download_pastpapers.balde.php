@extends('layouts.student')
@section('topbar')
<x-topbar_national activeItem='blog'></x-topbar_national>
@endsection
@section('sidebar')
<x-sidebar_national activeItem='pastPapers'></x-sidebar_national>
@endsection
@section('page-title')
Profile
@endsection
@section('page-navbar')
<div class="navitem active">Personal</div>
<div class="navitem">Academics</div>
@endsection
@section('graph')
Graph section
@endsection

@section('data')
data is here
@endsection