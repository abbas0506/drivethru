@extends('layouts.index')

@section('header')
<section class="admission mini_header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')
<section class="section-80 index-page block">
   <div class="title red-underline my-5">Admission</div>
   <div class="row desc my-5">
      <div class="col half">
         <p class="txt-l mt-4">
            <span class="txt-red">Drivethru</span> is providing admission services in both National and International admissions throughout the year. We are offering admissions in 175+ National H EC Recognized Universities and Universities from 18+ International Countries. Our team is available 24/7, through all the mediums, to process all your admissions.
         </p>
      </div>
      <div class="col half">
         <img src="{{asset('/images/admission/1.png')}}" alt="">
      </div>

   </div>
   <!-- 2nd row -->

   <div class="row">
      <div class="col w-45">
         <div class="title red-underline my-5">Prepare Yourself</div>
         <div class="row my-5">
            <div class="fancy-pallet">
               <div class="ico">
                  <img src="{{asset('/images/icons/person-message.png')}}" alt="">
               </div>
               <div class="content mt-4 txt-c">
                  <p>Get ready to avail this golden opportunity of getting Information of all the National & International Universities at a single platform. You can filter out the best suited options for you through a single click and can start your admission process through us. You just need to fill a single Unified application form and it's all done from your side! </p>
               </div>
               <div class="btn-blue"><a href="{{url('blog')}}"> Read More</a></div>
            </div>
         </div>
      </div>
      <div class="col w-45">
         <div class="title red-underline my-5">Admission Formalities</div>
         <div class="row my-5">
            <div class="fancy-pallet">
               <div class="ico">
                  <img src="{{asset('/images/icons/refresh-circle.png')}}" alt="">
               </div>
               <div class="content mt-4 txt-c">
                  <p>Drivethru is here to take care of all your admission formalities from Applying to getting slips for your entry test in case of National Admissions and Application processing to Call letters to Visa processing to Airport receiving for International Applicants. You just need not to worry at any step. Drivethru is here to cater with all the requirements on your behalf.
                  </p>
               </div>
               <div class="btn-blue"><a href="{{url('blog')}}"> Read More</a></div>
            </div>
         </div>
      </div>
   </div>

</section>

@endsection
@section('footer')
<section class="footer">
   <x-index.footer></x-index.footer>
</section>
@endsection