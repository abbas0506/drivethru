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
         <div class="txt-b txt-m">Make Favourite Courses List </div>
      </div>

      <div class="fcol w-100 rw-100 centered">
         @if($country->xfavcourses()->count()>0)
         <div class="frow w-100 txt-grey mid-left mt-2">Check the relevant courses and press add button </div>
         <form action="{{route('favcourses.store')}}" class='w-80 mt-3' method='post' id='form'>
            @csrf
            @foreach($country->xfavcourses() as $favcourse)
            <div class="frow w-100 rw-100 my-1 stretched">
               <div>{{$favcourse->name}}</div>
               <div><input type="checkbox" value='{{$favcourse->id}}' name='chk'></div>
            </div>
            @endforeach
            <input type="hidden" id='favcourse_ids' name='course_ids'>
            <div class="frow mid-right mt-4">
               <div class="btn-rounded-custom-orange px-3" onclick="postfavcourses()">Add Now</div>
            </div>
         </form>
         @else
         <div class="fcol">
            <div class="txt-grey text-center mt-5"><i data-feather='frown' class="feather-xlarge txt-grey"></i></div>
            <div class="txt-grey text-center mt-3">
               Possibly you have consumed all courses. No more course is left for favourite courses list.
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
function postfavcourses() {
   //event.preventDefault();
   var ids = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) ids.push(chk.value);
   })

   if (ids.length > 0) {
      $("#favcourse_ids").val(ids);
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