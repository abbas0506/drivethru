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
   <div class="w-100 txt-center txt-m bg-light-grey mx-5 pt-2">Country Report</div>
   <div class="w-100 txt-center txt-s bg-light-grey mx-5 py-2">100% Free</div>
   <div class="w-100 txt-center txt-s py-2 mx-5">This report is based on your country preference. It is just for better decision making. It has nothing to do with anything else. Following is the complete detail of your selected country.</div>
   <div class='w-100 txt-l txt-center txt-b my-2 py-2 mx-5'>
      {{$country->name}}
   </div>
   <div class='w-100 txt-s border-bottom border-top border-1 py-2 mx-5'>
      {{$country->intro}}
   </div>
   <table class="w-100 mx-5 mt-3">
      <tbody class="">
         <tr>
            <td class="w-30 txt-s txt-b mt-2">Education: </td>
            <td class="w-70 txt-s mt-2">@if($country->edufree) Free @else Not Free @endif</td>
         </tr>
         <tr>
            <td class="w-30 txt-s txt-b mt-2">Essential: </td>
            <td class="w-70 txt-s mt-2">{{$country->essential}}</td>
         </tr>
         <tr>
            <td class="w-30 txt-s txt-b mt-2">Job Desc: </td>
            <td class="w-70 txt-s mt-2">{{$country->jobdesc}}</td>
         </tr>
         <tr>
            <td class="w-30 txt-s txt-b mt-2">Life there: </td>
            <td class="w-70 txt-s mt-2">{{$country->lifethere}}</td>
         </tr>
         <tr>
            <td class="w-30 txt-s txt-b mt-1">Visa Docs: </td>
            <td class="w-70 txt-s mt-1">
               @if($country->visadocs()->count()>0)
               <ul>
                  @foreach($country->visadocs() as $visadoc)

                  <li>{{$visadoc->doc->name}}</li>
                  @endforeach
               </ul>
               @else
               List of documents not available
               @endif

            </td>
         </tr>
         <tr>
            <td class="w-30 txt-s txt-b mt-1">Admission Docs:: </td>
            <td class="w-70 txt-s mt-1">
               @if($country->admdocs()->count()>0)
               <ul>
                  @foreach($country->admdocs() as $admdoc)
                  <li>{{$admdoc->doc->name}}</li>
                  @endforeach
               </ul>
               @else
               List of documents not available
               @endif
            </td>
         </tr>

         <tr>
            <td class="w-30 txt-s txt-b mt-1">Scholarships Offered: </td>
            <td class="w-70 txt-s mt-1">
               @if($country->scholarships()->count()>0)
               <ul>
                  @foreach($country->scholarships() as $scholarshipoffer)
                  <li>{{$scholarshipoffer->scholarship->name}}</li>
                  @endforeach
               </ul>
               @else
               List of scholarships not available
               @endif
            </td>
         </tr>

         <tr>
            <td class="w-30 txt-s txt-b mt-1">Favourite Courses: </td>
            <td class="w-70 txt-s mt-1">@if($country->favcourses()->count()>0)
               <ul>
                  @foreach($country->favcourses() as $favcourse)
                  <li>{{$favcourse->course->name}}</li>
                  @endforeach
               </ul>
               @else
               List of favourite courses not available
               @endif
            </td>
         </tr>

         <tr>
            <td class="w-30 txt-s txt-b mt-1">Study Cost: </td>
            <td class="w-70 txt-s mt-1">
               @if($country->studycosts()->count()>0)
               <ul>
                  @foreach($country->studycosts() as $studycost)
                  <li>{{$studycost->level->name}}: {{$studycost->minfee}}- {{$studycost->maxfee}}$</li>
                  @endforeach
               </ul>
               @else
               List of study costs not available
               @endif
            </td>
         </tr>

         <tr>
            <td class="w-30 txt-s txt-b mt-1">Living Cost: </td>
            <td class="w-70 txt-s mt-1">
               @if($country->livingcosts()->count()>0)
               <ul>
                  @foreach($country->livingcosts() as $livingcost)
                  <li>{{$livingcost->expensetype->name}}: {{$livingcost->minexp}}- {{$livingcost->maxexp}} $</li>
                  @endforeach
               </ul>
               @else
               List of study costs not available
               @endif
            </td>
         </tr>

         <tr>
            <td class="w-30 txt-s txt-b mt-2">Living Cost Desc: </td>
            <td class="w-70 txt-s mt-2">{{$country->livingcostdesc}}</td>
         </tr>

      </tbody>
   </table>
</body>

</html>