@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Faculties</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home</a> <span class="mx-1"> / </span>
      <a href="{{url('primary')}}">primary data </a> <span class="mx-1"> / </span>
      faculties
   </div>
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

   <div class="w-100 bg-light px-4 pb-2 my-4 border-left border-2 border-success">
      <div class="txt-b txt-orange">Create New Faculty</div>
      <form action="{{route('faculties.store')}}" method='post'>
         @csrf
         <div class="frow stretched mt-3">
            <div class="fancyinput w-80">
               <input type="text" name='name' placeholder="Enter name" required>
               <label for="Name">Name</label>
            </div>
            <div class="w-15">
               <button type="submit" class="btn btn-success">Create</button>
            </div>
         </div>
      </form>

   </div>
   <!-- page content -->
   <div class="bg-custom-light p-4">
      <div class="fancy-search-grow">
         <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
      </div>

      <div class="frow px-2 py-1 my-3 border-bottom txt-b">
         <div class="fcol mid-left w-80">Faculty </div>
         <div class="fcol mid-right pr-3 w-20"><i data-feather='settings' class="feather-xsmall"></i></div>
      </div>

      @foreach($faculties as $faculty)
      <div class="frow px-2 my-2 tr">
         <div class="fcol mid-left w-80"><a href="{{route('faculties.show',$faculty)}}"> {{$faculty->name}} </a></div>
         <div class="fcol mid-right w-20">
            <div class="frow stretched">
               <a href="{{route('faculties.edit',$faculty)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a>
               <div>
                  <form action="{{route('faculties.destroy',$faculty)}}" method="POST" id='del_form{{$faculty->id}}'>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$faculty->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
                  </form>
               </div>
            </div>
         </div>
      </div>
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
            $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext)
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
</script>
@endsection