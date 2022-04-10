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
   <div class="mx-auto w-80 mt-5">
      <div class='txt-l my-5'>National Universities <span class="txt-m ml-2"> - create new</span> </div> <!-- data form -->

      <div class="frow stretched">
         <form action="{{route('universities.store')}}" method='post' enctype="multipart/form-data">
            @csrf
            <div class="frow stretched auto-col">
               <div class="fancyinput w-48 rw-100">
                  <input type="text" name='name' id='name' placeholder="University name" oninput="search(event)">
                  <label for=" Name" class='bg-transparent'>Name</label>
               </div>

               <div class="frow w-48 rw-100 stretched">
                  <div class="fcol fancyinput">
                     <input type="file" id='logo' name='logo' placeholder="logo" class='w-90 m-0 mr-1 p-2' onchange='preview_logo()' required>
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
                  <input type="number" name='rank' min=1 placeholder='Rank'>
                  <label>Rank</label>
               </div>
            </div>

            <div class="frow mid-right mt-4">
               <button type="submit" class="btn btn-success">Create</button>
            </div>
         </form>
         <div class="bg-light-grey px-5 py-2">
            <div class="txt-b txt-m txt-orange">Universities List</div>
            @foreach($universities as $university)
            <div class="txt-s tr">{{$university->name}}</div>
            @endforeach
         </div>

      </div>

   </div>

</section>
@endsection

@section('script')
<script lang="javascript">
function search(event) {
   var searchtext = event.target.value.toLowerCase();
   var str = 0;
   $('.tr').each(function() {
      if (!(
            $(this).prop('outerText').toLowerCase().includes(searchtext)
         )) {
         $(this).addClass('hide');
      } else {
         $(this).removeClass('hide');
      }
   });
}

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