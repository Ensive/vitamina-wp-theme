<script>
  // Google Analytics
  // TODO: Google Analytics: change UA-XXXXX-X to be your site's ID.
  (function (b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
      function () {
        (b[l].q = b[l].q || []).push(arguments)
      });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.src = 'https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
  }(window, document, 'script', 'ga'));
  ga('create', 'UA-XXXXX-X');
  ga('send', 'pageview');

  // Web Font Loader
  WebFontConfig = {
    google: { families: [ 'Roboto:300,400,400i,500,700,700i:latin', 'Roboto+Slab:300:latin' ] }
  };

  (function () {
    var wf = document.createElement('script');
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
</script>

<?php wp_footer(); ?>
</body>
</html>
