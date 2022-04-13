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
   <div class='w-70 mx-auto txt-l my-5'>Countries <span class="txt-s ml-2"> - {{$country->name}} - top universities </span> </div>
   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-country__profile :country=$country></x-country__profile>
      </div>
      <div class="w-70 py-4 px-5 bg-white border relative">
         <a href="{{route('countries.show', $country)}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-m txt-b mr-3">Top Universities</div>
         <form action="{{route('funiversities.store')}}" method="post" class='' id='form' onsubmit="return validate()">
            @csrf
            <div class="frow w-100 mt-3 mid-left stretched">
               <div class="fancyinput w-90">
                  <input type="text" name='name' id='name' value='' placeholder="Enter university name">
                  <label>University Name</label>
               </div>
               <button type='submit' class="btn btn-transparent">
                  <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='plus' class="feather-xsmall txt-white"></i></div>
               </button>
            </div>
         </form>

         <div class="my-4 border-bottom"></div>

         @if($country->funiversities()->count()>0)

         @foreach($country->funiversities()->sortByDesc('id') as $funiversity)
         <div class="frow my-1 stretched">
            <div class="text-primary"><a href="{{route('funiversities.edit', $funiversity)}}">{{$funiversity->name}}</a></div>
            <div>
               <form action="{{route('funiversities.destroy',$funiversity)}}" method="POST" id='deluniversity{{$funiversity->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="deluniversity('{{$funiversity->id}}')"><i data-feather='x' class="feather-xsmall txt-red"></i></button>
               </form>
            </div>
         </div>
         @endforeach

         @else
         <div class="txt-grey text-center mt-5"><i data-feather='meh' class="feather-xlarge txt-grey"></i></div>
         <div class="txt-grey text-center mt-3">Top universities list found empty</div>
         @endif
      </div>
   </div>
</section>
@endsection

@section('script')
<script lang="javascript">
function validate() {
   // event.preventDefault();

   var name = $('#name').val();
   if (name == '') {
      Toast.fire({
         icon: 'warning',
         title: 'Name missing!'
      });
      return false;
   }
}

function deluniversity(formid) {
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
         $('#deluniversity' + formid).submit();
      }
   });
}
</script>
@endsection