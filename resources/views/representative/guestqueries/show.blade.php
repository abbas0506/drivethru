@extends('layouts.representative')
@section('page-content')
<!-- display record save, del, update message if any -->
<section class='page-content'>
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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-question-circle mr-3"></span> General Queries - <span class="txt-s">response</span> </div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('queryresponses.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>

         <div class="txt-b"><span class="lnr lnr-user mx-3"></span>{{$guestquery->name}}</div>
         <div class="txt-s txt-grey"><span class="lnr lnr-envelope mx-3"></span>{{$guestquery->email}}</div>
         <div class="txt-s txt-grey"><span class="lnr lnr-phone-handset mx-3"></span>{{$guestquery->phone}}</div>

      </div>


      <!-- news panel -->

      <div class="frow mt-3">
         <div class="txt-b w-30">Subject</div>
         <div class="">{{$guestquery->subject}}</div>
      </div>
      <div class="frow mt-3">
         <div class="txt-b w-30">Query Message</div>
         <div class="">{{$guestquery->message}}</div>
      </div>

      <div class="fancyinput mt-5">
         <textarea name="" id="" rows="4" class="w-100"></textarea>
         <label for="">Your Reply</label>
      </div>
   </div>
</section>
@endsection