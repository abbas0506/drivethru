@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='dashboard'></x-student.sidebar>
@endsection

@section('page-title')
Welcome, {{$user->name}}
@endsection
@section('content')

<div class="block bg-light p-4">
   <div class="frow lh-30 txt-blue txt-m">
      My Applications <div class="ml-3">@if(session('mode')==0) <img src="{{asset('/images/icons/pakistan-flag.png')}}" width="22"> @else <img src="{{asset('/images/icons/globe.png')}}" width="20"> @endif</div>
   </div>
   <!-- instructions -->
   <ul class="txt-s txt-grey">
      Read me
      <li class="ml-3">Click on application ID to view its detail. </li>
      <li class="ml-3">Click on <i data-feather='x' class="feather-xsmall txt-red"></i> to cancel any application</li>
      <li class="ml-3">Click on <i data-feather='printer' class="feather-xsmall"></i> to print fee voucher</li>
      <li class="ml-3">Click on <i data-feather='edit-2' class="feather-xsmall"></i> to edit the payment detail</li>
      <li class="ml-3">Click on <i data-feather='download' class="feather-xsmall"></i> to download the application</li>
   </ul>
   <!-- table header -->
   <div class="frow align-center border-bottom border-silver txt-s txt-grey lh-40">
      <div class="w-10 txt-c">ID</div>
      <div class="w-40">Created At</div>
      <div class="w-20 txt-c rhide">Charges</div>
      <div class="w-10 txt-c">Status</div>
      <div class="w-20 txt-c flex-grow">Actions</div>
      <!-- <div class="w-10 txt-c">...</div> -->
   </div>

   <div class="block">
      @foreach($user->applications()->where('mode',session('mode'))->sortByDesc('id') as $application)
      <div class="frow w-100 tr align-center txt-s py-1 border-bottom border-silver lh-30">
         <div class="w-10 txt-c txt-red"><a href="{{route('applications.show',$application)}}">{{$application->id}}</a></div>
         <div class="w-40">{{$application->created_at}}</div>
         <div class="w-20 txt-c rhide">{{$application->charges}} $ </div>
         <div class="w-10 txt-c">
            @if($application->isverified) Verified
            @elseif($application->hasBankPayment()) <a href="{{url('payments/edit',$application)}}">Paid</a>
            @else <a href="{{url('payments/create',$application)}}" class="btn btn-primary txt-s">Pay</a>
            @endif
         </div>

         <div class="frow w-20 justify-center flex-grow">

            @if($application->isverified) <a href="{{route('application_download',$application)}}" target="_blank"><i data-feather='download' class="feather-xsmall"></i></a>
            @elseif($application->hasBankPayment())
            <a href="{{url('payments/edit',$application)}}" class="mr-3"><i data-feather='edit-2' class="feather-xsmall txt-blue"></i></a>
            <div>
               <form action="{{route('applications.destroy',$application)}}" method="POST" id='del_form{{$application->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$application->id}}')"><i data-feather='x' class="feather-xsmall txt-red"></i></button>
               </form>
            </div>
            @else
            <!-- if payment pending -->
            <a href="{{route('feevoucher', $application)}}" class="mr-3" target="_blank"><i data-feather='printer' class="feather-xsmall"></i></a>
            <div>
               <form action="{{route('applications.destroy',$application)}}" method="POST" id='del_form{{$application->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$application->id}}')"><i data-feather='x' class="feather-xsmall txt-red"></i></button>
               </form>
            </div>
            @endif
         </div>


      </div>
      @endforeach
   </div>

   <div class="mt-4">
      <h4>Instructions:</h4>
      <ul style="margin-left: 20px;" class="txt-s txt-grey lh-20">
         <li>You can find your desired University by searching through its name or by course.</li>
         <li>Small or Capital letter does not affect the search result.</li>
         <li>You can also search by selecting the faculty and then selecting the course.</li>
         <li>You can choose more than one course to get the desired options.</li>
         <li>You can also filter out the University by selecting the location or minimum & maximum fee.</li>
         <li>You can search and download relevant past papers from “Past Papers” portion of this website.</li>
         <li>To schedule one-one counselling session, go to “Career Counselling” portion of website and create a new request.</li>
      </ul>
   </div>

</div>

@endsection

@section('promotion')
<x-student.profile :user="$user"></x-student.profile>
@endsection


<!-- script goes here -->
@section('script')
<script lang="javascript">
function delme(formid) {
   event.preventDefault();
   Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
      if (result.value) {
         //submit corresponding form
         $('#del_form' + formid).submit();
      }
   });
}
</script>
@endsection