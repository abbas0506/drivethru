@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span>
      <a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> Create New
   </div>
</div>
@endsection
@section('page-content')

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

<div class="frow w-100 bg-custom-light p-4 rw-100 auto-col stretched">
   <div class="fcol w-72 rw-100 py-4 px-5 bg-white ">
      <div class="frow stretched">
         <div class="frow txt-b txt-m txt-orange">New Country</div>
         <a href="{{route('countries.index')}}">
            <div class="frow centered box-30 bg-orange circular txt-white hoverable">

               <i data-feather='x' class="feather-xsmall"></i>

            </div>
         </a>
      </div>
      <form action="{{route('countries.store')}}" method='post' enctype="multipart/form-data" onsubmit="return validate()">
         @csrf
         <div class="frow w-100 rw-100 mt-5 stretched auto-col">
            <div class="fancyinput w-48 rw-100">
               <input type="text" name='name' id='name' placeholder="Country name" oninput="search(event)">
               <label for=" Name" class='bg-transparent'>Name</label>
            </div>

            <div class="frow w-48 rw-100 stretched">
               <div class="fcol fancyinput">
                  <input type="file" id='flag' name='flag' placeholder="flag" class='w-90 m-0 mr-1 p-2' onchange='preview_flag()' required>
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
            <textarea rows="2" name='intro' id='intro' placeholder="Brief introduction" required oninput='countIntroLimit(event)'></textarea>
            <label>Introduction <span class="txt-s ml-4 txt-grey counter" id='limit-intro'></span></label>


         </div>
         <div class="frow w-100 rw-100 mt-3 stretched auto-col">
            <div class="fancyinput w-70 rw-100">
               <input name='essential' placeholder="Essesntials" required>
               <label>Essential Requiremnts</label>
            </div>
            <div class="fancyselect hw-25 rw-100 rmt-3">
               <select name='edufree'>
                  <option value='1'>Yes</option>
                  <option value='0' selected>No</option>
               </select>
               <label>Is Education Free?</label>
            </div>
         </div>

         <div class="fancyinput mt-3 w-100">
            <textarea rows="2" name='lifethere' id='lifethere' placeholder="Life there" required oninput='countLifethereLimit(event)'></textarea>
            <label>Life there <span class="txt-s ml-4 txt-grey" id='limit-lifethere'></span></label>
         </div>
         <div class="fancyinput mt-3 w-100">
            <textarea rows="2" name='jobdesc' id='jobdesc' placeholder="Job description" required oninput='countJobdescLimit(event)'></textarea>
            <label>Job Description <span class="txt-s ml-4 txt-grey" id='limit-jobdesc'></span></label>
         </div>
         <div class="fancyinput mt-3 w-100">
            <textarea rows="2" name='livingcostdesc' id='costdesc' placeholder="Living cost description" required oninput='countCostdescLimit(event)'></textarea>
            <label>Living Cost Description <span class="txt-s ml-4 txt-grey" id='limit-costdesc'></span></label>
         </div>
         <div class="frow mid-right mt-4">
            <button type="submit" class="btn btn-success">Create</button>
         </div>
      </form>
   </div>
   <!-- right hand profile bar -->
   <div class="fcol hw-25 bg-white p-4 rw-100">
      <div class="txt-b txt-m txt-orange">Country List</div>
      @foreach($countries as $country)
      <div class="txt-s tr">{{$country->name}}</div>
      @endforeach
   </div>
</div>

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

function preview_flag() {
   const [file] = flag.files
   if (file) {
      preview_img.src = URL.createObjectURL(file)
      $('#image_frame').addClass('has-image');
   }
}

function countIntroLimit(event) {
   var txt = event.target.value
   $('#limit-intro').text(txt.length + "/500");

}

function countLifethereLimit(event) {
   var txt = event.target.value
   $('#limit-lifethere').text(txt.length + "/500");

}

function countJobdescLimit(event) {
   var txt = event.target.value
   $('#limit-jobdesc').text(txt.length + "/500");

}

function countCostdescLimit(event) {
   var txt = event.target.value
   $('#limit-costdesc').text(txt.length + "/500");

}

function validate() {
   var name = $('#name').val()
   var intro = $('#intro').val()
   var lifethere = $('#lifethere').val()
   var jobdesc = $('#jobdesc').val()
   var costdesc = $('#costdesc').val()

   var msg = '';

   if (name == '') msg = 'Country name is required';
   else if (intro.length > 500) msg = "Introduction size exceeded over limit!";
   else if (lifethere.length > 500) msg = "Life There size exceeded over limit!";
   else if (jobdesc.length > 500) msg = "Job description size exceeded over limit!";
   else if (costdesc.length > 500) msg = "Cost description size exceeded over limit!";

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