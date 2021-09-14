@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Universities</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('universities.index')}}">Universities </a> <span class="mx-1"> / </span> Edit</div>
</div>
@endsection
@section('page-content')

<div class="container" style="width:60% !important">
   <!-- step naviagation  -->
   <div class="frow mb-5 p-3 auto-col border bg-lightsky">
      <div class="navstep hw-50 active">
         <div class="roundbtn">@if($university->step1==1) <i data-feather='check' class="feather-small"></i> @else 1 @endif</div>
         <div class="super-underline">Basic Info</div>
      </div>
      <div class="navstep hw-50">
         <a href="{{route('unicourses.index')}}">
            <div class="roundbtn">@if($university->step2==1) <i data-feather='check' class="feather-small"></i> @else 2 @endif</div>
         </a>
         <div class="super-underline">Course Feeding</div>
      </div>
      <div class="navstep">
         <a href="{{route('universities.index')}}">
            <div class="roundbtn"><i data-feather='pause' class="feather-xsmall"></i></div>
         </a>
      </div>
   </div>

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

   <!-- find image url of the country -->
   @php
   $logo_url=url("/images/universities/".$university->logo);
   @endphp

   <!-- display data with edit option on right upper corner -->
   <div class="p-4 border shadow relative">
      <div class="frow mid-left">
         <div class="txt-l mr-4">{{$university->name}}</div><img src={{$logo_url}} alt='logo' width=30 height=30 class='rounded-circle'>
      </div>
      <div class="frow border-bottom stretched border-thin my-4">
      </div>
      <div class="frow centered">
         <div class="fcol w-25">Country: </div>
         <div class="fcol w-50">{{$university->country->name}}</div>
      </div>
      <div class="frow centered @if($university->country_id!=1) hide @endif">
         <div class="fcol w-25">City </div>
         <div class="fcol w-50">{{$university->city->name}}</div>
      </div>
      <div class="frow centered">
         <div class="fcol w-25">Type </div>
         <div class="fcol w-50">{{$university->type}}</div>
      </div>
      <!-- edit icon on top right corner -->
      <div class='absolute' style='top:5px; right:5px' onclick="slideleft()">
         <i data-feather='edit-2' class="feather-small txt-blue"></i>
      </div>
   </div>


   <!-- slider that holds data to be updated -->
   <div class="slider" id='slider'>
      <!-- close button -->
      <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="slideleft()"><i data-feather='x' class="feather-xsmall"></i></div>
      <form action="{{route('universities.update',$university)}}" method='post' enctype="multipart/form-data">
         @csrf
         @method('PATCH')
         <div class="fcol centered">
            <img src="{{$logo_url}}" alt='logo' id='logo_img' width=40 height=40 class='rounded-circle'>
         </div>

         <div class="fcol my-4">

            <div class="fancyinput my-2 w-100">
               <input type="text" name='name' placeholder="University name *" value='{{$university->name}}' required>
               <label>Name *</label>
            </div>
            <div class="fancyinput my-2 w-100">
               <input type="file" id='logo' name='logo' placeholder="uni logo" class='w-100 m-0 p-2' onchange='preview_logo()'>
               <label>Logo</label>
            </div>
            <div class="fancyselect my-2 w-100">
               <select name="country_id" onchange="showOrHideCity(event)">
                  @foreach($countries as $country)
                  <option value="{{$country->id}}" @if($country->id==$university->country_id)selected @endif>{{$country->name}}</option>
                  @endforeach
               </select>
               <label>Country *</label>
            </div>
            <div class="fancyselect my-2 w-100" id='city_id' @if($university->country_id!=1) style="display:none" @endif>
               <select name="city_id">
                  @foreach($cities as $city)
                  <option value="{{$city->id}}" @if($city->id==$university->city_id)selected @endif>{{$city->name}}</option>
                  @endforeach
               </select>
               <label>City *</label>
            </div>
            <div class="fancyselect my-2 w-100">
               <select name="type">
                  <option value="public" @if($university->type=='public')selected @endif>Public</option>
                  <option value="private" @if($university->type=='private')selected @endif>Private</option>
               </select>
               <label>Type</label>
            </div>
         </div>
         <div class="frow mid-right my-4">
            <button type="submit" class="btn btn-success">Update</button>
         </div>
      </form>
   </div> <!-- slider ends -->

</div>
@endsection

@section('script')
<script lang="javascript">
function preview_logo() {
   const [file] = logo.files
   if (file) {
      logo_img.src = URL.createObjectURL(file)
   }
}

function slideleft() {
   $("#slider").toggleClass('slide-left');
}

function showOrHideCity(event) {
   //if foreign country, hide city
   if (event.target.value != 1) {
      $('#city_id').hide();
   } else
      $('#city_id').show();
}
</script>
@endsection