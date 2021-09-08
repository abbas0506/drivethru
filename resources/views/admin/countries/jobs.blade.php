@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> New</div>
</div>
@endsection
@section('page-content')

<div class="container" style="width:60% !important">
   <!-- display record save, del, update message if any -->
   <!-- step naviagation  -->
   <div class="frow mb-5 p-3 auto-col border bg-lightsky">
      <div class="navstep hw-25">
         <a href="{{route('countries.show', $country)}}">
            <div class="roundbtn">@if($country->step1==1) <i data-feather='check' class="feather-small"></i> @else 1 @endif</div>
         </a>
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
      <div class="navstep hw-25 active">
         <div class="roundbtn">@if($country->step4==1) <i data-feather='check' class="feather-small"></i> @else 4 @endif</div>
         <div class="super-underline">Job Desc</div>
      </div>
      <div class="navstep">
         <a href="{{route('countries.index')}}">
            <div class="roundbtn"><i data-feather='pause' class="feather-xsmall"></i></div>
         </a>
      </div>
   </div>

   <!-- display error if any -->
   @if ($errors->any())
   <div class="alert alert-danger mt-2">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   <br />
   @endif

   @php
   $flag_url=url("/images/flags/".$country->flag);
   @endphp

   <div class="p-4 border relative">
      <div class="frow mid-left">
         <div class="txt-l mr-4">{{$country->name}}</div><img src={{$flag_url}} alt='flag' width=30 height=30 class='rounded-circle'>
      </div>
      <div class="frow border-bottom stretched border-thin my-4">
      </div>
      <div class="frow centered">
         <div>{{$country->jobdesc}}</div>
      </div>
      <!-- edit icon on top right corner -->
      <div class='absolute' style='top:5px; right:5px' onclick="slideleft()">
         <i data-feather='edit-2' class="feather-small txt-blue"></i>
      </div>
   </div>


   <!-- new job slider  -->
   <div class="slider" id='slider'>

      <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="slideleft()"><i data-feather='x' class="feather-xsmall"></i></div>
      <div class="frow centered my-4 txt-b">JOB DESC</div>
      <form action="{{route('post_country_jobs')}}" method='post'>
         @csrf
         <div class="fancyinput w-100">
            <textarea name='jobdesc' rows=4 placeholder="Job description here">{{$country->jobdesc}}</textarea>
         </div>
         <input type="text" name="country_id" value='{{$country->id}}' hidden>
         <div class="frow mid-right mt-5">
            <button type="submit" class="btn btn-success">Save</button>
         </div>
      </form>
   </div> <!-- slider ends -->


</div>
@endsection

@section('script')
<script lang="javascript">
function slideleft() {
   $("#slider").toggleClass('slide-left');
}
</script>
@endsection