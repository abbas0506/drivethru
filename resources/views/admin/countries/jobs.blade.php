@extends('layouts.admin')
@section('header')

<div class="fcol h-30 w-100 bg-banner top-mid sticky-top">
   <div class="w-100">
      <x-admin__header></x-admin__header>
   </div>
   <div class='txt-l txt-white'>Countries</div>
   <div class='frow txt-s txt-white'><a href="{{url('admin')}}">Home </a> <span class="mx-1"> / </span><a href="{{route('countries.index')}}">Countries </a> <span class="mx-1"> / </span> New</div>
</div>
@endsection
@section('page-content')

<div class="container" style="width:60% !important">
   <!-- display record save, del, update message if any -->
   @if ($errors->any())
   <div class="alert alert-danger mt-2">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   <br />
   @endif

   <!-- step naviagation  -->
   <div class="frow mb-5 p-3 auto-col border bg-lightsky">
      <div class="navstep hw-25">
         <div class="roundbtn">1</div>
         <div class="super-underline">Basic Info</div>
      </div>
      <div class="navstep hw-25">
         <a href="{{route('country_visadocs')}}">
            <div class="roundbtn">2</div>
         </a>
         <div class="super-underline">Visa Docs</div>
      </div>
      <div class="navstep hw-25">
         <a href="{{route('country_scholarships')}}">
            <div class="roundbtn">3</div>
         </a>
         <div class="super-underline">Scholarships</div>
      </div>
      <div class="navstep hw-25 active">
         <div class="roundbtn">4</div>
         <div class="super-underline">Jobs</div>
      </div>
   </div>

   @php
   $flag_url=url("/images/flags/".$country->flag);
   @endphp
   <!-- form input -->
   <div class="frow mid-left">
      <div class="txt-l mr-4">{{$country->name}}</div><img src={{$flag_url}} alt='flag' id='flag_img' width=30 height=30 class='rounded-circle'>
   </div>
   <div class="frow border-bottom border-thin my-4">
      <div class="fcol mid-left w-40 txt-b">Job Title</div>
      <div class="fcol mid-left w-15 txt-b">Max Hrs</div>
      <div class="fcol mid-left w-15 txt-b">Rate ($)</div>
      <div class="fcol mid-left w-20 txt-b">Deptt</div>
      <div class="fcol centered w-10 txt-b"><i data-feather='settings' class="feather-xsmall"></i></div>
   </div>
   @foreach($country->countryjobs()->get() as $countryjob)
   <div class="frow my-2">
      <div class="fcol mid-left w-40">{{$countryjob->name}}</div>
      <div class="fcol mid-left w-15">{{$countryjob->maxhrs}}</div>
      <div class="fcol mid-left w-15">{{$countryjob->hourlyrate}}</div>
      <div class="fcol mid-left w-20">{{$countryjob->jobdeptt->name}}</div>
      <div class="fcol centered w-10">
         <div class="frow stretched">
            <div><a href="#"><i data-feather='eye' class="feather-xsmall mx-1"></i></a></div>
            <div onclick="displayEditPanel('{{$countryjob->name}}','{{$countryjob->maxhrs}}','{{$countryjob->hourlyrate}}','{{$countryjob->jobdeptt_id}}','{{$countryjob->level_id}}')"><i data-feather='edit-2' class="feather-xsmall mx-1 txt-blue"></i></div>
            <div>
               <form action="{{route('countryjobs.destroy',$countryjob)}}" method="POST" id='deleteform{{$countryjob->id}}'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$countryjob->id}}')"><i data-feather='x' class="feather-xsmall mx-1 txt-red"></i></button>
               </form>
            </div>
         </div>

      </div>
   </div>
   @endforeach

   <!-- submit form -->
   <div class="frow mid-right my-5">
      <button type="button" class="btn btn-success" onclick="slideleft()">Add Job</button>
   </div>

   <div class="slider" id='slider'>

      <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="slideleft()"><i data-feather='x' class="feather-xsmall"></i></div>
      <div class="frow centered my-4 txt-b">NEW JOB</div>
      <form action="{{route('countryjobs.store')}}" method='post'>
         @csrf

         <div class="frow my-4">
            <div class="fancyinput w-100">
               <input type="text" name='name' placeholder="Job Name" required>
               <label for="Name">Job Name</label>
            </div>
         </div>
         <div class="frow my-4">
            <div class="fancyinput w-100">
               <input type="number" name='maxhrs' placeholder="Maximum hrs" min='0' required>
               <label for="Name">Max hrs</label>
            </div>
         </div>
         <div class="frow my-4">
            <div class="fancyinput w-100">
               <input type="number" name='hourlyrate' placeholder="Hourly rate" min='0' required>
               <label for="Name">Hourly Rate ($)</label>
            </div>
         </div>
         <div class="frow my-4">
            <div class="fancyselect w-100">
               <select name='jobdeptt_id'>
                  @foreach($jobdeptts as $jobdeptt)
                  <option value='{{$jobdeptt->id}}'>{{$jobdeptt->name}}</option>
                  @endforeach
               </select>
               <label for="Name">Job Deptt</label>
            </div>
         </div>
         <div class="frow my-4">
            <div class="fancyselect w-100">
               <select name='level_id'>
                  @foreach($levels as $level)
                  <option value='{{$level->id}}'>{{$level->name}}</option>
                  @endforeach
               </select>
               <label for="Name">Degree Required</label>
            </div>
         </div>
         <input type="hidden" name='country_id' value='{{$country->id}}'>
         <div class="frow mid-right mt-5">
            <button type="submit" class="btn btn-success">Create</button>
         </div>
      </form>
   </div> <!-- slider ends -->

   <div class="slider" id='edit_slider'>

      <div class="frow centered box-30 bg-orange circular txt-white hoverable" onclick="slideleft()"><i data-feather='x' class="feather-xsmall"></i></div>
      <div class="frow centered my-4 txt-b">EDIT JOB</div>
      <form action="{{route('countryjobs.update', $countryjob)}}" method='post'>
         @csrf
         @method('PATCH')
         <div class="frow my-4">
            <div class="fancyinput w-100">
               <input type="text" id='edit_name' name='name' placeholder="Job Name" required>
               <label for="Name">Job Name</label>
            </div>
         </div>
         <div class="frow my-4">
            <div class="fancyinput w-100">
               <input type="number" id='edit_maxhrs' name='maxhrs' placeholder="Maximum hrs" min='0' required>
               <label for="Name">Max hrs</label>
            </div>
         </div>
         <div class="frow my-4">
            <div class="fancyinput w-100">
               <input type="number" id='edit_hourlyrate' name='hourlyrate' placeholder="Hourly rate" min='0' required>
               <label for="Name">Hourly Rate ($)</label>
            </div>
         </div>
         <div class="frow my-4">
            <div class="fancyselect w-100">
               <select id='edit_jobdeptt_id' name='jobdeptt_id'>
                  @foreach($jobdeptts as $jobdeptt)
                  <option value='{{$jobdeptt->id}}'>{{$jobdeptt->name}}</option>
                  @endforeach
               </select>
               <label for="Name">Job Deptt</label>
            </div>
         </div>
         <div class="frow my-4">
            <div class="fancyselect w-100">
               <select id='edit_level_id' name='level_id'>
                  @foreach($levels as $level)
                  <option value='{{$level->id}}'>{{$level->name}}</option>
                  @endforeach
               </select>
               <label for="Name">Degree Required</label>
            </div>
         </div>
         <input type="hidden" name='country_id' value='{{$country->id}}'>
         <div class="frow mid-right mt-5">
            <button type="submit" class="btn btn-success">Update</button>
         </div>
      </form>
   </div> <!-- slider ends -->

</div>
@endsection

@section('script')
<script lang="javascript">
function slideleft() {
   $("#slider").toggleClass('slide-left');
}

function displayEditPanel(name, maxhrs, hourlyrate, jobdeptt_id, level_id) {
   $('#edit_name').val(name);
   $('#edit_maxhrs').val(maxhrs);
   $('#edit_hourlyrate').val(hourlyrate);
   $('#edit_jobdeptt_id').val(jobdeptt_id);
   $('#edit_level_id').val(level_id);
   $("#edit_slider").toggleClass('slide-left');

}

function delme(formid) {
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
         $('#deleteform' + formid).submit();
      }
   });
}
</script>
@endsection