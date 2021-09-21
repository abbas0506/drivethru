@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Past Papers</div>
   <div class='frow txt-s txt-white'><a href="{{url('primary')}}">Primary </a> <span class="mx-1"> / </span>past papers </div>
</div>
@endsection
@section('page-content')

<div class="container-60">
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

   <!-- search option -->
   <div class="frow my-4 mid-left fancy-search-grow">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
      <div class="frow box-25 circular bg-success text-light centered mr-2 hoverable" onclick="toggle_addslider()">+</div>
      Create New
   </div>

   <!-- page content -->
   <div class="frow px-2 py-1 mb-2 txt-b bg-info">
      <div class="fcol mid-left w-10">Sr </div>
      <div class="fcol mid-left w-60">Past Paper </div>
      <div class="fcol centered w-20">Image </div>
      <div class="fcol mid-right pr-3 w-10"><i data-feather='settings' class="feather-xsmall"></i></div>
   </div>
   @php $sr=1; @endphp
   @foreach($data as $paper)

   <div class="frow p-2 my-2 border rounded tr">
      <div class="fcol mid-left w-10">{{$sr++}} </div>
      <div class="fcol mid-left w-60"> {{$paper->papertype->name}} - {{$paper->year}} </div>

      @php
      $pic_url=url("storage/images/papers/".$paper->pic);
      @endphp

      <div class="fcol centered w-20"> <img src={{$pic_url}} alt='flag' width=50 height=60> </div>
      <div class="fcol mid-right w-10">
         <div class="frow stretched">
            <div><a href="{{route('papers.edit',$paper)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div>
            <div>
               <form action="{{route('papers.destroy',$paper)}}" method="POST" id='del_form{{$sr}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$sr}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>
      </div>
   </div>
   @endforeach
</div>

@endsection

@section('slider')
<!-- ADD SLIDER -->
<div class="slider" id='addslider'>
   <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggle_addslider()"><i data-feather='x' class="feather-xsmall"></i></div>
   <div class="frow centered my-4 txt-b">NEW</div>
   <div class="frow centered image-frame" id='image_frame'>
      <img src="#" alt='past paper' id='preview_img' width=150 height=180>
      <div class="no-image-caption" style='width:150px; height:180px'>No image</div>
   </div>
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
         <input type="file" id='pic' name='pic' placeholder="past paper" class='w-100 m-0 p-2' onchange='preview_pastpaper()' required>
         <label for="Name">Image</label>
      </div>

      <div class="frow mid-right my-4">
         <button type="submit" class="btn btn-success">Create</button>
      </div>
   </form>

</div>
<!--add slider ends -->

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
         $('#del_form' + formid).submit();
      }
   });
}

function toggle_addslider() {
   $("#addslider").toggleClass('slide-left');
}

function preview_pastpaper() {
   const [file] = pic.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}
</script>
@endsection