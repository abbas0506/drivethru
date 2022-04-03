@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='dashboard'></x-student.sidebar>
@endsection

@section('page-title')
Profile - <span class="txt-12 px-2">edit</span>
@endsection

@section('content')
<div class="page-centered w-50 bg-white p-4">
   <div class="frow stretched">
      <div class="txt-grey txt-m lh-40">Personal Info</div>
      <a href="{{route('profiles.index')}}">
         <div class="top-right-icon circular-20">
            <i data-feather='x' class="feather-xsmall"></i>
         </div>
      </a>
      <div class="frow txt-s centered hoverable">
         <div class="fcol circular-25 border-0 bg-green centered" onclick="reset()">
            <i data-feather='refresh-ccw' class="feather-xsmall txt-white"></i>
         </div>
         <div class="ml-2 txt-grey">Reset</div>
      </div>
   </div>

   <!-- personal data fields -->
   <form action="{{route('profiles.update', $profile)}}" method="post" id='form' onsubmit="return validate()">
      @csrf
      @method('PATCH')
      <!-- display authentication error if any -->
      @if ($errors->any())
      <div class="fcol mt-2 txt-orange">
         @foreach ($errors->all() as $error)
         <div class="txt-s">- {{ $error }}</div>
         @endforeach
      </div>
      @endif



      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='fname' placeholder="Father" value="{{$profile->fname}}">
            <label for="">Father</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='mname' placeholder="Mother" value="{{$profile->mname}}">
            <label for="">Mother</label>
         </div>
      </div>
      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='cnic' id='cnic' placeholder="CNIC" oninput='formatAsCnic(event)' value="{{$profile->cnic}}" required>
            <label for="">CNIC</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='passport' placeholder="Passport" value="{{$profile->passport}}">
            <label for="">Passport</label>
         </div>
      </div>
      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-3 fancyselect">
            <select name="gender">
               <option value="M" @if($profile->gender=='M') selected @endif>Male</option>
               <option value="F" @if($profile->gender=='F') selected @endif>Female</option>
            </select>
            <label for="">Gender</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='dob' id='dob' placeholder="Date of birth (dd-mm-yyyy)" value="{{date_format($profile->dob,'d-m-Y')}}" oninput="formatAsDate(event)" required>
            <label for="">Date of Birth (dd-mm-yyyy)</label>
         </div>
      </div>
      <div class="frow mt-3 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyselect">
            <select name="religion">
               <option value="Islam" @if($profile->religion=='Islam') selected @endif>Islam</option>
               <option value="Christianity" @if($profile->religion=='Christianity') selected @endif>Christianity</option>
               <option value="Judaism" @if($profile->religion=='Judaism') selected @endif>Judaism</option>
               <option value="Hinduism" @if($profile->religion=='Hinduism') selected @endif>Hinduism</option>
               <option value="Other" @if($profile->religion=='Other') selected @endif>Other</option>
            </select>
            <label for="">Religion</label>
         </div>
         <div class="fcol w-48 mt-3 fancyselect">
            <select name="bloodgroup">
               <option value="A+" @if($profile->bloodgroup=='A+') selected @endif>A+</option>
               <option value="B+" @if($profile->bloodgroup=='B+') selected @endif>B+</option>
               <option value="AB+" @if($profile->bloodgroup=='AB+') selected @endif>AB+</option>
               <option value="O+" @if($profile->bloodgroup=='O+') selected @endif>O+</option>
               <option value="O-" @if($profile->bloodgroup=='O-') selected @endif>O-</option>
               <option value="A-" @if($profile->bloodgroup=='A-') selected @endif>A-</option>
               <option value="B-" @if($profile->bloodgroup=='B-') selected @endif>B-</option>
               <option value="AB-" @if($profile->bloodgroup=='AB-') selected @endif>AB-</option>
            </select>
            <label for="">Blood Group</label>
         </div>
      </div>

      <div class="frow mt-3 fancyinput">
         <input type="text" name='address' placeholder="Address" value="{{$profile->address}}">
         <label for="">Address</label>
      </div>
      <button type='submit' class="btn btn-red float-right mt-3">Update</button>
   </form>
   <!-- </div> -->
</div>

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