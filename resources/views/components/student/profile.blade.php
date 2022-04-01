<div class="block bg-white p-4">

   <div class="txt-grey txt-14 txt-b mb-3 txt-center">
      <a href="{{route('profiles.index')}}">My Profile</a>
   </div>


   <div class="frow justify-center">
      <img src="{{url(asset('images/users/'.$user->pic))}}" alt="" class="rounded" width='50' height='50'>
   </div>


   <div class="mt-4 txt-12 txt-b">{{$user->name}}</div>
   <div class="frow mt-2 space-between">
      <div class="w-10"><i data-feather='phone' class="feather-xsmall feather-red"></i> </div>
      <div class="w-80 txt-12">{{$user->phone}}</div>
   </div>
   <div class="frow mt-2 space-between">
      <div class="w-10"><i data-feather='at-sign' class="feather-xsmall feather-red"></i> </div>
      <div class="w-80 txt-12">{{$user->email}}</div>
   </div>

   <div class='progress my-3' style='height:5px'>
      @if($user->numOfStepsFinished()==1)
      <div class='progress-bar' style='width:50%'></div>
      @elseif($user->numOfStepsFinished()==2)
      <div class='progress-bar' style='width:100%'></div>
      <div class='progress-bar' style='width:0%'></div>
      @endif
   </div>
   <div class="frow space-between mt-2">

      <div class="txt-s"><a href="{{url('change-pic')}}">Profile Picture</a></div>

      @if($user->hasPic())
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>
   <div class="frow space-between mt-2">

      @if($user->hasProfile())
      <div class="txt-s"><a href="{{route('profiles.edit',$user->profile())}}">Personal Information</a></div>
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="txt-s"><a href="{{route('profiles.create')}}">Personal Information</a></div>
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif

   </div>
   <div class="frow space-between mt-2">

      @if($user->hasAcademics())
      <div class="txt-s"><a href="{{route('academics.index')}}">Academic Information</a></div>
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="txt-s"><a href="{{route('academics.create')}}">Academic Information</a></div>
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif

   </div>

</div>

<!-- Change password -->

<div class="frow centered bg-white p-4 mt-3">
   <i data-feather='key' class="feather-xsmall feather-red pr-4"></i>
   <a href="{{url('change-pw')}}">Change Password</a>
</div>