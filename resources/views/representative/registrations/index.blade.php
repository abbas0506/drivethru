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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-users mr-3"></span> Registrations </span> </div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('representative.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul class="txt-s">
            <li>Click on student's name to view his / her profile</li>
            <li>A blocked student will not be able to use his / her account</li>
         </ul>
      </div>
      <!-- news panel -->
      <div class="mt-3">
         <div class="fancy-search-grow w-30 relative">
            <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; left:12; top:8px;"></i>
         </div>

         <div class="frow my-3 stretched border-bottom txt-b">
            <div class="w-40">Registrations</div>
            <div class="w-20">Email</div>
            <div class="w-20">Phone</div>
            <div class="text-right">Status</div>
         </div>

         @foreach($students as $student)
         <div class="frow my-2 stretched tr">
            <div class="w-40 text-primary"><a href="{{route('registrations.show', $student)}}">{{$student->name}}</a></div>
            <div class="w-20">{{$student->email}}</div>
            <div class="w-20">{{$student->phone}}</div>
            <div class="text-right">
               @if($student->status==1)
               <i data-feather='user-check' class="feather-xsmall mt-1 text-success"></i>
               @else
               <i data-feather='user-x' class="feather-xsmall mt-1 text-danger"></i>
               @endif
            </div>
         </div>
         @endforeach
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