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
<div class="bg-white p-4">
   <div class="frow stretched">
      <div class="txt-red txt-m">My Counselling Requests</div>

      <div class="frow">
         <a href="{{route('counselling.create')}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='plus' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-3 hide-sm">Create New</div>
      </div>
   </div>
   <!-- table header -->
   <div class="frow lh-30 txt-s txt-grey border-bottom border-silver mt-3">
      <div class="w-15">ID</div>
      <div class="w-60 ">Created At</div>
      <div class="flex-grow txt-r">Status</div>
   </div>

   <div class="lh-30">
      @foreach($user->counsellings()->where('mode','=', session('mode')) as $counselling)
      <div class="frow align-center tr txt-s border-bottom border-silver">
         <div class="w-15 txt-red"><a href="{{route('counselling.show',$counselling)}}">{{$counselling->id}}</a></div>
         <div class="w-60">{{$counselling->created_at}}</div>
         <div class="flex-grow txt-r">
            @if($counselling->status==0) <i data-feather='clock' class="feather-small mt-1"></i>
            @else <i data-feather='check' class="feather-small mt-1"></i>
            @endif </div>
      </div>
      @endforeach
   </div>
</div>
@endsection

@section('promotion')
<x-student.newspanel></x-student.newspanel>
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