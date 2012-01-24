<div id="sidebar-posts-eventlist">

			<div id="sidebar-posts-eventheader">
 			
			<h3>Featured events</h3>
			
			<hr />
			
			</div><!-- #sidebar-posts-eventheader -->
			
			<ul class="sidebar-posts-eventlist">
			
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

				<li>
				<div id="sidebar-posts-eventdate"><?php echo date('M. j, Y', strtotime($eventdate)); ?></div>
				<div id="sidebar-posts-eventinfo">
				<div id="sidebar-posts-eventtitle"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
				<div id="sidebar-posts-eventtagline"><p><?php echo $eventtagline; ?></p></div>
				<div id="sidebar-posts-eventtype"><?php echo $eventtype; ?></div>
				<div id="sidebar-posts-eventlink">
				
				<?php if ($eventregistrationlink) {
				echo '<a href="'; echo $eventregistrationlink; echo '" class="jumptext">Register</a> <a href="'; echo $eventregistrationlink; echo '" class="jumptext"><img src="'; echo bloginfo('stylesheet_directory'); echo '/images/arrow-small.png" class="noborder"></a>&nbsp;&nbsp;';
				}
				
				else { }
				?>
				
				<a href="<?php echo $eventlink; ?>" class="jumptext">Learn more</a> <a href="<?php echo $eventlink; ?>" class="jumptext"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-small.png"></a></div>
				</div>
				</li>

				<?php endforeach; ?>
				
				<li>
				<div id="sidebar-posts-eventfooter"><a href="<?php echo get_option('home'); ?>/ona-local/events" class="jumptext">Learn more about ONA events</a> <a href="<?php echo get_option('home'); ?>/event" class="jumptext"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-small.png"></a>
				</div>
				</li>
				
			</ul>
	
	</div><!-- #sidebar-posts-eventlist -->