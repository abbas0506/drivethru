<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{public_path('css/pdf.css') }}" rel="stylesheet">
   <style>
   @page {
      margin: 75px 25px;
   }
   </style>

</head>

<body>
   <div class="w-100 txt-center txt-m bg-light-grey mx-5 pt-2">Application for Local Admission</div>
   <div class="w-100 txt-center txt-s bg-light-grey mx-5 py-2">Application Track ID {{$application->id}}</div>
   <div class="w-100 txt-center txt-s py-2 mx-5">This is a system generated application form for admission into your selected courses/programs at the most suitable national universities of Pakistan</div>
   <!-- personal info -->
   <div class="w-40 mt-4 ml-5 border-bottom thin">Personal Info</div>
   <table class="w-100 mx-5">
      <tbody>
         <tr>
            <td class='w-10 txt-b txt-s mt-2 ml-5'>Name: </td>
            <td class="w-50 txt-s mt-2">{{$profile->name}}</td>
         </tr>
         <tr>
            <td class='w-10 txt-b txt-s mt-2 ml-5'>Father: </td>
            <td class="w-50 txt-s mt-2">{{$profile->fname}}</td>
         </tr>
         <tr>
            <td class='w-10 txt-b txt-s mt-2 ml-5'>DOB: </td>
            <td class="w-50 txt-s mt-2">dob</td>
         </tr>
         <tr>
            <td class='w-10 txt-b txt-s mt-2 ml-5'>CNIC: </td>
            <td class="w-50 txt-s mt-2">{{$profile->cnic}}</td>
         </tr>
         <tr>
            <td class='w-10 txt-b txt-s mt-2 ml-5'>Domicile: </td>
            <td class="w-50 txt-s mt-2">domicile</td>
         </tr>
         <tr>
            <td class='w-10 txt-b txt-s mt-2 ml-5'>Address: </td>
            <td class="w-50 txt-s mt-2">{{$profile->address}}</td>
         </tr>
         <tr>
            <td class='w-10 txt-b txt-s mt-2 ml-5'>Qualification: </td>
            <td class="w-50 txt-s mt-2">qualification</td>
         </tr>
      </tbody>
   </table>
   <!-- academic info -->
   <div class="w-100 mt-4 mx-5 border-bottom thin">Academics</div>
   <table class="w-100 mx-5 mt-2">
      <thead>
         <tr>
            <td class="w-15 txt-s txt-b">Level</td>
            <td class="w-10 txt-s txt-b">Year</td>
            <td class="w-25 txt-s txt-b">Bise/Uni</td>
            <td class="w-20 txt-s txt-b">Subjects</td>
            <td class="w-10 txt-s txt-b">Rollno</td>
            <td class="w-10 txt-s txt-b">Obtained</td>
            <td class="w-10 txt-s txt-b">Total</td>
         </tr>
      </thead>
      <tbody>
         @foreach($application->profile->academics() as $academic)
         <tr>
            <td class="w-15 txt-xs">{{$academic->level->name}}</td>
            <td class="w-10 txt-xs">{{$academic->passyear}}</td>
            <td class="w-25 txt-xs">{{$academic->biseuni}}</td>
            <td class="w-20 txt-xs">{{$academic->subjects}}</td>
            <td class="w-10 txt-xs">{{$academic->rollno}}</td>
            <td class="w-10 txt-xs">{{$academic->obtained}}</td>
            <td class="w-10 txt-xs">{{$academic->total}}</td>
         </tr>
         @endforeach

      </tbody>
   </table>
   <!-- courses applied for -->
   <div class="w-40 mt-4 ml-5 border-bottom thin">Courses / Programs - Applied for</div>
   <table class="w-100 mx-5">
      <tbody>

         @foreach($application->courses() as $course)
         <tr>
            <td class='w-50 txt-b txt-s mt-2'>{{$course->name}} </td>
         </tr>
         @foreach($application->appdetails()->where('course_id',$course->id) as $appdetail)
         <tr>
            <td class='w-50 txt-s ml-5'>- {{$appdetail->university->name}} </td>
         </tr>
         @endforeach
         @endforeach
      </tbody>
   </table>
   <!-- universities applied for -->
   <div class="w-40 mt-4 mb-2 ml-5 border-bottom thin">Universities - Where Applied</div>
   <table class="w-100 mx-5">
      <tbody>
         @php $sr=1;@endphp
         @foreach($application->universities() as $university)
         <tr>
            <td class='w-100 txt-s'>{{$sr++}}. {{$university->name}} </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</body>

</html>