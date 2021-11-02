<div class="frow centered">
   <img src="{{url(asset('images/universities/'.$university->logo))}}" alt='logo' width=40 height=40 class='rounded-circle'>
</div>
<div class='frow txt-l centered mb-2'>{{$university->name}}</div>
<div class='progress mb-4' style='height:5px'>
   @php
   $progress=$university->progress();
   @endphp

   @if($progress==50)
   <div class='progress-bar' style='width:50%'> </div>
   @elseif($progress==100)
   <div class='progress-bar' style='width:100%'> </div>
   @endif
</div>
<div class="frow w-100 rw-100 stretched">
   <div class="txt-s"><a href="{{route('universities.show', $university)}}">Basic Profile</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
</div>
<!-- visa requirements -->
<div class="frow w-100 rw-100 mt-2 stretched">
   @if($university->unicourses()->count()>0)
   <div class="txt-s"><a href="{{route('unicourses.index')}}">Courses</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('unicourses.create')}}">Courses</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>