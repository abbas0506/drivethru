<!-- side profile section-->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">My Profile</div>
   <div class="frow w-100 rw-100 centered relative">
      <div class="fcol border-1 circular-75">
         <img src="{{url('storage/images/logos/logo2.png')}}" alt="" class="user-avatar-lg" width='75' height='75'>
      </div>
      <div>
         <a href="{{route('change_picture')}}">
            <i data-feather='camera' class="feather-xsmall absolute" style='bottom:5px'></i>
         </a>
      </div>
   </div>

   <div class="frow w-100 rw-100 mt-4 txt-s txt-b">{{$user->name}}</div>
   <div class="frow w-100 rw-100 mt-2 stretched">
      <div class="txt-s">{{$user->phone}}</div>
      <div class="fcol circular-15 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>
   <div class="frow w-100 rw-100 mt-2 stretched">
      <div class="txt-s">{{$user->email}}</div>
      <div class="fcol circular-15 centered bg-green"><i data-feather='check' class="feather-xsmall txt-white"></i> </div>
   </div>

</div>