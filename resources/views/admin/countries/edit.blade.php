@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a><span class="mx-1"> / </span>
      <a href="{{route('countries.index')}}">Countries </a><span class="mx-1"> / </span>
      {{$country->name}}
   </div>
</div>
@endsection

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

@section('page-content')

<div class="frow w-100 bg-custom-light p-4 rw-100 auto-col stretched">
   <div class="fcol w-72 rw-100 py-4 px-5 bg-white ">
      <div class="frow w-100 rw-100 stretched">
         <div class="txt-b txt-m">Edit Country Profile </div>
         <div class="frow">
            <a href="{{route('countries.show', $country)}}">
               <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
            </a>
         </div>

      </div>
      <div class="fcol mt-4 rw-100">

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
               <button type="submit" class="btn btn-success">Update</button>
            </div>
         </form>
      </div>
   </div>
   <!-- right hand profile bar -->
   <div class="fcol hw-25 bg-white p-4 rw-100">
      <x-country__profile :country=$country></x-country__profile>
   </div>
</div>

@endsection

@section('script')
<script lang="javascript">
function preview_flag() {
   const [file] = flag.files
   if (file) {
      flag_img.src = URL.createObjectURL(file)
   }
}
</script>
@endsection