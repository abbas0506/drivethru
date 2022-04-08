<div class="newsletter">
   <div>
      <img src="{{asset('/images/icons/newsletter.png')}}" alt="" class="icon">
      <div class="title">Subscribe to Newsletter</div>
   </div>
   <div>
      <form action="{{route('subscribers.store')}}" method="post" class="frow">
         @csrf
         <input type="email" name="email" placeholder="your email" required>
         <button type='submit' class="btn btn-red">Submit</button>
      </form>
   </div>
</div>
<div class="content">
   <div class="col about">
      <img src="{{asset('/images/logo/light.png')}}" alt="">
      <p>Drivethu.pk is a simple one stop shop for all your higher education(nationa and international) universities requirements from education counselling to vetted admission process</p>
   </div>
   <div class="col address">
      <h2>ADDRESS</h2>
      <p><i data-feather="map-pin" class="feather-small feather-red"></i>Lahore Pakistan</p>
      <p><i data-feather="phone-call" class="feather-small feather-red"></i>+92 354 75 15 152</p>
      <p><i data-feather="mail" class="feather-small feather-red"></i>support@drivethru.pk</p>
   </div>
   <div class="col contact">
      <h2>CONTACT US</h2>
      <form action="{{route('guestqueries.store')}}" method='post' class="contactus" onsubmit="return validate()">
         @csrf
         <div class="row">
            <input type="text" name='name' id='name' placeholder="name">
            <input type="text" name='phone' id='phone' placeholder="phone">
         </div>
         <div class="row">
            <input type="email" name='email' id='email' placeholder="email">
            <input type="text" name='subject' placeholder="subject">
         </div>
         <div class="row">
            <textarea name="message" id="message" rows="5" placeholder="message"></textarea>
         </div>
         <div class="row">
            <button class="btn btn-red">Submit Now</button>
         </div>
      </form>
   </div>
   <div class='copyright'>
      ALL RIGHTS RESERVED © COPY RIGHTS 2021 PRIVACY POLICY
   </div>
</div>