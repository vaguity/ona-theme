<?php get_header(); ?>

	<div id="content">
		
		<?php if (have_posts()) : ?>

			<div id="content-header">
 			
 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h3>Archive &mdash; <?php single_cat_title(); ?></h3>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h3>Tag &mdash; <?php single_tag_title(); ?></h3>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h3>Archive for <?php the_time('F jS, Y'); ?></h3>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h3>Archive for <?php the_time('F, Y'); ?></h3>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h3 class="pagetitle">Archive for <?php the_time('Y'); ?></h3>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h3 class="pagetitle">Author Archive</h3>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h3 class="pagetitle">Blog Archives</h3>
			
			<?php } ?>
			
			<br />
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/bg_heading-double-line.png" class="doubleline noborder">
			
			</div><!-- #content-header -->
			
			<?php while (have_posts()) : the_post(); ?>
			
		<article class="post" id="post-<?php the_ID(); ?>">

			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

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

			<?php include (STYLESHEETPATH . '/_/inc/nav.php' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

</div><!-- #content -->

<div id="sidebar">

	<?php include 'sidebar-posts.php' ?>

<?php get_sidebar(); ?>
</div><!-- #sidebar -->

<?php get_footer(); ?>
