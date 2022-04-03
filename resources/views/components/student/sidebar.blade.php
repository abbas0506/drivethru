@php
$user=session('user');
@endphp
<nav class="sidebar">
   <div class="user-avatar">
      <div><img src="{{url(asset('images/users/'.$user->pic))}}" alt="" width="50" height="50" class="rounded"></div>
      <div class="mt-2 txt-10 txt-silver">{{$user->id}}</div>
      <div class="mt-2 txt-10 txt-silver">
         <a href="http://"><i data-feather='power' class="feather-xsmall"></i></a>
      </div>
      <div class="mt-2 txt-10 free-report"><a href="http://">Get Free Report</a></div>
   </div>
   <span class="border-bottom border-light-silver px-4"></span>
   <ul>
      <li @if($activeItem=='dashboard' ) class="active" @endif>
         <a href="{{url('student-dashboard')}}">
            <ul>
               <li><i data-feather='grid' class="feather-small"></i></li>
               <li>Dashboard</li>
            </ul>
         </a>
      </li>
      <li @if($activeItem=='finduniversity' ) class="active" @endif>
         <a href="http://">
            <ul>
               <li><i data-feather='search' class="feather-small"></i></li>
               <li>Find Uni</li>
            </ul>
         </a>
      </li>
      <li @if($activeItem=='pastpapers' ) class="active" @endif>
         <a href="{{url('past-papers')}}">
            <ul>
               <li><i data-feather='download-cloud' class="feather-small"></i></li>
               <li>Past Papers</li>
            </ul>
         </a>
      </li>
      <li @if($activeItem=='counselling' ) class="active" @endif>
         <a href="{{route('counselling.index')}}">
            <ul>
               <li><i data-feather='headphones' class="feather-small"></i></li>
               <li>Counselling</li>
            </ul>
         </a>
      </li>
   </ul>
</nav>