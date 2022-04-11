@extends('layouts.admin')
@section('header')
<x-admin.header></x-admin.header>
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
<section class="page-content">
   <div class="mx-auto w-60">
      <div class="frow align-items-center my-5">
         <div class='txt-l mr-3'>National Universities </div>
         <a href="{{route('universities.create')}}" class="mr-auto">
            <div class="frow box-25 circular bg-success text-light centered mr-auto hoverable">+</div>
         </a>
         <div class="w-30 justify-content-end">
            <div class="fancy-search-grow">
               <input type="text" placeholder="Search" oninput="search(event)">
               <i data-feather='search' class="feather-small absolute" style='top:8px;left:10px'></i>
            </div>
         </div>
      </div>
      <!-- page content -->
      <div class="frow py-1 mb-2 txt-b bg-light-grey">
         <div class="w-10">Sr </div>
         <div class="w-60">Name </div>
         <div class="w-15">Data Feed</div>
         <div class="w-15 text-right"><i data-feather='settings' class="feather-xsmall"></i></div>
      </div>
      @php $sr=1; @endphp
      @foreach($universities as $university)
      <div class="frow my-2 tr">
         <div class="w-10">{{$sr++}} </div>
         <div class="w-5"><img src="{{url(asset('images/universities/'.$university->logo))}}" alt='flag' width=20 height=20 class='rounded-circle'> </div>
         <div class="w-55 text-primary"><a href="{{route('universities.show',$university)}}">{{$university->name}} </a> </div>
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
         <div class="w-15 text-right">

            <!-- <div><a href="{{route('universities.show',$university)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div> -->

            <form action="{{route('universities.destroy',$university)}}" method="POST" id='deleteform{{$university->id}}'>
               @csrf
               @method('DELETE')
               <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$university->id}}')"><i data-feather='x' class="feather-xsmall txt-red"></i></button>
            </form>


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