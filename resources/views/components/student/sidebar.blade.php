@php
$user=session('user');
@endphp
<nav class="sidebar">
   <div class="user-avatar">
      <div><img src="{{url(asset('images/users/'.$user->pic))}}" alt="" width="50" height="50" class="rounded"></div>
      <div class="mt-2 txt-10">{{$user->id}}</div>
      <div class="mt-2 txt-10 free-report"><a href="http://">Get Free Report</a></div>
   </div>
   <ul>
      <span class="hr"></span>
      <li class="active mt-2">
         <a href="http://">
            <ul>
               <li><i data-feather='grid' class="feather-small"></i></li>
               <li>Dashboard</li>
            </ul>
         </a>
      </li>
      <li>
         <a href="http://">
            <ul>
               <li><i data-feather='search' class="feather-small"></i></li>
               <li>Find Uni</li>
            </ul>
         </a>
      </li>
      <li>
         <a href="http://">
            <ul>
               <li><i data-feather='download-cloud' class="feather-small"></i></li>
               <li>Past Papers</li>
            </ul>
         </a>
      </li>
      <li>
         <a href="http://">
            <ul>
               <li><i data-feather='headphones' class="feather-small"></i></li>
               <li>Counselling</li>
            </ul>
         </a>
      </li>
   </ul>
</nav>