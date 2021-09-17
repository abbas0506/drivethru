@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> Edit</div>
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

<!-- find image url of the country -->
@php
$flag_url=url("/images/flags/".$country->flag);
@endphp

@section('page-content')
<div class="frow w-100">
   <div class="w-25">
      <div class="fcol w-25 p-4 border shadow" id='spy_menu' style="position:fixed">
         <div class="frow centered">
            <img src={{$flag_url}} alt='flag' width=40 height=40 class='rounded-circle'>
         </div>
         <div class='frow txt-l centered mb-2'>{{$country->name}}</div>
         <!-- border -->
         <!-- <div class="frow border-bottom stretched border-thin my-4"></div> -->
         <div class='progress mb-4' style='height:5px'>
            <div class='progress-bar' style='width:30%'> </div>
         </div>

         <div class="frow navstep mid-left">
            <div class="roundbtn mr-2">@if($country->step1==1) <i data-feather='check' class="feather-small"></i> @else 1 @endif</div><a href='#basic'>Basic Info</a>
         </div>
         <div class="frow navstep mid-left">
            <div class="roundbtn mr-2">@if($country->step2==1) <i data-feather='check' class="feather-small"></i> @else 2 @endif</div><a href='#visa'>Visa Docs</a>
         </div>
         <div class="frow navstep mid-left">
            <div class="roundbtn mr-2">@if($country->step3==1) <i data-feather='check' class="feather-small"></i> @else 3 @endif</div><a href='#admission'>Admission Docs</a>
         </div>
         <div class="frow navstep mid-left">
            <div class="roundbtn mr-2">@if($country->step4==1) <i data-feather='check' class="feather-small"></i> @else 4 @endif</div><a href='#scholarships'>Scholarships</a>
         </div>
         <div class="frow navstep mid-left">
            <div class="roundbtn mr-2">@if($country->step5==1) <i data-feather='check' class="feather-small"></i> @else 5 @endif</div><a href='#favcourses'>Favourite Courses</a>
         </div>
         <div class="frow navstep mid-left">
            <div class="roundbtn mr-2">@if($country->step6==1) <i data-feather='check' class="feather-small"></i> @else 6 @endif</div><a href='#universities'>Universities</a>
         </div>
         <div class="frow navstep mid-left">
            <div class="roundbtn mr-2">@if($country->step7==1) <i data-feather='check' class="feather-small"></i> @else 7 @endif</div><a href='#studycost'>Study Cost</a>
         </div>
         <div class="frow navstep mid-left">
            <div class="roundbtn mr-2">@if($country->step8==1) <i data-feather='check' class="feather-small"></i> @else 8 @endif</div><a href='#livingcost'>Living Cost</a>
         </div>
      </div>

   </div>
   <div class="fcol w-75 px-10">

      <!-- BASIC INFO -->
      <div class="p-4 my-4 border shadow relative" id='basic'>
         <div class="frow mid-left txt-m">Basic Info</div>
         <!-- border -->
         <div class="frow border-bottom stretched border-thin my-4"></div>

         <div class="container px-5">
            <div class="frow">
               <div class="fcol">{{$country->intro}}</div>
            </div>
            <div class="frow my-2">
               <div class="fcol w-25">Currency: </div>
               <div class="fcol w-75">{{$country->currency}}</div>
            </div>
            <div class="frow my-2">
               <div class="fcol w-25">Visa Required: </div>
               <div class="fcol w-70">@if($country->visarequired==1) Yes @else No @endif</div>
            </div>
            <div class="frow my-2 @if($country->visarequired==0) hide @endif">
               <div class="fcol w-25">Visa Duration: </div>
               <div class="fcol w-75">{{$country->visaduration}}</div>
            </div>
            <div class="frow my-2">
               <div class="fcol w-25">Life there : </div>
               <div class="fcol w-75">{{$country->lifethere}}</div>
            </div>
            <div class="frow my-2">
               <div class="fcol w-25">Job Desc : </div>
               <div class="fcol w-75">{{$country->jobdesc}}</div>
            </div>

            <!-- edit icon on top right corner -->
            <div class='absolute' style='top:5px; right:5px' onclick="slideleft()">
               <i data-feather='edit-2' class="feather-small txt-blue"></i>
            </div>
         </div>
      </div>

      <!-- Visa docs -->
      <div class="p-4 my-4 border shadow relative" id='visa'>
         <div class="frow mid-left txt-m">Visa Docs</div>
         <div class="frow border-bottom stretched border-thin my-4"></div>
         <!-- edit icon on top right corner -->
         <div class='absolute' style='top:5px; right:5px'>
            @if($country->visarequired)
            <i data-feather='edit-2' class="feather-small txt-blue mr-2 hoverable" onclick="toggleVisaDocSlider()"></i>
            @endif
         </div>

         @if(!$country->visarequired)
         <div class="frow centered txt-orange my-4">Visa not required</div>
         @else
         <div class="container px-5">
            @foreach($country->visadocs() as $visadoc)
            <div class="frow my-2 stretched">
               <div class="fcol">{{$visadoc->doc->name}}</div>
               <div class="fcol mid-right">
                  <form action="{{route('visadocs.destroy',$visadoc)}}" method="POST" id='delvisadoc{{$visadoc->id}}'>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="bg-transparent p-0 border-0" onclick="delvisadoc('{{$visadoc->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
                  </form>
               </div>
            </div>
            @endforeach
         </div>
         @endif
      </div>

      <!-- Admission docs -->
      <div class="p-4 my-4 border shadow relative" id='admission'>
         <div class="frow mid-left txt-m">Admission Docs</div>
         <div class="frow border-bottom stretched border-thin my-4"></div>
         <!-- edit icon on top right corner -->
         <div class='absolute' style='top:5px; right:5px' onclick="toggleAdmDocSlider()">
            <i data-feather='edit-2' class="feather-small txt-blue"></i>
         </div>
         @foreach($country->admdocs() as $admdoc)
         <div class="frow my-2 px-4 stretched">
            <div class="fcol">{{$admdoc->doc->name}}</div>
            <div class="fcol mid-right">
               <form action="{{route('admdocs.destroy',$admdoc)}}" method="POST" id='deladmdoc{{$admdoc->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="deladmdoc('{{$admdoc->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>
         @endforeach

      </div>
      <!-- Scholarships -->
      <div class="p-4 my-4 border shadow relative" id='scholarships'>
         <div class="frow mid-left txt-m">Scholarships</div>
         <div class="frow border-bottom stretched border-thin my-4"></div>
         <!-- edit icon on top right corner -->
         <div class='absolute' style='top:5px; right:5px' onclick="toggleScholarshipSlider()">
            <i data-feather='edit-2' class="feather-small txt-blue"></i>
         </div>

         @foreach($country->scholarships() as $scholarshipoffer)
         <div class="frow my-2 px-4">
            <div class="fcol mid-left w-90">{{$scholarshipoffer->scholarship->name}}</div>
            <div class="fcol centered w-10">
               <form action="{{route('scholarship_offers.destroy',$scholarshipoffer)}}" method="POST" id='delscholarship{{$scholarshipoffer->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delscholarship('{{$scholarshipoffer->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>
         @endforeach


      </div>
      <!-- Fav courses -->
      <div class="p-4 my-4 border shadow relative" id='favcourses'>
         <div class="frow mid-left txt-m">Favourie Courses</div>
         <div class="frow border-bottom stretched border-thin my-4"></div>
         <!-- edit icon on top right corner -->
         <div class='absolute' style='top:5px; right:5px' onclick="toggleFavcourseSlider()">
            <i data-feather='edit-2' class="feather-small txt-blue"></i>
         </div>

         @foreach($country->favcourses() as $favcourse)
         <div class="frow my-2 px-4">
            <div class="fcol mid-left w-90">{{$favcourse->course->name}}</div>
            <div class="fcol centered w-10">
               <form action="{{route('favcourses.destroy',$favcourse)}}" method="POST" id='delfavcourse{{$favcourse->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delfavcourse('{{$favcourse->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>
         @endforeach

      </div>
      <!-- Universities -->
      <div class="p-4 my-4 border shadow relative" id='universities'>
         <div class="frow mid-left txt-m">Universities</div>
         <div class="frow border-bottom stretched border-thin my-4"></div>
         <!-- edit icon on top right corner -->
         <div class='absolute' style='top:5px; right:5px' onclick="slideleft()">
            <i data-feather='edit-2' class="feather-small txt-blue"></i>
         </div>

      </div>
      <!-- Study Cost -->
      <div class="p-4 my-4 border shadow relative" id='studycost'>
         <div class="frow mid-left txt-m">Study Cost</div>
         <div class="frow border-bottom stretched border-thin my-4"></div>
         <!-- edit icon on top right corner -->
         <div class='absolute' style='top:5px; right:5px' onclick="slideleft()">
            <i data-feather='edit-2' class="feather-small txt-blue"></i>
         </div>

      </div>
      <!-- Study Cost -->
      <div class="p-4 my-4 border shadow relative" id='livingcost'>
         <div class="frow mid-left txt-m">Living Cost</div>
         <div class="frow border-bottom stretched border-thin my-4"></div>
         <!-- edit icon on top right corner -->
         <div class='absolute' style='top:5px; right:5px' onclick="slideleft()">
            <i data-feather='edit-2' class="feather-small txt-blue"></i>
         </div>

      </div>

      <!-- 
      --  basic info slider
       -->
      <div class="slider" id='slider'>
         <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="slideleft()"><i data-feather='x' class="feather-xsmall"></i></div>
         <div class="frow centered my-4 txt-b">Edit Basic Info</div>

         <form action="{{route('countries.update',$country)}}" method='post' enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="fcol my-4">

               <div class="fancyinput my-2 w-100">
                  <input type="text" name='name' placeholder="Country name" value="{{$country->name}}" required>
                  <label for="Name">Name</label>
               </div>
               <div class="frow my-2 stretched">
                  <div class="fcol fancyinput">
                     <input type="file" id='flag' name='flag' placeholder="flag" class='w-90 m-0 mr-1 p-2' onchange='preview_flag()'>
                     <label for="Name">Flag</label>
                  </div>

                  <!-- flag image preview -->
                  <div class="fcol centered image-frame" id='image_frame'>
                     <img src="{{$flag_url}}" alt='flag' id='flag_img' width=50 height=49>
                     <!-- <div class="no-image-caption txt-xs" style='width:50px; height:49px'>Flag</div> -->
                  </div>
               </div>
               <div class="fancyinput my-2 w-100">
                  <input type="text" name='currency' placeholder="Currency e.g USD" value="{{$country->currency}}" required>
                  <label for="Name">Currency</label>
               </div>

               <div class="frow my-2 stretched">
                  <div class="fancyselect w-48">
                     <select name='visarequired' onchange="showOrHideDuration(event)">
                        <option value='1' @if($country->visarequired==1) selected @endif>Yes</option>
                        <option value='0' @if($country->visarequired==0) selected @endif>No</option>
                     </select>
                     <label>Visa Required</label>
                  </div>
                  <div class="fancyinput w-48" id='visaduration'>
                     <input type="number" name='visaduration' placeholder="Visa duration" min='0' max='100' value='{{$country->visaduration}}' required>
                     <label for="Name">Visa Duration (Yr)</label>
                  </div>
               </div>
               <div class="fancyinput my-2 w-100">
                  <textarea rows="3" name='lifethere' placeholder="Life there">{{$country->lifethere}}</textarea>
                  <label>Life there</label>
               </div>
               <div class="fancyinput my-2 w-100">
                  <textarea rows="3" name='jobdesc' placeholder="Job desc">{{$country->jobdesc}}</textarea>
                  <label>Job Desc</label>
               </div>
               <div class="fancyinput my-2 w-100">
                  <textarea rows="3" name='intro' placeholder="Brief introduction" required>{{$country->intro}}</textarea>
                  <label>Introduction</label>
               </div>
            </div>
            <div class="frow mid-right my-2">
               <button type="submit" class="btn btn-success">Update</button>
            </div>

         </form>
      </div>

      <!-- 
       -- visa doc slider
       -->
      <div class="slider" id='visaDocSlider'>

         <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggleVisaDocSlider()"><i data-feather='x' class="feather-xsmall"></i></div>
         <div class="frow centered my-4 txt-b">Available Docs</div>
         @if($country->xvisadocs()->count()>0)
         <form action="{{route('visadocs.store')}}" method='post' onsubmit="postVisaDoc()">
            @csrf
            @foreach($country->xvisadocs() as $doc)

            <div class="frow my-1 stretched">
               <div class="">{{$doc->name}}</div>
               <div class=""><input type="checkbox" value='{{$doc->id}}' name='chk'></div>
            </div>
            @endforeach
            <input type="hidden" id='visadoc_ids' name='doc_ids'>
            <div class="frow mid-right mt-5">
               <button type="submit" class="btn btn-success">Add</button>
            </div>
         </form>
         @else
         <!-- if no more document -->
         <div class="">No more document available. If you want to create a new document, <a href='#'>click here</a></div>

         @endif
      </div> <!-- visa slider ends -->

      <!-- 
       -- Adm doc slider
       -->
      <div class="slider" id='admDocSlider'>

         <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggleAdmDocSlider()"><i data-feather='x' class="feather-xsmall"></i></div>
         <div class="frow centered my-4 txt-b">Available Docs</div>
         @if($country->xadmdocs()->count()>0)
         <form action="{{route('admdocs.store')}}" method='post' onsubmit="postAdmDoc()">
            @csrf
            @foreach($country->xadmdocs() as $doc)

            <div class="frow my-1 stretched">
               <div class="">{{$doc->name}}</div>
               <div class=""><input type="checkbox" value='{{$doc->id}}' name='chk'></div>
            </div>
            @endforeach
            <input type="hidden" id='admdoc_ids' name='doc_ids'>
            <div class="frow mid-right mt-5">
               <button type="submit" class="btn btn-success">Add</button>
            </div>
         </form>
         @else
         <!-- if no more document -->
         <div class="">No more document available. If you want to create a new document, <a href='#'>click here</a></div>

         @endif
      </div> <!-- visa slider ends -->

      <!-- 
      -- scholarship slider
       -->
      <div class="slider" id='scholarshipSlider'>

         <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggleScholarshipSlider()"><i data-feather='x' class="feather-xsmall"></i></div>
         <div class="frow centered my-4 txt-b">Available Scholarships</div>
         @if($country->xscholarships()->count()>0)
         <form action="{{route('scholarship_offers.store')}}" method='post' onsubmit="postScholarship()" id='myform'>
            @csrf
            @foreach($country->xscholarships() as $scholarship)

            <div class="frow my-1 stretched">
               <div class="">{{$scholarship->name}}</div>
               <div class=""><input type="checkbox" value='{{$scholarship->id}}' name='chk'></div>
            </div>
            @endforeach
            <input type="hidden" id='scholarship_ids' name='scholarship_ids'>
            <div class="frow mid-right mt-5">
               <button type="submit" class="btn btn-success">Add</button>
            </div>
         </form>
         @else
         <!-- no document -->
         <div class="">No more scholarship available. If you want to create a new scholarship, <a href='#'>click here</a></div>

         @endif

      </div> <!-- slider ends -->


      <!-- Favourite Course Slider -->

      <div class="slider" id='favcourseSlider'>

         <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="toggleFavcourseSlider()"><i data-feather='x' class="feather-xsmall"></i></div>
         <div class="frow centered my-4 txt-b">DOCUMENTS</div>
         @if($country->xfavcourses()->count()>0)
         <form action="{{route('favcourses.store')}}" method='post' onsubmit="postFavcourse()" id='myform'>
            @csrf
            @foreach($country->xfavcourses() as $xfavcourse)

            <div class="frow my-1 stretched">
               <div class="">{{$xfavcourse->name}}</div>
               <div class=""><input type="checkbox" value='{{$xfavcourse->id}}' name='chk'></div>
            </div>
            @endforeach
            <input type="hidden" id='favcourse_ids' name='course_ids'>
            <div class="frow mid-right mt-5">
               <button type="submit" class="btn btn-success">Add</button>
            </div>
         </form>
         @else
         <!-- if no more document -->
         <div class="">No more courses available. If you want to create a new course, <a href='#'>click here</a></div>

         @endif
      </div> <!--  favcourse slider ends -->


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