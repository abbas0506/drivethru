<div class="fcol user-sidebar top-mid" style="background-image: linear-gradient(#003368, #2b5390);">
   <div class='frow w-100 mid-right p-1'>
      <div class="box-25 text-center bg-orange text-white circular hoverable rshow" onclick="toggle_sidebar()"><i data-feather='x' class="feather-small"></i></div>
   </div>
   <div class="frow w-100 rw-100 my-2 centered relative">

      @php
      $user=session('user');
      @endphp
      <div class="fcol border-1 circular-75">
         <img src="{{url(asset('images/users/'.$user->pic))}}" alt="" class="rounded-circle" width='75' height='75'>
      </div>
      <div>
         <a href="{{route('change_pic')}}">
            <i data-feather='camera' class="feather-xsmall absolute txt-smoke" style='bottom:5px'></i>
         </a>
      </div>
   </div>


   <div class="user-profile-id">{{$user->id}}</div>

   @if(session('mode')==1)
   <a href="{{route('findcountriesbyname.index')}}">
      <div class="frow centered txt-smoke relative">
         <div class="btn-rounded-custom-blue txt-s px-2 mt-2">Get Top Countries Report</div>
      </div>
   </a>
   @else
   <a href="{{route('finduniversitiesbyname.index')}}">
      <div class="frow centered txt-smoke relative">
         <div class="btn-rounded-custom-blue txt-s px-2 mt-2">Get Top Universities Report</div>
      </div>
   </a>
   @endif

   <span class="w-75 hr my-3"></span>
   @if(session('mode')==0)
   <div @if($activeItem=='dashboard' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{url('user_dashboard')}}">
         <div class="navitem-ico"><i data-feather='grid' class="feather-small"></i></div>
         <div class="navitem-link">Dashboard</div>
      </a>
   </div>

   <div @if($activeItem=='finduniversity' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{route('finduniversitiesbyname.index')}}">
         <div class="navitem-ico"><i data-feather='search' class="feather-small"></i></div>
         <div class="navitem-link">Find University</div>
      </a>
   </div>
   @else
   <div @if($activeItem=='dashboard' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{url('user_dashboard')}}">
         <div class="navitem-ico"><i data-feather='grid' class="feather-small"></i></div>
         <div class="navitem-link">Dashboard</div>
      </a>
   </div>
   <div @if($activeItem=='findcountry' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{route('findcountriesbyname.index')}}">
         <div class="navitem-ico"><i data-feather='search' class="feather-small"></i></div>
         <div class="navitem-link">Find Country</div>
      </a>
   </div>
   @endif
   <div @if($activeItem=='papers' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{url('download_past_papers')}}">
         <div class="navitem-ico"><i data-feather='download' class="feather-small"></i></div>
         <div class="navitem-link">Past Papers</div>
      </a>
   </div>

   <div @if($activeItem=='counselling' ) class="navitem active" @else class="navitem" @endif>
      <a href="{{route('counselling.index')}}">
         <div class="navitem-ico"><i data-feather='headphones' class="feather-small"></i></div>
         <div class="navitem-link">Career Counselling</div>
      </a>
   </div>

</div>