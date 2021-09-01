@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> New</div>
</div>
@endsection
@section('page-content')

<!-- display record save, del, update message if any -->
@if ($errors->any())
<div class="alert alert-danger mx-10 mt-5">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
<br />
@elseif(session('success'))
<div class="alert alert-success mx-10 mt-5 alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   {{session('success')}}
</div>
<br />

@endif

<!-- search option -->
<div class="frow my-4 mx-10 fancy-search-grow">
   <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24; top:5px"></i>
   <div class="frow box-25 circular bg-success text-light centered mr-2"><a href="{{route('countries.create')}}" class="hoverable txt-white">+</a></div> Create New
</div>

<!-- page content -->
<div class="frow px-2 mb-2 mx-10 txt-b bg-info">
   <div class="fcol mid-left w-10">Sr </div>
   <div class="fcol mid-left w-25">Name </div>
   <div class="fcol mid-left w-10">Visa Required</div>
   <div class="fcol mid-left w-10">Visa Duration</div>
   <div class="fcol mid-left w-10">Living Cost</div>
   <div class="fcol mid-left w-25">Life There</div>
   <div class="fcol centered w-10"><i data-feather='settings' class="feather-xsmall"></i></div>
</div>

@foreach($countries as $country)
<div class="frow px-2 my-1 mx-10 tr">
   <div class="fcol mid-left w-10">{{$country->id}} </div>
   <div class="fcol mid-left w-25"> {{$country->name}} </div>
   <div class='fcol col-center w-10'>
      @if($country->visarequired==1)
      <span class='txt-green'>Yes</span>
      @else
      <span class='txt-red'>No</span>
      @endif
   </div>
   <div class="fcol mid-left w-10">{{$country->visaduration}} </div>
   <div class="fcol mid-left w-10">{{$country->livingcost}} </div>
   <div class="fcol mid-left w-25">{{$country->lifethere}} </div>
   <div class="fcol centered w-10">
      <div class="frow stretched">
         <div><a href="{{route('countries.show',$country)}}"><i data-feather='eye' class="feather-xsmall mx-1"></i></a></div>
         <div><a href="{{route('countries.edit',$country)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div>
         <div>
            <form action="{{route('countries.destroy',$country)}}" method="POST" id='deleteform{{$country->id}}'>
               @csrf
               @method('DELETE')
               <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$country->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
            </form>
         </div>
      </div>
   </div>

</div>

@endforeach

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