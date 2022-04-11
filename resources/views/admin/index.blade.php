@extends('layouts.admin')
@section('header')
<x-admin.header></x-admin.header>
@endsection
@section('page-content')
<section class='page-content'>
   <div class="mx-auto w-70 my-5 ">
      <div class="txt-b txt-m">Instructions:</div>
      <div class="mt-2">Data is an important asset of any organization. Correct data results in correct output. In order to feed data smoothly, you need to follow the following sequence of steps for both national and international panels</div>
      <ol type='i' class="txt-s">
         <li>Collect and prepare your data completely before taking actual start</li>
         <li>Complete step 1 before going to next step</li>
         <li>Step 1 data requires data entry following the sequence of steps</li>
         <li>Step 2 data does not require sequence</li>
      </ol>

      <div class="frow stretched mt-3">
         <div class="w-48">
            <h5 class="text-danger bg-light-grey p-2">Step 1: Primary Data</h5>
            <ol type='i'>
               <li>
                  <a href="{{url('cities')}}" class='mr-3'>Cities</a>
               </li>
               <li>
                  <a href="{{url('levels')}}" class='mr-3'>Study Levels</a>
               </li>
               <li>
                  <a href="{{url('faculties')}}" class='mr-3'>Faculties plus their course titles</a>
               </li>
               <li>
                  <a href="{{url('papertypes')}}" class='mr-3'>Past Paper Types</a>
               </li>
               <li>
                  <a href="{{url('documents')}}" class='mr-3'>Document Titles (international visa)</a>
               </li>
               <li>
                  <a href="{{url('scholarships')}}" class="mr-3">Scholarship Titles (international)</a>
               </li>
               <li>
                  <a href="{{url('expensetypes')}}" class="mr-3">Living Expenses Types (international)</a>
               </li>
            </ol>

         </div>
         <div class="w-48">
            <h5 class="text-secondary bg-light-grey p-2">Step 2: Higher level data</h5>
            <ol type='i'>
               <li>
                  <a href="{{url('universities')}}" class='mr-3'>National universities</a>
               </li>
               <li>
                  <a href="{{url('countries')}}" class='mr-3'>Foreign Countries</a>
               </li>
            </ol>

         </div>
      </div>
   </div>
</section>
@endsection