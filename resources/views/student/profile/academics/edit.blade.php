@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar></x-student.sidebar>
@endsection

@section('page-title')
Profile - <span class="txt-12 px-2">edit academic detail</span>
@endsection

@section('content')
<div class="page-centered w-50 bg-white p-4">
   <div class="frow stretched">
      <div class="txt-grey txt-m lh-40">Academic Detail</div>
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
   <form action="{{route('academics.update', $academic)}}" method="post" id='form'>
      @csrf
      @method('PATCH')
      <!-- display authentication error if any -->
      @if ($errors->any())
      <div class="fcol my-2 txt-orange">
         @foreach ($errors->all() as $error)
         <div class="txt-s">- {{ $error }}</div>
         @endforeach
      </div>
      @endif

      <div class="frow stretched auto-col">
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
      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='rollno' placeholder="Roll No" value='{{$academic->rollno}}' required>
            <label for="">Roll No.</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='regno' placeholder="Reg. No" value='{{$academic->regno}}'>
            <label for="">Reg. No</label>
         </div>
      </div>
      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='major' placeholder="Major Subject" value='{{$academic->major}}' required>
            <label for="">Major Subject</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='biseuni' placeholder="BISE or University" value='{{$academic->biseuni}}'>
            <label for="">BISE / University </label>
         </div>
      </div>
      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="number" name='obtained' min='0' max='5000' placeholder="Obtained marks" value='{{$academic->obtained}}' required>
            <label for="">Obtained</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="number" name='total' min='0' max='5000' placeholder="Total marks" value='{{$academic->total}}'>
            <label for="">Total</label>
         </div>
      </div>

      <button type='submit' class="btn-red float-right mt-3">Update</button>
   </form>
</div>


@endsection

<!-- script goes here -->
@section('script')
<script>
function reset() {
   $('#form')[0].reset();
}
</script>
@endsection