<div class="fcol w-100 rw-100 bg-white p-4">
   <div class="w-100 rw-100 mb-2 txt-grey txt-b ">
      <a href="#" class="txt-orange">NEWS</a>
      <img src="{{url(asset('images/app/live.png'))}}" class="ml-2" alt="" width=25 height=25>
   </div>
   <div class="frow w-100 rw-100 centered">
      <div id="scroll-container">
         <div id="scroll-text">
            @foreach(session('news') as $newsitem)
            <div class="my-2">{{$newsitem->text}}</div>
            @endforeach
         </div>
      </div>
   </div>
</div>
<!-- Change password -->

<div class="frow w-100 rw-100">
   <img src="{{url(asset('images/advertisement/'.session('banner')))}}" alt="" class="" width='100%' height='200'>
</div>