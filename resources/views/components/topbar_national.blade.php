<div class="frow w-80 stretched mid-left">
   <div class=""><i data-feather='toggle-left' class="feather-small text-info mx-2" onclick=""></i>International Mode</div>
   <div class="frow user-top-navbar centered rhide">
      <div @if($activeItem=='about' ) class="navitem active" @else class="navitem" @endif>About</div>
      <div @if($activeItem=='home' ) class="navitem active" @else class="navitem" @endif>Home</div>
      <div @if($activeItem=='blog' ) class="navitem active" @else class="navitem" @endif>Blog</div>
      <div @if($activeItem=='contactus' ) class="navitem active" @else class="navitem" @endif>Contact Us</div>
   </div>
   <div class="frow pr-3">
      <div class="px-1"><i data-feather='bell' class="feather-small" onclick=""></i></div>
      <div class="px-1"><i data-feather='log-out' class="feather-small" onclick=""></i></div>
      <div class="my-auto mx-2 rshow"><i data-feather='menu' class="feather-small" onclick="toggle_sidebar()"></i></div>
   </div>
</div>