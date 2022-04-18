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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-question-circle mr-3"></span> Response <span class="txt-s"> - General Queries</span> </div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('representative.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul class="txt-s">
            <li>Click on reply to answer the query</li>
            <li>Answer will be sent in form of email to the student</li>
         </ul>
      </div>
      <!-- news panel -->
      <div class="mt-3">
         <div class="fancy-search-grow w-30 relative">
            <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; left:12; top:8px;"></i>
         </div>

         <div class="frow my-3 stretched border-bottom txt-b">
            <div class="w-10">#</div>
            <div class="w-30">Name</div>
            <div class="w-50">Query</div>
            <div class="w-10 text-right">Status</div>
         </div>

         @foreach($guestqueries as $guestquery)
         <div class="frow my-2 stretched txt-s tr">
            <div class="w-10">{{$guestquery->id}}</div>
            <div class="w-30">{{$guestquery->name}}</div>
            <div class="w-50">{{$guestquery->message}}</div>
            <div class="w-10 text-right">
               @if($guestquery->status==0)
               <a href="{{route('queryresponses.show',$guestquery)}}" class="bade badge-primary px-1 rounded">Reply</a>
               @else
               Replied
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