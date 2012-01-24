<?php
/*
Template Name: Front Page
*/
get_header(); ?>

<?php global $more; ?>

<div id="subhead">

<div id="subhead-content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="subhead-description" id="post-<?php the_ID(); ?>">

				<?php the_content(); ?>

		</article>

<?php endwhile; endif; ?>

</div><!-- #subhead-content -->

<div id="subhead-join">

<p class="subhead-join">
<a href="https://members.journalists.org/membership"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-big.png" class="subhead-joinjump"></a>
<a href="https://members.journalists.org/membership"><span class="subhead-joinheader">Become a member</span></a><br />
<span class="subhead-joincall"><a href="https://members.journalists.org/membership">Join the sharpest minds in<br />digital journalism.</a></span>
</p>

</div><!-- #subhead-join -->

</div><!-- #subhead -->

<div id="content">

<div id="featured" class="slideshow">
	
		<?php include 'front-page-slides.php' ?>
		
</div><!-- #featured -->

	<div id="frontpageloop">
	
	<div id="content-header">

	<h3>Latest posts</h3>
	
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/bg_heading-double-line.png" class="doubleline noborder">
	</div><!-- #content-header -->
	
	<?php rewind_posts(); ?>
	
	<?php /* query_posts('category_name=resources&posts_per_page=5'); */ ?>
	<?php query_posts('post_type=post&posts_per_page=5'); ?>

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

	<?php /* include (STYLESHEETPATH . '/_/inc/nav.php' ); */ ?>

	<?php else : ?>

	<?php endif; ?>
	
	</div><!-- #frontpageloop -->

</div><!-- #content -->

<div id="sidebar">

<?php include 'sidebar-newsletter.php' ?>

<?php include 'sidebar-eventlist.php' ?>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
