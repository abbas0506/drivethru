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
   </style>
</head>


<body>

   <div class="frow h-10 w-100 rhide"></div>
   <div class="frow h-80 w-100 rh-auto rw-100 auto-col">
      <div class="fcol w-60 rw-100 p-4 centered ">
         <img src="{{url('storage/images/logos/logo1.png')}}" alt="" class="logo">
         <div class="w-80 rw-90 txt-smoke txt-m text-justify">DriveThru.pk is a simple one step solution for all of your higher education requirements in national as well as inernational universities from education couselling to vetted admission process.</div>

      </div>
      <div class="fcol w-40 rw-100 centered">
         <div class='fcol w-60 rw-100 p-5 bg-darkblue'>
            <form action="{{route('users.store')}}" method='post'>
               @csrf
               <div class="fcol rw-100 centered">
                  <div class="frow centered title">SIGN UP</div>
                  <div class="frow w-100 rw-100 centered mt-4">
                     <input type="text" name='name' placeholder="Name" class="w-100">
                  </div>
                  <div class="frow w-100 stretched mt-2">
                     <div class="fcol w-30 rw-25">
                        <select name="" id="">
                           <option value="92">+92</option>
                        </select>
                     </div>
                     <div class="fcol w-68 rw-70">
                        <input type="text" name='phone' placeholder="Phone">
                     </div>
                  </div>
                  <div class="frow w-100 centered mt-2">
                     <input type="email" name='email' placeholder="Email" class="w-100">
                  </div>
                  <div class="frow w-100 centered mt-2">
                     <input type="password" name='password' id='password' placeholder="Password" class="w-100">
                  </div>
                  <div class="frow w-100 centered mt-2">
                     <input type="password" id='confirmpw' placeholder="Confirm Password" class="w-100">
                  </div>
                  <div class="frow w-100 stretched mt-3">
                     <div class="fcol w-70 rw-70 centered" id='createnew'>I already own an account, sign in</div>
                     <div class='fcol w-30 rw-30'><button type="submit" class="btn btn-sm btn-primary">Sign Up</button></div>
                  </div>

               </div>
            </form>
            <div class="fcol h-10">
               <span class="w-100 hr my-3"></span>
               <div class="frow w-100 rw-100">
                  <div class="fcol w-70 rw-70 centered txt-lightsmoke txt-s">Alternate signin options</div>
                  <div class="fcol border-lightgrey circular-20 txt-smoke ml-2"><i data-feather='facebook' class="feather-xsmall"></i></div>
                  <div class="fcol border-lightgrey circular-20 txt-smoke ml-2 txt-s">G</div>
               </div>
            </div>
         </div>

      </div>

   </div>
   <div class="frow copyright-footer h-10 txt-smoke txt-xs centered w-60 rw-100">ALL RIGHTS RESERVED &copy; COPY RIGHTS 2021 <span class="txt-lightsky">PRIVACY POLICY </span></div>
   <script>
   feather.replace();
   </script>
</body>

</html>