<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0 txt-s">
   <link href="{{public_path('css/pdf.css')}}" rel="stylesheet">
   <style>
   @page {
      margin: 75px 25px;
   }
   </style>

</head>

<body>
   <table class="w-100 bg-light-grey mx-5 py-2">
      <tbody>
         <tr>
            <td class="w-40 pl-4"><img src="{{public_path('images/logo/dark.png')}}" width='150' alt=""></td>
            <td class="txt-r pr-4">University Report, 100 % free</td>
         </tr>
      </tbody>
   </table>

   <div class="w-100 txt-center txt-s py-2 mx-5">This is a system generated free report containing information about your selected university. It is just for better decision making. It has nothing to do with anything else. Following is the complete detail of the university.</div>
   <div class='w-100 txt-l txt-center txt-b my-2 py-2 mx-5'>
      {{$university->name}}
   </div>
   <div class='w-100 txt-s border-bottom border-top border-1 py-2 mx-5'>
      This is a {{$university->type}} university, situated at {{$university->city->name}}. Its international ranking is {{$university->rank}}. Following is the detail of its faculties and courses.
   </div>
   <table class="w-100 mx-5">
      <tbody class="">
         @foreach($university->faculties() as $faculty)
         <tr>
            <td class="w-100 mt-3">{{$faculty->name}}</td>
         </tr>
         <tr class="mx-4 my-2">
            <td class="w-30 txt-s txt-grey border-bottom">Course</td>
            <td class="w-20 txt-s txt-grey border-bottom">Criteria</td>
            <td class="w-10 txt-s txt-grey txt-r border-bottom">Fee (Rs)</td>
            <td class="w-20 txt-s txt-grey txt-r border-bottom">Last Merit</td>
            <td class="w-20 txt-s txt-grey txt-r border-bottom">Closing</td>
         </tr>
         @foreach($faculty->unicourses() as $unicourse)
         <tr>
            <td class="w-30 txt-s">{{$unicourse->course->name}}</td>
            <td class="w-20 txt-s">{{$unicourse->criteria}}</td>
            <td class="w-10 txt-s txt-r">{{$unicourse->fee}} k</td>
            <td class="w-20 txt-s txt-r">{{$unicourse->lastmerit}}</td>
            <td class="w-20 txt-s txt-r">{{$unicourse->closing}}</td>
         </tr>
         @endforeach

         @endforeach
      </tbody>
   </table>
</body>

</html>