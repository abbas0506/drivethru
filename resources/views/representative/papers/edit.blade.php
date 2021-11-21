@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-representative__header></x-representative__header>
   </div>
   <div class='txt-l txt-white mt-3'>Edit Past Paper</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('representative')}}">Home</a> <span class="mx-1"> / </span>
      <a href="{{route('papers.index')}}">Past Papers</a> <span class="mx-1"> / </span>
      Edit
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

   <!-- data form -->
   <form action="{{route('papers.update', $paper)}}" method='post' enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <div class="frow border shadow mt-5">
         <div class="fcol w-60 stretched p-5">
            <div class="fancyselect w-100">
               <select name="papertype_id">
                  @foreach($papertypes as $papertype)
                  <option value="{{$papertype->id}}" @if($papertype->id==$paper->papertype->id) selected @endif>{{$papertype->name}}</option>
                  @endforeach
               </select>
               <label for="Name">Paper Type</label>
            </div>
            <div class="fancyinput w-100">
               <input type="number" name='year' placeholder="Enter year" value="{{$paper->year}}" required>
               <label>Year</label>
            </div>
            <div class="fancyinput w-100">
               <input type="file" id='pic' name='pic' placeholder="past paper" class='w-100 m-0 p-2' onchange='preview_pastpaper()'>
               <label for="Name">Image</label>
            </div>

         </div>

         <!-- left column ends -->

         @php
         $pic_url=url("storage/images/papers/".$paper->pic);
         @endphp

         <div class="fcol w-40 p-5">
            <div class="frow centered image-frame" id='image_frame'>
               <img src="{{$pic_url}}" alt='past paper' id='preview_img' width=150 height=180>
            </div>
         </div>

      </div>

      <div class="frow mid-right my-4">
         <button type="submit" class="btn btn-success">Update</button>
      </div>


   </form>

</div>
@endsection

@section('script')
<script lang="javascript">
function preview_pastpaper() {
   const [file] = pic.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}
</script>
@endsection