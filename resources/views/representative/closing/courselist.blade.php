@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-representative__header></x-representative__header>
   </div>
   <div class='txt-l txt-white mt-3'>Set Closing Date</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('representative')}}">Home</a> <span class="mx-1"> / </span>
      Closing
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
   <div class="txt-l txt-center border-left border-danger pl-3 my-4">{{$university->name}}</div>

   <div class="fcol my-2 p-4 mid-left bg-light">
      <ul>
         <li>Part of course name is also acceptable</li>
         <li>Capital or small letters will not affect search result</li>
      </ul>
      <div class="frow w-100 fancy-search-grow bg-light ml-4">
         <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; top:7px;right:24px"></i>
      </div>
   </div>
   <div class="my-2 w-100 rw-100 bg-light p-4">
      @if($university->unicourses()->count()>0)
      <div class="frow p-1 mt-2 border-bottom tr txt-s txt-grey">
         <div class="w-10">Sr. </div>
         <div class="w-60"> Course </div>
         <div class="w-20 text-right">Closing </div>
         <div class="w-10 text-center">Edit</div>
      </div>

      @php $sr=1; @endphp
      @foreach($university->unicourses() as $unicourse)

      <div class="frow p-1 border-bottom tr">
         <div class="w-10">{{$sr++}} </div>
         <div class="w-60 txt-s"> {{$unicourse->course->name}} </div>
         <div class="w-20 text-right txt-s">{{$unicourse->closing}}</div>
         <div class="w-10 text-center txt-s">
            <a href="{{route('closing.edit', $unicourse->id)}}" class="text-primary"> <i data-feather='edit-3' class="feather-xsmall"></i></a>
         </div>
      </div>
      @endforeach
      @else
      <!-- no university found -->
      <div class="frow w-100 rw-100 mt-2 txt-orange centered">
         Database is empty
      </div>
      @endif
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
</script>
@endsection