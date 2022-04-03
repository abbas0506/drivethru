@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='dashboard'></x-student.sidebar>
@endsection

@section('page-title')
Profile - <span class="txt-12 px-2">change picture</span>
@endsection
@section('content')
<div class="page-centered w-50 bg-white  p-4">
   <!-- close icon -->
   <a href="{{route('profiles.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>
   <div class="mb-3">
      <img src="{{url(asset('images/users/'.$user->pic))}}" id='preview_img' alt="Pic" width="100" height="100" class="rounded-circle">
   </div>
   <form action="{{route('change_pic')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="frow">
         <div class="fcol fancyinput mr-3">
            <input type="file" id='pic' name='pic' placeholder="Picture" class='w-90 m-0 mr-1 p-2' onchange='preview_pic()' required>
            <label for="Name">Upload Your Picure</label>
         </div>
         <button type='submit' class="btn btn-red">Upload</button>
      </div>
   </form>
   @if ($errors->any())
   <div class="my-2 txt-orange">
      @foreach ($errors->all() as $error)
      <div class="txt-s">- {{ $error }}</div>
      @endforeach
   </div>
   @elseif(session('success'))
   <div class="frow txt-blue lh-30">Password successfully changed.</div>
   @endif
</div>

@endsection

@section('script')

<script>
function preview_pic() {
   const [file] = pic.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}
</script>
@endsection