@extends('layouts.index')

@section('header')
<section class="header">
   <x-navbar></x-navbar>
</section>
@endsection
@section('content')
<section class="auth-section">
   <div class="site-slogan">
      <img src="{{url(asset('images/illustrations/howtoapply.png'))}}" alt="" width="400">
      <p>drivethru.pk is a simple one step solution for all of your higher education requirements in national as well as inernational universities from education couselling to vetted admission process.</p>
   </div>
   <div class='auth-form'>
      <form action="{{route('signin')}}" method="post" onsubmit="return validate()">
         @csrf
         <div class="title mb-5">SIGN IN</div>
         <div class="frow justify-center align-center mt-5">
            <div class="txt-light txt-10">Don't you have an account?</div>
            <div class="txt-red pl-4"><a href="{{url('signup')}}"> Create New</a></div>
         </div>
         <div class="frow space-between align-center mt-5">
            <div class="w-10"><i data-feather="phone" class="feather-small feather-red rotate-90"></i></div>
            <div class="frow space-between w-80">
               <select name="" id="" class="w-30">
                  <option value="92">+92</option>
               </select>
               <input type="text" id='phone' name='phone' placeholder="Phone" class="w-70">
            </div>
         </div>
         <div class="frow space-between align-center mt-2">
            <div class="w-10"><i data-feather="key" class="feather-small feather-red"></i></div>
            <div class="w-80">
               <input type="password" id='password' name='password' placeholder="Password" class="w-100">
            </div>
         </div>
         <div class="frow space-between align-center mt-2">
            <div class="w-10"></div>
            <div class="w-80">
               <button class="btn-red w-100">Login</button>
            </div>
         </div>
         <div class="w-100 hr mt-5"></div>
         <div class="frow justify-center align-center mt-2">
            <p class="txt-light txt-10">Sign up with</p>
            <a href="{{url('signin/fb')}}">
               <div class="border-lightgrey circular-20 txt-light ml-2">f</div>
            </a>
            <a href="{{url('signin/fb')}}">
               <div class="border-lightgrey circular-20 txt-light ml-2">g</div>
            </a>
         </div>
         <!-- display authentication error if any -->
         @if ($errors->any())
         <div class="my-2 txt-red">
            @foreach ($errors->all() as $error)
            <div class="txt-s">- {{ $error }}</div>
            @endforeach
         </div>
         @endif

      </form>

   </div>

   <!-- <div class="copyright">
      ALL RIGHTS RESERVED &copy; COPY RIGHTS 2021 <span class="txt-skyblue">PRIVACY POLICY </span>
   </div> -->
</section>


@endsection

@section('script')


<script>
   window.fbAsyncInit = function() {
      FB.init({
         appId: '{your-app-id}',
         cookie: true,
         xfbml: true,
         version: '{api-version}'
      });

      FB.AppEvents.logPageView();

   };

   (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {
         return;
      }
      js = d.createElement(s);
      js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>




<script>
   $(document).ready(function() {
      $.ajaxSetup({
         cache: true
      });
      $.getScript('https://connect.facebook.net/en_US/sdk.js', function() {
         FB.init({
            appId: '{448346699986643}',
            version: 'v2.7' // or v2.1, v2.2, v2.3, ...
         });
         $('#loginbutton,#feedbutton').removeAttr('disabled');
         FB.getLoginStatus(updateStatusCallback);
      });
   });

   // feather.replace();

   function validate() {
      var regex = /^\d{10}$/;
      var msg = '';
      var phone = $('#phone').val();
      var password = $('#password').val();
      //validare phone no.
      if (phone == '' || phone == null) msg = 'Phone required!';
      else if (phone.length < 10) msg = 'Too short phone no!';
      else if (phone.length > 10) msg = 'Too long phone no!';
      else if (regex.test(phone) == false) msg = 'invalid phone';
      //validate password
      else if (password == '' || password == null) msg = 'Password required!';

      if (msg != '') {
         Toast.fire({
            icon: 'warning',
            title: msg
         });
         return false;
      }
   }
</script>
@endsection