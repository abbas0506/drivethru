@extends('layouts.dashboard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-sidebar activeItem='dashboard' :user="$user"></x-sidebar>
@endsection

@section('page-header')
<div class="frow w-100 p-4 mt-3 txt-m txt-b txt-smoke">{{$user->name}}!</div>
@endsection

@section('data')
<!-- create new profile -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">Personal Info</div>
      <div class="frow txt-s txt-grey centered">
         <div class="fcol circular-25 border-0 bg-green centered"><i data-feather='refresh-ccw' class="feather-xsmall txt-white"></i></div>
         <div class="ml-2">Refresh this section</div>

      </div>
   </div>

   <!-- personal data fields -->
   <form action="{{route('profiles.update', $profile)}}" method="post">
      @csrf
      @method('PATCH')
      <!-- display authentication error if any -->
      @if ($errors->any())
      <div class="fcol w-100 rw-100 my-2 txt-orange">
         @foreach ($errors->all() as $error)
         <div class="txt-s">- {{ $error }}</div>
         @endforeach
      </div>
      @endif
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='fname' placeholder="Father" value="{{$profile->fname}}">
            <label for="">Father</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='mname' placeholder="Mother" value="{{$profile->mname}}">
            <label for="">Mother</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='cnic' placeholder="CNIC" pattern='[0-9]{5}-[0-9]{7}-[0-9]' oninput='formatAsCnic(event)' value="{{$profile->cnic}}" required>
            <label for="">CNIC</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='passport' placeholder="Passport" value="{{$profile->passport}}">
            <label for="">Passport</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyselect">
            <select name="gender">
               <option value="M" @if($profile->gender=='M') selected @endif>Male</option>
               <option value="F" @if($profile->gender=='F') selected @endif>Female</option>
            </select>
            <label for="">Gender</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='dob' placeholder="Date of birth (dd-mm-yyyy)" pattern='[0-9]{2}-[0-9]{2}-[0-9]{4}' value="{{date_format($profile->dob,'d-m-Y')}}" oninput="formatAsDate(event)" required>
            <label for="">Date of Birth (dd-mm-yyyy)</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 mt-3 stretched auto-col">
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

      <div class="frow w-100 mt-3 fancyinput">
         <input type="text" name='address' placeholder="Address" value="{{$profile->address}}">
         <label for="">Address</label>
      </div>

      <frow class="frow mid-right w-100 rw-100 mt-3">
         <button type='submit' class="btn btn-sm btn-success">Update</button>
      </frow>
   </form>
</div>

@endsection

@section('profile')
<x-profile__panel :user="$user"></x-profile__panel>
@endsection