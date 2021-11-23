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
<div class="fcol">
   <div class="frow w-100 py-2 mt-1 txt-m txt-b txt-custom-blue">Career Counselling</div>
   <div class="frow txt-s txt-grey">Book a free counseling session if u have any query about</div>
</div>

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

<!-- create new acadmeic -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-100 rw-100 mid-left stretched">
      <div class="txt-custom-blue txt-m">My Counselling Requests</div>

      <div class="frow">
         <a href="{{route('counselling.create')}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='plus' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-3">Create New</div>
      </div>
   </div>
   <!-- table header -->
   <div class="frow mid-left border-bottom mt-3">
      <div class="w-15 txt-s txt-silver">ID</div>
      <div class="w-60 txt-s txt-grey">Created At</div>
      <div class="w-15 txt-s txt-grey">Status</div>
      <div class="w-10 txt-s txt-grey text-center">View</div>
   </div>

   <div class="fcol w-100 rw-100">
      @foreach($user->counsellings()->where('mode','=', session('mode')) as $counselling)
      <div class="frow w-100 tr mid-left py-1 border-bottom">
         <div class="w-15 txt-s">{{$counselling->id}}</div>
         <div class="w-60 txt-s">{{$counselling->created_at}}</div>
         <div class="w-15 txt-s">@if($counselling->status==0) Pending @else Finished @endif </div>
         <div class="w-10 txt-s text-center">
            <a href="{{route('counselling.show',$counselling)}}">
               <i data-feather='eye' class="feather-xsmall text-primary"></i>
            </a>
            &nbsp
         </div>
      </div>
      @endforeach
   </div>
</div>



@endsection

@section('profile')
<x-sidebar__news></x-sidebar__news>
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