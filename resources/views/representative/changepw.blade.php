@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-representative__header></x-representative__header>
   </div>
   <div class='txt-l txt-white mt-3'>Change Password</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('representative')}}">Home</a> <span class="mx-1"> / </span>
      Change password
   </div>
</div>
@endsection
@php
$user=session('user');
@endphp
@section('page-content')
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
<!-- change password -->
<div class="container-60 mt-4">
   <div class="fcol w-100 rw-100 centered text-justify">
      <div class="txt-custom-blue"><i data-feather='key' class="feather-large mx-1 txt-orange"></i></div>

      <div class="fcol w-100 rw-100 bg-white rounded p-2 relative">

         <form action="{{route('representative.update', $user)}}" method="post" id='form' onsubmit="return validate()">
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