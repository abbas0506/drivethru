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
         <div class="w-80">
            <h5 class="text-danger bg-light-grey p-2">Routine Activities</h5>
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
                  <a href="http://"><span class="lnr lnr-flag mr-3"></span>Site Banner</a>
               </li>
               <li>
                  <a href="http://"><span class="lnr lnr-film-play mr-3"></span>Site Video</a>
               </li>
               <li>
                  <a href="http://"><span class="lnr lnr-users mr-3"></span>Registered Candidates</a>
               </li>

            </ul>

         </div>

      </div>
   </div>
</section>
@endsection