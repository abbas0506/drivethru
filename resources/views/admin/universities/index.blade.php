@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Universities</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span>universities </div>
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
      <div class="frow">
         <a href="{{route('universities.create')}}">
            <div class="frow box-25 circular bg-success text-light centered mr-2 hoverable">+</div>
         </a>
         Create New
      </div>
   </div>

   <!-- page content -->
   <div class="frow py-1 mb-2 txt-b txt-grey">
      <div class="fcol mid-left w-10">Sr </div>
      <div class="fcol mid-left w-60">Name </div>
      <div class="fcol mid-left w-15">Data Feed</div>
      <div class="fcol mid-right pr-3 w-15"><i data-feather='settings' class="feather-xsmall"></i></div>
   </div>
   @php $sr=1; @endphp
   @foreach($universities as $university)
   <div class="frow my-2 tr">
      <div class="fcol mid-left w-10">{{$sr++}} </div>
      <div class="fcol mid-left w-5"><img src="{{url(asset('images/universities/'.$university->logo))}}" alt='flag' width=20 height=20 class='rounded-circle'> </div>
      <div class="fcol mid-left w-55"> {{$university->name}} </div>
      <div class="fcol centered w-15">
         <div class="frow w-100 mid-left">
            @if($university->progress()==50)
            <div class="bar bar-1 bar-green" style="width:50%"></div>
            @elseif($university->progress()==100)
            <div class="bar bar-1 bar-green" style="width:100%"></div>
            @endif
            <div class="bar-val">{{$university->progress()}}%</div>
         </div>
      </div>
      <div class="fcol mid-right w-15">
         <div class="frow stretched">
            <div><a href="{{route('universities.show',$university)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div>
            <div>
               <form action="{{route('universities.destroy',$university)}}" method="POST" id='deleteform{{$university->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$university->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>
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
            $(this).children().eq(2).prop('outerText').toLowerCase().includes(searchtext)
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
         $('#deleteform' + formid).submit();
      }
   });
}
</script>
@endsection