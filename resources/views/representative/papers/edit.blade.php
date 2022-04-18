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
   @endif

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-file-add mr-3"></span> Past Pepers <span class="txt-s"> - edit</span></div>
   <div class="w-60 mx-auto">
      <div class="bg-custom-light p-2 mb-3 relative">
         <a href="{{route('papers.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-b">How to edit past paper?</div>
         <ul class="txt-s">
            <li>Upload paper on google drive, should be in .pdf format</li>
            <li>Copy its link i.e URL and paste here in text box</li>
         </ul>
      </div>
      <!-- news panel -->
      <div class="mt-3">
         <form action="{{route('papers.update', $paper)}}" method='post'>
            @csrf
            @method('PATCH')
            <div class="frow my-4 stretched">
               <div class="fancyselect w-48">
                  <select name="papertype_id">
                     @foreach($papertypes as $papertype)
                     <option value="{{$papertype->id}}" @if($papertype->id==$paper->papertype->id) selected @endif>{{$papertype->name}}</option>
                     @endforeach
                  </select>
                  <label for="Name">Paper Type</label>
               </div>
               <div class="fancyinput w-48">
                  <input type="number" name='year' placeholder="Enter year" value='{{$paper->year}}' required>
                  <label for="Name">Year</label>
               </div>
            </div>
            <div class="fancyinput w-100">
               <input type="txt" name='url' placeholder="Paste Url" class='w-100 m-0 p-2' value='{{$paper->url}}' required>
               <label for="Name">Drive URL</label>
            </div>

            <div class="frow mid-right my-4">
               <button type="submit" class="btn btn-success">Update</button>
            </div>
         </form>

      </div>
      @endsection