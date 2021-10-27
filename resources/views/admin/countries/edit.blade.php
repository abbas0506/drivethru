@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span>
      <a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> Edit
   </div>
</div>
@endsection
@section('page-content')

<div class="container-75 mt-3">
   <!-- display record save, del, update message if any -->
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

   <div class="fcol rw-100">
      <!--data input -->
      <form action="{{route('countries.update', $country)}}" method='post' enctype="multipart/form-data">
         @csrf
         @method('PATCH')
         <div class="frow w-100 rw-100 mt-4 stretched auto-col">
            <div class="fancyinput w-48 rw-100">
               <input type="text" name='name' placeholder="Country name" value='{{$country->name}}' required>
               <label for="Name" class='bg-transparent'>Country</label>
            </div>

            <div class="frow w-48 rw-100 stretched">
               <div class="fcol fancyinput">
                  <input type="file" id='flag' name='flag' placeholder="flag" class='w-90 m-0 mr-1 p-2' onchange='preview_flag()'>
                  <label for="Name" class='bg-transparent'>Flag</label>
               </div>
               <!-- flag image preview -->
               <div class="fcol centered image-frame" id='image_frame'>
                  <img src="#" alt='flag' id='preview_img' width=50 height=49>
                  <div class="no-image-caption txt-xs" style='width:50px; height:49px'>Flag</div>
               </div>
            </div>
         </div>
         <div class="fancyinput mt-3 w-100">
            <textarea rows="2" name='intro' placeholder="Brief introduction" required>{{$country->intro}}</textarea>
            <label>Introduction</label>
         </div>
         <div class="frow w-100 rw-100 mt-3 stretched auto-col">
            <div class="fancyinput w-70 rw-100">
               <input name='essential' placeholder="Essesntials" value='{{$country->essential}}' required>
               <label>Essential Requiremnts</label>
            </div>
            <div class="fancyselect hw-25 rw-100 rmt-3">
               <select name='edufree'>
                  <option value='1' @if($country->edufree==1) selected @endif>Yes</option>
                  <option value='0' @if($country->edufree==1) selected @endif >No</option>
               </select>
               <label>Is Education Free?</label>
            </div>
         </div>

         <div class="fancyinput mt-3 w-100">
            <textarea rows="2" name='lifethere' placeholder="Life there" required>{{$country->lifethere}}</textarea>
            <label>Life there</label>
         </div>
         <div class="fancyinput mt-3 w-100">
            <textarea rows="2" name='jobdesc' placeholder="Job description" required>{{$country->jobdesc}}</textarea>
            <label>Job Description</label>
         </div>
         <div class="fancyinput mt-3 w-100">
            <textarea rows="2" name='livingcostdesc' placeholder="Living cost description" required>{{$country->livingcostdesc}}</textarea>
            <label>Living Cost Description</label>
         </div>
         <div class="frow mid-right my-4">
            <button type="submit" class="btn btn-success">Create</button>
         </div>
      </form>
   </div>
</div>
@endsection

@section('script')
<script lang="javascript">
function preview_flag() {
   const [file] = flag.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}

function showOrHideDuration(event) {
   if (event.target.value == 0) { //visa not required
      $('#visaduration').val(0)
      $('#visaduration').prop('disabled', true)
   } else {
      $('#visaduration').prop('disabled', false)
      $('#visaduration').val(1)
   }
}
</script>
@endsection