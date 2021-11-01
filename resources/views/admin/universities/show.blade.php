@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Universities</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a><span class="mx-1"> / </span>
      <a href="{{route('universities.index')}}">Universities </a><span class="mx-1"> / </span>
      {{$university->name}}
   </div>
</div>
@endsection

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

@section('page-content')

<div class="frow w-100 bg-custom-light p-4 rw-100 auto-col stretched">
   <div class="fcol w-72 rw-100 py-4 px-5 bg-white ">
      <div class="frow w-100 rw-100 stretched">
         <div class="txt-b txt-m">Basic Profile </div>
         <div class="frow">
            <a href="{{route('universities.edit', $university)}}">
               <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
            </a>
         </div>

      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Name:</div>
         <div class="fcol w-80 rw-100 mid-left">{{$university->name}}</div>
      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">City:</div>
         <div class="fcol w-80 rw-100 mid-left">{{$university->city->name}}</div>
      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Type</div>
         <div class="fcol w-80 rw-100 mid-left">{{$university->type}}</div>
      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Rank:</div>
         <div class="fcol w-80 rw-100 mid-left">{{$university->rank}}</div>
      </div>

   </div>
   <!-- right hand profile bar -->
   <div class="fcol hw-25 bg-white p-4 rw-100">
      <x-university__profile :university=$university></x-university__profile>
   </div>
</div>

@endsection