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
<div class="frow w-100 p-4 txt-m txt-b txt-custom-blue">{{$user->name}}!</div>
@endsection

@section('data')

@if(session('mode')==0)

<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">National Application : {{$application->id}}</div>
      <a href="{{url('user_dashboard')}}">
         <div class="frow txt-s txt-grey centered">
            <div class="fcol box-25 circular bg-orange centered"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
            <div class="ml-2">Close</div>
         </div>
      </a>
   </div>

   <div class="w-100 rw-100 txt-grey txt-s">Created at {{$application->created_at}}</div>
   <!-- table header -->
   <div class="frow mid-left border-bottom mt-3">
      <div class="w-10 txt-s txt-grey">Sr.</div>
      <div class="w-40 txt-s txt-grey">University</div>
      <div class="w-50 txt-s txt-grey">Courses</div>
   </div>

   <div class="fcol w-100 rw-100">
      @php $sr=1; @endphp
      @foreach($application->universities() as $university)
      <div class="fcol border-bottom w-100 rw-100 py-2">
         <div class="frow stretched  w-100 rw-100">
            <div class="w-10">{{$sr++}}. </div>
            <div class="w-40">{{$university->name}}</div>
            <div class="fcol w-50">
               @foreach($application->appdetails()->where('university_id',$university->id) as $appdetail)
               <div class="frow txt-s">{{$appdetail->course->name}}</div>
               @endforeach

            </div>
         </div>
      </div>
      @endforeach
   </div>
   <div class="frow mid-right txt-grey mt-2">Total Charges: {{$application->universities()->count()}}<i data-feather='dollar-sign' class="feather-xsmall"></i></div>
</div>
@elseif(session('mode')==1)

@endif
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-grey txt-m">International Application : {{$application->id}}</div>
      <a href="{{url('user_dashboard')}}">
         <div class="frow txt-s txt-grey centered">
            <div class="fcol box-25 circular bg-orange centered"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
            <div class="ml-2">Close</div>
         </div>
      </a>
   </div>

   <div class="w-100 rw-100 txt-grey txt-s">Created at {{$application->created_at}}</div>
   <!-- table header -->
   <div class="frow mid-left border-bottom mt-3">
      <div class="w-10 txt-s txt-grey">Sr.</div>
      <div class="w-40 txt-s txt-grey">Country</div>
      <div class="w-50 txt-s txt-grey">Courses</div>
   </div>

   <div class="fcol w-100 rw-100">
      @php $sr=1; @endphp
      @foreach($application->countries() as $country)
      <div class="fcol border-bottom w-100 rw-100 py-2">
         <div class="frow stretched  w-100 rw-100">
            <div class="w-10">{{$sr++}}. </div>
            <div class="w-40">{{$country->name}}</div>
            <div class="fcol w-50">
               @foreach($application->international_applications()->where('country_id',$country->id) as $international_application)
               <div class="frow txt-s">{{$international_application->course->name}}</div>
               @endforeach

            </div>
         </div>
      </div>
      @endforeach
   </div>
   <div class="frow mid-right txt-grey mt-2">Total Charges: {{$application->countries()->count()}}<i data-feather='dollar-sign' class="feather-xsmall"></i></div>
</div>


@endsection

@section('profile')
<!-- suggestions for user -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">SUGGESTED TO YOU</div>

   <div class="frow w-100 rw-100 stretched">
      <div class="frow">
         <div class="box-20 mr-2 bg-light-grey"></div>
         <div class="txt-s">Apply for International University</div>
      </div>
      <div class="txt-s"><i data-feather='chevron-right' class="feather-small txt-orange"></i> </div>
   </div>
   <div class="frow w-100 rw-100 stretched my-2">
      <div class="frow">
         <div class="box-20 mr-2 bg-light-grey"></div>
         <div class="txt-s">Top Universities Report - Free</div>
      </div>
      <div class="txt-s"><i data-feather='chevron-right' class="feather-small txt-orange"></i> </div>
   </div>
</div>

<!-- profile -->
<div class="fcol w-100 rw-100 bg-white p-4 mt-3">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">PROFILE STRENGTH</div>
   <div class="frow w-100 rw-100 centered">
      <div class="fcol box-50 border circular">
         <img src="{{url('storage/images/logos/logo2.png')}}" alt="" class="user-avatar-lg" width='50' height='50'>
      </div>
   </div>

   <div class='progress my-3' style='height:5px'>
      <div class='progress-bar' style='width:50%'> </div>
   </div>
   <div class="frow w-100 rw-100 stretched">
      <div class="txt-s">Profile Picture</div>
      <div class="fcol box-15 circular centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">
      <div class="txt-s">Personal Information</div>
      <div class="fcol box-15 circular centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">
      <div class="txt-s">Academic Information</div>
      <div class="fcol box-15 circular centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>
   <div class="frow w-100 rw-100 py-2 mt-2 border-top stretched">
      <div class="txt-s"></div>
      <div class="frow">
         <a href="{{route('profiles.edit', $user->id)}}">
            <div class="txt-green txt-b">Update Profile</div>
         </a>
         <div class="fcol centered"><i data-feather='chevron-right' class="feather-xsmall txt-green"></i> </div>
      </div>

   </div>

</div>
@endsection