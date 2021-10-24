<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">
      <a href="{{route('profiles.index')}}">MY PROFILE</a>
   </div>
   <div class="frow w-100 rw-100 centered">
      <div class="fcol border circular-50">
         <img src="{{url(asset('images/users/'.$user->pic))}}" alt="" class="user-avatar-lg rounded-circle" width='50' height='50'>
      </div>
   </div>

   <div class="frow w-100 rw-100 mt-4 txt-s txt-b">{{$user->name}}</div>
   <div class="frow w-100 rw-100 mt-2 mid-left">
      <div class="mr-2"><i data-feather='phone' class="feather-xsmall txt-orange"></i> </div>
      <div class="txt-s">{{$user->phone}}</div>
   </div>
   <div class="frow w-100 rw-100 mt-2">
      <div class="mr-2"><i data-feather='at-sign' class="feather-xsmall txt-orange"></i> </div>
      <div class="txt-s">{{$user->email}}</div>
   </div>

   <div class='progress my-3' style='height:5px'>
      @if($user->numOfStepsFinished()==1)
      <div class='progress-bar' style='width:50%'></div>
      @elseif($user->numOfStepsFinished()==2)
      <div class='progress-bar' style='width:100%'></div>
      <div class='progress-bar' style='width:0%'></div>
      @endif
   </div>
   <div class="frow w-100 rw-100 stretched">

      <div class="txt-s"><a href="{{route('change_pic')}}">Profile Picture</a></div>

      @if($user->hasPic())
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif
   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">

      @if($user->hasProfile())
      <div class="txt-s"><a href="{{route('profiles.edit',$user->profile())}}">Personal Information</a></div>
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="txt-s"><a href="{{route('profiles.create')}}">Personal Information</a></div>
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif

   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">

      @if($user->hasAcademics())
      <div class="txt-s"><a href="{{route('academics.index')}}">Academic Information</a></div>
      <div class="fcol circular-15 border-0 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i></div>
      @else
      <div class="txt-s"><a href="{{route('academics.create')}}">Academic Information</a></div>
      <div class="fcol circular-15 border-0 centered bg-dark-grey"><i data-feather='x' class="feather-xsmall txt-white"></i></div>
      @endif

   </div>

   <div class="frow w-100 rw-100 pt-2 mt-2 border-top stretched">
      <div class="txt-s"></div>
      <div class="frow">
         <a href="{{route('profiles.index')}}">
            <div class="txt-green">View Profile</div>
         </a>
         <div class="fcol centered"><i data-feather='chevron-right' class="feather-xsmall txt-green"></i> </div>
      </div>

   </div>
</div>

<!-- Change password -->

<div class="frow w-100 rw-100 bg-white p-4 mt-3">
   <div class="fcol w-20 rw-20 centered">
      <i data-feather='key' class="feather-xsmall txt-orange"></i>
   </div>
   <a href="{{url('changepw')}}" class="fcol w-80 rw-80">
      <div class="fcol w-80 centered">Change Password</div>
   </a>
</div>