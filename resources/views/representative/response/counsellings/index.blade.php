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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-bubble mr-3"></span> Response <span class="txt-s">- counsellig requests</span></div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('representative.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul class="txt-s">
            <li>Click on reply to answer the request</li>
            <li>Use keywords "reply" or "replied" or specific user name for quick search</li>
         </ul>
      </div>
      <!-- news panel -->
      <div class="mt-3">
         <div class="fancy-search-grow w-30 relative">
            <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; left:12; top:8px;"></i>
         </div>

         <div class="frow py-2 mt-3 stretched border-bottom txt-b">
            <div class="w-10">ID</div>
            <div class="w-20">Created At</div>
            <div class="w-20">Student</div>
            <div class="w-40">Request Desc.</div>
            <div class="w-10 text-right">Status</div>
         </div>

         @php $sr=1; @endphp
         @foreach($crequests->sortByDesc('id') as $counselling)

         <div class="frow py-2 txt-s border-bottom tr">
            <div class="w-10">{{$sr++}}</div>
            <div class="w-20">{{$counselling->created_at}} </div>
            <div class="w-20">{{$counselling->user->name}}</div>
            <div class="w-40">@if($counselling->query) {{$counselling->query}} @else <a href="{{route('counsellingresponses.show',$counselling)}}" class="text-primary">Click here to see request detail</a> @endif</div>
            <div class="w-10 text-right">
               @if($counselling->response=='')
               <a href="{{route('counsellingresponses.show',$counselling)}}" class="bade badge-primary px-1 rounded">Reply</a>
               @else
               Replied
               @endif
            </div>
         </div>
         @endforeach
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
            $(this).children().eq(2).prop('outerText').toLowerCase().includes(searchtext) ||
            $(this).children().eq(4).prop('outerText').toLowerCase().includes(searchtext)
         )) {
         $(this).addClass('hide');
      } else {
         $(this).removeClass('hide');
      }
   });
}
</script>
@endsection