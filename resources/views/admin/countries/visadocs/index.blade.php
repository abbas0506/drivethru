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
   <div class='w-70 mx-auto txt-l my-5 '>Countries <span class="txt-s ml-2"> - {{$country->name}} - visa requirements </span> </div>
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
         <div class="frow mb-4">
            <div class="txt-m txt-orange mr-3">Visa Requirements</div>
            <a href="{{route('visadocs.edit', $country)}}">
               <div class="frow centered box-25 bg-orange circular txt-white hoverable">
                  <i data-feather='plus' class="feather-xsmall"></i>
               </div>
            </a>
         </div>
         @if($country->visadocs()->count()>0)
         <div class="frow txt-grey mid-left my-2 border-bottom">Click on <span class="txt-red mx-1">x</span> button to remove from list. Press + button to add more options </div>
         @foreach($country->visadocs() as $visadoc)
         <div class="frow my-1 stretched">
            <div>{{$visadoc->doc->name}}</div>
            <div>
               <form action="{{route('visadocs.destroy',$visadoc)}}" method="POST" id='delVisaDoc{{$visadoc->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delVisaDoc('{{$visadoc->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>
         @endforeach
         @else
         <div class="fcol">
            <div class="txt-grey text-center mt-5"><i data-feather='frown' class="feather-xlarge txt-grey"></i></div>
            <div class="txt-grey text-center mt-3">
               Docs list is empty
            </div>
         </div>
         @endif
      </div>
   </div>
</section>

@endsection

@section('script')
<script lang="javascript">
function delVisaDoc(formid) {
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
         $('#delVisaDoc' + formid).submit();
      }
   });
}
</script>
@endsection