@extends('layouts.student')

@php
$user=session('user');
@endphp

@section('sidebar')
<x-student.sidebar activeItem='counselling'></x-student.sidebar>
@endsection

@section('page-title')
Career Counselling
@endsection


@section('content')

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

<!-- create new acadmeic -->
<div class="bg-white p-4">
   <div class="frow stretched">
      <div class="frow lh-30 txt-blue txt-m">
         My Requestes <div class="ml-3">@if(session('mode')==0) <img src="{{asset('/images/icons/pakistan-flag.png')}}" width="22"> @else <img src="{{asset('/images/icons/globe.png')}}" width="20"> @endif</div>
      </div>

      <div class="frow">
         <a href="{{route('counselling.create')}}">
            <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='plus' class="feather-xsmall txt-white"></i></div>
         </a>
         <div class="ml-3 hide-sm">Create New</div>
      </div>
   </div>
   <ul class="txt-s txt-grey">
      Read me
      <li class="ml-3">Click on <i data-feather='x' class="feather-xsmall txt-red mt-1"></i> button to cancel the request at any time </li>
      <li class="ml-3">Click on <span class="txt-green txt-b"> replied</span> to see reply from drivethru representative</li>
   </ul>
   <!-- table header -->
   <div class="frow lh-30 txt-s txt-grey border-bottom border-silver mt-3">
      <div class="w-10">ID</div>
      <div class="w-30 ">Created At</div>
      <div class="w-50 ">Query</div>
      <div class="flex-grow txt-c">Status</div>
   </div>

   <div class="">
      @foreach($user->counsellings()->where('mode','=', session('mode'))->sortByDesc('id') as $counselling)
      <div class="frow align-center tr txt-s border-bottom border-silver py-2">
         <div class="w-10">{{$counselling->id}}</div>
         <div class="w-30">{{$counselling->created_at}}</div>
         <div class="w-50">{{Str::limit($counselling->query,50)}}</div>
         <div class="flex-grow txt-c">
            @if($counselling->response=='')
            <!-- <i data-feather='clock' class="feather-xsmall mt-1 mr-2"></i> -->
            <!-- <i data-feather='x' class="feather-xsmall txt-red mt-1"></i> -->

            <form action="{{route('counselling.destroy',$counselling)}}" method="POST" id='del_form{{$counselling->id}}'>
               @csrf
               @method('DELETE')
               <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$counselling->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
            </form>
            @else
            <a href="{{route('counselling.show',$counselling)}}" class="txt-green txt-b">Replied</a>
            @endif
         </div>
      </div>
      @endforeach
   </div>
</div>
@endsection

@section('promotion')
<x-student.newspanel :advertisement="$advertisement"></x-student.newspanel>
@endsection

<!-- script goes here -->
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
</script>
@endsection