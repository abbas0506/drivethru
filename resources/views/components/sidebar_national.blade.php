<div class="fcol user-sidebar top-mid">
   <div class='frow w-100 mid-right p-1'>
      <div class="box-25 text-center bg-orange text-white circular hoverable rshow" onclick="toggle_sidebar()"><i data-feather='x' class="feather-small"></i></div>
   </div>

   <div><img src="{{url('storage/images/logos/logo2.png')}}" alt="" class="user-avatar-lg"></div>
   <div class="user-profile-id">{{$user->id}}</div>

   <a href="{{route('profiles.index')}}">
      <div class="frow centered txt-smoke relative">
         <div class="txt-s">My Profile</div>
         <div class="ml-2"><i data-feather='edit' class="feather-xsmall absolute" style="top:2px"></i></div>
      </div>
   </a>

   <span class="w-75 hr my-1"></span>

   <div @if($activeItem=='dashboard' ) class="navitem active" @else class="navitem" @endif>
      <a href="#">
         <div class="navitem-ico"><i data-feather='grid' class="feather-small"></i></div>
         <div class="navitem-link">Dashboard</div>
      </a>
   </div>

   <div @if($activeItem=='findUni' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{route('finduniversity.index')}}">
         <div class="navitem-ico"><i data-feather='award' class="feather-small"></i></div>
         <div class="navitem-link">Apply | Get Report</div>
      </a>
   </div>

   <div @if($activeItem=='applications' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{route('applications.index')}}">
         <div class="navitem-ico"><i data-feather='file' class="feather-small"></i></div>
         <div class="navitem-link">My Applications</div>
      </a>
   </div>

   <div @if($activeItem=='pastPapers' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{route('applications.index')}}">
         <div class="navitem-ico"><i data-feather='download' class="feather-small"></i></div>
         <div class="navitem-link">Past Papers</div>
      </a>
   </div>

   <div @if($activeItem=='careerCounselling' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{route('applications.index')}}">
         <div class="navitem-ico"><i data-feather='headphones' class="feather-small"></i></div>
         <div class="navitem-link">Career Counselling</div>
      </a>
   </div>

</div>