@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Levels</div>
   <div class='frow txt-s txt-white'><a href="{{url('primary')}}">Primary </a> <span class="mx-1"> / </span>levels </div>
</div>
@endsection
@section('page-content')

<div class="container" style="width:60%">
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
   <!-- <div class="alert alert-success mt-5 alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{session('success')}}
   </div>
   <br /> -->
   <script>
   Swal.fire({
      icon: 'success',
      title: "Successful",
      showConfirmButton: false,
      timer: 1500
   });
   </script>
   @endif

   <!-- search option -->
   <div class="frow my-4 mid-left fancy-search-grow">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
      <div class="frow box-25 circular bg-success text-light centered mr-2 hoverable" onclick="toggle_addslider()">+</div>
      Create New
   </div>

   <!-- page content -->
   <div class="frow px-2 py-1 mb-2 txt-b bg-info">
      <div class="fcol mid-left w-10">Sr </div>
      <div class="fcol mid-left w-75">Name </div>
      <div class="fcol mid-right pr-3 w-15"><i data-feather='settings' class="feather-xsmall"></i></div>
   </div>
   @php $sr=1; @endphp
   @foreach($data as $level)
   <div class="frow px-2 my-2 tr">
      <div class="fcol mid-left w-10">{{$sr++}} </div>
      <div class="fcol mid-left w-75"> {{$level->name}} </div>
      <div class="fcol mid-right w-15">
         <div class="frow stretched">
            <div onclick="toggle_editslider('{{$level->id}}','{{$level->name}}')"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></div>
            <div>
               <form action="{{route('levels.destroy',$level)}}" method="POST" id='del_form{{$sr}}'>
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

@endsection

@section('slider')
<!-- ADD SLIDER -->
<div class="slider" id='addslider'>
   <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggle_addslider()"><i data-feather='x' class="feather-xsmall"></i></div>
   <div class="frow centered my-4 txt-b">NEW</div>

   <!-- data form -->
   <form action="{{route('levels.store')}}" method='post'>
      @csrf
      <div class="frow stretched my-4 auto-col">
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
<!--add slider ends -->

<!-- EDIT SLIDER -->
<div class="slider" id='editslider'>
   <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggle_editslider()"><i data-feather='x' class="feather-xsmall"></i></div>
   <div class="frow centered my-4 txt-b">EDIT</div>

   <!-- data form -->
   <form action="{{route('levels_update')}}" method='post'>
      @csrf
      <div class="frow stretched my-4 auto-col">
         <div class="fancyinput w-100">
            <input type="text" id='edit_name' name='name' placeholder="Enter name" required>
            <label for="Name">Name</label>
         </div>
      </div>
      <input type="text" id='edit_id' name='id' hidden>
      <div class="frow mid-right my-5">
         <button type="submit" class="btn btn-success">Update</button>
      </div>
   </form>

</div>
<!--edit slider ends -->

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

function toggle_editslider(id, name) {
   $('#edit_id').val(id);
   $('#edit_name').val(name);
   $("#editslider").toggleClass('slide-left');
}
</script>
@endsection