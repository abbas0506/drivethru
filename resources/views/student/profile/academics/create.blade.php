@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='dashboard'></x-student.sidebar>
@endsection

@section('page-title')
Profile - <span class="txt-12 px-2">create academic detail</span>
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

   <ul class="txt-s txt-grey ml-3">
      <span class='txt-blue'>Read me **</span>
      <li class="ml-3">Please provide academic information; starting from the most recent to matric</li>
      <li class="ml-3">Don't duplicate same degree information</li>
   </ul>
   <!-- personal data fields -->
   <form action="{{route('academics.store')}}" method="post" id='form' onsubmit="return validate()">
      @csrf

      <!-- display authentication error if any -->
      @if ($errors->any())
      <div class="fcol my-2 txt-orange">
         @foreach ($errors->all() as $error)
         <div class="txt-s">- {{ $error }}</div>
         @endforeach
      </div>
      @endif
      <input type="text" name='user_id' value="{{$user->id}}" hidden>
      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-4 fancyselect">
            <select name="level_id">
               @foreach($levels as $level)
               <option value="{{$level->id}}">{{$level->name}}</option>
               @endforeach
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
            <input type="text" name='rollno' placeholder="Roll No" required>
            <label for="">Roll No.</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='regno' placeholder="Reg. No">
            <label for="">Reg. No</label>
         </div>
      </div>
      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='major' placeholder="Major Subject" required>
            <label for="">Major Subject</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="text" name='biseuni' placeholder="BISE or University">
            <label for="">BISE / University </label>
         </div>
      </div>
      <div class="frow stretched auto-col">
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="number" name='obtained' id='obtained' min='0' max='5000' placeholder="Obtained marks" required>
            <label for="">Obtained</label>
         </div>
         <div class="fcol w-48 mt-3 fancyinput">
            <input type="number" name='total' id='total' min='0' max='5000' placeholder="Total marks">
            <label for="">Total</label>
         </div>
      </div>

      <frow class="frow mid-right mt-3">
         <button type='submit' class="btn btn-sm btn-success">Save</button>
      </frow>
   </form>
</div>


@endsection

<!-- script goes here -->
@section('script')
<script>
function reset() {
   $('#form')[0].reset();
}

function validate() {
   var obtained = $('#obtained').val()
   var total = $('#total').val()

   var msg = '';
   if (obtained < 0) msg = 'Obtained marks too low';
   else if (obtained > total) msg = 'Obtained greater than total?';
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