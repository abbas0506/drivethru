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
   <div class="container relative">
      <div class="absolute col-1 w-30 border">
         <table class="w-100">
            <thead>
               <tr>
                  <td class="txt-center txt-b txt-m border-bottom p-3">
                     <img src="{{public_path('images/logo/dark.png')}}" width='100' alt="">
                  </td>
                  <td class="txt-center txt-b txt-m border-bottom border-left p-3">
                     <img src="{{public_path('images/logo/meezan-bank-logo.png')}}" width='100' alt="">
                  </td>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="txt-center txt-s border-bottom p-2" colspan="2">Deposit Slip (Bank Copy)</td>
               </tr>
               <tr>
                  <td class="txt-center txt-s border-bottom p-2" colspan="2">Account Title: Drivethru</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Account No.</td>
                  <td class="p-2">98130106350206</td>
               </tr>

               <tr class="txt-s">
                  <td class="p-2 border-bottom">Bank Name:</td>
                  <td class="p-2 border-bottom">Meezan Bank, Depalpur</td>

               </tr>

               <tr class="txt-s">
                  <td class="p-2">Deposit Slip ID:</td>
                  <td class="p-2">{{$depositSlipId}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Candidate Name</td>
                  <td class="p-2">{{$application->user->name}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Father's Name</td>
                  <td class="p-2">{{$application->user->profile()->fname}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Payment</td>
                  <td class="p-2">CASH</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Issue Date</td>
                  <td class="p-2">{{$issuedate->format('d-m-Y')}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Due Date</td>
                  <td class="p-2">{{$duedate->format('d-m-Y')}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom border-top " colspan="2">Cash:</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border bg-light-grey">Description</td>
                  <td class="p-2 border bg-light-grey txt-center">Amount (Rs)</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border">Processing Fee</td>
                  <td class="p-2 txt-center border">{{$application->charges*150}}/-</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom" colspan="2">In words: {{$inwords}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="px-2 py-1 txt-b" colspan="2">Note:</td>
               </tr>
               <tr class="txt-xs">
                  <td class="px-2 pt-1" colspan="2">1. Acceptable at any branch of Meezan Bank, Pakistan</td>
               </tr>
               <tr class="txt-xs">
                  <td class="px-2 py-1" colspan="2">2. Applicants are required to upload drivethru copy of paid deposit slip on drivethru.pk portal</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom border-top" colspan="2">Depositor Name</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom" colspan="2">Depositor's CNIC</td>
               </tr>
            </tbody>
         </table>

      </div>
      <div class="absolute col-2 w-30 border">
         <table class="w-100">
            <thead>
               <tr>
                  <td class="txt-center txt-b txt-m border-bottom p-3">
                     <img src="{{public_path('images/logo/dark.png')}}" width='100' alt="">
                  </td>
                  <td class="txt-center txt-b txt-m border-bottom border-left p-3">
                     <img src="{{public_path('images/logo/meezan-bank-logo.png')}}" width='100' alt="">
                  </td>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="txt-center txt-s border-bottom p-2" colspan="2">Deposit Slip (Drivethru Copy)</td>
               </tr>
               <tr>
                  <td class="txt-center txt-s border-bottom p-2" colspan="2">Account Title: Drivethru</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Account No.</td>
                  <td class="p-2">98130106350206</td>
               </tr>

               <tr class="txt-s">
                  <td class="p-2 border-bottom">Bank Name:</td>
                  <td class="p-2 border-bottom">Meezan Bank, Depalpur</td>

               </tr>

               <tr class="txt-s">
                  <td class="p-2">Deposit Slip ID:</td>
                  <td class="p-2">{{$depositSlipId}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Candidate Name</td>
                  <td class="p-2">{{$application->user->name}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Father's Name</td>
                  <td class="p-2">{{$application->user->profile()->fname}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Payment</td>
                  <td class="p-2">CASH</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Issue Date</td>
                  <td class="p-2">{{$issuedate->format('d-m-Y')}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Due Date</td>
                  <td class="p-2">{{$duedate->format('d-m-Y')}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom border-top " colspan="2">Cash:</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border bg-light-grey">Description</td>
                  <td class="p-2 border bg-light-grey txt-center">Amount (Rs)</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border">Processing Fee</td>
                  <td class="p-2 txt-center border">{{$application->charges*150}}/-</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom" colspan="2">In words: {{$inwords}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="px-2 py-1 txt-b" colspan="2">Note:</td>
               </tr>
               <tr class="txt-xs">
                  <td class="px-2 pt-1" colspan="2">1. Acceptable at any branch of Meezan Bank, Pakistan</td>
               </tr>
               <tr class="txt-xs">
                  <td class="px-2 py-1" colspan="2">2. Applicants are required to upload drivethru copy of paid deposit slip on drivethru.pk portal</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom border-top" colspan="2">Depositor Name</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom" colspan="2">Depositor's CNIC</td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="absolute col-3 w-30 border">
         <table class="w-100">
            <thead>
               <tr>
                  <td class="txt-center txt-b txt-m border-bottom p-3">
                     <img src="{{public_path('images/logo/dark.png')}}" width='100' alt="">
                  </td>
                  <td class="txt-center txt-b txt-m border-bottom border-left p-3">
                     <img src="{{public_path('images/logo/meezan-bank-logo.png')}}" width='100' alt="">
                  </td>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="txt-center txt-s border-bottom p-2" colspan="2">Deposit Slip (Candidate Copy)</td>
               </tr>
               <tr>
                  <td class="txt-center txt-s border-bottom p-2" colspan="2">Account Title: Drivethru</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Account No.</td>
                  <td class="p-2">98130106350206</td>
               </tr>

               <tr class="txt-s">
                  <td class="p-2 border-bottom">Bank Name:</td>
                  <td class="p-2 border-bottom">Meezan Bank, Depalpur</td>

               </tr>

               <tr class="txt-s">
                  <td class="p-2">Deposit Slip ID:</td>
                  <td class="p-2">{{$depositSlipId}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Candidate Name</td>
                  <td class="p-2">{{$application->user->name}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Father's Name</td>
                  <td class="p-2">{{$application->user->profile()->fname}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Payment</td>
                  <td class="p-2">CASH</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Issue Date</td>
                  <td class="p-2">{{$issuedate->format('d-m-Y')}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2">Due Date</td>
                  <td class="p-2">{{$duedate->format('d-m-Y')}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom border-top " colspan="2">Cash:</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border bg-light-grey">Description</td>
                  <td class="p-2 border bg-light-grey txt-center">Amount (Rs)</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border">Processing Fee</td>
                  <td class="p-2 txt-center border">{{$application->charges*150}}/-</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom" colspan="2">In words: {{$inwords}}</td>
               </tr>
               <tr class="txt-s">
                  <td class="px-2 py-1 txt-b" colspan="2">Note:</td>
               </tr>
               <tr class="txt-xs">
                  <td class="px-2 pt-1" colspan="2">1. Acceptable at any branch of Meezan Bank, Pakistan</td>
               </tr>
               <tr class="txt-xs">
                  <td class="px-2 py-1" colspan="2">2. Applicants are required to upload drivethru copy of paid deposit slip on drivethru.pk portal</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom border-top" colspan="2">Depositor Name</td>
               </tr>
               <tr class="txt-s">
                  <td class="p-2 border-bottom" colspan="2">Depositor's CNIC</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</body>

</html>