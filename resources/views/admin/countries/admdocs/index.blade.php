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
         <div class="txt-b txt-m">Admission Requirements </div>
         <div class="frow">
            <a href="{{route('admdocs.edit', $country)}}">
               <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='plus' class="feather-xsmall txt-white"></i></div>
            </a>
         </div>

      </div>
      <div class="fcol w-100 rw-100 centered">
         @if($country->admdocs()->count()>0)
         <div class="frow w-100 txt-grey mid-left my-2">Click on <span class="txt-red mx-1">x</span> button to remove from list. Press + button to add more options </div>
         @foreach($country->admdocs() as $admdoc)
         <div class="frow my-1 w-80 stretched">
            <div class="fcol">{{$admdoc->doc->name}}</div>
            <div class="fcol mid-right">
               <form action="{{route('admdocs.destroy',$admdoc)}}" method="POST" id='delAdmDoc{{$admdoc->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delAdmDoc('{{$admdoc->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>
         @endforeach
         @else
         <div class="fcol">
            <div class="txt-grey text-center mt-5"><i data-feather='frown' class="feather-xlarge txt-grey"></i></div>
            <div class="txt-grey text-center mt-3">
               Possibly you have removed all documents from admission requirements list. You may add new docs by pressing on + button
            </div>
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
function delAdmDoc(formid) {
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
         $('#delAdmDoc' + formid).submit();
      }
   });
}
</script>
@endsection