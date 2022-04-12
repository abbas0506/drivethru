<div class="p-4 relative">
   <a href="{{route('countries.index')}}">
      <div class="top-right-icon circular-20">
         <i data-feather='x' class="feather-xsmall mb-1"></i>
      </div>
   </a>
   <div class="frow centered">
      <img src="{{url(asset('images/countries/'.$country->flag))}}" alt='flag' width=40 height=40 class='rounded-circle'>
   </div>
   <div class='txt-m text-center my-2'>{{$country->name}}</div>
   <div class='progress mb-4' style='height:5px'>
      @php
      $progress=$country->progress();
      @endphp

      @if($progress==30)
      <div class='progress-bar' style='width:30%'> </div>
      @elseif($progress==40)
      <div class='progress-bar' style='width:40%'> </div>
      @elseif($progress==50)
      <div class='progress-bar' style='width:50%'> </div>
      @elseif($progress==60)
      <div class='progress-bar' style='width:60%'> </div>
      @elseif($progress==70)
      <div class='progress-bar' style='width:70%'> </div>
      @elseif($progress==80)
      <div class='progress-bar' style='width:80%'> </div>
      @elseif($progress==90)
      <div class='progress-bar' style='width:90%'> </div>
      @elseif($progress==100)
      <div class='progress-bar' style='width:100%'> </div>
      @endif
   </div>
   <div class="frow stretched">
      <div class="txt-s"><a href="{{route('countries.show', $country)}}">Basic Profile</a></div>
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   </div>
   <!-- visa requirements -->
   <div class="frow mt-2 stretched">
      <div class="txt-s"><a href="{{route('visadocs.index')}}">Visa Requirements</a></div>
      @if($country->visadocs()->count()>0)
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>
   <!-- admission requirements -->
   <div class="frow mt-2 stretched">
      <div class="txt-s"><a href="{{route('admdocs.index')}}">Admission Requirements</a></div>
      @if($country->admdocs()->count()>0)
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>

   <div class="frow mt-2 stretched">
      <div class="txt-s"><a href="{{route('scholarship_offers.index')}}">Scholarship Offers</a></div>
      @if($country->scholarships()->count()>0)
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>
   <div class="frow mt-2 stretched">
      <div class="txt-s"><a href="{{route('funiversities.index')}}">Top Universities</a></div>
      @if($country->funiversities()->count()>0)
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>

   <div class="frow mt-2 stretched">
      <div class="txt-s"><a href="{{route('favcourses.index')}}">Favourite Courses</a></div>
      @if($country->favcourses()->count()>0)
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>

   <div class="frow mt-2 stretched">
      <div class="txt-s"><a href="{{route('studycosts.index')}}">Study Cost</a></div>
      @if($country->studycosts()->count()>0)
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>

   <div class="frow mt-2 stretched">
      <div class="txt-s"><a href="{{route('livingcosts.index')}}">Living Cost</a></div>
      @if($country->livingcosts()->count()>0)
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>
</div>