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
   <div class="mx-auto w-60">
      <div class="frow align-items-center stretched my-5">
         <div class='txt-l mr-3'>Paper Types </div>
         <div class="frow box-25 circular bg-success text-light centered mr-auto hoverable" onclick="toggle_addslider()">+</div>
         <div class="w-30 justify-content-end">
            <div class="fancy-search-grow">
               <input type="text" placeholder="Search" oninput="search(event)">
               <i data-feather='search' class="feather-small absolute" style='top:8px;left:10px'></i>
            </div>
         </div>
      </div>
      <!-- page content -->
      <div class="frow px-2 py-1 mb-2 txt-b bg-light-grey">
         <div class="fcol mid-left w-10">Sr </div>
         <div class="fcol mid-left w-75">Name </div>
         <div class="fcol mid-right pr-3 w-15"><i data-feather='settings' class="feather-xsmall"></i></div>
      </div>
      @php $sr=1; @endphp
      @foreach($papertypes as $papertype)
      <div class="frow px-2 my-2 tr">
         <div class="fcol mid-left w-10">{{$sr++}} </div>
         <div class="fcol mid-left w-75"> {{$papertype->name}} </div>
         <div class="fcol mid-right w-15">
            <div class="frow stretched">
               <a href="{{route('papertypes.edit',$papertype)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a>
               <div>
                  <form action="{{route('papertypes.destroy',$papertype)}}" method="POST" id='del_form{{$sr}}'>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$sr}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</section>
@endsection

@section('slider')
<!-- ADD SLIDER -->
<div class="slider" id='addslider'>
   <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggle_addslider()"><i data-feather='x' class="feather-xsmall"></i></div>
   <div class="frow centered my-4 txt-b">New Paper Type</div>

   <!-- data form -->
   <form action="{{route('papertypes.store')}}" method='post'>
      @csrf
      <div class="frow stretched my-5 auto-col">
         <div class="fancyinput w-100">
            <input type="text" name='name' placeholder="Enter name" required>
            <label for="Name">Name</label>
         </div>
      </div>
      <div class="frow mid-right my-5">
         <button type="submit" class="btn btn-success">Create</button>
      </div>
   </form>

</div>
@endsection

@section('script')
<script lang="javascript">
function search(event) {
   var searchtext = event.target.value.toLowerCase();
   var str = 0;
   $('.tr').each(function() {
      if (!(
            $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext)
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
         $('#del_form' + formid).submit();
      }
   });
}

function toggle_addslider() {
   $("#addslider").toggleClass('slide-left');
}
</script>
@endsection