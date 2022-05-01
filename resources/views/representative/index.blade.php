@extends('layouts.representative')

@section('page-content')
<section class='page-content'>
   <div class="mx-auto w-70 my-5 ">
      <div class="txt-b txt-m">Instructions:</div>
      <div class="mt-2">Feel free to perform your daily activities. A few considerations may help imporve site performance.</div>
      <ol type='i' class="txt-s">
         <li>Avoid big sized site banner or site video. It may increase page loading time.</li>
         <li>Try to use short news (not more than 50 words). Lengthy news may cause negative impact on user page's outlook </li>
      </ol>

      <div class="frow stretched mt-5">
         <div class="w-48">
            <h5 class="text-danger bg-light-grey p-2">Site Administration</h5>
            <ul type='i' style="list-style: none;">
               <li>
                  <a href="{{route('news.index')}}"><span class="lnr lnr-bullhorn mr-3"></span>News Feed</a>
               </li>
               <li>
                  <a href="http://"><span class="lnr lnr-envelope mr-3"></span>Mail to</a>
               </li>
               <li>
                  <a href="{{route('closing.index')}}"><span class="lnr lnr-calendar-full mr-3"></span>Closing Date</a>
               </li>
               <li>
                  <a href="{{route('lastmerit.index')}}"><span class="lnr lnr-graduation-hat mr-3"></span>Last Merit</a>
               </li>
               <li>
                  <a href="{{route('advertisements.index')}}"><span class="lnr lnr-flag mr-3"></span>Site Banner</a>
               </li>
               <li>
                  <a href="{{route('sitevideo.index')}}"><span class="lnr lnr-film-play mr-3"></span>Site Video</a>
               </li>
               <li>
                  <a href="{{route('papers.index')}}"><span class="lnr lnr-file-add mr-3"></span>Past Papers</a>
               </li>
               <li>
                  <a href="{{route('registrations.index')}}"><span class="lnr lnr-users mr-3"></span>User Control</a>
               </li>

            </ul>

         </div>
         <div class="w-48">
            <h5 class="txt-grey bg-light-grey p-2">Responsive Actions</h5>
            <ul type='i' style="list-style: none;">
               <li>
                  <a href="{{route('queryresponses.index')}}"><span class="lnr lnr-question-circle mr-3"></span>General Queries</a>
               </li>
               <li>
                  <a href="{{route('counsellingresponses.index')}}"><span class="lnr lnr-bubble mr-3"></span>Counselling Requests</a>
               </li>
               <li>
                  <a href="{{route('verifybankpayments.index')}}"><span class="lnr lnr-checkmark-circle mr-3"></span>Fee Verification</a>
               </li>
               <li>
                  <a href="{{route('registrations.index')}}"><span class="lnr lnr-envelope mr-3"></span>Newsletter Subscription</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</section>
@endsection