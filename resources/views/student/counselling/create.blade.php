@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='counselling'></x-student.sidebar>
@endsection

@section('page-title')
Career Counselling - <span class="txt-12 px-2">100% free</span>
@endsection
@section('content')


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

<!-- create new acadmeic -->
<div class="page-centered w-70 bg-white p-4">
   <a href="{{route('counselling.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>
   <div class="frow mb-3 txt-b txt-m txt-orange"><span style="border-bottom:3px #F68656 solid">Book a Free Session</span></div>
   <div class="frow my-2 txt-grey txt-s">Our support services are 100% free. Let us know what kind of issue is being faced by you.</div>

   <form action="{{route('counselling.store')}}" method="post">
      @csrf

      <input type="text" name="user_id" value="{{$user->id}}" hidden>
      <input type="text" name="mode" value="{{session('mode')}}" hidden>
      <div class="frow mb-1">
         <div class="w-10 txt-center"><input type="checkbox" name='option1' value="1"></div>
         <div class="">I want to enquire about international admission</div>
      </div>
      <div class="frow mb-1">
         <div class="w-10 txt-center"><input type="checkbox" name='option2' value="1"></div>
         <div class="">I want to enquire about national univeristy</div>
      </div>
      <div class="frow mb-1">
         <div class="w-10 txt-center"><input type="checkbox" name='option3' value="1"></div>
         <div class="">I am facing website usage issue</div>
      </div>
      <div class="frow mb-1">
         <div class="w-10 txt-center"><input type="checkbox" name='option4' value="1"></div>
         <div class="">I am facing fee payment issue</div>
      </div>
      <div class="frow mb-1">
         <div class="w-10 txt-center"><input type="checkbox" name='option5' value="1"></div>
         <div class="">I want to seek general information</div>
      </div>
      <div class="frow mb-1">
         <div class="w-10 txt-center"><i data-feather='message-circle' class="feather-small rotate-270 txt-blue"></i></div>
         <div class="fancyinput w-90">
            <textarea name="query" id="" rows="3" placeholder="I would like to express my query in words (upto 300 characters)"></textarea>
         </div>
      </div>
      <div class="my-2 txt-right">
         <button type="submit" class="btn btn-primary float-right">Submit Request</button>
      </div>
   </form>

</div>
@endsection