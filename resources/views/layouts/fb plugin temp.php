<script>
   window.fbAsyncInit = function() {
      FB.init({
         xfbml: true,
         version: 'v13.0'
      });
   };

   (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>
   feather.replace();
   var navlinks = $('#nav-links')

   function hidemenu() {
      $('#nav-links').toggleClass('slide-left');
   }

   function showmenu() {
      $('#nav-links').toggleClass('slide-left');
   }

   $('.question').click(function() {
      $active = $(this);
      $('.question').each(function() {
         if ($(this).hasClass('show'))
            $(this).removeClass('show');
         $active.addClass('show')

      })

   })
</script>