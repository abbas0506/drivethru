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
   <form action="{{route('countries.store')}}" method='post' onsubmit="postData()" id='myform'>

      @csrf
      <!-- step naviagation  -->
      <div class="frow my-5 p-3 auto-col border rounded bg-lightsky">
         <div class="navstep active hw-25">
            <div class="roundbtn">1</div>
            <div class="super-underline">Basic Info</div>
         </div>
         <div class="navstep hw-25">
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

      <!-- form input -->
      <div class="frow stretched my-4 auto-col">
         <div class="fcol centered w-70">
            <div class="fancyinput w-100">
               <input type="text" name='name' placeholder="Country name" required>
               <label for="Name">Name</label>
            </div>
         </div>
         <div class="fcol centered hw-25">
            <div class="fancyinput w-100">
               <input type="file" name='flag' placeholder="flag" class='w-100 m-0 p-2' required>
               <label for="Name">Flag</label>
            </div>
         </div>
      </div>

      <div class="frow stretched my-4 auto-col">
         <div class="fcol w-32">
            <div class="fancyselect w-100">
               <select name='visarequired'>
                  <option value='1'>Yes</option>
                  <option value='0'>No</option>
               </select>
               <label for="Name">Visa Required</label>
            </div>
         </div>
         <div class="fcol w-32">
            <div class="fancyinput w-100">
               <input type="number" name='visaduration' placeholder="Visa duration" required>
               <label for="Name">Visa Duration (Yr)</label>
            </div>
         </div>
         <div class="fcol w-32">
            <div class="fancyinput w-100">
               <input type="number" name='livingcost' placeholder="Living cost" required>
               <label for="Name">Living Cost</label>
            </div>
         </div>
      </div>
      <div class="frow my-4">
         <div class="fancyinput w-100">
            <input type="text" name='lifethere' placeholder="Life there" required>
            <label for="Name">Life there</label>
         </div>
      </div>

      <div class="frow mid-right my-5">
         <button type="submit" class="btn btn-success">Submit</button>
      </div>
      <!-- visa check list -->
      <div class="card shadow m-5">
         <div class="card-header frow stretched bg-danger txt-l txt-white">
            <div>Visa Check List </div>
            <div><span class="lnr lnr-file-empty txt-xl"></span></div>
         </div>
         <div class="card-body px-5">
            <div class="frow border-bottom border-thin">
               <div class="fcol mid-left w-80 txt-b">Document Name</div>
               <div class="fcol centered w-20 txt-b">Required</div>
            </div>

            @foreach($docs as $doc)
            <div class="frow my-2">
               <div class="fcol mid-left w-80">{{$doc->name}}</div>
               <div class="fcol centered w-20"><input type="checkbox" value='{{$doc->id}}' name='chk_visadocs'></div>
            </div>
            @endforeach
         </div>
      </div>

      <!-- scholarships -->
      <div class="card shadow m-5">
         <div class="card-header frow stretched bg-success txt-l txt-white">
            <div>Scholarships </div>
            <div><span class="lnr lnr-graduation-hat txt-xl"></span></div>
         </div>
         <div class="card-body px-5">
            <div class="frow border-bottom border-thin">
               <div class="fcol mid-left w-80 txt-b">Scholarship Title</div>
               <div class="fcol centered w-20 txt-b">Available</div>
            </div>

            @foreach($scholarships as $scholarship)
            <div class="frow my-2">
               <div class="fcol mid-left w-80">{{$scholarship->name}}</div>
               <div class="fcol centered w-20"><input type="checkbox" name='chk_scholarship' value='{{$scholarship->id}}'></div>
            </div>
            @endforeach
         </div>
      </div>
      <input type="hidden" name='doc_ids'>
      <input type="hidden" name='scholarship_ids'>

      <!-- submit form -->
      <div class="card-footer text-right mx-5">
         <button type="submit" class="btn btn-success">Submit</button>
      </div>
   </form>

</div>


@endsection

@section('script')
<script lang="javascript">
$('#frm').submit(function(event) {
   event.preventDefault();
   alert();
});

function postData() {
   //event.preventDefault();
   var doc_ids = [];
   var chks = document.getElementsByName('chk_visadocs');
   chks.forEach((chk) => {
      if (chk.checked) doc_ids.push(chk.value);
   })

   $("[name=doc_ids]").val(doc_ids);

   var scholarship_ids = [];
   var chks = document.getElementsByName('chk_scholarship');
   chks.forEach((chk) => {
      if (chk.checked) scholarship_ids.push(chk.value);
   })

   $("[name=scholarship_ids]").val(scholarship_ids);


}
</script>
@endsection