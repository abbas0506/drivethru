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
         <div class="txt-b txt-m">Universities </div>
         <div class="frow">
            <a href="#">

            </a>
         </div>
      </div>


      <div class="fcol w-100 rw-100 centered">
         <div class="frow my-2 w-80 stretched">
            <form action="{{route('studycosts.store')}}" method='post'>
               @csrf
               <div class="frow my-4 stretched">
                  <div class="fancyselect w-32">
                     <select name="level_id">
                        @foreach($levels as $level)
                        <option value="{{$level->id}}">{{$level->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="fancyinput hw-25">
                     <input type="number" name='minfee' placeholder="min cost" required>
                     <label>Min Cost</label>
                  </div>
                  <div class="fancyinput hw-25">
                     <input type="number" name='maxfee' placeholder="max cost" required>
                     <label>Max Cost</label>
                  </div>
                  <button type='submit' class="btn btn-transparent">
                     <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='plus' class="feather-xsmall txt-white"></i></div>
                  </button>
               </div>

            </form>

         </div>
         <div class="w-80 my-4 border-bottom" style="border-style:dashed; border-color:orange"></div>

         @if($studycosts->count()>0)
         <div class="frow w-80 px-2 my-1 txt-grey th">
            <div class="fcol mid-left w-10">Sr </div>
            <div class="fcol mid-left w-50">Level </div>
            <div class="frow mid-left w-25">Cost <span class="txt-s ml-1"> / year</span></div>
            <div class="fcol mid-right pr-3 w-15"><i data-feather='settings' class="feather-xsmall"></i></div>
         </div>
         @php $sr=1; @endphp
         @foreach($studycosts as $studycost)
         <div class="frow w-80 my-1 tr">
            <div class="fcol mid-left w-10">{{$sr++}} </div>
            <div class="fcol mid-left w-50"> {{$studycost->level->name}} </div>
            <div class="fcol mid-left w-25"> {{$studycost->minfee}} - {{$studycost->maxfee}} {{$country->currency}}</div>
            <div class="fcol mid-right w-15">
               <div class="frow stretched">
                  <a href="{{route('studycosts.edit',$studycost)}}"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></a>
                  <div>
                     <form action="{{route('studycosts.destroy',$studycost)}}" method="POST" id='del_form{{$sr}}'>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$sr}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         @else
         <div class="fcol">
            <div class="txt-grey text-center mt-5"><i data-feather='meh' class="feather-xlarge txt-grey"></i></div>
            <div class="txt-grey text-center mt-3">
               Study Costs list has been found empty. You may use press + button to add new study cost</div>
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
function validate() {
   // event.preventDefault();

   var name = $('#name').val();
   if (name == '') {
      Toast.fire({
         icon: 'warning',
         title: 'Name missing!'
      });
      return false;
   }
}

function deluniversity(formid) {
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
         $('#deluniversity' + formid).submit();
      }
   });
}
</script>
@endsection