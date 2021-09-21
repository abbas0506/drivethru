@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Past Papers</div>
   <div class='frow txt-s txt-white'><a href="{{url('primary')}}">Primary </a> <span class="mx-1"> / </span> <a href="{{route('papers.index')}}">Papers </a> <span class="mx-1">/ edit </span> </div>
</div>
@endsection
@section('page-content')

<div class="container" style="width:60%">
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
   @endif
</div>
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