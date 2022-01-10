@extends('layouts.standard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='finduniversity' :user="$user"></x-user__sidebar>
@endsection

@section('page-title')
<div class="page-title">Payment</div>
@endsection

@section('page-navbar')
<div class="page-navbar">
   <x-finduniversitybyname__navbar activeItem='find'></x-finduniversitybyname__navbar>
</div>
@endsection

@section('graph')

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

<div class="frow px-4 py-3 mb-2 bg-light">
   <div class="frow btn-rounded-custom-orange centered px-3 txt-s mr-3"><i data-feather='check' class="feather-small mr-2"></i>Bank</div>
   <a href="">
      <div class="frow centered btn-rounded-outline-orange px-3 txt-s hoverable">Jazz Cash</div>
   </a>
</div>
<div class="fcol my-2 p-4 mid-left bg-light">
   <ul>
      <li>First print fee voucher</li>
      <li>Make payment at any brach of specified bank</li>
      <li>Upload scanned copy of paid voucher</li>
   </ul>
</div>
<form action="{{route('bankpayments.store')}}" method="post">
   @csrf
   <div class="my-2 w-100 rw-100 bg-light p-4">
      <div class="frow mid-left">
         <input type="date" name="dateon">
         <span class="text-danger pl-2">(date on which fee has been paid)</span>
      </div>
      <div class="frow mt-3 stretched">
         <div class="fancyinput w-20">
            <input type="text" name='bank' id='bank' value='HBL' placeholder="HBL" class="text-center">
            <label>Bank Name</label>
         </div>
         <div class="fancyinput w-30">
            <input type="text" name='branch' id='branch' value='' placeholder="Enter branch name">
            <label>Branch Name</label>
         </div>
         <div class="fancyinput w-20">
            <input type="text" name='challan' id='challan' value='' placeholder="Enter challan no.">
            <label>Challan No.</label>
         </div>
         <div class="fancyinput w-20">
            <input type="text" name='amount' id='amount' value='' placeholder="Enter amount">
            <label>Amount</label>
         </div>
      </div>
      <div class="frow mt-5 w-100 rw-100">
         <div class="w-70">
            <div class="fcol fancyinput mr-3">
               <input type="file" id='pic' name='banner' placeholder="Picture" class='w-90 m-0 mr-1 p-2' onchange='preview_pic()' required>
               <label for="Name">Upload scanned copy of paid voucher</label>
            </div>
            <button type='submit' class="btn btn-sm btn-success">Upload</button>
         </div>
         <div class="w-30">

            <img src="" id='preview_img' alt="Banner" width="100" height="100">

         </div>

      </div>
   </div>
</form>

@endsection

@section('social')
<x-sidebar__news></x-sidebar__news>
@endsection

@section('script')

<script>
function preview_pic() {
   const [file] = pic.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}
</script>
@endsection