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
      <div class="frow lh-30 txt-blue txt-m">
         My Requestes <div class="ml-3">@if(session('mode')==0) <img src="{{asset('/images/icons/pakistan-flag.png')}}" width="22"> @else <img src="{{asset('/images/icons/globe.png')}}" width="20"> @endif</div>
      </div>

      <div class="frow">
         <a href="{{route('counselling.create')}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='plus' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-3 hide-sm">Create New</div>
      </div>
   </div>
   <!-- table header -->
   <div class="frow lh-30 txt-s txt-grey border-bottom border-silver mt-3">
      <div class="w-10">ID</div>
      <div class="w-30 ">Created At</div>
      <div class="w-50 ">Query</div>
      <div class="flex-grow txt-c">Status</div>
   </div>

   <div class="">
      @foreach($user->counsellings()->where('mode','=', session('mode'))->sortByDesc('id') as $counselling)
      <div class="frow align-center tr txt-s border-bottom border-silver py-2">
         <div class="w-10">{{$counselling->id}}</div>
         <div class="w-30">{{$counselling->created_at}}</div>
         <div class="w-50">{{Str::limit($counselling->query,50)}}</div>
         <div class="flex-grow txt-c">
            @if($counselling->response=='') <i data-feather='clock' class="feather-small mt-1"></i>
            @else
            <a href="{{route('counselling.show',$counselling)}}" class="txt-red">Replied</a>
            @endif
         </div>
      </div>
      @endforeach
   </div>
</div>
@endsection

@section('promotion')
<x-student.newspanel :advertisement="$advertisement"></x-student.newspanel>
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