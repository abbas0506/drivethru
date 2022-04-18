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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-file-add mr-3"></span> Past Pepers </div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('representative.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">How to upload past paper?</div>
         <ul class="txt-s">
            <li>Upload paper on google drive, should be in .pdf format</li>
            <li>Copy its link i.e URL for sharing</li>
            <li>Click on + button and paste the URL in text box</li>
         </ul>
      </div>
      <!-- news panel -->
      <div class="mt-3">
         <div class="frow">
            <div class="fancy-search-grow w-30 relative mr-3">
               <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; left:12; top:8px;"></i>
            </div>
            <a href="{{route('papers.create')}}">
               <div class="frow box-25 circular bg-success text-light centered mr-2 hoverable">+</div>
            </a>
         </div>

         <!-- page content -->
         <div class="frow py-2 mt-3 border-bottom txt-grey">
            <div class="w-10">Sr </div>
            <div class="w-60">Past Paper </div>
            <div class="w-20 text-center">Download </div>
            <div class="w-10 text-right pr-3"><i data-feather='settings' class="feather-xsmall"></i></div>
         </div>
         @php $sr=1; @endphp
         @foreach($data as $paper)

         <div class="frow py-2 my-1 border-bottom tr">
            <div class="w-10">{{$sr++}} </div>
            <div class="w-60"> {{$paper->papertype->name}} - {{$paper->year}} </div>
            <div class="w-20 text-center">
               <a href="{{$paper->url}}" target="_blank"><i data-feather='download' class="feather-xsmall mx-1 txt-orange"></i></a>
            </div>

            <div class="w-10">
               <div class="frow justify-content-end">
                  <div><a href="{{route('papers.edit',$paper)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a></div>
                  <div>
                     <form action="{{route('papers.destroy',$paper)}}" method="POST" id='del_form{{$sr}}'>
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
</script>
@endsection