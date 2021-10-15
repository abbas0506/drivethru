<div class="fcol user-sidebar top-mid" style="background-image: linear-gradient(#003368, #2b5390);">
   <div class='frow w-100 mid-right p-1'>
      <div class="box-25 text-center bg-orange text-white circular hoverable rshow" onclick="toggle_sidebar()"><i data-feather='x' class="feather-small"></i></div>
   </div>

   <div><img src="{{url('storage/images/logos/logo2.png')}}" alt="" class="user-avatar-lg"></div>
   <div class="user-profile-id">{{$user->id}}</div>

   <a href="{{route('profiles.index')}}">
      <div class="frow centered txt-smoke relative">
         <div class="badge badge-info txt-s p-2">Get Report</div>
      </div>
   </a>

   <span class="w-75 hr my-3"></span>

   <div @if($activeItem=='dashboard' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{url('national_dashboard')}}">
         <div class="navitem-ico"><i data-feather='grid' class="feather-small"></i></div>
         <div class="navitem-link">Dashboard</div>
      </a>
   </div>

   <div @if($activeItem=='findUni' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{route('finduniversity.index')}}">
         <div class="navitem-ico"><i data-feather='search' class="feather-small"></i></div>
         <div class="navitem-link">Find University</div>
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