<div class="frow centered">
   <img src="{{url(asset('images/countries/'.$country->flag))}}" alt='flag' width=40 height=40 class='rounded-circle'>
</div>
<div class='frow txt-l centered mb-2'>{{$country->name}}</div>
<div class='progress mb-4' style='height:5px'>
   <div class='progress-bar' style='width:{{$country->progress()}}%'> </div>
</div>
<div class="frow w-100 rw-100 stretched">
   <div class="txt-s"><a href="#">Basic Profile</a></div>
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
   @if($country->scholarship_offers()->count()>0)
   <div class="txt-s"><a href="#">Scholarship Offers</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('profiles.create')}}">Scholarship Offers</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>
<div class="frow w-100 rw-100 mt-2 stretched">
   @if($country->universities()->count()>0)
   <div class="txt-s"><a href="#">Top Universities</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('profiles.create')}}">Top Universities</a></div>
   <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
   @endif
</div>
<div class="frow w-100 rw-100 mt-2 stretched">
   @if($country->studycosts()->count()>0)
   <div class="txt-s"><a href="#">Study Cost</a></div>
   <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
   @else
   <div class="txt-s"><a href="{{route('profiles.create')}}">Study Cost</a></div>
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