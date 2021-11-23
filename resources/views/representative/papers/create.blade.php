@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-representative__header></x-representative__header>
   </div>
   <div class='txt-l txt-white mt-3'>Past Papers</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('representative')}}">Home</a> <span class="mx-1"> / </span>
      <a href="{{route('papers.index')}}">Past Papers</a> <span class="mx-1"> / </span>
      New
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
   <div class="frow border-left border-danger pl-4 my-5 txt-b">New Past Paper</div>
   <!-- data form -->
   <form action="{{route('papers.store')}}" method='post' enctype="multipart/form-data">
      @csrf
      <div class="frow my-4 stretched">
         <div class="fancyselect w-48">
            <select name="papertype_id">
               @foreach($papertypes as $papertype)
               <option value="{{$papertype->id}}">{{$papertype->name}}</option>
               @endforeach
            </select>
            <label for="Name">Paper Type</label>
         </div>
         <div class="fancyinput w-48">
            <input type="number" name='year' placeholder="Enter year" value='2021' required>
            <label for="Name">Year</label>
         </div>
      </div>
      <div class="fancyinput w-100">
         <input type="txt" name='url' placeholder="Paste Url" class='w-100 m-0 p-2' required>
         <label for="Name">Drive URL</label>
      </div>

      <div class="frow mid-right my-4">
         <button type="submit" class="btn btn-success">Create</button>
      </div>
   </form>

</div>


@endsection