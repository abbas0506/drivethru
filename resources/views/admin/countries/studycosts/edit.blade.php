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
         <div class="txt-b txt-m">Edit University </div>
         <div class="frow">
            <a href="#">

            </a>
         </div>
      </div>


      <div class="fcol w-100 rw-100 centered">
         <div class="frow my-2 w-80 stretched">
            <form action="{{route('funiversities.update', $funiversity)}}" method="post" class='w-100' onsubmit="return validate()">
               @csrf
               @method('PATCH')
               <div class="frow w-100 mt-3 mid-left stretched">
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
   </div>
   <!-- right hand profile bar -->
   <div class="fcol hw-25 bg-white p-4 rw-100">
      <x-country__profile :country=$country></x-country__profile>
   </div>
</div>

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