<div class='frow navbar w-100 bg-transparent txt-white stretched rpx-5'>
   <div class='mr-auto'><img src="{{url(asset('images/app/colorlogo_0.png'))}}" style="height:25px"></div>
   <div class="frow">
      <div class="fcol centered navlink r-hide"><a href="{{url('news')}}"> News Feed</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{route('advertisements.index')}}">Banner</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{route('countries.index')}}"> Mail To</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{route('countries.index')}}"> Notify</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{route('closing.index')}}">Closing</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{route('papers.index')}}">Past Papers</a></div>
      <!-- <div class="fcol centered navlink r-hide"><a href="{{url('admission/requests')}}">Admission</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{url('counselling/requests')}}">Counselling</a></div> -->

      <div class="fcol centered navlink has-sub">
         <div class='relative'>
            <i data-feather='bell' class="feather-small"></i>
            <div class='notification-count'></div>
         </div>
         <div class='chevron-up'></div>
         <div class='frow navsub'>
            <div class="fcol">
               <div class=" navlink"><a href="{{url('admission/requests')}}">Admission Requests</a></div>
               <div class=" navlink"><a href="{{url('counselling/requests')}}">Counselling Requests</a></div>
            </div>
         </div>

      </div>
      <div class="fcol centered navlink has-sub">
         <div class="relative text-center">
            <div class='box-25 border border-light rounded-circle'>
               <span class="lnr lnr-user"></span>
            </div>
         </div>


         <div class='chevron-up'></div>
         <div class='frow navsub'>
            <div class="fcol">
               <div class="navlink txt-b text-primary">{{session('user')->name}}</div>
               <div class="navlink"><a href="{{route('representative.create')}}">Change Password</a></div>
               <div class="navlink"><a href="{{url('signout')}}">Sign out</a></div>

            </div>
         </div>
      </div>
   </div>
</div> <!--    navbar ends -->