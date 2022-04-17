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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-checkmark-circle mr-3"></span> Fee Verification - <span class="txt-s">voucher no. {{$application->id}}</span> </div>
   <div class="w-60 mx-auto">
      <div class="frow align-items-center bg-custom-light p-2 mb-3 relative">
         <a href="{{route('verifybankpayments.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <img src="{{url(asset('images/users/'.$application->user->pic))}}" alt="" width='100' height='100' class="rounded-circle mr-3">
         <div>
            <div class="txt-b">{{$application->user->name}}</div>
            <div class="txt-s txt-grey">{{$application->user->email}}</div>
            <div class="txt-s txt-grey">{{$application->user->phone}}</div>
         </div>


      </div>


      <!-- news panel -->
      <div class="frow stretched align-items-center">
         <div class="w-70">
            <div class="frow mt-3">
               <div class="txt-b w-30">Bank Name</div>
               <div class="">{{$bankpayment->bank}}</div>
            </div>
            <div class="frow mt-3">
               <div class="txt-b w-30">Branch Name</div>
               <div class="">{{$bankpayment->branch}}</div>
            </div>
            <div class="frow mt-3">
               <div class="txt-b w-30">Challan ID</div>
               <div class="">{{$bankpayment->challan}}</div>
            </div>
            <div class="frow mt-3">
               <div class="txt-b w-30">Amount (Rs)</div>
               <div class="">{{$application->charges*150}}</div>
            </div>
            <div class="frow mt-3">
               <div class="txt-b w-30">Date</div>
               <div class="">{{$bankpayment->created_at}}</div>
            </div>
            <div class="frow mt-3">
               <div class="txt-b w-30">Current Status</div>
               <div class="">
                  @if($application->isverified=='')
                  <div class="frow align-items-center">
                     <div class="text-danger mr-3">Not verified</div>
                     <form action="{{route('verifybankpayments.update', $application)}}" method='post'>
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name='isverified' value='1'>
                        <button type='submit' class="btn btn-link text-primary text-left m-0 p-0">Click here to verify</button>
                     </form>
                  </div>

                  @else
                  <div class="frow align-items-center">
                     <div class="text-success mr-3">Verified</div>
                     <form action="{{route('verifybankpayments.update', $application)}}" method='post'>
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name='isverified' value='0'>
                        <button type='submit' class="btn btn-link text-primary text-left m-0 p-0">Click here to cancel</button>
                     </form>
                  </div>
                  @endif


               </div>
            </div>

         </div>
         <div class="w-30 text-center">
            <img src="{{asset('images/vouchers/'.$bankpayment->scancopy)}}" alt="" width='150' height="240">
         </div>

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

function delme(formid) {
   event.preventDefault();
   Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
      if (result.value) {
         //submit corresponding form
         $('#del_form' + formid).submit();
      }
   });
}

function countTextLimit(event) {
   var txt = event.target.value
   $('#text_count').text(txt.length + "/500");

}
</script>
@endsection