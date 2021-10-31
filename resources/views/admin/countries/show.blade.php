@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'>
      <a href="{{url('admin')}}">Home </a><span class="mx-1"> / </span>
      <a href="{{route('countries.index')}}">Countries </a><span class="mx-1"> / </span>
      {{$country->name}}
   </div>
</div>
@endsection

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

@section('page-content')

<div class="frow w-100 bg-custom-light p-4 rw-100 auto-col stretched">
   <div class="fcol w-72 rw-100 py-4 px-5 bg-white ">
      <div class="frow w-100 rw-100 stretched">
         <div class="txt-b txt-m">Basic Profile </div>
         <div class="frow">
            <a href="{{route('countries.edit', $country)}}">
               <div class="fcol circular-25 border-0 bg-orange centered hoverable"><i data-feather='edit-2' class="feather-xsmall txt-white"></i></div>
            </a>
         </div>

      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Introduction:</div>
         <div class="fcol w-80 rw-100 mid-left">{{$country->intro}}</div>
      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Essestials:</div>
         <div class="fcol w-80 rw-100 mid-left">{{$country->essential}}</div>
      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Is Education Free?</div>
         <div class="fcol w-80 rw-100 mid-left">@if($country->edufree==1) Yes @else No @endif</div>
      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Life There:</div>
         <div class="fcol w-80 rw-100 mid-left">{{$country->lifethere}}</div>
      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Job Description:</div>
         <div class="fcol w-80 rw-100 mid-left">{{$country->jobdesc}}</div>
      </div>
      <div class="frow w-100 rw-100 mt-3 auto-col">
         <div class="fcol w-20 rw-100 txt-b top-right pr-3">Living Cost Desc:</div>
         <div class="fcol w-80 rw-100 mid-left">{{$country->livingcostdesc}}</div>
      </div>


   </div>
   <!-- right hand profile bar -->
   <div class="fcol hw-25 bg-white p-4 rw-100">
      <x-country__profile :country=$country></x-country__profile>
   </div>
</div>

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