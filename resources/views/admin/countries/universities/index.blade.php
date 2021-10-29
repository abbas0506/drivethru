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
         <div class="txt-b txt-m">Universities </div>
         <div class="frow">
            <a href="#">

            </a>
         </div>
      </div>


      <div class="fcol w-100 rw-100 centered">
         <div class="frow my-2 w-80 stretched">
            <form action="{{route('funiversities.store')}}" method="post" class='w-100' id='form' onsubmit="return validate()">
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
         </div>
         <div class="w-80 my-4 border-bottom" style="border-style:dashed; border-color:orange"></div>

         @if($country->funiversities()->count()>0)

         @foreach($country->funiversities()->sortByDesc('id') as $funiversity)
         <div class="frow my-1 w-80 stretched">
            <div class="fcol">{{$funiversity->name}}</div>
            <div class="row mid-right">
               <div><a href="{{route('funiversities.edit', $funiversity)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div>
               <form action="{{route('funiversities.destroy',$funiversity)}}" method="POST" id='deluniversity{{$funiversity->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="deluniversity('{{$funiversity->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>
         @endforeach
         @else
         <div class="fcol">
            <div class="txt-grey text-center mt-5"><i data-feather='meh' class="feather-xlarge txt-grey"></i></div>
            <div class="txt-grey text-center mt-3">
               Universities list has been found empty. You may type university name and press + button to add a unviersity</div>
         </div>
         @endif

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