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
<div class="page-title">Find Country</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-findcountry__navbar activeItem='preference'></x-findcountry__navbar>
</div>
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

<!-- manual search section -->
<div id='manual_search_section' class="hide">

   <div class="frow my-2">
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable mr-3" onclick="toggleMe()">Auto Search</div>
      <div class="frow btn-rounded-custom-orange centered px-3 txt-s"><i data-feather='check' class="feather-small mr-2"></i>Manual Search </div>
   </div>

   <form id='form' action="{{route('findcountry.store')}}" method='post'>
      @csrf
      <input type="checkbox" name='manual' checked hidden>
      <div class="bg-light p-4 rounded mb-3">
         <div class="fcol txt-grey w-100 rw-100 mt-2">
            <ul class="">
               <li>Part of country name is also acceptable</li>
            </ul>
         </div>
         <div class="frow w-100 rw-100 stretched">
            <div class="frow w-100 mid-left fancy-search-grow" id='searchinput'>
               <input type="text" name='country' placeholder="Type country name" oninput="search(event)" style='width:80%!important; margin-left:20px' required>
               <i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
            </div>
            <div class=""><button type='submit' class="btn btn-sm btn-primary">Search</button></div>
         </div>
      </div>
   </form>
</div>

<!-- auto search section -->

<div id='auto_search_section'>
   <div class="frow txt-m my-2 rounded">
      <div class="frow btn-rounded-custom-orange centered px-3 txt-s mr-3">Auto Search <i data-feather='check' class="feather-small ml-2"></i></div>
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable" onclick="toggleMe()">Manual Search</div>
   </div>

   <form id='form' action="{{route('findcountry.store')}}" method='post'>
      @csrf
      <div class="bg-light p-4 rounded">
         <!-- filed of interest -->
         <div class="frow mid-left mt-4 mb-2 auto-col">
            <div class="fancyselect w-100 rw-100" id='fieldofinterest'>
               <select name='course_id' required>
                  <option value="">Select a field</option>
                  @foreach($courses as $course)
                  <option value="{{$course->id}}">{{$course->name}}</option>
                  @endforeach
               </select>
               <label>Field of Interest</label>
            </div>
         </div>
      </div>
      <div class="bg-light mt-3 p-4 rounded" id='optional'>
         <div class="frow txt-s txt-orange mb-2">
            <div><i data-feather='filter' class="feather-xsmall mr-2"></i></div>
            <div class="text-center">Advanced Search (optional)</div>
         </div>

         <div class="frow stretched mt-3 auto-col">
            <div class="frow mid-left w-48 rw-100 rmb-2">
               <input type='checkbox' name='edufree' class="mr-2">
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
            <div class="fancyinput w-48 rw-100">
               <input type="number" name='maxlivingcost' placeholder="Max Living Cost Fee">
               <label for="">Maximum Living Cost ($)</label>
            </div>
         </div>
         <div class="frow mid-right mt-3">
            <button type='submit' class="btn btn-primary">Search</button>
         </div>
      </div>
   </form>
</div>


@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">
function toggleMe() {
   $('#manual_search_section').toggleClass('hide');
   $('#auto_search_section').toggleClass('hide');
}
</script>
@endsection