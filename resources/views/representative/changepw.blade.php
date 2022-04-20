@extends('layouts.representative')

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
<section class="page-content">
   <div class='w-60 mx-auto txt-l my-5 '>Representative <span class="txt-s ml-2"> - {{$user->name}} - change password </span> </div>
   <div class="frow w-40 p-4 mx-auto border rounded shadow">
      <div class="fcol w-30 centered">
         <i data-feather='key' class="feather-large txt-orange"></i>

      </div>
      <div class="w-70 mx-auto rounded px-2 relative">
         <form action="{{route('representative.update', $user)}}" method="post" id='form' onsubmit="return validate()">
            @csrf
            @method('PATCH')
            <div class="fancyinput mt-3 ">
               <input type="password" name='current' id='current' placeholder="Current password">
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

            <div class="frow mid-right mt-3">
               <button type='submit' class="btn btn-primary">Change</button>
            </div>

         </form>
      </div>
   </div>

</section>
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