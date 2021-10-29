<div class="frow centered">
   <img src="{{url(asset('images/countries/'.$country->flag))}}" alt='flag' width=40 height=40 class='rounded-circle'>
</div>
<div class='frow txt-l centered mb-2'>{{$country->name}}</div>
<div class='progress mb-4' style='height:5px'>
   <div class='progress-bar' style='width:{{$country->progress()}}%'> </div>
</div>
<div class="frow w-100 rw-100 stretched">
   <div class="txt-s"><a href="{{route('countries.show', $country)}}">Basic Profile</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
</div>
<!-- visa requirements -->
<div class="frow w-100 rw-100 mt-2 stretched">
   @if($country->visadocs()->count()>0)
   <div class="txt-s"><a href="{{route('visadocs.index')}}">Visa Requirements</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('visadocs.edit', $country)}}">Visa Requirements</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>
<!-- admission requirements -->
<div class="frow w-100 rw-100 mt-2 stretched">
   @if($country->admdocs()->count()>0)
   <div class="txt-s"><a href="{{route('admdocs.index')}}">Admission Requirements</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('admdocs.edit', $country)}}">Admission Requirements</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>

<div class="frow w-100 rw-100 mt-2 stretched">
   @if($country->scholarships()->count()>0)
   <div class="txt-s"><a href="{{route('scholarship_offers.index')}}">Scholarship Offers</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('scholarship_offers.edit', $country)}}">Scholarship Offers</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>
<div class="frow w-100 rw-100 mt-2 stretched">
   @if($country->funiversities()->count()>0)
   <div class="txt-s"><a href="{{route('funiversities.index')}}">Top Universities</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('funiversities.index')}}">Top Universities</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>
<div class="frow w-100 rw-100 mt-2 stretched">
   @if($country->studycosts()->count()>0)
   <div class="txt-s"><a href="{{route('studycosts.index')}}">Study Cost</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('studycosts.index')}}">Study Cost</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>
<div class="frow w-100 rw-100 mt-2 stretched">
   @if($country->livingcosts()->count()>0)
   <div class="txt-s"><a href="#">Living Cost</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('profiles.create')}}">Living Cost</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>