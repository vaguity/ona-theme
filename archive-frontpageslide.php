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
			
			<h3>Archive of Front Page Slides
			
			<br />
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/bg_heading-double-line.png" class="doubleline noborder">
			
			</div><!-- #content-header -->
			
			<div id="slides">
			
			<?php while (have_posts()) : the_post(); ?>
			
			<?php
				$slideformat = get_post_meta($post->ID,'slideformat',true);
				$slidephoto = get_post_meta($post->ID,'slidephoto',true);
				$slidecategory = get_post_meta($post->ID,'slidecategory',true);
				$slidelink = get_post_meta($post->ID,'slidelink',true);
				$slidebackground = get_post_meta($post->ID,'slidebackground',true);
				setup_postdata($post);
				
				/* Check the length of the slide category */
					
					if (strlen($slidecategory) > 12 && strlen($slidecategory) < 22) { $slidecategorytype = twolines; $slidecategoryvis = visible; }
					elseif (strlen($slidecategory) >= 22 || strlen($slidecategory) == 0) { $slidecategorytype = nolines; $slidecategoryvis = hidden; }
					else { $slidecategorytype = oneline; $slidecategoryvis = visible; }
					
				/* Check for conflicts between slideformat and slidebackground */
				
					if ($slidebackground == 'Photo' && $slideformat != 'Just Text (No Photo)') { $slideformat = 'Just Text (No Photo)'; }
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
					<div id="frontpageslide" class="<?php echo $slidebackground; ?> <?php echo $slideformat; ?>"
					
					<?php
					if ($slidebackground == 'bgphoto') { echo 'style="background:url('; echo $slidephoto; echo ');">'; }
					else { echo '>'; }					
					?>
						<a href="<?php echo $slidelink; ?>">
							<div id="slidecategory"><h4 class="<?php echo $slidecategoryvis; ?>"><p class="<?php echo $slidecategorytype; ?>"><?php echo $slidecategory ?></p></h4></div>
							
							<div id="slidecontent">
							
							<?php if ($slidephoto != null && $slideformat != 'textonly') { ?>
							<img src="<?php echo $slidephoto; ?>" class="<?php echo $slidephotoformat; ?>" />
							<?php }
							else { } ?>
							
							<h3 class="slidetitle" class="<?php echo $slideformat; ?>"><?php the_title(); ?></h3>
							<p class="<?php echo $slideformat; ?>"><?php the_content(); ?></p>
							
							</div><!-- #slidecontent -->
							
						</a>
					</div>

			<?php endwhile; endif; ?>

		</div><!-- #slides -->

			<?php include (STYLESHEETPATH . '/_/inc/nav.php' ); ?>

</div><!-- #content -->

<div id="sidebar">
<?php get_sidebar(); ?>
</div><!-- #sidebar -->

<?php get_footer(); ?>
