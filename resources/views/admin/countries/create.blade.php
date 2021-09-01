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
<!-- data form -->
<form action="{{route('countries.store')}}" method='post'>
   @csrf

   <!-- data fields -->
   <div class="frow stretched px-10 mt-5 mb-4 auto-col ">
      <div class="fcol centered w-48">
         <div class="fancyinput w-100">
            <input type="text" name='name' placeholder="Country name" required>
            <label for="Name">Name</label>
         </div>
      </div>
      <div class="fcol centered w-48">
         <div class="fancyselect w-100">
            <select name='visarequired'>
               <option value='1'>Yes</option>
               <option value='0'>No</option>
            </select>
            <label for="Name">Visa Required</label>
         </div>
      </div>
   </div>

   <div class="frow stretched px-10 mt-5 mb-4 auto-col ">
      <div class="fcol centered w-48">
         <div class="fancyinput w-100">
            <input type="number" name='visaduration' placeholder="Visa duration" required>
            <label for="Name">Visa Duration (Yr)</label>
         </div>
      </div>
      <div class="fcol centered w-48">
         <div class="fancyinput w-100">
            <input type="number" name='livingcost' placeholder="Living cost" required>
            <label for="Name">Living Cost</label>
         </div>
      </div>
   </div>
   <div class="frow stretched px-10 mt-5 mb-4">
      <div class="fcol centered w-100">
         <div class="fancyinput w-100">
            <input type="text" name='lifethere' placeholder="Life there" required>
            <label for="Name">Life there</label>
         </div>
      </div>

   </div>
   <div class="frow mx-10 text-primary txt-b">Visa Check List</div>

   @foreach($visachecklist as $item)
   <div class="frow stretched px-10 my-2 auto-col ">
      <div class="fcol centered w-10">{{$item->id}}</div>
      <div class="fcol centered w-80">{{$item->name}}</div>
      <div class="fcol centered w-10"><input type="checkbox" name='visachecklist_item' value='1' class='chk'></div>
   </div>
   @endforeach

   <input type="submit">

</form>

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
         $('#deleteform' + formid).submit();
      }
   });
}
</script>
@endsection