@extends('layouts.dashboard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='dashboard' :user="$user"></x-user__sidebar>
@endsection
@section('page-header')
<div class="frow w-100 p-4 txt-m txt-b txt-custom-blue">{{$user->name}}</div>
@endsection

@section('data')

<!-- display record save, del, update message if any -->
@if ($errors->any())
<div class="alert alert-danger mt-5">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
<br />
@elseif(session('success'))
<script>
Swal.fire({
   icon: 'success',
   title: "Successful",
   showConfirmButton: false,
   timer: 1500
});
</script>
@endif

@if($user->profile())
<!-- profile exists, now edit -->
<div class="bg-white p-4 relative">
   <!-- edit icon on top right corner -->
   <div class='absolute' style='top:5px; right:5px'>
      <a href="{{route('profiles.edit',$user->profile())}}">
         <i data-feather='edit-3' class="feather-small txt-custom-blue"></i>
      </a>
   </div>

   <div class="frow my-2 txt-m txt-orange">Personal Info</div>
   <div class="frow w-100 rw-100 stretched auto-col">
      <div class="fcol w-48 mt-3">
         <div class="txt-s txt-smoke">Father</div>
         <div class="">{{$user->profile()->fname}}</div>
      </div>
      <div class="fcol w-48 mt-3">
         <div class="txt-s txt-smoke">Mother</div>
         <div class="">{{$user->profile()->mname}}</div>
      </div>
   </div>
   <div class="frow w-100 rw-100 stretched auto-col">
      <div class="fcol w-48 mt-3">
         <div class="txt-s txt-smoke">CNIC</div>
         <div class="">{{$user->profile()->cnic}}</div>
      </div>
      <div class="fcol w-48 mt-3">
         <div class="txt-s txt-smoke">Passport</div>
         <div class="">{{$user->profile()->passport}}</div>
      </div>
   </div>
   <div class="frow w-100 rw-100 stretched auto-col">
      <div class="fcol w-48 mt-3">
         <div class="txt-s txt-smoke">Gender</div>
         <div class="">{{$user->profile()->gender}}</div>
      </div>
      <div class="fcol w-48 mt-3">
         <div class="txt-s txt-smoke">Date of birth</div>
         <div class="">{{$user->profile()->dob}}</div>
      </div>
   </div>
   <div class="frow w-100 rw-100 mt-3 stretched auto-col">
      <div class="fcol w-48 mt-3">
         <div class="txt-s txt-smoke">Religion</div>
         <div class="">{{$user->profile()->religion}}</div>
      </div>
      <div class="fcol w-48 mt-3">
         <div class="txt-s txt-smoke">Blood Group</div>
         <div class="">{{$user->profile()->bloodgroup}}</div>
      </div>
   </div>
   <div class="fcol w-100 rw-100 mt-3">
      <div class="txt-s txt-smoke">Address</div>
      <div class="">{{$user->profile()->address}}</div>
   </div>
</div>

<!-- profile exists, show academic details as well-->

<div class="bg-white p-4 mt-3 relative">
   <div class="frow my-2 txt-m txt-orange">
      <div class='absolute' style='top:5px; right:5px'>
         <a href="{{route('academics.index')}}">
            <i data-feather='edit-3' class="feather-small txt-custom-blue"></i>
         </a>
      </div>
      <div class="w-80 rw-60">Academic Detail</div>

   </div>
   @if($user->hasAcademics())
   <!-- academics exist -->
   <div class="frow w-100 rw-100 txt-s txt-smoke py-2">
      <div class="w-5">Sr </div>
      <div class="w-30">Level</div>
      <div class="w-10">Year</div>
      <div class="w-30">BISE/Uni</div>
      <div class="w-10">Roll No.</div>
      <div class="w-15">Marks</div>
   </div>

   @php $sr=1; @endphp
   @foreach($user->academics() as $academic)
   <div class="frow w-100 rw-100 txt-s">
      <div class="w-5">{{$sr++}}. </div>
      <div class="w-30">{{$academic->level->name}}</div>
      <div class="w-10">{{$academic->passyear}}</div>
      <div class="w-30">{{$academic->biseuni}}</div>
      <div class="w-10">{{$academic->rollno}}</div>
      <div class="w-15">{{$academic->obtained}}/{{$academic->total}}</div>
   </div>
   @endforeach

   @else
   <!-- academic details not available -->
   <div class="frow w-100 rw-100 border-top centered p-2">
      No academic detail exists
   </div>
   @endif
</div>

@else
<!-- profile does not exist -->
<div class="w-100 rw-100 bg-white p-5">
   <div class="frow w-100 rw-100">
      <div>
         <span class="txt-custom-blue txt-b border-bottom border-2">Profile Incomplete</span>
      </div>
   </div>
   <div class="frow w-100 rw-100 p-5 centered">
      <div class="mr-5"><i data-feather='meh' class="feather-large mx-1 txt-orange"></i></div>
      <div class="text-justify">
         Your profile has been found incomplete. We need your personal as well as academic details
         for the processing of your applicaiton. So, first complete your profile and then visit this page again.
         <a href="{{route('profiles.create')}}" class="txt-blue"> Click here </a> to complete your profile.
      </div>
   </div>
</div>
@endif
@endsection

@section('profile')
<x-profile__strength :user="$user"></x-profile__strength>
@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">

</script>
@endsection