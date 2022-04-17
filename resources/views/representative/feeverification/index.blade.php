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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-checkmark-circle mr-3"></span> Fee Verification </span> </div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('representative.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul class="txt-s">
            <li>Click on id to see bank payment detail</li>
            <li>Next page will show enlarged scan copy of paid voucher</li>
         </ul>
      </div>
      <!-- news panel -->
      <div class="mt-3">
         <div class="fancy-search-grow w-30 relative">
            <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; left:12; top:8px;"></i>
         </div>

         <div class="frow my-3 stretched border-bottom txt-b">
            <div class="w-10">#</div>
            <div class="w-20">Bank</div>
            <div class="w-20">Branch</div>
            <div class="w-10">Fee (Rs)</div>
            <div class="w-15">Date On</div>
            <div class="w-15 text-center">Proof</div>
            <div class="w-10 text-right">Status</div>
         </div>

         @foreach($bankpayments as $bankpayment)
         <div class="frow my-2 stretched tr">
            <div class="w-10 text-primary"><a href="{{route('verifybankpayments.show', $bankpayment)}}">{{$bankpayment->application_id}}</a></div>
            <div class="w-20">{{$bankpayment->bank}}</div>
            <div class="w-20">{{$bankpayment->branch}}</div>
            <div class="w-10">{{$bankpayment->charges*150}}</div>
            <div class="w-15">{{$bankpayment->dateon}}</div>
            <div class="w-15 text-center"><img src="{{asset('images/vouchers/'.$bankpayment->scancopy)}}" alt="" width='25' height="25"></div>
            <div class="w-10 text-right">
               @if($bankpayment->isverified=='')
               Not Verified
               @else
               Verified
               @endif
            </div>
         </div>
         @endforeach
      </div>


</section>
@endsection

@section('script')
<script lang="javascript">
function search(event) {
   var searchtext = event.target.value.toLowerCase();
   var str = 0;
   $('.tr').each(function() {
      if (!(
            $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext)
         )) {
         $(this).addClass('hide');
      } else {
         $(this).removeClass('hide');
      }
   });
}
</script>
@endsection