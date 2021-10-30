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
         <div class="txt-b txt-m">Edit Living Cost </div>
         <div class="frow">
            <a href="#">

            </a>
         </div>
      </div>


      <div class="fcol w-100 rw-100 centered">
         <div class="frow my-2 w-80 stretched">
            <form action="{{route('livingcosts.update', $livingcost)}}" method="post" class='w-100' onsubmit="return validate()">
               @csrf
               @method('PATCH')
               <div class="frow my-4 stretched">
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
   var minexp = $('#minexp').val();
   var maxexp = $('#maxexp').val();
   var msg = '';
   if (minexp == '') msg = 'Minimum cost is required';
   else if (maxexp == '') msg = 'Maximum cost is required';
   else if (minexp < 0 || maxexp < 0) msg = 'Cost values cant be negative';
   else if (minexp > maxexp) msg = 'Min cost cant be greater than max';
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