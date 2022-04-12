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
   <div class='w-70 mx-auto txt-l my-5 '>Countries <span class="txt-s ml-2"> - {{$country->name}} - visa requirements - add </span> </div>
   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-country__profile :country=$country></x-country__profile>
      </div>
      <div class="w-70 py-4 px-5 bg-white border relative">
         <a href="{{route('scholarship_offers.index', $country)}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b txt-m">Available Scholarships</div>
         @if($country->xscholarships()->count()>0)
         <div class="txt-grey mt-2 border-bottom">Check the relevant documents and press add button </div>
         <form action="{{route('scholarship_offers.store')}}" class='mt-3' method='post' id='form'>
            @csrf
            @foreach($country->xscholarships() as $scholarship)
            <div class="frow my-1 stretched">
               <div>{{$scholarship->name}}</div>
               <div><input type="checkbox" value='{{$scholarship->id}}' name='chk'></div>
            </div>
            @endforeach
            <input type="hidden" id='scholarship_ids' name='scholarship_ids'>
            <div class="frow mid-right mt-4">
               <div class="btn-rounded-custom-orange px-3" onclick="postScholarships()">Add Now</div>
            </div>
         </form>
         @else

         <div class="txt-grey text-center mt-5"><i data-feather='frown' class="feather-xlarge txt-grey"></i></div>
         <div class="txt-grey text-center mt-3">
            No docs available
         </div>

         @endif
      </div>
   </div>
</section>
@endsection

@section('script')
<script lang="javascript">
function postScholarships() {
   //event.preventDefault();
   var ids = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) ids.push(chk.value);
   })

   if (ids.length > 0) {
      $("#scholarship_ids").val(ids);
      $('#form').submit();

   } else {
      Toast.fire({
         icon: 'warning',
         title: 'Nothing selected!'
      });

   }
}
</script>
@endsection