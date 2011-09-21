
  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

	
  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>

	<!-- Prettify for making code look nice -->
	<script src="library/js/libs/prettify.js"></script>

	<!-- Twitter BootStrap js -->
    <script src="library/js/bootstrap/bootstrap-modal.js"></script>
    <script src="library/js/bootstrap/bootstrap-alerts.js"></script>
    <script src="library/js/bootstrap/bootstrap-twipsy.js"></script>
    <script src="library/js/bootstrap/bootstrap-popover.js"></script>
    <script src="library/js/bootstrap/bootstrap-dropdown.js"></script>
    <script src="library/js/bootstrap/bootstrap-scrollspy.js"></script>
    <script src="library/js/bootstrap/bootstrap-tabs.js"></script>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  <script>
  $(function () {
    $('.tabs').tabs()
  })
</script>
</body>
</html>
