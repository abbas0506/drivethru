@extends('layouts.representative')
@section('page-content')
<!-- display record save, del, update message if any -->
<section class='page-content'>
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

   <div class='w-60 mx-auto txt-l my-5 '><span class="lnr lnr-question-circle mr-3"></span> Response <span class="txt-s">- counsellig requests</span></div>
   <div class="w-60 mx-auto">
      <div class="frow align-items-center bg-custom-light p-2 mb-3 relative">
         <a href="{{route('counsellingresponses.index')}}">
            <div class="top-right-icon circular-20">
               <i data-feather='x' class="feather-xsmall mb-1"></i>
            </div>
         </a>
         <img src="{{url(asset('images/users/'.$counselling->user->pic))}}" alt="" width='100' height='100' class="rounded-circle mr-4">

         <div>
            <div class="txt-b">{{$counselling->user->name}}</div>
            <div class="txt-s txt-grey">{{$counselling->user->email}}</div>
            <div class="txt-s txt-grey">{{$counselling->user->phone}}</div>
         </div>
      </div>

      <!-- news panel -->
      <div class="p-4 border">
         <ul>
            @if($counselling->option1==1)<li>International admission enquiry</li>@endif
            @if($counselling->option2==1)<li>National univeristy enquiry</li>@endif
            @if($counselling->option3==1)<li>Website usage issue</li>@endif
            @if($counselling->option4==1)<li>Fee payment issue</li>@endif
            @if($counselling->option5==1)<li>General information required</li>@endif
            @if($counselling->query)<li>{{$counselling->query}}</li>@endif
         </ul>

      </div>
      <form action="{{route('counsellingresponses.update', $counselling)}}" method="post">
         @csrf
         @method('PATCH')
         <div class="fancyinput mt-4 mb-2">
            <textarea name='response' id="" rows="4" class="w-100" required></textarea>
            <label for="">Your Reply</label>
         </div>
         <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
      </form>
   </div>
</section>
@endsection