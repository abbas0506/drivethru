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
      <div class="fcol centered pr-3 w-10">Edit</div>
   </div>
   @php $sr=1; @endphp
   @foreach($counselling_requests as $counselling)

   <div class="frow py-2 my-1 border-bottom tr">
      <div class="fcol mid-left w-10">{{$sr++}} </div>
      <div class="fcol mid-left w-60"> {{$counselling->created_at}}</div>
      <div class="fcol mid-left w-20">@if($counselling->status==0) Pending @else Finished @endif</div>
      <div class="fcol centered w-10">
         <a href="{{url('counselling/requests/'.$counselling->id.'/edit')}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a>
      </div>
   </div>
   @endforeach
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
</script>
@endsection