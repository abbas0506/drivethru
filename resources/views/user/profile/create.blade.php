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
<div class="frow w-100 p-4 txt-m txt-b txt-custom-blue">{{$user->name}}!</div>
@endsection

@section('data')
<!-- create new profile -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">Personal Info</div>
      <div class="frow txt-s centered hoverable">
         <div class="fcol circular-25 border-0 bg-green centered" onclick="reset()">
            <i data-feather='refresh-ccw' class="feather-xsmall txt-white"></i>
         </div>
         <div class="ml-2 txt-grey">Reset</div>
      </div>
   </div>

   <!-- personal data fields -->
   <form action="{{route('profiles.store')}}" method="post" id='form' onsubmit="return validate()">
      @csrf

      <!-- display authentication error if any -->
      @if ($errors->any())
      <div class="fcol w-100 rw-100 my-2 txt-orange">
         @foreach ($errors->all() as $error)
         <div class="txt-s">- {{ $error }}</div>
         @endforeach
      </div>
      @endif
      <input type="text" name='user_id' value="{{$user->id}}" hidden>
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='fname' placeholder="Father">
            <label for="">Father</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='mname' placeholder="Mother">
            <label for="">Mother</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='cnic' id='cnic' placeholder="CNIC" oninput='formatAsCnic(event)' required>
            <label for="">CNIC</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='passport' placeholder="Passport">
            <label for="">Passport</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyselect">
            <select name="gender">
               <option value="M">Male</option>
               <option value="F">Female</option>
            </select>
            <label for="">Gender</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='dob' id='dob' placeholder="Date of birth (dd-mm-yyyy)" oninput="formatAsDate(event)" required>
            <label for="">Date of Birth (dd-mm-yyyy)</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 mt-3 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyselect">
            <select name="religion">
               <option value="Islam">Islam</option>
               <option value="Christianity">Christianity</option>
               <option value="Judaism">Judaism</option>
               <option value="Hinduism">Hinduism</option>
               <option value="Other">Other</option>
            </select>
            <label for="">Religion</label>
         </div>
         <div class="fcol w-48 mt-3 fancyselect">
            <select name="bloodgroup">
               <option value="A+">A+</option>
               <option value="B+">B+</option>
               <option value="AB+">AB+</option>
               <option value="O+">O+</option>
               <option value="O-">O-</option>
               <option value="A-">A-</option>
               <option value="B-">B-</option>
               <option value="AB-">AB-</option>
            </select>
            <label for="">Blood Group</label>
         </div>
      </div>

      <div class="frow w-100 mt-3 fancyinput">
         <input type="text" name='address' placeholder="Address">
         <label for="">Address</label>
      </div>

      <frow class="frow mid-right w-100 rw-100 mt-3">
         <button type='submit' class="btn btn-sm btn-success">Save</button>
      </frow>
   </form>
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
   var cnic = $('#cnic').val()
   var dob = $('#dob').val()
   var msg = '';

   if (!validateCnic(cnic)) msg = 'CNIC invalid';
   else if (!validateDate(dob)) msg = 'Date of birth invalid';
   else {
      dateparts = dob.split('-');
      dd = parseInt(dateparts[0]);
      mm = parseInt(dateparts[1]);
      yyyy = parseInt(dateparts[2]);

      const months_31 = [1, 3, 5, 7, 8, 10, 12];
      const months_30 = [4, 6, 9, 11];

      var currentYear = new Date().getFullYear();

      if (months_31.includes(mm)) {
         if (dd <= 0 || dd > 31) msg = 'Day part incorrect, max: 31';
      } else if (months_30.includes(mm)) {
         if (dd <= 0 || dd > 30) msg = 'Day part incorrect, max: 30';
      } else if (mm == 2) { //leap year
         if (yyyy % 4 == 0) {
            if (dd <= 0 || dd > 29) msg = 'Day part incorrect, max: 29';
         } else {
            if (dd <= 0 || dd > 28) msg = 'Day part incorrect, max: 28';
         }
      }

      if (mm <= 0 || mm > 12) {
         msg = 'Month invalid, max: 12';
      }
      if (yyyy <= currentYear - 60) {
         msg = 'Too old person??';
      } else if (yyyy > currentYear) {
         msg = 'Future birth??';
      }

   }

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