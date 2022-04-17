@extends('layouts.representative')
@section('page-content')
<!-- display record save, del, update message if any -->
<section class='page-content'>
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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-users mr-3"></span> Registrations - <span class="txt-s">{{$user->name}} - profile</span> </div>
   <div class="w-60 mx-auto">
      <div class="frow align-items-center bg-custom-light p-2 mb-3 relative">
         <a href="{{route('registrations.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <img src="{{url(asset('images/users/'.$user->pic))}}" alt="" width='100' height='100' class="rounded-circle mr-3">


         @if($user->status==0)
         <div>
            <div>Current Status: <span class='text-danger'> Blocked</span></div>
            <form action="{{route('registrations.update', $user)}}" method='post'>
               @csrf
               @method('PATCH')
               <input type="hidden" name='status' value='1'>
               <button type='submit' class="btn btn-link text-primary text-left">Click here to activate</button>
            </form>
         </div>

         @else
         <div>
            <div>Current Status: <span class='text-success'> Active</span></div>
            <form action="{{route('registrations.update', $user)}}" method='post'>
               @csrf
               @method('PATCH')
               <input type="hidden" name='status' value='0'>
               <button type='submit' class="btn btn-link text-primary text-left">Click here to block</button>
            </form>
         </div>
         @endif
      </div>
      <!-- news panel -->
      <div class="frow stretched align-items-center">

      </div>

      <div class="frow mt-3">
         <div class="txt-b w-30">Name</div>
         <div class="">{{$user->name}}</div>
      </div>
      <div class="frow mt-3">
         <div class="txt-b w-30">Email</div>
         <div class="">{{$user->email}}</div>
      </div>
      <div class="frow mt-3">
         <div class="txt-b w-30">Phone</div>
         <div class="">{{$user->phone}}</div>
      </div>
      <div class="frow mt-3">
         <div class="txt-b w-30">Signup date</div>
         <div class="">{{$user->created_at}}</div>
      </div>

</section>
@endsection

@section('script')
<script lang="javascript">
function search(event) {
   var searchtext = event.target.value.toLowerCase();
   var str = 0;
   $('.tr').each(function() {
      if (!(
            $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext)
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

function countTextLimit(event) {
   var txt = event.target.value
   $('#text_count').text(txt.length + "/500");

}
</script>
@endsection