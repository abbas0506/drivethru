<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/app.css" rel="stylesheet">
   <script src="/js/app.js"></script>
   <script src="/js/autoformat.js"></script>
   <script src="/js/feather.min.js"></script>

   <title>DriveThru</title>

   <style>
   body {
      background-color: #1F618D;
   }

   .bg-darkblue {
      background-color: #001C31;
   }

   .title {
      color: #0098FE;
      font-size: 1.2rem;
      font-weight: bolder;
      letter-spacing: 0.1rem;
   }

   .txt-lightsky {
      color: #0098FE;
   }

   input,
   select {
      background-color: #3B515F;
      outline: none;
      border: none;
      color: whitesmoke;
      border-radius: 2px;
      padding: 5px;
      font-size: 0.75rem;
   }

   input::placeholder {
      color: #B9BEC4;
   }

   #createnew {
      color: #0180D7;
      font-size: 0.6rem;
   }

   .w-68 {
      width: 68%
   }

   .border-lightgrey {
      border-color: #777;
      border-width: 1px;
   }

   .border-lightgrey:hover {
      background-color: #0098FE;
      border-color: #0098FE;
      cursor: pointer;
      color: white;
   }


   .txt-smoke {
      color: #B9BEC4;
      /* font-size: 0.75rem; */
   }

   .txt-lightsmoke {
      color: #777;
   }

   .txt-s {
      font-size: 0.75rem;
   }

   .copyright-footer {
      letter-spacing: 1px;
   }

   .logo {
      width: 100px;
      width: 200px;
      margin-bottom: 50px;
   }

   .hr {
      border-width: 0.5px;
      border-style: dashed;
      border-color: #777;
   }

   body {
      background-image: url("{{asset('images/bg/auth.jpg')}}");
      background-repeat: no-repeat;
      background-size: cover;
      background-size: 100% 100%;
   }

   .auth-container {
      opacity: 0.7;
   }
   </style>
</head>

<body>
   <div class="fcol w-100 rw-100 h-90 centered">
      <div class="display-4 txt-orange">Congratulation</div>
      <div class="w-70 rw-90 txt-smoke txt-m">You have successfully created an account with DriveThru family where you'll find simple one step solution for all of your higher education requirements in national as well as inernational universities from education couselling to vetted admission process. </div>
      <div class="frow mid-right w-70 rw-90">
         <a href="{{url('signin')}}" class="btn btn-sm btn-info">Sign In</a>
      </div>
   </div>
   <div class="frow copyright-footer h-10 txt-smoke txt-xs centered w-100 rw-100">ALL RIGHTS RESERVED &copy; COPY RIGHTS 2021 <span class="txt-lightsky">PRIVACY POLICY </span></div>
   <script>
   feather.replace();
   </script>
</body>

</html>