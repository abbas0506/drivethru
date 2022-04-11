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
   <div class='w-70 mx-auto txt-l my-5'>National Universities <span class="txt-s ml-2"> - {{$university->name}} - edit</span> </div> <!-- data form -->
   <div class="w-70 mx-auto bg-custom-light p-4 relative">
      <a href="{{route('universities.index')}}">
         <div class="top-right-icon circular-20">
            <i data-feather='x' class="feather-xsmall mb-1"></i>
         </div>
      </a>
      <!-- data form -->
      <form action="{{route('universities.update', $university)}}" method='post' enctype="multipart/form-data">
         @csrf
         @method('PATCH')
         <div class="frow w-100 rw-100 mt-5 stretched auto-col">
            <div class="fancyinput w-48 rw-100">
               <input type="text" name='name' id='name' placeholder="University name" value='{{$university->name}}' oninput="search(event)">
               <label for=" Name" class='bg-transparent'>Name</label>
            </div>

            <div class="frow w-48 rw-100 stretched">
               <div class="fcol fancyinput">
                  <input type="file" id='logo' name='logo' placeholder="logo" class='w-90 m-0 mr-1 p-2' onchange='preview_logo()'>
                  <label for="Name" class='bg-transparent'>Logo</label>
               </div>
               <!-- flag image preview -->
               <div class="fcol centered image-frame" id='image_frame'>
                  <img src="#" alt='flag' id='preview_img' width=50 height=49>
                  <div class="no-image-caption txt-xs" style='width:50px; height:49px'>Logo</div>
               </div>

            </div>
         </div>
         <div class="frow w-100 rw-100 mt-3 stretched auto-col">
            <div class="fancyselect w-32 rw-100" id='city_id'>
               <select name="city_id">
                  @foreach($cities as $city)
                  <option value="{{$city->id}}">{{$city->name}}</option>
                  @endforeach
               </select>
               <label>City *</label>
            </div>

            <div class="fancyselect w-32 rw-100">
               <select name="type">
                  <option value="public">Public</option>
                  <option value="private">Private</option>
               </select>
               <label>Type</label>
            </div>
            <div class="fancyinput w-32 rw-100">
               <input type="number" name='rank' min=1 placeholder='Rank' value='{{$university->rank}}'>
               <label>Rank</label>
            </div>
         </div>

         <div class="fcol my-4">

         </div>
         <div class="frow mid-right mt-4">
            <button type="submit" class="btn btn-success">Update</button>
         </div>
      </form>
   </div>


</section>
@endsection

@section('script')
<script lang="javascript">
function preview_logo() {
   const [file] = logo.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}

function validate() {
   var name = $('#name').val()
   var rank = $('#rank').val()

   var msg = '';

   if (name == '') msg = 'Country name is required';
   else if (rank == '') msg = "Rank is required";
   else if (rank <= 0) msg = "Rank value invalid";

   if (msg != '') {
      Toast.fire({
         icon: 'warning',
         title: msg
      });
      return false;
   }
}
</script>
@endsection