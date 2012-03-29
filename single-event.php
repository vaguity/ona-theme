<?php get_header(); ?>

	<div id="content">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php 
			$eventdate = get_post_meta($post->ID,'eventdate',true);
			$eventtagline = get_post_meta($post->ID,'eventtagline',true);
			$eventtype = get_the_term_list($post->ID,'eventtype','', ', ','');
			$eventregistrationlink = get_post_meta($post->ID,'eventregistrationlink',true);
			$eventlink = get_post_meta($post->ID,'eventlink',true);
			?>
		
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
				
				<?php if ($eventlink) {
				echo '<a href="'; echo $eventlink; echo '" class="jumptext">Learn more</a> <img src="';	echo bloginfo('stylesheet_directory'); echo '/images/arrow-small.png" class="noborder">';
				}
				
				else { }
				?>
				</p>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</article>
		
		<?php /* comments_template(); */ ?>

		<?php endwhile; endif; ?>
		
	</div><!-- #content -->

<div id="sidebar">

	<?php include 'sidebar-eventlist.php' ?>

<?php get_sidebar(); ?>
</div><!-- #sidebar -->

<?php get_footer(); ?>