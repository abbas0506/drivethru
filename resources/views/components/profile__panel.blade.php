<!-- side profile section-->
<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="w-100 rw-100 txt-grey txt-b ">My Profile</div>
   <div class="frow w-100 rw-100 my-3 centered">

      @php
      $pic_url=url("storage/images/users/".$user->pic);
      @endphp
      <div class="fcol border-0 circular-75">
         <img src="{{$pic_url}}" alt="" class="rounded-circle" width='75' height='75'>
      </div>
   </div>

   <div class="frow w-100 rw-100 mt-4 txt-s txt-b">{{$user->name}}</div>
   <div class="frow w-100 rw-100 mt-2 mid-left">
      <div class="fcol mr-2"><i data-feather='phone' class="feather-xsmall txt-orange"></i> </div>
      <div class="txt-s">{{$user->phone}}</div>
   </div>
   <div class="frow w-100 rw-100 mt-2">
      <div class="fcol mr-2"><i data-feather='at-sign' class="feather-xsmall txt-orange"></i> </div>
      <div class="txt-s">{{$user->email}}</div>
   </div>

</div>