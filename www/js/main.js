
  $(function ()
 {
     var requestUrl = function (url, go_back)
     {
         go_back = go_back || false;

         $.get(url, {}, function (html_content)
         {
             if ( ! go_back) {
                 history.pushState({}, 'title', url);
             }

             $('.content').html(html_content);
         });
     };

     $('body').on('click', 'a', function (e)
     {
         var $a = $(e.currentTarget);

         var url = $a.attr('href');

         if (url.substr(0, 4) === 'http') {
             return true;
         }

         requestUrl(url);

         return false;
     });

     $(window).bind('popstate', function( event )
     {
         var url = window.location.href;

         requestUrl(url, true);
     });
 });
