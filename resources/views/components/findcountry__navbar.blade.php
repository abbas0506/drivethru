<div @if($activeItem=='preference' ) class="navitem txt-s active" @else class="navitem txt-s" @endif>
   <a href="{{route('findcountry.index')}}">
      <div class="frow top-mid">
         <div class='badge badge-info p-1 mr-1'>1</div>
         <div>Set Preference</div>
      </div>
   </a>
</div>
<div @if($activeItem=='apply' ) class="navitem txt-s active" @else class="navitem txt-s" @endif>
   <div class="frow top-mid">
      <div class='badge badge-info p-1 mr-1'>2</div>
      <div>Get Report / Apply</div>
   </div>
</div>