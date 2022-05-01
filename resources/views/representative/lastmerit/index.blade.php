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

   <div class='w-60 mx-auto txt-l my-5 '> <span class="lnr lnr-graduation-hat mr-3"></span> Last Merit</div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('representative.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul>
            <li>You may search university by typing its name</li>
            <li>Click on university name to set last merit of its various courses</li>
         </ul>
      </div>

      <div class="frow w-30 fancy-search-grow bg-light relative">
         <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; top:7px;left:12px"></i>
      </div>

      <div class="my-2">
         @if($universities->count()>0)
         <div class="frow p-1 mt-2 border-bottom tr txt-s txt-grey">
            <div class="w-10">Sr. </div>
            <div class="w-50"> University </div>
            <div class="w-20 text-right">Location </div>
            <div class="w-20 text-right">Type</div>
         </div>

         @php $sr=1; @endphp
         @foreach($universities as $university)

         <div class="frow p-1 border-bottom tr">
            <div class="w-10">{{$sr++}} </div>
            <div class="w-50"><a href="{{url('lastmerit/courselist', $university->id)}}" class="text-primary"> {{$university->name}}</a></div>
            <div class="w-20 text-right txt-s"> {{$university->city->name}} </div>
            <div class="w-20 text-right txt-s">{{$university->type}}</div>
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