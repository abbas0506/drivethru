@extends('layouts.admin')
@section('header')
<x-admin.header></x-admin.header>
@endsection
@section('page-content')
<!-- display record save, del, update message if any -->
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
<section class="page-content">
   <div class='w-70 mx-auto txt-l my-5 '>Countries <span class="txt-s ml-2"> - {{$country->name}} </span> </div>
   <div class="frow w-70 mx-auto stretched mt-2">
      <div class="w-30 bg-custom-light">
         <x-country__profile :country=$country></x-country__profile>
      </div>
      <div class="w-70 py-4 px-5 bg-white border relative">
         <a href="{{route('countries.edit', $country)}}">
            <div class="top-right-icon circular-20">
               <i data-feather='edit-2' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <div class="txt-m my-2 txt-orange">Basic Profile </div>
         <div class="frow mt-3">
            <div class="w-30 txt-b pr-3">Introduction:</div>
            <div class="w-70">{{$country->intro}}</div>
         </div>
         <div class="frow mt-3">
            <div class="w-30 txt-b pr-3">Essestials:</div>
            <div class="w-70">{{$country->essential}}</div>
         </div>
         <div class="frow mt-3">
            <div class="w-30 txt-b pr-3">Is Education Free?</div>
            <div class="">@if($country->edufree==1) Yes @else No @endif</div>
         </div>
         <div class="frow mt-3">
            <div class="w-30 txt-b pr-3">Life There:</div>
            <div class="w-70">{{$country->lifethere}}</div>
         </div>
         <div class="frow mt-3">
            <div class="w-30 txt-b pr-3">Job Description:</div>
            <div class="w-70">{{$country->jobdesc}}</div>
         </div>
         <div class="frow mt-3">
            <div class="w-30 txt-b pr-3">Living Cost Desc:</div>
            <div class="w-70">{{$country->livingcostdesc}}</div>
         </div>


      </div>
   </div>

</section>

@endsection

@section('script')
<script lang="javascript">
function preview_flag() {
   const [file] = flag.files
   if (file) {
      flag_img.src = URL.createObjectURL(file)
   }
}

function slideleft() {
   $("#slider").toggleClass('slide-left');
}

function toggleVisaDocSlider() {
   $("#visaDocSlider").toggleClass('slide-left');
}

function toggleAdmDocSlider() {
   $("#admDocSlider").toggleClass('slide-left');
}

function toggleScholarshipSlider() {
   $("#scholarshipSlider").toggleClass('slide-left');
}

function toggleFavcourseSlider() {
   $("#favcourseSlider").toggleClass('slide-left');
}

function showOrHideDuration(event) {
   if (event.target.value == 0) {
      $('#visaduration').hide()
   } else {
      $('#visaduration').show()
      $('[name=visaduration]').val(1)
   }
}


// Cache selectors
var lastId,
   topMenu = $("#spy_menu"),
   topMenuHeight = topMenu.outerHeight() - 60,
   // All list items
   menuItems = topMenu.find("a"),
   // Anchors corresponding to menu items
   scrollItems = menuItems.map(function() {
      var item = $($(this).attr("href"));
      if (item.length) {
         return item;
      }
   });

// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e) {
   var href = $(this).attr("href"),
      offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
   $('html, body').stop().animate({
      scrollTop: offsetTop
   }, 300);
   e.preventDefault();
});

// Bind to scroll
$(window).scroll(function() {
   // Get container scroll position
   var fromTop = $(this).scrollTop() + topMenuHeight;

   // Get id of current scroll item
   var cur = scrollItems.map(function() {
      if ($(this).offset().top < fromTop)
         return this;
   });
   // Get the id of the current element
   cur = cur[cur.length - 1];
   var id = cur && cur.length ? cur[0].id : "";

   if (lastId !== id) {
      lastId = id;
      // Set/remove active class
      menuItems
         .parent().removeClass("active")
         .end().filter("[href='#" + id + "']").parent().addClass("active");
   }
});


function postVisaDoc() {
   //event.preventDefault();
   var ids = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) ids.push(chk.value);
   })

   $("#visadoc_ids").val(ids);
}

function postAdmDoc() {
   //event.preventDefault();
   var ids = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) ids.push(chk.value);
   })

   $("#admdoc_ids").val(ids);
}

function postScholarship() {
   //event.preventDefault();
   var ids = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) ids.push(chk.value);
   })

   $("#scholarship_ids").val(ids);
}

function postFavcourse() {
   //event.preventDefault();
   var ids = [];
   var chks = document.getElementsByName('chk');
   chks.forEach((chk) => {
      if (chk.checked) ids.push(chk.value);
   })

   $("#favcourse_ids").val(ids);
}


function delvisadoc(formid) {
   event.preventDefault();
   Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
      if (result.value) {
         //submit corresponding form
         $('#delvisadoc' + formid).submit();
      }
   });
}

function deladmdoc(formid) {
   event.preventDefault();
   Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
      if (result.value) {
         //submit corresponding form
         $('#deladmdoc' + formid).submit();
      }
   });
}

function delfavcourse(formid) {
   event.preventDefault();
   Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
      if (result.value) {
         //submit corresponding form
         $('#delfavcourse' + formid).submit();
      }
   });
}
</script>
@endsection