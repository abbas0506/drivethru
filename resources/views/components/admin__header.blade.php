<div class='frow navbar w-100 bg-transparent txt-white stretched rpx-5'>
   <div class='mr-auto'><img src="{{url(asset('images/app/colorlogo_0.png'))}}" style="height:25px"></div>
   <div class="frow">
      <div class="fcol centered navlink r-hide"><a href="{{url('primary')}}"> Primary Data</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{route('countries.index')}}"> Countries</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{route('universities.index')}}">Universities</a></div>
      <div class="fcol centered navlink r-hide"><a href="{{route('papers.index')}}">Past Papers</a></div>

      <div class="fcol centered navlink has-sub">
         <div class='relative'>
            <i data-feather='bell' class="feather-small"></i>
            <div class='notification-count'></div>
         </div>
         <div class='chevron-up'></div>
         <div class='frow navsub'>
            <div class="fcol">
               <div class=" navlink"><a href="http://">Admission requests</a></div>
               <div class=" navlink"><a href="http://">Career counselling requests</a></div>
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
               <div class="navlink txt-b "><a href="http://">Your Profile</a></div>
               <div class="navlink"><a href="http://">Change Password</a></div>
               <div class="navlink"><a href="{{url('signout')}}">Sign out</a></div>

            </div>
         </div>
      </div>
   </div>
</div> <!--    navbar ends -->