	</div><!-- #content-wrap -->
		
		<footer id="footer" class="source-org vcard copyright site">
		<div id="copyright">
			<ul><li>&copy;<?php echo date("Y"); echo " "; ?><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></li><li><?php wp_register(); ?></li><li><?php wp_loginout(); ?></li></ul>
		</div><!-- #copyright -->
		<div id="footer-links">
		<ul><li><a href="https://members.journalists.org/event-policy">Event Policy</a></li>
		<li><a href="https://members.journalists.org/privacy-policy">Privacy Policy</a></li>
		<li><a href="https://members.journalists.org/refundreturn-policy">Refund/Return Policy</a></li>
		<li><a href="https://members.journalists.org/terms-use">Terms of Use</a></li></ul>
		</div><!-- footer-links -->
		</footer>

	</div><!-- #page-wrap -->

	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
-->
	 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-6125049-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	
</body>

</html>