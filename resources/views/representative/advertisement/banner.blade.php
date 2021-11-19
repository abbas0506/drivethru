@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-representative__header></x-representative__header>
   </div>
   <div class='txt-l txt-white'>Upload Banner</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('representative')}}">Home</a> <span class="mx-1"> / </span>
      Banner
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

@section('data')
<div class="fcol w-100 rw-100 centered bg-white p-4">
   <div class="my-5">
      <img src="" id='preview_img' alt="Pic" width="100" height="100">
   </div>
   <form action="#" method="post" enctype="multipart/form-data">
      @csrf
      <div class="frow w-100 rw-100">
         <div class="fcol fancyinput mr-3">
            <input type="file" id='pic' name='pic' placeholder="Picture" class='w-90 m-0 mr-1 p-2' onchange='preview_pic()' required>
            <label for="Name">Upload Banner</label>
         </div>
         <button type='submit' class="btn btn-sm btn-success">Upload</button>
      </div>



   </form>
</div>

@endsection

@section('script')

<script>
function preview_pic() {
   const [file] = pic.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}
</script>
@endsection