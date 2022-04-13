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
   <div class='w-70 mx-auto txt-l my-5 '>Countries <span class="txt-s ml-2"> - {{$country->name}} - living cost - edit </span> </div>
   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-country__profile :country=$country></x-country__profile>
      </div>
      <div class="w-70 py-4 px-5 bg-white border relative">
         <a href="{{route('livingcosts.index', $country)}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b txt-m mb-2">Living Cost - <span class="txt-s">in dollars / year</span></div>
         <form action="{{route('livingcosts.update', $livingcost)}}" method="post" class='mt-5' onsubmit="return validate()">
            @csrf
            @method('PATCH')
            <div class="frow stretched">
               <div class="fancyselect w-32">
                  <select>
                     <option>{{$livingcost->expensetype->name}}</option>
                  </select>
                  <label>Expense Type</label>
               </div>
               <div class="fancyinput hw-25">
                  <input type="number" name='minexp' id='minexp' placeholder="min cost" value="{{$livingcost->minexp}}" required>
                  <label>Min Cost</label>
               </div>
               <div class="fancyinput hw-25">
                  <input type="number" name='maxexp' id='maxexp' placeholder="max cost" value="{{$livingcost->maxexp}}" required>
                  <label>Max Cost</label>
               </div>
               <button type='submit' class="btn btn-transparent">
                  <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
               </button>
            </div>
         </form>
      </div>
   </div>
</section>

@endsection

@section('script')
<script lang="javascript">
function validate() {
   var minexp = $('#minexp').val();
   var maxexp = $('#maxexp').val();
   var msg = '';
   if (minexp == '') msg = 'Minimum cost is required';
   else if (maxexp == '') msg = 'Maximum cost is required';
   else {
      minexp = parseInt(minexp);
      maxexp = parseInt(maxexp)
      if (minexp < 0 || maxexp < 0) msg = 'Cost values cant be negative';
      else if (minexp > maxexp) msg = 'Min cost cant be greater than max';
   }
   if (msg != '') {
      Toast.fire({
         icon: 'warning',
         title: msg
      });
      return false;
   }
}
</script>
@endsection