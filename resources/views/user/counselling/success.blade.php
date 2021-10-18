@extends('layouts.dashboard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='counselling' :user="$user"></x-user__sidebar>
@endsection

@section('page-header')
<div class="fcol mt-3">
   <div class="frow w-100 pt-2 txt-m txt-b txt-custom-blue">Career Counselling</div>
   <div class="frow txt-s txt-grey">Book a free counseling session if u have any query about</div>
</div>

@endsection

@section('data')
<!-- create new acadmeic -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-20 my-2 mid-left txt-b txt-m txt-green"><span style="border-bottom:3px darkgreen solid">Free Session</span></div>
   <div class="frow my-1 txt-grey">
      Your request for free counselling session has been successfully submitted. Our representative will soon contact with you on call.
   </div>
   <div class="frow mid-right">
      <a href="{{url('user_dashboard')}}" class="btn btn-sm btn-info">OK</a>
   </div>

</div>


@endsection

@section('profile')
<x-profile__panel :user="$user"></x-profile__panel>
@endsection

<!-- script goes here -->
@section('script')
<script lang="javascript">
   function search(event) {
      var searchtext = event.target.value.toLowerCase();
      var str = 0;
      $('.tr').each(function() {
         if (!(
               $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext)
            )) {
            $(this).addClass('hide');
         } else {
            $(this).removeClass('hide');
         }
      });
   }
</script>
@endsection