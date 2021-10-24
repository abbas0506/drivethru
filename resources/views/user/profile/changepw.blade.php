@extends('layouts.simple')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='dashboard' :user="$user"></x-user__sidebar>
@endsection

@section('data')
<!-- change password -->

<!-- counselling success -->
<div class="fcol w-60 rw-100 h-90 centered text-justify">
   <div class="txt-custom-blue mb-2"><i data-feather='key' class="feather-large mx-1 txt-orange"></i></div>

   <div class="fcol w-100 rw-100 bg-white rounded p-5 relative">
      <a href="{{route('profiles.index')}}">
         <div class="fcol circular-25 border-0 centered bg-orange hoverable" style="position: absolute; top:10px; right:10px">
            <i data-feather='x' class="feather-xsmall txt-white"></i>
         </div>
      </a>
      <form action="{{route('users.update', $user)}}" method="post" id='form' onsubmit="return validate()">
         @csrf
         @method('PATCH')
         <!-- display authentication error if any -->
         @if ($errors->any())
         <div class="fcol w-100 rw-100 my-2 txt-orange">
            @foreach ($errors->all() as $error)
            <div class="txt-s">- {{ $error }}</div>
            @endforeach
         </div>
         @elseif(session('success'))
         <div class="frow bg-primary txt-white p-2 rounded">Password successfully changed.</div>
         @endif

         <div class="fancyinput w-100 mt-3 ">
            <input type="text" name='current' id='current' placeholder="Current password">
            <label class="bg-transparent">Current Password</label>
         </div>
         <div class="fancyinput w-100 mt-3 ">
            <input type="password" name='new' id='new' placeholder="New password">
            <label class="bg-transparent">New Password</label>
         </div>
         <div class="fancyinput w-100 mt-3 ">
            <input type="password" id='confirm' placeholder="Confirm password">
            <label class="bg-transparent">Confirm Password</label>
         </div>

         <div class="frow mid-right w-100 rw-100 mt-3">
            <button type='submit' class="btn btn-primary">Change</button>
         </div>

      </form>
   </div>


</div>



@endsection

@section('profile')
<x-profile__strength :user="$user"></x-profile__strength>
@endsection

@section('script')
<script>
function reset() {
   $('#form')[0].reset();
}

function validate() {
   var current = $('#current').val();
   var new_password = $('#new').val()
   var confirm = $('#confirm').val()
   var msg = '';

   if (current == '' || current == null) msg = 'Current password required';
   else if (new_password == '' || new_password == null) msg = 'New password required';
   else if (confirm == '' || confirm == null) msg = 'Confirm password required';
   else if (confirm != new_password) msg = 'Confirm password not mathed';

   if (msg != '') {
      Toast.fire({
         icon: 'warning',
         title: msg
      });
      return false;
   }

}
</script>
@endsection