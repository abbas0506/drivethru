@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> New</div>
</div>
@endsection
@section('page-content')

<div class="container" style="width:60% !important">
   <!-- display record save, del, update message if any -->
   @if ($errors->any())
   <div class="alert alert-danger mx-10 mt-2">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   <br />
   @endif

   <!-- step naviagation  -->
   <div class="frow mb-5 p-3 auto-col border bg-lightsky">
      <div class="navstep hw-25">
         <div class="roundbtn">1</div>
         <div class="super-underline">Basic Info</div>
      </div>
      <div class="navstep hw-25 active">
         <div class="roundbtn">2</div>
         <div class="super-underline">Visa Docs</div>
      </div>
      <div class="navstep hw-25">
         <a href="{{route('country_scholarships')}}">
            <div class="roundbtn">3</div>
         </a>
         <div class="super-underline">Scholarships</div>
      </div>
      <div class="navstep hw-25">
         <a href="{{route('countryjobs.index')}}">
            <div class="roundbtn">4</div>
         </a>
         <div class="super-underline">Job</div>
      </div>
   </div>

   @php
   $flag_url=url("/images/flags/".$country->flag);
   @endphp
   <!-- form input -->
   <div class="frow mid-left">
      <div class="txt-l mr-4">{{$country->name}}</div><img src={{$flag_url}} alt='flag' id='flag_img' width=30 height=30 class='rounded-circle'>
   </div>
   <div class="frow border-bottom border-thin my-4">
      <div class="fcol mid-left w-90 txt-b">Document Name</div>
      <div class="fcol centered w-10 txt-b"><i data-feather='settings' class="feather-xsmall"></i></div>
   </div>
   @foreach($country->visadocs() as $doc)
   <div class="frow my-2">
      <div class="fcol mid-left w-90">{{$doc->name}}</div>
      <div class="fcol centered w-10">
         <form action="{{route('delete_country_visadoc',$doc->id)}}" method="POST" id='deleteform{{$doc->id}}'>
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$doc->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
         </form>
      </div>
   </div>
   @endforeach

   <!-- submit form -->
   <div class="frow mid-right my-5">
      <button type="button" class="btn btn-success" onclick="slideleft()">Add Visa Docs</button>
   </div>

   <div class="slider" id='slider'>

      <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="slideleft()"><i data-feather='x' class="feather-xsmall"></i></div>
      <div class="frow centered my-4 txt-b">DOCUMENTS</div>
      @if($country->not_visadocs()->count()>0)
      <form action="{{route('post_country_visadocs')}}" method='post' onsubmit="postdata()" id='myform'>
         @csrf
         @foreach($country->not_visadocs() as $doc)

         <div class="frow my-1 stretched">
            <div class="">{{$doc->name}}</div>
            <div class=""><input type="checkbox" value='{{$doc->id}}' name='chk'></div>
         </div>
         @endforeach
         <input type="hidden" id='doc_ids' name='doc_ids'>
         <div class="frow mid-right mt-5">
            <button type="submit" class="btn btn-success">Add</button>
         </div>
      </form>
      @else
      <!-- no document -->
      <div class="">No more document available. If you want to create a new document, <a href='#'>click here</a></div>

      @endif

   </div> <!-- slider ends -->

</div>
@endsection

@section('script')
<script lang="javascript">
function postdata() {
   //event.preventDefault();
   var ids = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) ids.push(chk.value);
   })

   $("#doc_ids").val(ids);
}

$('#flag').change(function() {
   const [file] = flag.files
   if (file) {
      flag_img.src = URL.createObjectURL(file)
   }
});

function slideleft() {
   $("#slider").toggleClass('slide-left');
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
         $('#deleteform' + formid).submit();
      }
   });
}
</script>
@endsection