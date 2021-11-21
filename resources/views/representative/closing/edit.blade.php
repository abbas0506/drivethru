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

   <div class="txt-l txt-center border-left border-danger pl-3 my-4">{{$unicourse->course->name}}</div>
   <form action="{{route('closing.update',$unicourse)}}" method='post'>
      @csrf
      @method('PATCH')
      <div class="fcol">
         <div class="fancyinput mt-3 w-100">
            <input type='date' name='closing' placeholder="Closing date" required value='{{$unicourse->closing}}'>
            <label>Closing </label>
         </div>

         <div class="frow mid-right mt-3">
            <button type="submit" class="btn btn-success">Update</button>
         </div>
   </form>
</div>

@endsection