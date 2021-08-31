<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <style>
   #Slider {}

   #Actual {
      background: silver;
      color: White;
      padding: 20px;
   }

   .slideup,
   .slidedown {
      max-height: 0;
      overflow-y: hidden;
      -webkit-transition: max-height 0.5s ease-in-out;
      -moz-transition: max-height 0.5s ease-in-out;
      -o-transition: max-height 0.5s ease-in-out;
      transition: max-height 0.5s ease-in-out;
   }

   .slidedown {
      max-height: 60px;
   }
   </style>
</head>

<body>
   <div class="container" style="padding: 40px">
      <button id="Trigger">Trigger Slideup/SlideDown</button>

      <div id="Slider" class="slideup">
         <!-- content has to be wrapped so that the padding and
                margins don't effect the transition's height -->
         <div id="Actual">
            Hello World Text
         </div>
      </div>
   </div>

   <script src="scripts/jquery.js"></script>
   <script>
   // slideup/slidedown
   $("#Trigger").click(function() {
      if ($("#Slider").hasClass("slideup"))
         $("#Slider").removeClass("slideup").addClass("slidedown");
      else
         $("#Slider").removeClass("slidedown").addClass("slideup");
   });
   </script>
</body>

</html>