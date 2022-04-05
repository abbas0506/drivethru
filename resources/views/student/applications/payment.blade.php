@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='dashboard'></x-student.sidebar>
@endsection

@section('page-title')
Dashboard - <span class="txt-12 px-2">my applications - show</span>
@endsection

@section('content')

<div class="page-centered w-70 bg-light p-4">
   <!-- close button -->
   <a href="{{url('student-dashboard')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall"></i>
      </div>
   </a>

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

   <div class="frow bg-light txt-s">
      <div class="frow btn-rounded-custom-orange centered px-3 mr-3">Bank</div>
      <a href="">Jazz Cash</a>
   </div>

   <div class="border-bottom border-silver p-4">
      <ol type="i" class="txt-grey txt-s">
         <li>Print fee voucher</li>
         <li>Make payment at any brach of specified bank</li>
         <li>Upload scanned copy of paid voucher</li>
      </ol>
   </div>
   <div class="lh-40 txt-center border-bottom border-silver">
      <a href="http://" class="hover-orange">
         <div class="text-center text-primary">Print Challan<i data-feather='printer' class="feather-small ml-3"></i></div>
      </a>
   </div>

   <div class="mt-4">

      <form action="{{route('bankpayments.store')}}" method="post" enctype="multipart/form-data">
         @csrf
         <input type="text" name="user_id" value="{{$application->user_id}}" hidden>
         <input type="text" name="application_id" value="{{$application->id}}" hidden>

         <div class="frow align-center auto-col">
            <div class="fancyinput">
               <input type="date" name="dateon" id='dateon'>
            </div>
            <div class="txt-red txt-c txt-s ml-3">(payment date: mm/dd/yyyy)</div>
         </div>

         <div class="frow mt-4 stretched auto-col">
            <div class="fancyinput w-20">
               <input type="text" name=' bank' id='bank' value='HBL' placeholder="HBL" class="txt-center">
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
               <input type="text" id='charges' value='{{$application->charges*150}}' placeholder="charges" class="txt-center" readonly>
               <label>Amount</label>
            </div>
         </div>
         <div class="frow mt-4 stretched">
            <div class="w-72">
               <div class="fcol fancyinput mr-3">
                  <input type="file" id='scancopy' name='scancopy' placeholder="Scan Copy" class='w-90 m-0 mr-1 p-2' onchange='preview_pic()' required>
                  <label for="Name">Upload scanned copy</label>
               </div>
            </div>
            <div class="frow w-24">
               <img src="" id='preview_img' alt="scan copy" width="100" height="100">
            </div>
         </div>

         <button type='submit' class="btn btn-red mt-4 rw-100">Submit</button>

      </form>
   </div>
</div>
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