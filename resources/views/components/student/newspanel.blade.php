<div class="fcol bg-white p-4 mt-4">
   <div class="mb-2 txt-grey txt-b ">
      <a href="#" class="txt-orange">NEWS</a>
      <img src="{{url(asset('images/app/live.png'))}}" class="ml-2" alt="" width=25 height=25>
   </div>
   <div class="frow centered">
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

<div class="frow">
   <img src="{{asset('images/advertisement/banner.gif')}}" alt="" class="" width='100%' height='200'>
</div>