<div class="frow w-80 stretched mid-left">
   <div class="frow mid-left">
      @if(session('mode')==0)
      <a href="{{url('switch/1')}}">
         <i data-feather='toggle-left' class="feather-medium txt-custom-blue mx-2" onclick=""></i>
         <span class="txt-custom-blue">Switch to International Mode</span>
      </a>
      @else
      <a href="{{url('switch/0')}}">
         <i data-feather='toggle-right' class="feather-medium txt-custom-blue mx-2" onclick=""></i>
         <span class="txt-custom-blue">Switch to National Mode</span>
      </a>
      @endif
   </div>
   <div class="frow user-top-navbar centered rhide">
      <div @if($activeItem=='about' ) class="navitem active" @else class="navitem" @endif>About</div>
      <div @if($activeItem=='home' ) class="navitem active" @else class="navitem" @endif>Home</div>
      <div @if($activeItem=='blog' ) class="navitem active" @else class="navitem" @endif>Blog</div>
      <div @if($activeItem=='contactus' ) class="navitem active" @else class="navitem" @endif>Contact Us</div>
   </div>
   <div class="frow pr-3">
      <div class="px-1"><i data-feather='bell' class="feather-small" onclick=""></i></div>
      <div class="px-1">
         <a href="{{url('signout')}}">
            <i data-feather='log-out' class="feather-small txt-custom-blue"></i>
         </a>
      </div>
      <div class="my-auto mx-2 rshow"><i data-feather='menu' class="feather-small" onclick="toggle_sidebar()"></i></div>
   </div>
</div>