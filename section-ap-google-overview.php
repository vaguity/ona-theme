<?php
/*
Template Name: Section: AP-Google Overview
*/
get_header(); ?>

<?php global $more; ?>

<div id="content">
	
	<div id="featured" class="slideshow">
	
		<?php include 'ap-google-slides.php' ?>
		
	</div><!-- #featured -->
			
	<div id="ap-google-loop">
	
	<div id="ap-google-about">
	<article class="entry">
	
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('AP-Google Overview')) : else : ?>
	
	<?php endif; ?>

	</article>
	</div><!-- #ap-google-about -->

	<div id="content-header">

	<h3>Latest AP-Google Scholarship posts</h3>
	
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/bg_heading-double-line.png" class="doubleline noborder">
	</div><!-- #content-header -->
	
	<?php rewind_posts(); ?>
	
	<?php query_posts('category_name=ap-google-scholarship&posts_per_page=2'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $more = 0; ?>
	
		<article class="post" id="post-<?php the_ID(); ?>">
			
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<footer class="meta">
			<div id="post-info">
			Posted <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php if (function_exists('ap_date')) { ap_date(); echo " &mdash; "; } else { the_date(); echo " &mdash; "; } ?><?php if (function_exists('ap_time')) { ap_time(); } else { the_time('F jS, Y'); } ?></time> in <?php the_category(', '); ?>
			<? /* <span class="byline author vcard">
			<i>by</i> <span class="fn"><?php the_author() ?></span></span> */ ?>
			<?php /* comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); */ ?>
			</div><!-- #post-info -->

			<div id="tags"><?php the_tags('<span class="tags-header">Filed under </span>', ' / ', ''); ?></div>

			</footer><!-- .meta -->
			
			<div class="entry">

				<?php the_content(''); ?>
				
				<a href="<?php the_permalink(); ?>" class="jumptext">Learn more</a> <a href="<?php the_permalink(); ?>" class="jumptext"><img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/arrow-small.png" class="noborder"></a>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php /* edit_post_link('Edit this entry.', '<p>', '</p>'); */ ?>

		</article>

	<?php endwhile; ?>

<!--	<div class="navigation" id="content-nav">
		<hr />
		<div class="next-posts">&nbsp;</div>
		<div class="prev-posts"><a href="<?php echo get_option('home'); ?>/category/resources">More resources posts &raquo;</a><br /><br />
		<a href="<?php echo get_option('home'); ?>/category/news">More news posts &raquo;<br />&nbsp;</div>
	</div> -->

	<?php /* include (STYLESHEETPATH . '/_/inc/nav.php' ); */ ?>

	<?php else : ?>

	<?php endif; ?>
	
	</div><!-- #frontpageloop -->

</div><!-- #content -->

<div id="sidebar">

	<div id="sidebar-section-header">
	<h3>AP-Google Scholarship</h3>
	</div><!-- #sidebar-section-header" -->

	<nav id="section-nav"><?php wp_nav_menu( array('menu' => 'Section: AP-Google' )); ?></nav>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
