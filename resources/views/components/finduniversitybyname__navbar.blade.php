<div @if($activeItem=='find' ) class="navitem txt-s active" @else class="navitem txt-s" @endif>
   <a href="{{route('finduniversitiesbyname.index')}}">
      <div class="frow top-mid">
         <div>Find</div>
      </div>
   </a>
</div>
<div @if($activeItem=='report' ) class="navitem txt-s active" @else class="navitem txt-s" @endif>
   <div class="frow top-mid">
      <div>Get Report</div>
   </div>
</div>
<div @if($activeItem=='apply' ) class="navitem txt-s active" @else class="navitem txt-s" @endif>
   <div class="frow top-mid">
      <div>Apply</div>
   </div>
</div>