@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar></x-student.sidebar>
@endsection

@section('page-title')
Profile - <span class="txt-12 px-2">change password</span>
@endsection
@section('content')
<!-- counselling success -->
<div class="w-50 bg-light p-4 page-centered">
   <div class="frow lh-30 txt-blue txt-m txt-b">Change Password</div>
   <a href="{{route('profiles.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>
   <div>
      <form action="{{route('users.update', $user)}}" method="post" id='form' onsubmit="return validate()">
         @csrf
         @method('PATCH')
         <!-- display authentication error if any -->
         @if ($errors->any())
         <div class="my-2 txt-orange">
            @foreach ($errors->all() as $error)
            <div class="txt-s">- {{ $error }}</div>
            @endforeach
         </div>
         @elseif(session('success'))
         <div class="frow txt-blue lh-30">Password successfully changed.</div>
         @endif

         <div class="fancyinput mt-3 ">
            <input type="text" name='current' id='current' placeholder="Current password">
            <label class="bg-transparent">Current Password</label>
         </div>
         <div class="fancyinput mt-3 ">
            <input type="password" name='new' id='new' placeholder="New password">
            <label class="bg-transparent">New Password</label>
         </div>
         <div class="fancyinput mt-3 ">
            <input type="password" id='confirm' placeholder="Confirm password">
            <label class="bg-transparent">Confirm Password</label>
         </div>
         <button type='submit' class="btn-red float-right mt-3">Change</button>
      </form>
   </div>

</div>

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