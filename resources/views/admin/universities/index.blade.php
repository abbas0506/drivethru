@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Universities</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span>universities </div>
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
   <!-- search option -->
   <div class="frow my-4 mid-left fancy-search-grow">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
      <div class="frow box-25 circular bg-success text-light centered mr-2 hoverable" onclick="toggle_addslider()">+</div>
      Create New
   </div>

   <!-- page content -->
   <div class="frow px-2 py-1 mb-2 txt-b bg-info">
      <div class="fcol mid-left w-10">Sr </div>
      <div class="fcol mid-left w-60">Name </div>
      <div class="fcol mid-left w-15">Data Feed</div>
      <div class="fcol mid-right pr-3 w-15"><i data-feather='settings' class="feather-xsmall"></i></div>
   </div>
   @php $sr=1; @endphp
   @foreach($universities as $university)

   @php
   $logo_url=url("storage/images/logos/".$university->logo);
   @endphp

   <div class="frow px-2 my-2 tr">
      <div class="fcol mid-left w-10">{{$sr++}} </div>
      <div class="fcol mid-left w-5"><img src={{$logo_url}} alt='flag' width=20 height=20 class='rounded-circle'> </div>
      <div class="fcol mid-left w-55"> {{$university->name}} </div>
      <div class="fcol centered w-15">
         <div class="frow w-100 mid-left">
            @php $numofsteps_completed=$university->step1+$university->step2; @endphp
            <div class="bar bar-1 bar-green" style="width:{{$numofsteps_completed*40}}%"></div>
            <div class="bar-val">{{$numofsteps_completed*50}}%</div>
         </div>
      </div>
      <div class="fcol mid-right w-15">
         <div class="frow stretched">
            <div><a href="{{route('universities.edit',$university)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div>
            <div>
               <form action="{{route('universities.destroy',$university)}}" method="POST" id='deleteform{{$university->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$university->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
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
   <div class="frow centered my-4 txt-b">New University</div>
   <div class="frow centered image-frame" id='image_frame'>
      <img src="#" alt='logo' id='preview_img' width=75 height=75>
      <div class="no-image-caption" style='width:75px; height:75px'>Logo</div>
   </div>
   <!-- data form -->
   <form action="{{route('universities.store')}}" method='post' enctype="multipart/form-data">
      @csrf
      <div class="fcol my-4">

         <div class="fancyinput my-2 w-100">
            <input type="text" name='name' placeholder="University name *" required>
            <label>Name *</label>
         </div>
         <div class="fancyinput my-2 w-100">
            <input type="file" id='logo' name='logo' placeholder="uni logo" class='w-100 m-0 p-2' onchange='preview_logo()' required>
            <label>Logo</label>
         </div>
         <div class="fancyselect my-2 w-100" id='city_id'>
            <select name="city_id">
               @foreach($cities as $city)
               <option value="{{$city->id}}">{{$city->name}}</option>
               @endforeach
            </select>
            <label>City *</label>
         </div>

         <div class="fancyselect my-2 w-100">
            <select name="type">
               <option value="public">Public</option>
               <option value="private">Private</option>
            </select>
            <label>Type</label>
         </div>
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
            $(this).children().eq(2).prop('outerText').toLowerCase().includes(searchtext)
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
         $('#deleteform' + formid).submit();
      }
   });
}

function toggle_addslider() {
   $("#addslider").toggleClass('slide-left');
}

function preview_logo() {
   const [file] = logo.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}
</script>
@endsection