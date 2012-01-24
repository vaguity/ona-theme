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
				
			<?php /* If this is a taxonomy archive */ } elseif (is_tax('eventtype')) { ?>
				<h3 class="pagetitle"><?php single_tag_title(); ?> events</h3>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h3 class="pagetitle">Blog Archives</h3>
			
			<?php } ?>
			
			<br />
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/bg_heading-double-line.png" class="doubleline noborder">
			
			</div><!-- #content-header -->
			
			<?php while (have_posts()) : the_post(); ?>
			
				<?php 
				$eventdate = get_post_meta($post->ID,'eventdate',true);
				$eventtagline = get_post_meta($post->ID,'eventtagline',true);
				$eventtype = get_the_term_list($post->ID,'eventtype','', ', ','');
				$eventregistrationlink = get_post_meta($post->ID,'eventregistrationlink',true);				
				$eventlink = get_post_meta($post->ID,'eventlink',true);
				if ($eventlink) $eventlink = $eventlink;
				else $eventlink = get_permalink(); ?>
			
		<article class="post" id="post-<?php the_ID(); ?>">

			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

			<footer class="meta">
			<div id="event-date">Event date: <span class="event-date-bold"><?php echo date('M. j, Y', strtotime($eventdate)); ?></span></div>

			<div id="event-post-info">
			Posted <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php if (function_exists('ap_date')) { ap_date(); echo " &mdash; "; } else { the_date(); echo " &mdash; "; } ?><?php if (function_exists('ap_time')) { ap_time(); } else { the_time('F jS, Y'); } ?></time> in <?php echo $eventtype; ?>
			<? /* <span class="byline author vcard">
			<i>by</i> <span class="fn"><?php the_author() ?></span></span> */ ?>
			<?php /* comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); */ ?>
			</div><!-- #event-post-info -->
			
			<div id="event-tags"><?php the_tags('<span class="tags-header">Filed under </span>', ' / ', ''); ?></div>

			</footer>

			<div class="entry">

				<?php the_content(''); ?>
				
				<p><?php if ($eventregistrationlink) {
				echo '<a href="'; echo $eventregistrationlink; echo '" class="jumptext">Register <img src="'; echo bloginfo('stylesheet_directory'); echo '/images/arrow-small.png" class="noborder"></a>&nbsp;&nbsp;';
				}
				
				else { }
				?>
				
				<a href="<?php echo $eventlink; ?>" class="jumptext">Learn more</a> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-small.png" class="noborder"></p>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</article>

			<?php endwhile; ?>

			<?php include (STYLESHEETPATH . '/_/inc/nav.php' ); ?>
			
	<?php else : ?>

	<?php endif; ?>

</div><!-- #content -->

<div id="sidebar">

	<?php include 'sidebar-eventlist.php' ?>

<?php get_sidebar(); ?>
</div><!-- #sidebar -->

<?php get_footer(); ?>
