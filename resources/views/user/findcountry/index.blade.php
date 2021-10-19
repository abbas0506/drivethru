@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='findcountry' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
Find Country
@endsection

@section('page-navbar')

<x-findcountry__navbar activeItem='preference'></x-findcountry__navbar>

@endsection

@section('graph')

@endsection


@section('data')

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

<form id='form' action="{{route('findcountry.store')}}" method='post'>
   @csrf
   <div class="bg-light p-4 rounded">
      <div><input type="checkbox" id='mode' name='manual' value='1'> Manual Search &nbsp<span class="txt-orange txt-s">(Only if you know country name)</span></div>
      <!-- filed of interest -->
      <div class="frow mid-left mt-4 auto-col">
         <div class="fancyselect w-100 rw-100" id='fieldofinterest'>
            <select name='course_id' required>
               <option value="-1">Select a field</option>
               @foreach($courses as $course)
               <option value="{{$course->id}}">{{$course->name}}</option>
               @endforeach
            </select>
            <label>Field of Interest</label>
         </div>
      </div>
      <div class="frow w-100 rw-100 mid-left fancy-search-grow hide" id='searchinput'>
         <input type="text" name='country' placeholder="Type country name" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
      </div>

   </div>
   <div class="bg-light mt-3 p-4 rounded" id='optional'>
      <div class="frow txt-s txt-orange mb-2">
         <div><i data-feather='filter' class="feather-xsmall mr-2"></i></div>
         <div class="text-center">Optional Parameters</div>
      </div>

      <div class="frow stretched mt-3 auto-col">
         <div class="frow mid-left w-48 rw-100 rmb-2">
            <input type='checkbox' name='visarequired' class="mr-2">
            Show visa free countries only
         </div>
         <div class="frow mid-left w-48 rw-100 rmb-2">
            <input type='checkbox' name='edufreeonly' class="mr-2">
            Show free education countries only
         </div>
      </div>
      <div class="frow stretched mt-3 auto-col">
         <div class="fancyinput w-48 rw-100 rmb-2">
            <input type="number" name='minstudycost' placeholder="Min Study Cost">
            <label for="">Min Study Cost ($)</label>
         </div>
         <div class="fancyinput w-48 rw-100 rmb-2">
            <input type="number" name='maxstudycost' placeholder="Max Study Cost">
            <label for="">Max Study Cost ($)</label>
         </div>
      </div>
      <div class="frow stretched mt-3 auto-col">
         <div class="fancyinput w-48 rw-100 rmb-2">
            <input type="number" name='minlivingcost' placeholder="Min Living Cost">
            <label for="">Minimum Living Cost ($)</label>
         </div>
         <div class="fancyinput w-48 rw-100 rmb-2">
            <input type="number" name='maxlivingcost' placeholder="Max Living Cost Fee">
            <label for="">Maximum Living Cost ($)</label>
         </div>
      </div>
   </div>

   <div class="frow mid-right mt-3"><button type='submit' class="btn btn-primary">Next</button></div>
</form>
@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">
$('#optional').collapse('show')
$("#mode").change(function() {
   $('#searchinput').toggleClass('hide');
   $('#fieldofinterest').toggleClass('hide');
   if ($(this).prop('checked')) {
      $('#optional').collapse('hide')

   } else {
      $('#optional').collapse('show')
   }
});
</script>
@endsection