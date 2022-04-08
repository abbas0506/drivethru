@extends('layouts.index')

@section('header')
<section class="header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')
<section class="auth-section">
   <div class="site-slogan">
      <img src="{{url(asset('images/illustrations/howtoapply.png'))}}" alt="" width="400">
      <p>drivethru.pk is a simple one step solution for all of your higher education requirements in national as well as inernational universities from education couselling to vetted admission process.</p>
   </div>
   <div class='auth-form'>

      <form action="{{route('users.store')}}" method='post' onsubmit="return validate()">
         @csrf
         <div class="title mb-5">SIGN UP</div>
         <div class="frow justify-center align-center mt-5">
            <div class="txt-light txt-10">Already have an account?</div>
            <div class="txt-red pl-4"><a href="{{url('signin')}}"> Sign In</a></div>
         </div>
         <div class="frow space-between align-center mt-4">
            <div class="w-10"><i data-feather="user" class="feather-small feather-red"></i></div>
            <input type="text" name='name' id='name' placeholder="Name" class="w-80">
         </div>
         <div class="frow space-between align-center mt-2">
            <div class="w-10"><i data-feather="phone" class="feather-small feather-red rotate-90"></i></div>
            <div class="frow space-between w-80">
               <select name="" id="" class="w-30">
                  <option value="92">+92</option>
               </select>
               <input type="text" id='phone' name='phone' placeholder="Phone" class="w-70">
            </div>
         </div>

         <div class="frow space-between align-center mt-2">
            <div class="w-10"><i data-feather="at-sign" class="feather-small feather-red"></i></div>
            <input type="email" name='email' placeholder="Email" class="w-80">
         </div>
         <div class="frow space-between align-center mt-2">
            <div class="w-10"><i data-feather="key" class="feather-small feather-red"></i></div>
            <input type="password" name='password' id='password' placeholder="Password" class="w-80">
         </div>
         <div class="frow space-between align-center mt-2">
            <div class="w-10"><i data-feather="key" class="feather-small feather-red"></i></div>
            <input type="password" id='confirmpw' placeholder="Confirm Password" class="w-80">
         </div>

         <div class="frow space-between align-center mt-2">
            <div class="w-10"></div>
            <div class="w-80">
               <button class="btn btn-red w-100 txt-12">Create New Account</button>
            </div>
         </div>


      </form>

      <!-- display error if any -->

      @if ($errors->any())
      <div class="my-2 txt-red">
         @foreach ($errors->all() as $error)
         <div class="txt-s">- {{ $error }}</div>
         @endforeach
      </div>
      @endif

      </form>

   </div>

</section>
@endsection
@section('script')
<script>
function validate() {
   var regex = /^\d{10}$/;
   var msg = '';
   var name = $('#name').val()
   var phone = $('#phone').val();
   var password = $('#password').val();
   var confirmpw = $('#confirmpw').val();

   //validate name
   if (name == '' || name == null) msg = 'Name required!';
   //validare phone no.
   else if (phone == '' || phone == null) msg = 'Phone required!';
   else if (phone.length < 10) msg = 'Too short phone no!';
   else if (phone.length > 10) msg = 'Too long phone no!';
   else if (regex.test(phone) == false) msg = 'invalid phone';
   //validate password
   else if (password == '' || password == null) msg = 'Password required!';
   else if (confirmpw == '' || confirmpw == null) msg = 'Confirm password required!';
   else if (password != confirmpw) msg = "Confirm password not matched"
   //show validation error, if any
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