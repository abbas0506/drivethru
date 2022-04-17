@extends('layouts.representative')

@section('page-content')

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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-bullhorn mr-3"></span> News Feed - <span class="txt-s">edit</span> </div>

   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('news.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">Instructions:</div>
         <ul class="txt-s">
            <li>Try to be concise</li>
            <li>Dont leave empty news. Empty news is not allowed</li>
         </ul>
      </div>
      <form action="{{route('news.update',$news)}}" method='post'>
         @csrf
         @method('PATCH')

         <div class="fancyinput mt-5">
            <textarea rows="3" name='text' placeholder="News Text" required oninput='countTextLimit(event)'>{{$news->text}}</textarea>
            <label>News Text <span class="txt-s ml-4 txt-grey" id='text_count'></span></label>
         </div>

         <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
         </div>
      </form>
   </div>
   @endsection
   @section('script')
   <script lang="javascript">
   function countTextLimit(event) {
      var txt = event.target.value
      $('#text_count').text(txt.length + "/500");
   }
   </script>
   @endsection