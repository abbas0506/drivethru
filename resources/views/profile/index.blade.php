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

<style>
   .bg-national-mini {
      background-image: url('storage/images/bg/international.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-size: 100% 100%;
   }
</style>

@section('page-header')
<div class="frow w-100 p-4 my-3 txt-m txt-b txt-smoke bg-national-mini" style='border-radius:5px'>Welcome, {{$user->name}}!</div>
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
         <i data-feather='edit-3' class="feather-small text-primary"></i>
      </a>
   </div>

   <div class="frow my-2 txt-m txt-grey">Personal Info</div>
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
   <div class="frow my-2 txt-m txt-grey">
      <div class="w-80 rw-60">Academic Detail</div>
      <!-- <div class="badge badge-success circular p-1">+ Create New</div> -->

      <div class="frow w-20 rw-40">
         <a href="{{route('academics.create')}}" class="frow mid-left w-100 rw-100">
            <div class="fcol circular-25 bg-success text-light centered">+</div>
            <div class="txt-s ml-1">ADD NEW</div>
         </a>
      </div>

   </div>
   @if($user->hasAcademics())
   <!-- academics exist -->

   <div class="frow w-100 rw-100 txt-s txt-smoke py-2">
      <div class="w-5">Sr </div>
      <div class="w-20">Level</div>
      <div class="w-10">Pass Year</div>
      <div class="w-30">BISE/Uni</div>
      <div class="w-10">Roll No.</div>
      <div class="w-15">Marks</div>
      <div class="w-10 ">Actions</div>
   </div>

   @php $sr=1; @endphp
   @foreach($user->academics() as $academic)
   <div class="frow w-100 rw-100 txt-s">
      <div class="w-5">{{$sr++}}. </div>
      <div class="w-20">{{$academic->level->name}}</div>
      <div class="w-10">{{$academic->passyear}}</div>
      <div class="w-30">{{$academic->biseuni}}</div>
      <div class="w-10">{{$academic->rollno}}</div>
      <div class="w-15">{{$academic->obtained}}/{{$academic->total}}</div>
      <div class="w-10 text-center">
         <div class="frow">
            <a href="{{route('academics.edit',$academic)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a>
            <div>
               <form action="{{route('academics.destroy',$academic)}}" method="POST" id='del_form{{$sr}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$sr}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>

      </div>
   </div>
   @endforeach

   @else
   <!-- academic details not available -->
   <div class="frow w-100 rw-100 border-top centered p-2">
      <a class='' href="{{route('academics.create')}}">Start adding your academic details</a>
   </div>
   @endif
</div>

@else
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
   <form action="{{route('profiles.store')}}" method="post">
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
            <input type="text" name='cnic' placeholder="CNIC" pattern='[0-9]{5}-[0-9]{7}-[0-9]' oninput='formatAsCnic(event)' required>
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
            <input type="text" name='dob' placeholder="Date of birth (dd-mm-yyyy)" pattern='[0-9]{2}-[0-9]{2}-[0-9]{4}' oninput="formatAsDate(event)" required>
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
         <button type='submit' class="btn btn-sm btn-success">Save & Next</button>
      </frow>
   </form>
</div>

@endif

@endsection

@section('profile')
<x-profile__panel :user="$user"></x-profile__panel>
@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">

</script>
@endsection