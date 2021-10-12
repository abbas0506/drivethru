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
   <div class="w-100 txt-center txt-m bg-light-grey mx-5 pt-2">Top Universities Search Report</div>
   <div class="w-100 txt-center txt-s bg-light-grey mx-5 py-2">100% Free</div>
   <div class="w-100 txt-center txt-s py-2 mx-5">This report is for better decision making. It has nothing to do with anything else. This report is based on your field/course/program preference. Below are the complete detail of your respective selected programs.</div>
   <!-- personal info -->
   <!-- courses applied for -->
   <div class="w-40 mt-4 ml-5 border-bottom thin">Top Universities for Selected Course(s)</div>
   <table class="w-100 mx-5">
      <thead>
         <tr>
            <td class='w-20 txt-s txt-b mt-2'>Course</td>
            <td class='w-40 txt-s txt-b mt-2'>University</td>
            <td class='w-20 txt-s txt-b mt-2'>Location </td>
            <td class='w-10 txt-s txt-b mt-2'>Type</td>
            <td class='w-10 txt-s txt-b mt-2'>Fee</td>
         </tr>
      </thead>
      <tbody class="mt-2">
         <tr>
            <td class="my-2"></td>
         </tr>
         @foreach($courses as $course)

         @php $sr=1; @endphp
         @foreach($data->where('course_id',$course->id) as $row)
         <tr>
            <td class='w-25 txt-s'><u>@if($sr==1) {{$course->name}}@endif </u></td>
            <td class='w-30 txt-s'>{{$sr++}}. {{$row->university}} </td>
            <td class='w-15 txt-s'>{{$row->city}} </td>
            <td class='w-10 txt-s'>{{$row->type}} </td>
            <td class='w-10 txt-s'>{{$row->fee}} </td>
         </tr>
         @endforeach
         <tr>
            <td class="my-2"></td>
         </tr>
         @endforeach
      </tbody>
   </table>

</body>

</html>