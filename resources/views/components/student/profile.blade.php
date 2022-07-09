<div class="block bg-white border p-4">

   <div class="txt-grey txt-14 txt-b mb-3 txt-center">
      <a href="{{route('profiles.index')}}">My Profile</a>
   </div>


   <div class="frow justify-center">
      <div class="profile-image relative">
         <img src="{{url(asset('images/users/'.$user->pic))}}" alt="img">
         <a href="{{url('change-pic')}}" class="mask"><i data-feather='edit' class="feather-small txt-blue"></i></a>
      </div>
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
   <!-- <div class="frow space-between mt-2">
      <a href="{{url('change-pic')}}" class="txt-s">Profile Picture</a>
      @if($user->hasPic())
      <a href="{{url('change-pic')}}"><i data-feather='edit-2' class="feather-xsmall txt-green"></i></a>
      @else
      <a href="{{url('change-pic')}}"><i data-feather='edit-2' class="feather-xsmall txt-grey"></i></a>
      @endif
   </div> -->
   <div class="frow space-between mt-4">

      @if($user->hasProfile())
      <a href="{{route('profiles.edit',$user->profile())}}" class="txt-s">Personal Information</a>
      <a href="{{route('profiles.edit',$user->profile())}}"><span class="txt-s mr-1">Edit</span><i data-feather='edit-2' class="feather-xsmall txt-green"></i></a>
      @else
      <a href="{{route('profiles.create')}}" class="txt-s">Personal Information</a>
      <a href="{{route('profiles.create')}}"><span class="txt-s mr-1">Edit</span> <i data-feather='edit-2' class="feather-xsmall txt-grey"></i></a>
      @endif

   </div>
   <div class="frow space-between mt-2">

      @if($user->hasAcademics())
      <a href="{{route('academics.index')}}" class="txt-s">Academic Information</a>
      <a href="{{route('academics.index')}}"><span class="txt-s mr-1">Edit</span><i data-feather='edit-2' class="feather-xsmall txt-green"></i></a>
      @else
      <a href="{{route('academics.create')}}" class="txt-s">Academic Information</a>
      <a href="{{route('academics.create')}}"><span class="txt-s mr-1">Edit</span> <i data-feather='edit-2' class="feather-xsmall txt-grey"></i></a>
      @endif

   </div>

</div>

<!-- Change password -->

<div class="frow centered bg-light p-4 border mt-3 border">
   <i data-feather='key' class="feather-xsmall feather-red pr-4"></i>
   <a href="{{url('change-pw')}}">Change Password</a>
</div>