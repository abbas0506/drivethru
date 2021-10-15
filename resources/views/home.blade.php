<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>
   <link href="/css/app.css" rel="stylesheet">
   <script src="/js/app.js"></script>
   <script src="/js/feather.min.js"></script>
</head>

<body>
   <div class="fcol w-100 h-100  centered">
      <div class="fcol box-100 mb-5  border circular">
         <img src="{{url('storage/images/logos/logo2.png')}}" alt="" class="user-avatar-lg" width='100' height='100'>
      </div>
      <div class="display-4 mb-4">Welcome to home page</div>
      <div class="frow">
         <a href="{{url('signin')}}" class="btn btn-info mr-3"> Signin</a>
         <a href="{{url('signup')}}" class="btn btn-success"> Signup</a>
      </div>
   </div>



</body>

</html>