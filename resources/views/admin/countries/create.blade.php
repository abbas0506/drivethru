@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> New</div>
</div>
@endsection
@section('page-content')


<!-- display record save, del, update message if any -->
@if ($errors->any())
<div class="alert alert-danger mx-10 mt-2">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
<br />
@endif

<div class="container" style="width:60% !important">
   <!-- step naviagation  -->
   <div class="frow mb-5 p-3 auto-col border rounded bg-lightsky">
      <div class="navstep active hw-25">
         <div class="roundbtn">1</div>
         <div class="super-underline">Basic Info</div>
      </div>
      <div class="navstep hw-25">
         <div class="roundbtn">2</div>
         <div class="super-underline">Visa Docs</div>
      </div>
      <div class="navstep hw-25">
         <div class="roundbtn">3</div>
         <div class="super-underline">Scholarships</div>
      </div>
      <div class="navstep hw-25">
         <div class="roundbtn">4</div>
         <div class="super-underline">Job</div>
      </div>
   </div>

   <!--data input -->
   <form action="{{route('countries.store')}}" method='post' enctype="multipart/form-data">
      @csrf
      <div class="frow centered">
         <img src="#" alt='flag' id='flag_img' width=100 height=100 class='rounded-circle'>
      </div>

      <div class="frow stretched my-4 auto-col">
         <div class="fcol centered w-70">
            <div class="fancyinput w-100">
               <input type="text" name='name' placeholder="Country name" required>
               <label for="Name">Name</label>
            </div>
         </div>
         <div class="fcol centered hw-25">
            <div class="fancyinput w-100">
               <input type="file" id='flag' name='flag' placeholder="flag" class='w-100 m-0 p-2' onchange='preview_flag()' required>
               <label for="Name">Flag</label>
            </div>
         </div>
      </div>

      <div class="frow stretched my-4 auto-col">
         <div class="fcol w-32">
            <div class="fancyselect w-100">
               <select name='visarequired'>
                  <option value='1'>Yes</option>
                  <option value='0'>No</option>
               </select>
               <label for="Name">Visa Required</label>
            </div>
         </div>
         <div class="fcol w-32">
            <div class="fancyinput w-100">
               <input type="number" name='visaduration' placeholder="Visa duration" min='0' max='100' required>
               <label for="Name">Visa Duration (Yr)</label>
            </div>
         </div>
         <div class="fcol w-32">
            <div class="fancyinput w-100">
               <input type="number" name='livingcost' placeholder="Living cost" min='0' required>
               <label for="Name">Living Cost</label>
            </div>
         </div>
      </div>
      <div class="frow my-4">
         <div class="fancyinput w-100">
            <input type="text" name='lifethere' placeholder="Life there" required>
            <label for="Name">Life there</label>
         </div>
      </div>

      <div class="frow mid-right my-5">
         <button type="submit" class="btn btn-success">Save & Continue</button>
      </div>

   </form>

</div>


@endsection

@section('script')
<script lang="javascript">
// $('#flag').change(function() {

// });

function preview_flag() {
   const [file] = flag.files
   if (file) {
      flag_img.src = URL.createObjectURL(file)
   }
}
</script>
@endsection