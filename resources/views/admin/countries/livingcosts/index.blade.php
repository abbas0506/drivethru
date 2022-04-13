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
   <div class='w-70 mx-auto txt-l my-5'>Countries <span class="txt-s ml-2"> - {{$country->name}} - living cost </span> </div>
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
         <div class="txt-m txt-b mr-3">Living Cost - <span class="txt-s">in dollars / year</span></div>
         @if($expensetypes->count()>0)
         <div class="frow my-2 stretched">
            <form action="{{route('livingcosts.store')}}" class='w-100' method='post' onsubmit="return validate()">
               @csrf
               <div class="frow my-4 stretched">
                  <div class="fancyselect w-32">
                     <select name="expensetype_id">
                        @foreach($expensetypes as $expensetype)
                        <option value="{{$expensetype->id}}">{{$expensetype->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="fancyinput hw-25">
                     <input type="number" name='minexp' id='minexp' placeholder="min cost">
                     <label>Min Cost</label>
                  </div>
                  <div class="fancyinput hw-25">
                     <input type="number" name='maxexp' id='maxexp' placeholder="max cost">
                     <label>Max Cost</label>
                  </div>
                  <input type="text" name="country_id" value="{{$country->id}}" hidden>
                  <button type='submit' class="btn btn-transparent">
                     <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='plus' class="feather-xsmall txt-white"></i></div>
                  </button>
               </div>

            </form>

         </div>
         @endif

         @if($livingcosts->count()>0)
         <div class="frow my-1 txt-grey th">
            <div class="w-10">Sr</div>
            <div class="w-50">Expense Type</div>
            <div class="w-25 text-center">Cost<span class="txt-s ml-1"> / year</span></div>
            <div class="w-15 text-right"><i data-feather='settings' class="feather-xsmall"></i></div>
         </div>
         @php $sr=1; @endphp
         @foreach($livingcosts as $livingcost)
         <div class="frow my-1 tr">
            <div class="w-10">{{$sr++}} </div>
            <div class="w-50 text-primary"><a href="{{route('livingcosts.edit',$livingcost)}}"> {{$livingcost->expensetype->name}}</a> </div>
            <div class="w-25 text-center"> {{$livingcost->minexp}} - {{$livingcost->maxexp}}</div>
            <div class="w-15 text-right">
               <form action="{{route('livingcosts.destroy',$livingcost)}}" method="POST" id='del_form{{$sr}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$sr}}')"><i data-feather='x' class="feather-xsmall txt-red"></i></button>
               </form>

            </div>
         </div>
         @endforeach
         @else
         <div class="txt-grey text-center mt-5"><i data-feather='frown' class="feather-xlarge txt-grey"></i></div>
         <div class="txt-grey text-center mt-3">
            Found empty
         </div>
         @endif

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