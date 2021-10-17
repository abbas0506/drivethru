@extends('layouts.dashboard')
@section('topbar')
<x-topbar_national activeItem='home'></x-topbar_national>
@endsection

@php
$user=session('user');
$pic_url=url("storage/images/users/".$user->pic);
@endphp

@section('sidebar')
<x-sidebar_national activeItem='dashboard' :user="$user"></x-sidebar_national>
@endsection

@section('page-header')
<div class="frow w-100 p-4 mt-3 txt-m txt-b txt-smoke">{{$user->name}}!</div>
@endsection

@section('data')
<div class="fcol w-100 rw-100 centered bg-white p-4">
   <div class="my-5">
      <img src="{{$pic_url}}" id='preview_img' alt="Pic" width="100" height="100" class="rounded-circle">
   </div>
   <form action="{{route('change_pic')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="frow w-100 rw-100">
         <div class="fcol fancyinput mr-3">
            <input type="file" id='pic' name='pic' placeholder="Picture" class='w-90 m-0 mr-1 p-2' onchange='preview_pic()' required>
            <label for="Name">Upload Your Picure</label>
         </div>
         <button type='submit' class="btn btn-sm btn-success">Upload</button>
      </div>



   </form>
</div>

@endsection

@section('profile')
<x-profile__panel :user="$user"></x-profile__panel>
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