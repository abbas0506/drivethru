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

   <div class='w-60 mx-auto txt-l my-5 '>News Feed </span> </div>

   <div class="w-60 mx-auto p-4 bg-white border relative">
      <a href="{{route('representative.index')}}">
         <div class="top-right-icon circular-20">
            <i data-feather='x' class="feather-xsmall mb-1"></i>
         </div>
      </a>
      <ul class="txt-s">
         <li>Try to be concise</li>
         <li>The most recent top 2 news will be considered for display on student panel</li>
      </ul>

      <form action="{{route('news.store')}}" method='post'>
         @csrf
         <div class="fancyinput">
            <textarea rows="3" name='text' placeholder="News text here" required oninput='countTextLimit(event)'></textarea>
            <label>News Text <span class="txt-s ml-4 txt-grey" id='text_count'></span></label>
         </div>
         <div class="text-right">
            <button type="submit" class="btn btn-primary">Feed</button>
         </div>
      </form>

      <!-- news panel -->
      <div class="bg-custom-light p-4 mt-3">
         <div class="fancy-search-grow w-30 relative">
            <input type="text" placeholder="Search" oninput="search(event)"><i data-feather='search' class="feather-small" style="position:absolute; left:12; top:8px;"></i>
         </div>

         <div class="frow px-2 py-1 my-3 border-bottom txt-b">
            <div class="fcol mid-left w-80">News Text </div>
            <div class="fcol mid-right pr-3 w-20"><i data-feather='settings' class="feather-xsmall"></i></div>
         </div>

         @foreach($news as $newsitem)
         <div class="frow px-2 my-2 tr">
            <div class="fcol mid-left w-80">{{$newsitem->text}} </a></div>
            <div class="fcol mid-right w-20">
               <div class="frow stretched">
                  <a href="{{route('news.edit',$newsitem)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a>
                  <div>
                     <form action="{{route('news.destroy',$newsitem)}}" method="POST" id='del_form{{$newsitem->id}}'>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$newsitem->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
                     </form>
                  </div>
               </div>
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