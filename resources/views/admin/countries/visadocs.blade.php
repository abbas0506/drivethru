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

<div class="container" style="width:60% !important">

   <!-- step naviagation  -->
   <div class="frow my-5 p-3 auto-col border rounded bg-lightsky">
      <div class="navstep hw-25">
         <div class="roundbtn">1</div>
         <div class="super-underline">Basic Info</div>
      </div>
      <div class="navstep hw-25 active">
         <div class="roundbtn">2</div>
         <div class="super-underline">Visa Docs</div>
      </div>
      <div class="navstep hw-25">
         <div class="roundbtn">3</div>
         <div class="super-underline">Scholarships</div>
      </div>
      <div class="navstep hw-25">
         <div class="roundbtn">4</div>
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
      <div class="fcol centered w-10 txt-b">...</div>
   </div>
   @foreach($country->visadocs() as $doc)
   <div class="frow my-2">
      <div class="fcol mid-left w-90">{{$doc->name}}</div>
      <div class="fcol centered w-10"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></div>
   </div>
   @endforeach

   <!-- submit form -->
   <div class="frow mid-right my-5">
      <button type="submit" class="btn btn-success">Add Visa Docs</button>
   </div>

   <form action="{{route('postvisadocs')}}" method='post' onsubmit="postdata()" id='myform'>
      @csrf
      @foreach($country->not_visadocs() as $doc)

      <div class="frow my-2">
         <div class="fcol mid-left w-90">{{$doc->name}}</div>
         <div class="fcol centered w-10"><input type="checkbox" value='{{$doc->id}}' name='chk'></div>
      </div>
      @endforeach
      <input type="hidden" id='doc_ids' name='doc_ids'>
      <button type="submit" class="btn btn-success">Add</button>
   </form>
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
</script>
@endsection