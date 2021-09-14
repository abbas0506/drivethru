@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> Edit</div>
</div>
@endsection
@section('page-content')

<div class="container" style="width:60% !important">
   <!-- step naviagation  -->
   <div class="frow mb-5 p-3 auto-col border bg-lightsky">
      <div class="navstep hw-25 active">
         <div class="roundbtn">@if($country->step1==1) <i data-feather='check' class="feather-small"></i> @else 1 @endif</div>
         <div class="super-underline">Basic Info</div>
      </div>
      <div class="navstep hw-25">
         <a href="{{route('country_visadocs')}}">
            <div class="roundbtn">@if($country->step2==1) <i data-feather='check' class="feather-small"></i> @else 2 @endif</div>
         </a>
         <div class="super-underline">Visa Docs</div>
      </div>
      <div class="navstep hw-25">
         <a href="{{route('country_scholarships')}}">
            <div class="roundbtn">@if($country->step3==1) <i data-feather='check' class="feather-small"></i> @else 3 @endif</div>
         </a>
         <div class="super-underline">Scholarships</div>
      </div>
      <div class="navstep hw-25">
         <a href="{{route('country_jobs')}}">
            <div class="roundbtn">@if($country->step4==1) <i data-feather='check' class="feather-small"></i> @else 4 @endif</div>
         </a>
         <div class="super-underline">Job Desc</div>
      </div>
      <div class="navstep">
         <a href="{{route('countries.index')}}">
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
   $flag_url=url("/images/flags/".$country->flag);
   @endphp

   <!-- display data with edit option on right upper corner -->
   <div class="p-4 border shadow relative">
      <div class="frow mid-left">
         <div class="txt-l mr-4">{{$country->name}}</div><img src={{$flag_url}} alt='flag' width=30 height=30 class='rounded-circle'>
      </div>
      <div class="frow border-bottom stretched border-thin my-4">
      </div>
      <div class="frow centered">
         <div class="fcol w-25">Visa Required: </div>
         <div class="fcol w-50">@if($country->visarequired==1) Yes @else No @endif</div>
      </div>
      <div class="frow centered @if($country->visarequired==0) hide @endif">
         <div class="fcol w-25">Visa Duration: </div>
         <div class="fcol w-50">{{$country->visaduration}}</div>
      </div>
      <div class="frow centered">
         <div class="fcol w-25">Living Cost: </div>
         <div class="fcol w-50">{{$country->livingcost}}</div>
      </div>
      <div class="frow centered">
         <div class="fcol w-25">Life there </div>
         <div class="fcol w-50">{{$country->lifethere}}</div>
      </div>
      <!-- edit icon on top right corner -->
      <div class='absolute' style='top:5px; right:5px' onclick="slideleft()">
         <i data-feather='edit-2' class="feather-small txt-blue"></i>
      </div>
   </div>


   <!-- EDIT SLIDER -->
   <div class="slider" id='slider'>
      <!-- close button -->
      <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="slideleft()"><i data-feather='x' class="feather-xsmall"></i></div>
      <form action="{{route('countries.update',$country)}}" method='post' enctype="multipart/form-data">
         @csrf
         @method('PATCH')
         <div class="fcol centered">
            <img src="{{$flag_url}}" alt='flag' id='flag_img' width=40 height=40 class='rounded-circle'>
         </div>
         <div class="fancyinput my-3">
            <input type="text" name='name' placeholder="Country name" value='{{$country->name}}' required>
            <label for="Name">Name</label>
         </div>
         <div class="fancyinput my-2 w-100">
            <input type="file" id='flag' name='flag' placeholder="flag" class='w-100 m-0 p-2' onchange='preview_flag()'>
            <label for="Name">Flag</label>
         </div>
         <div class="fancyselect my-3">
            <select name='visarequired' value='{{$country->visarequired}}' onchange="showOrHideDuration(event)">
               <option value='1' @if($country->visarequired==1) selected @endif>Yes</option>
               <option value='0' @if($country->visarequired==0) selected @endif>No</option>
            </select>
            <label for="Name">Visa Required</label>
         </div>

         <div class="fancyinput my-3" id='visaduration' @if($country->visarequired==0) style="display:none" @endif>
            <input type="number" name='visaduration' placeholder="Visa duration" min='0' max='100' value='{{$country->visaduration}}' required>
            <label for="Name">Visa Duration (Yr)</label>
         </div>
         <div>
            <div class="fancyinput my-3">
               <input type="number" name='livingcost' placeholder="Living cost" min='0' value='{{$country->livingcost}}' required>
               <label for="Name">Living Cost</label>
            </div>

         </div>
         <div class="fancyinput my-3">
            <input type="text" name='lifethere' placeholder="Life there" value='{{$country->lifethere}}' required>
            <label for="Name">Life there</label>
         </div>

         <div class="frow mid-right my-5">
            <button type="submit" class="btn btn-success">Update</button>
         </div>

      </form>
   </div> <!-- slider ends -->

</div>
@endsection

@section('script')
<script lang="javascript">
function preview_flag() {
   const [file] = flag.files
   if (file) {
      flag_img.src = URL.createObjectURL(file)
   }
}

function slideleft() {
   $("#slider").toggleClass('slide-left');
}

function showOrHideDuration(event) {
   if (event.target.value == 0) {
      $('#visaduration').hide()
   } else {
      $('#visaduration').show()
      $('[name=visaduration]').val(1)
   }
}
</script>
@endsection