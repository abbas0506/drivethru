@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-representative__header></x-representative__header>
   </div>
   <div class='txt-l txt-white'>News Feed</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('representative')}}">Home</a> <span class="mx-1"> / </span>
      News
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

   <form action="{{route('news.update',$news)}}" method='post'>
      @csrf
      @method('PATCH')

      <div class="fcol mt-5">

         <div class="fancyinput mt-3 w-100">
            <textarea rows="2" name='text' placeholder="News Text" required oninput='countTextLimit(event)'>value='{{$news->text}}'</textarea>
            <label>News Text <span class="txt-s ml-4 txt-grey" id='text_count'></span></label>
         </div>

         <div class="frow mid-right">
            <button type="submit" class="btn btn-success">Update</button>
         </div>
   </form>
</div>
@endsection
@section('script')
<script lang="javascript">
function countTextLimit(event) {
   var txt = event.target.value
   $('#text_count').text(txt.length + "/500");
}
</script>
@endsection