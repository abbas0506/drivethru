@extends('layouts.index')

@section('header')
<section class="header">
   <x-index.header></x-index.header>
   <div class="app-msg">
      <p>175+ Universities from Pakistan and 18+ other Countries</p>
      <h1>Single-Click Application Form</h1>
      <button class="btn btn-red">
         @if(session('user'))
         <a href="{{url('/')}}">Apply Now</a>
         @else
         <a href="{{url('signin')}}">Apply Now</a>
         @endif

      </button>
   </div>
</section>
@endsection
@section('content')

<section class="offer">
   <div class="row">
      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/3.png')}}" alt="">
         </div>
         <div class="content">
            <h1>Oppertunities</h1>
            <p>Around the globe</p>
         </div>
      </div>

      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/2.png')}}" alt="">
         </div>
         <div class="content">
            <h1>Admissions</h1>
            <p>National & International</p>
         </div>
      </div>

      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/1.png')}}" alt="">
         </div>
         <div class="content">
            <h1>Consultation</h1>
            <p>Pre and post admission</p>
         </div>
      </div>
   </div>
</section>

<section class="who">
   <h2 class="drivethru">DRIVETHRU</h2>
   <div class="title red-underline">Who We Are?</div>
   <div class="row">
      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/search.png')}}" alt="">
         </div>
         <div class="content">
            <h1>FIND UNIVERSITY</h1>
            <p>Intermediate students face issues, regrading decision making about their future scope of studies, and ....</p>
         </div>
      </div>

      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/person-check.png')}}" alt="">
         </div>
         <div class="content">
            <h1>APPLY THROUGH US</h1>
            <p>Long, time consuming and complex admission forms are a bitter jump student make due to which they dont take interest ....</p>
         </div>
      </div>

      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/person-message.png')}}" alt="">
         </div>
         <div class="content">
            <h1>CAREER COUNSELLING</h1>
            <p>With less insight about the universities and without a proper career counseling, students may take
               wrong decisions and end-up in a place where they shouldn’t be ....</p>
         </div>
      </div>
   </div>
   <!-- 2nd row -->
   <div class="row">
      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/report-edit.png')}}" alt="">
         </div>
         <div class="content">
            <h1>PERSONALIZED REPORT</h1>
            <p>Personalized report as the name displays, is specific for each student containing all the available options for him according to his field, interest, location and budget ....</p>
         </div>
      </div>

      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/dollar-sign.png')}}" alt="">
         </div>
         <div class="content">
            <h1>$1/UNIVERSITY</h1>
            <p>We do not charge anything for providing information. We charge $1 ($1=150/-) per
               university only for the applying process. There are no hidden charges included ....</p>
         </div>
      </div>

      <div class="col">
         <div class="ico">
            <img src="{{asset('/images/icons/report.png')}}" alt="">
         </div>
         <div class="content">
            <h1>PASTPAPERS</h1>
            <p>Students face difficulty majorly in entrance exams while seeking admission to universities. Past papers help them to prepare for the exams in short time ....</p>
         </div>
      </div>
   </div>
</section>

<!-- Quotation -->
<section class="quote">
   <p>The world is full of wonderful things you have not seen yet.<br>
      Don't ever give up on the chance of seeing them.</p>
</section>
<!-- FAQ -->
<section class="faq">
   <h2 class="drivethru">DRIVETHRU</h2>
   <div class="title red-underline">Frequently Asked Questions</div>

   <div class="row">
      <div class="col">

         <div class="question show">
            <div class="q"> <i data-feather="bell" class="feather-small"></i> What service do you offer/provide? </div>
            <div class="ans">Drivethru provides information about 175+ National and International Universities from 17+ countries, for FREE. Admission applying services, Career counselling, Visa services.</div>

         </div>
         <div class="question">
            <div class="q"><i data-feather="bell" class="feather-small"></i> How much do you charge? </div>
            <div class="ans">We provide complete information about National and International admissions, FREE OF COST. If you proceed for admission we will apply on your behalf in these Universities, then we charge $1/ University ($1=150 pkr).</div>
         </div>
         <div class="question">

            <div class="q"><i data-feather="bell" class="feather-small"></i> How can I book an appointment?</div>
            <div class="ans">User can book an appointment with us through website You can reach us via WhatsApp in office timing 9:00-5:00 at following Contact Number. +92 316 4515249, +92 345 7515152.</div>
         </div>
         <div class="question">
            <div class="q"><i data-feather="bell" class="feather-small"></i> Where can I get this Information? </div>
            <div class="ans">By creating a free login user can extract every information they want. User can also leave a message on social media profiles or user can contact our Student Advisor on mentioned WhatsApp in office timings to get complete Information.</div>
         </div>

      </div>
      <div class="col">
         <video width="400" controls autoplay muted>
            @if($video)
            <source src="{{asset('/videos/'.$video->name)}}" type="video/mp4">
            @else
            <source src="{{asset('/videos/drivethru.mp4')}}" type="video/mp4">
            @endif
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
         </video>
      </div>
</section>
@endsection
@section('footer')
<section class="footer">
   <x-index.footer></x-index.footer>
</section>

@if ($errors->any())
<div class="alert alert-danger mt-5">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
<br />
@elseif(session('success'))
<script>
Swal.fire({
   icon: 'success',
   title: "Successful",
   showConfirmButton: false,
   timer: 1500
});
</script>
@endif

@endsection

@section('script')
<script>
function validate() {
   var regex = /^\d{10}$/;
   var msg = '';
   var name = $('#name').val()
   var phone = $('#phone').val();
   var email = $('#email').val();
   var message = $('#message').val();

   //validate name
   if (name == '' || name == null) msg = 'Name required!';
   //validare phone no.
   else if (phone == '' || phone == null) msg = 'Phone required!';
   else if (email == '' || email == null) msg = 'Email required!';
   else if (phone.length < 10) msg = 'Too short phone no!';
   else if (phone.length > 10) msg = 'Too long phone no!';
   else if (regex.test(phone) == false) msg = 'invalid phone';
   else if (message == '' || messaage == null) msg = 'Message required!';

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