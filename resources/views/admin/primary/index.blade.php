@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Primary Data</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('/admin')}}">Home</a><span class="mx-1"> / </span>primary data
   </div>
</div>
@endsection
@section('page-content')

<div class="container-75 rp-5">

   <div class="frow w-100 rw-100 stretched auto-col">
      <div class="fcol w-48 rw-100  relative">
         <a href="{{route('cities.index')}}">
            <div class="fcol p-4 primary hoverable">
               <div class="label">Cities</div>
               <div class="icon"><i data-feather='settings' class="feather-large"></i></div>
               <div class="order rw-100">
                  <div class="fcol centered circular-50">1</div>
               </div>
               <div class="animated-order rw-100">
                  <div class="fcol centered circular-50">1</div>
               </div>
            </div>
         </a>
      </div>
      <div class="fcol w-48 rw-100 rmt-3 relative">
         <a href="{{route('levels.index')}}">
            <div class="fcol p-4 primary hoverable">
               <div class="label">Study Levels</div>
               <div class="icon"><i data-feather='settings' class="feather-large"></i></div>
               <div class="order rw-100">
                  <div class="fcol centered circular-50">2</div>
               </div>
               <div class="animated-order rw-100">
                  <div class="fcol centered circular-50">2</div>
               </div>
            </div>
         </a>
      </div>
   </div>
   <div class="frow w-100 rw-100 stretched mt-3 auto-col">
      <div class="fcol w-48 rw-100 relative">
         <a href="{{route('faculties.index')}}">
            <div class="fcol p-4 primary hoverable">
               <div class="label">Faculties & Courses</div>
               <div class="icon"><i data-feather='settings' class="feather-large"></i></div>
               <div class="order rw-100">
                  <div class="fcol centered circular-50">3</div>
               </div>
               <div class="animated-order rw-100">
                  <div class="fcol centered circular-50">3</div>
               </div>
            </div>
         </a>
      </div>
      <div class="fcol w-48 rw-100 relative">
         <a href="{{route('scholarships.index')}}">
            <div class="fcol p-4 primary hoverable">
               <div class="label">Scholarship Types</div>
               <div class="icon"><i data-feather='settings' class="feather-large"></i></div>
               <div class="order rw-100">
                  <div class="fcol centered circular-50">5</div>
               </div>
               <div class="animated-order rw-100">
                  <div class="fcol centered circular-50">5</div>
               </div>
            </div>
         </a>
      </div>

   </div>

   <div class="frow w-100 rw-100 stretched mt-3 auto-col">
      <div class="fcol w-48 rw-100 rmt-3 relative">
         <a href="{{route('expensetypes.index')}}">
            <div class="fcol p-4 primary hoverable">
               <div class="label">Living Expense Types</div>
               <div class="icon"><i data-feather='settings' class="feather-large"></i></div>
               <div class="order rw-100">
                  <div class="fcol centered circular-50">6</div>
               </div>
               <div class="animated-order rw-100">
                  <div class="fcol centered circular-50">6</div>
               </div>
            </div>
         </a>
      </div>
      <div class="fcol w-48 rw-100 relative">
         <a href="{{route('documents.index')}}">
            <div class="fcol p-4 primary hoverable">
               <div class="label">Documents Titles</div>
               <div class="icon"><i data-feather='settings' class="feather-large"></i></div>
               <div class="order rw-100">
                  <div class="fcol centered circular-50">7</div>
               </div>
               <div class="animated-order rw-100">
                  <div class="fcol centered circular-50">7</div>
               </div>
            </div>
         </a>
      </div>

   </div>
   <div class="frow w-100 rw-100 stretched mt-3 auto-col">
      <div class="fcol w-48 rw-100 rmt-3 relative">
         <a href="{{route('papertypes.index')}}">
            <div class="fcol p-4 primary hoverable">
               <div class="label">Past Paper Categories</div>
               <div class="icon"><i data-feather='settings' class="feather-large"></i></div>
               <div class="order rw-100">
                  <div class="fcol centered circular-50">8</div>
               </div>
               <div class="animated-order rw-100">
                  <div class="fcol centered circular-50">8</div>
               </div>
            </div>
         </a>
      </div>
   </div>
</div>

@endsection