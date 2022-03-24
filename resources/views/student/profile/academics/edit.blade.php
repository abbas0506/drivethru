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
<div class="frow w-100 p-4 txt-m txt-b txt-custom-blue" style='border-radius:5px'>{{$user->name}}!</div>
@endsection

@section('data')
<!-- create new acadmeic -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">Acadmeic Detail</div>
      <div class="frow txt-s centered hoverable">
         <div class="fcol circular-25 border-0 bg-green centered" onclick="reset()">
            <i data-feather='refresh-ccw' class="feather-xsmall txt-white"></i>
         </div>
         <div class="ml-2 txt-grey">Reset</div>
      </div>
   </div>

   <!-- personal data fields -->
   <form action="{{route('academics.update', $academic)}}" method="post" id='form'>
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
         <div class="fcol w-48 mt-4 fancyselect">
            <select>
               <option value="">{{$academic->level->name}}</option>
            </select>
            <label for="">Academic Level</label>
         </div>
         <div class="fcol w-48 mt-4 fancyselect">
            <select name="passyear">
               @foreach($years as $year)
               <option value="{{$year}}">{{$year}}</option>
               @endforeach
            </select>
            <label for="">Pass Year</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='rollno' placeholder="Roll No" value='{{$academic->rollno}}' required>
            <label for="">Roll No.</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='regno' placeholder="Reg. No" value='{{$academic->regno}}'>
            <label for="">Reg. No</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='major' placeholder="Major Subject" value='{{$academic->major}}' required>
            <label for="">Major Subject</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='biseuni' placeholder="BISE or University" value='{{$academic->biseuni}}'>
            <label for="">BISE / University </label>
         </div>
      </div>
      <div class="frow w-100 rw-100 stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="number" name='obtained' min='0' max='5000' placeholder="Obtained marks" value='{{$academic->obtained}}' required>
            <label for="">Obtained</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="number" name='total' min='0' max='5000' placeholder="Total marks" value='{{$academic->total}}'>
            <label for="">Total</label>
         </div>
      </div>

      <frow class="frow mid-right w-100 rw-100 mt-3">
         <button type='submit' class="btn btn-sm btn-success">Update</button>
      </frow>
   </form>
</div>


@endsection

@section('profile')
<x-profile__strength :user="$user"></x-profile__strength>
@endsection

<!-- script goes here -->
@section('script')
<script>
function reset() {
   $('#form')[0].reset();
}
</script>
@endsection