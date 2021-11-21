@extends('layouts.dashboard')
@section('topbar')
<x-user__header activeItem='home'></x-user__header>
@endsection

@php
$user=session('user');
@endphp

@section('sidebar')
<x-user__sidebar activeItem='counselling' :user="$user"></x-user__sidebar>
@endsection

@section('page-header')
<div class="fcol">
   <div class="frow w-100 py-2 mt-1 txt-m txt-b txt-custom-blue">Career Counselling</div>
   <div class="frow txt-s txt-grey">Book a free counseling session if u have any query about</div>
</div>

@endsection

@section('data')

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

<!-- create new acadmeic -->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="frow w-20 my-2 mid-left txt-b txt-m txt-orange"><span style="border-bottom:3px #F68656 solid">Free Session</span></div>
   <div class="frow my-1 txt-grey">
      We provide free supposrt services to all. Let us know what kind of issue is being faced by you.
   </div>

   <form action="{{route('counselling.store')}}" method="post">
      @csrf

      <input type="text" name="user_id" value="{{$user->id}}" hidden>
      <input type="text" name="mode" value="{{session('mode')}}" hidden>
      <div class="frow p-1 mid-left">
         <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option1' value="1"></div>
         <div class="fcol w-85 rw-90 mid-left">I want to enquire about international admission</div>
      </div>
      <div class="frow p-1 mid-left">
         <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option2' value="1"></div>
         <div class="fcol w-85 rw-90 mid-left">I want to enquire about national univeristy</div>
      </div>
      <div class="frow p-1 mid-left">
         <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option3' value="1"></div>
         <div class="fcol w-85 rw-90 mid-left">I am facing website usage issue</div>
      </div>
      <div class="frow p-1 mid-left">
         <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option4' value="1"></div>
         <div class="fcol w-85 rw-90 mid-left">I am facing fee payment issue</div>
      </div>
      <div class="frow p-1 mid-left">
         <div class="fcol w-15 rw-15 centered"><input type="checkbox" name='option5' value="1"></div>
         <div class="fcol w-85 rw-90 mid-left">I want to seek general information</div>
      </div>
      <div class="frow p-1 mid-left">
         <div class="fcol w-15 rw-15 centered"><i data-feather='edit-3' class="feather-small"></i></div>
         <div class="fcol w-85 rw-100 mid-left">
            <textarea name="querydetail" id="" rows="3" class="w-100" placeholder="I would like to express my query in words (upto 300 characters)"></textarea>
         </div>
      </div>
      <div class="frow mt-2 mid-right">
         <button type="submit" class="btn btn-primary">Submit Request</button>
      </div>
   </form>

</div>


@endsection

@section('profile')
<x-sidebar__news></x-sidebar__news>
@endsection

<!-- script goes here -->
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
</script>
@endsection