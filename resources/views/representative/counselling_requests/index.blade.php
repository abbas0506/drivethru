@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-representative__header></x-representative__header>
   </div>
   <div class='txt-l txt-white mt-3'>Counselling Requests</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('representative')}}">Home</a> <span class="mx-1"> / </span>
      Counselling Requests
   </div>
</div>
@endsection
@section('page-content')
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

<div class="container-60">
   <!-- search option -->
   <div class="frow my-4 mid-left fancy-search-grow">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
   </div>

   <!-- page content -->
   <div class="frow py-2 border-bottom txt-grey">
      <div class="fcol mid-left w-10">Sr </div>
      <div class="fcol mid-left w-60">Request Time </div>
      <div class="fcol mid-left w-20">Status </div>
      <div class="fcol centered w-10"><i data-feather='clock' class="feather-xsmall"></i></div>
   </div>
   @php $sr=1; @endphp
   @foreach($counselling_requests as $counselling)

   <div class="frow py-2 my-1 border-bottom tr">
      <div class="fcol mid-left w-10">{{$sr++}} </div>
      <div class="frow mid-left w-60 text-primary hoverable" onclick="showModal('{{$counselling->user->name}}', '{{$counselling->created_at}}', '{{$counselling->option1}}','{{$counselling->option2}}','{{$counselling->option3}}','{{$counselling->option4}}','{{$counselling->option5}}','{{$counselling->query}}')">
         {{$counselling->created_at}}
      </div>
      @if($counselling->response)
      <div class="fcol mid-left w-20"> Pending </div>
      <div class="fcol centered w-10">
         <a href="{{url('counselling/requests/'.$counselling->id.'/edit')}}">
            <div class="badge badge-danger">Finish</div>
         </a>
      </div>
      @else
      <div class="fcol mid-left w-20"> Finished </div>
      <div class="fcol centered w-10"> -
      </div>

      @endif

   </div>

   @endforeach
</div>

<div class="container">
   <!-- Modal -->
   <div class="modal fade" id="viewCounsellingDetailModal" role="dialog">
      <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <div class="h4">Counselling Request</div>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="frow">
                  <div class="w-30">User Name:</div>
                  <div class="w-70" id='user'></div>
               </div>
               <div class="frow">
                  <div class="w-30">Created At:</div>
                  <div class="w-70" id='created_at'></div>
               </div>
               <div class="frow mt-3">
                  <div class="w-30 txt-b"> Request Detail:</div>
                  <div class="w-70">
                     <ul class="pl-3">
                        <li id='option1'>International admission enquiry</li>
                        <li id='option2'>National univeristy enquiry</li>
                        <li id='option3'>Website usage issue</li>
                        <li id='option4'>Fee payment issue</li>
                        <li id='option5'>General information required</li>
                        <li id='query'></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- <div class="modal-footer">
               <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div> -->
         </div>

      </div>
   </div>

</div>


@endsection
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

function showModal(user, created_at, option1, option2, option3, option4, option5, query) {

   $('#user').html(user);
   $('#created_at').html(created_at);

   if (option1 == '0') $('#option1').hide();
   else $('#option1').show();
   if (option2 == '0') $('#option2').hide();
   else $('#option2').show();
   if (option3 == '0') $('#option3').hide();
   else $('#option3').show();
   if (option4 == '0') $('#option4').hide();
   else $('#option4').show();
   if (option5 == '0') $('#option5').hide();
   else $('#option5').show();
   if (query == '')
      $('#query').hide();
   else {
      $('#query').html(query);
      $('#query').show();

   }


   $('#viewCounsellingDetailModal').modal('show');
}
</script>
@endsection