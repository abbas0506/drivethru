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
   <div class='w-70 mx-auto txt-l my-5'>Countries <span class="txt-s ml-2"> - {{$country->name}} - top universities - {{$funiversity->name}} </span> </div>
   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-country__profile :country=$country></x-country__profile>
      </div>
      <div class="w-70 py-4 px-5 bg-white border relative">
         <a href="{{route('funiversities.index', $country)}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-m txt-b mr-3">Edit University</div>
         <form action="{{route('funiversities.update', $funiversity)}}" method="post" class='w-100' onsubmit="return validate()">
            @csrf
            @method('PATCH')
            <div class="frow mt-5 stretched">
               <div class="fancyinput w-90">
                  <input type="text" name='name' id='name' value='{{$funiversity->name}}' placeholder="Enter university name">
                  <label>University Name</label>
               </div>
               <button type='submit' class="btn btn-transparent">
                  <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
               </button>
            </div>
         </form>
      </div>
   </div>
</section>
@endsection

@section('script')
<script lang="javascript">
function validate() {
   var name = $('#name').val();
   if (name == '') {
      Toast.fire({
         icon: 'warning',
         title: 'Name missing!'
      });
      return false;
   }
}
</script>
@endsection