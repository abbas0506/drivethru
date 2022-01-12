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
   Choose a payment method and follow the instructions
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
<div class="frow my-2 p-4 mid-left bg-light stretched">
   <div class="w-72">
      <ol type="i" class="txt-grey txt-s">
         <li>Print fee voucher</li>
         <li>Make payment at any brach of specified bank</li>
         <li>Upload scanned copy of paid voucher</li>
      </ol>
   </div>
   <div class="fcol w-24 centered">
      <a href="http://" class="hover-orange">
         <div class="text-center text-primary"><i data-feather='printer' class="feather-medium"></i></div>
         <div class="text-center text-primary">Print Challan</div>
      </a>
   </div>

</div>
<form action="{{route('bankpayments.store')}}" method="post" enctype="multipart/form-data">
   @csrf
   <input type="text" name="user_id" value="{{$application->user_id}}" hidden>
   <input type="text" name="application_id" value="{{$application->id}}" hidden>
   <div class="my-2 w-100 rw-100 bg-light p-4">
      <div class="frow mid-left">
         <input type="date" name="dateon" id='dateon'>
         <span class="text-danger pl-2">(date on which fee has been paid: mm/dd/yyyy)</span>
      </div>
      <div class="frow mt-4 stretched">
         <div class="fancyinput w-20">
            <input type="text" name=' bank' id='bank' value='HBL' placeholder="HBL" class="text-center">
            <label>Bank Name</label>
         </div>
         <div class="fancyinput w-30">
            <input type="text" name='branch' id='branch' value='' placeholder="Branch name">
            <label>Branch Name</label>
         </div>
         <div class="fancyinput w-20">
            <input type="text" name='challan' id='challan' value='' placeholder="Challan no.">
            <label>Challan No.</label>
         </div>
         <div class="fancyinput w-20">
            <input type="text" id='charges' value='{{$application->charges*150}}' placeholder="charges" class="text-center" readonly>
            <label>Amount</label>
         </div>
      </div>
      <div class="frow mt-4 w-100 rw-100 stretched">
         <div class="w-72">
            <div class="fcol fancyinput mr-3">
               <input type="file" id='scancopy' name='scancopy' placeholder="Scan Copy" class='w-90 m-0 mr-1 p-2' onchange='preview_pic()' required>
               <label for="Name">Upload scanned copy of paid voucher</label>
            </div>
         </div>
         <div class="frow w-24 mid-right">
            <img src="" id='preview_img' alt="scan copy" width="100" height="100">
         </div>
      </div>
   </div>
   <div class="frow my-2 w-100 rw-100 bg-light px-4 py-3  mid-right">
      <button type='submit' class="btn btn-sm btn-success">Submit</button>
   </div>
</form>

@endsection

@section('social')
<x-sidebar__news></x-sidebar__news>
@endsection

@section('script')

<script>
   document.getElementById('dateon').valueAsDate = new Date();

   function preview_pic() {
      const [file] = scancopy.files
      if (file) {
         preview_img.src = URL.createObjectURL(file)
         $('#image_frame').addClass('has-image');
      }
   }
</script>
@endsection