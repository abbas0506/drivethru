<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{public_path('css/pdf.css')}}" rel="stylesheet">
   <style>
   @page {
      margin: 75px 25px;
   }
   </style>

</head>

<body>
   <div class="w-100 txt-center txt-m bg-light-grey mx-5 pt-2">Top Countries Search Report</div>
   <div class="w-100 txt-center txt-s bg-light-grey mx-5 py-2">100% Free</div>
   <div class="w-100 txt-center txt-s py-2 mx-5">This is an auto generated report, purely based on your field/course/program preference. This is just for better decision making. It has nothing to do with anything else. Below is the complete list of top countries matching your field/program preference</div>
   <!-- personal info -->
   <!-- courses applied for -->
   <div class="w-100 rw-100 mt-4 mx-5">
      Selected Field / Course : <span class="border-bottom thin"> {{$course->name}}</span>
   </div>
   <div class="w-40 mt-4 ml-5 border-bottom thin">List of Top Countries for the Field/Course</div>
   <table class="w-100 mx-5">
      <thead>
         <tr>
            <td class="w-5 txt-s txt-b mt-2 txt-center">Sr</td>
            <td class='w-25 txt-s txt-b mt-2'>Country</td>
            <td class='w-40 txt-s txt-b mt-2'>Essential</td>
            <td class='w-15 txt-s txt-b mt-2 txt-right'>Study Cost ($) </td>
            <td class='w-15 txt-s txt-b mt-2 txt-right'>Living Cost ($)</td>
         </tr>
      </thead>
      <tbody class="mt-2">
         @php $sr=1; @endphp
         @foreach($countries as $country)
         <tr>
            <td class="w-5 txt-xs txt-center">{{$sr++}}</td>
            <td class='w-25 txt-xs'> {{$country->name}} </td>
            <td class='w-40 txt-xs pr-2'>{{$country->essential}} </td>
            <td class='w-15 txt-xs txt-right'>{{$country->studycosts()->min('minfee')}}-{{$country->studycosts()->max('minfee')}} </td>
            <td class='w-15 txt-xs txt-right'>{{$country->livingcosts()->min('minexp')}}-{{$country->livingcosts()->max('minexp')}} </td>
         </tr>
         @endforeach
      </tbody>
   </table>

</body>

</html>