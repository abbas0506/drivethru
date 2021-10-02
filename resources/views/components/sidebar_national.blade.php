<div class="fcol user-sidebar top-mid">
   <div class='frow w-100 mid-right p-1'>
      <div class="box-25 text-center bg-orange text-white circular hoverable show-sm" onclick="toggle_sidebar()"><i data-feather='x' class="feather-small"></i></div>
   </div>

   <div><img src="{{url('storage/images/logos/logo2.png')}}" alt="" class="user-avatar-lg"></div>
   <div class="user-profile-id">ID:12345</div>
   <div class="frow centered">
      <div class="free-report-btn">Get Free Report</div>
   </div>
   <span class="w-75 hr my-3"></span>
   <div @if($activeItem=='profile' ) class="navitem active" @else class="navitem" @endif>
      <div class="navitem-ico"><i data-feather='edit-3' class="feather-small"></i></div>
      <div class="navitem-link">Profile</div>
   </div>
   <div @if($activeItem=='findUni' ) class="navitem active" @else class="navitem" @endif>
      <div class="navitem-ico"><i data-feather='search' class="feather-small"></i></div>
      <div class="navitem-link">Find University</div>
   </div>
   <div @if($activeItem=='pastPapers' ) class="navitem active" @else class="navitem" @endif>
      <div class="navitem-ico"><i data-feather='download' class="feather-small"></i></div>
      <div class="navitem-link">Past Papers</div>
   </div>
   <div @if($activeItem=='careerCounselling' ) class="navitem active" @else class="navitem" @endif>
      <div class="navitem-ico"><i data-feather='headphones' class="feather-small"></i></div>
      <div class="navitem-link">Career Counselling</div>
   </div>
</div>