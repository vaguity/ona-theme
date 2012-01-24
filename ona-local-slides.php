<?php rewind_posts(); ?>

<div id="slides">
	<div id="slideshow">
		
		<?php $posts = z_get_posts_in_zone('onalocalslidezone'); ?>
			<?php foreach( $posts as $post ) :
				$slideformat = get_post_meta($post->ID,'slideformat',true);
				$slidephoto = get_post_meta($post->ID,'slidephoto',true);
				$slidecategory = get_post_meta($post->ID,'slidecategory',true);
				$slidelink = get_post_meta($post->ID,'slidelink',true);
				$slidebackground = get_post_meta($post->ID,'slidebackground',true);
				setup_postdata($post);
				
				/* Check the length of the slide category */
					
					if (strlen($slidecategory) > 12 && strlen($slidecategory) < 22) { $slidecategorytype = twolines; $slidecategoryvis = visible; }
					elseif (strlen($slidecategory) >= 26 || strlen($slidecategory) == 0) { $slidecategorytype = nolines; $slidecategoryvis = hidden; }
					else { $slidecategorytype = oneline; $slidecategoryvis = visible; }
					
				/* Check for conflicts between slideformat and slidebackground */
				
					if ($slidebackground == 'Photo' && $slideformat != 'Just Text (No Photo)') { $slideformat = 'Just Text (No Photo)'; }
					else { }
					
					if ($slidebackground == 'Photo' && empty($slidephoto) == TRUE) { $slidebackground = 'Yellow'; }
					else { }
				
				/* Convert settings to CSS-friendly classes; adjust for errors */
				
					if ($slidebackground == 'Photo') { $slidebackground = 'bgphoto'; }
					elseif ($slidebackground == 'Yellow') { $slidebackground = 'bgyellow'; }
					elseif ($slidebackground == 'Light Blue') { $slidebackground = 'bglightblue'; }
					elseif ($slidebackground == 'Dark Blue') { $slidebackground = 'bgdarkblue'; }
					else { $slidebackground = 'bgyellow'; }

					
					if ($slideformat == 'Just Text (No Photo)') { $slideformat = 'textonly'; }
					elseif ($slideformat == 'Text Left (Photo Right)') { $slideformat = 'textleft'; $slidephotoformat = 'photoright'; }
					elseif ($slideformat == 'Text Right (Photo Left)') { $slideformat = 'textright'; $slidephotoformat = 'photoleft'; }
					else { $slideformat = 'textonly'; $slidephoto = null; }
					
					if ($slidephoto == null && $slideformat != 'textonly') { $slideformat = 'textonly'; }
					else { }
				
				?>
				
				
			<?php /* echo 'BG: '; echo $slidebackground; echo ' // FORMAT:'; echo $slideformat; */ ?>
					<div id="frontpageslide" class="<?php echo $slidebackground; ?> <?php echo $slideformat; ?>"<?php if ($slidebackground == 'bgphoto') { echo 'style="background:url('; echo $slidephoto; echo ');">'; } 
					else { echo '>'; }					
					?>
						<a href="<?php echo $slidelink; ?>">
							<div id="slidecategory"><h4 class="<?php echo $slidecategoryvis; ?>"><p class="<?php echo $slidecategorytype; ?>"><?php echo $slidecategory ?></p></h4></div>
							
							<div id="slidecontent">
							
							<?php if ($slidephoto != null && $slideformat != 'textonly') { ?>
							<img src="<?php echo $slidephoto; ?>" class="<?php echo $slidephotoformat; ?>" />
							<?php }
							else { } ?>
							
							<h3 class="slidetitle" class="<?php echo $slideformat; ?>"><?php the_title(); ?></h3><br />
							<p class="<?php echo $slideformat; ?>"><?php the_content(); ?></p>

							<div class="slidejump">
							<a href="<?php echo $slidelink; ?>" class="jumptext">Learn more</a>&nbsp;&nbsp;<a href="<?php echo $slidelink; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-circle-small.png" class="jumptext noborder"></a>
							</div><!-- .slidejump -->
							
							</div><!-- #slidecontent -->
							
						</a>
					</div>
				
			<?php endforeach; ?>
		</div><!-- #slideshow -->
		
<div id="slideshow-nav"></div>
		
</div><!-- #slides -->