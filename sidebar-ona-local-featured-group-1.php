<div id="sidebar-connect">

<div id="sidebar-connect-headline">
<h3>Connect with ONA</h3>
</div><!-- #sidebar-connect-headline -->

<div id="sidebar-connect-icons">
<a href="http://journalists.org/newsletter/"><img src="http://journalists.org/wp-content/themes/journalists-org/images/mail-icon.png" /></a>
<a href="http://twitter.com/ONA"><img src="http://journalists.org/wp-content/themes/journalists-org/images/twitter-icon.png" /></a>
<a href="https://www.facebook.com/onlinenewsassociation"><img src="http://journalists.org/wp-content/themes/journalists-org/images/facebook-icon.png" /></a>
<a href="http://www.linkedin.com/groups?gid=964"><img src="http://journalists.org/wp-content/themes/journalists-org/images/linkedin-icon.png" /></a>
<a href="http://onaissues.tumblr.com/"><img src="http://journalists.org/wp-content/themes/journalists-org/images/tumblr-icon.png" /></a>
</div><!-- #sidebar-connect-icons -->

</div><!-- #sidebar-connect -->

<div id="sidebar-widgets">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Featured Group 1')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

    	<!-- <?php get_search_form(); ?> -->
    
    	<?php wp_list_pages('title_li=<h3>Pages</h3>' ); ?>
    
    	<h3>Archives</h3>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
        
        <h3>Categories</h3>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        
    	<?php /* wp_list_bookmarks(); */ ?>
    
    	<h3>Meta</h3>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	
    	<h3>Subscribe</h3>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
    	</ul>
	
	<?php endif; ?>
	
</div><!-- #sidebar-widgets -->