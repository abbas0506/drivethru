@extends('layouts.representative')

@section('page-content')
<section class='page-content'>
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

   <div class='w-60 mx-auto txt-l my-5 '> <span class="lnr lnr-calendar-full mr-3"></span>Closing Date - <span class="txt-s">{{$university->name}}</span></div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('closing.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul>
            <li>You may search course by typing its name</li>
            <li>Small or capital letters does not matter</li>
         </ul>
      </div>
      <div class="frow w-30 fancy-search-grow bg-light relative">
         <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; top:7px;left:12px"></i>
      </div>

      <div class="my-2">
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
         <div class="frow mt-2 txt-orange centered">
            Database is empty
         </div>
         @endif
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