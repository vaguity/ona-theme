<?php
/*
Template Name: Section: ONA Local Events
*/
get_header(); ?>

<?php global $more; ?>

<div id="content" class="full-page">

	<div id="ona-local-calendar">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="subhead-description" id="post-<?php the_ID(); ?>">

				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<?php the_content(); ?>

		</article>

	<?php endwhile; endif; ?>
	
	</div><!-- #ona-local-calendar -->

	<div id="content-header">

	<h3>Featured events</h3>
	
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/bg_heading-double-line.png" class="doubleline noborder">
	</div><!-- #content-header -->

<div id="ona-local-loop">
			
				<?php $posts = z_get_posts_in_zone('eventlistzone'); ?>
					<?php foreach( $posts as $post ) :

						$eventdate = get_post_meta($post->ID,'eventdate',true);
						$eventtagline = get_post_meta($post->ID,'eventtagline',true);
						$eventtype = get_the_term_list($post->ID,'eventtype','', ' / ','');
						$eventregistrationlink = get_post_meta($post->ID,'eventregistrationlink',true);
						$eventlink = get_post_meta($post->ID,'eventlink',true);
						if ($eventlink) $eventlink = $eventlink;
						else $eventlink = get_permalink();
						setup_postdata($post); ?>

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

				<?php endforeach; ?>
	
	</div><!-- #ona-local-loop -->
	
<div class="navigation" id="content-nav">
	<hr />
	<div class="next-posts">&nbsp;</div>
	<div class="prev-posts"><a href="<?php echo get_option('home'); ?>/ona-local/events">More events &raquo;</a></div>
</div>

</div><!-- #content -->

<?php get_footer(); ?>