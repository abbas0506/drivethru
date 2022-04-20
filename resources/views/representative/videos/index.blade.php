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

   <div class='w-60 mx-auto txt-l my-5 '> <span class="lnr lnr-film-play mr-3"></span> Site Video</div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('representative.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul class="txt-s">
            <li>Try to use small sized video. (Max: 20MB)</li>
            <li>Should be .mp4 format only</li>
         </ul>
      </div>
      <div class="my-5 text-center">
         <video width="400" controls autoplay muted>
            @if($video)
            <source src="{{asset('/videos/'.$video->name)}}" type="video/mp4">
            @else
            <source src="{{asset('/videos/drivethru.mp4')}}" type="video/mp4">
            @endif
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
         </video>
      </div>
      <form action="{{route('sitevideo.store')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="frow stretched">
            <div class="fancyinput w-100 mr-3">
               <input type="file" id='mp4' name='mp4' placeholder="Video" class='p-2' onchange='preview_pic()' required>
               <label for="Name">Upload Banner</label>
            </div>
            <button type='submit' class="btn btn-sm btn-success">Upload</button>
         </div>
      </form>
   </div>
</section>
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