@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('/admin')}}">Home </a><span class="mx-1"> / </span>
      <a href="{{route('countries.index')}}">countries </a><span class="mx-1"> / </span>
      <a href="{{route('countries.edit',$country)}}">{{$country->name}}</a><span class="mx-1"> / </span>
      living cost
   </div>
</div>
@endsection
@section('page-content')

<div class="container-60">
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

   <!-- search option -->
   <div class="frow my-4 mid-left fancy-search-grow">
      <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:relative; right:24;"></i>
      <div class="frow box-25 circular bg-success text-light centered mr-2 hoverable" onclick="toggle_addslider()">+</div>
      Create New
   </div>

   <!-- page content -->
   <div class="frow px-2 py-1 mb-2 txt-b bg-info th">
      <div class="fcol mid-left w-10">Sr </div>
      <div class="fcol mid-left w-50">Expense Type </div>
      <div class="frow mid-left w-25">Cost <span class="txt-s ml-1"> / month</span></div>
      <div class="fcol mid-right pr-3 w-15"><i data-feather='settings' class="feather-xsmall"></i></div>
   </div>
   @php $sr=1; @endphp
   @foreach($livingcosts as $livingcost)
   <div class="frow px-2 my-2 tr">
      <div class="fcol mid-left w-10">{{$sr++}} </div>
      <div class="fcol mid-left w-50"> {{$livingcost->expensetype->name}} </div>
      <div class="fcol mid-left w-25"> {{$livingcost->minexp}} - {{$livingcost->maxexp}} {{$country->currency}}</div>
      <div class="fcol mid-right w-15">
         <div class="frow stretched">
            <a href="{{route('livingcosts.edit',$livingcost)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a>
            <div>
               <form action="{{route('livingcosts.destroy',$livingcost)}}" method="POST" id='del_form{{$sr}}'>
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
   <div class="frow centered my-4 txt-b">New Study Cost</div>

   <!-- data form -->
   <form action="{{route('livingcosts.store')}}" method='post'>
      @csrf
      <input type="text" name="country_id" value="{{$country->id}}" hidden>
      <div class="fcol my-4">
         <div class="fancyselect w-100 my-2">
            <select name="expensetype_id">
               @foreach($expensetypes as $expensetype)
               <option value="{{$expensetype->id}}">{{$expensetype->name}}</option>
               @endforeach
            </select>
         </div>
         <div class="fancyinput w-100 my-2">
            <input type="number" name='minexp' placeholder="minimum cost" required>
            <label>Min Cost (k)</label>
         </div>
         <div class="fancyinput w-100 my-2">
            <input type="number" name='maxexp' placeholder="maximum cost" required>
            <label>Max Cost (k)</label>
         </div>
      </div>
      <div class="frow mid-right my-5">
         <button type="submit" class="btn btn-success">Create</button>
      </div>
   </form>

</div>
<!--add slider ends -->

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
</script>
@endsection