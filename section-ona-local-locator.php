<?php
/*
Template Name: Section: ONA Local Locator
*/
get_header(); ?>

<?php global $more; ?>

<div id="content" class="full-page">

	<div id="ona-local-locator">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="subhead-description" id="post-<?php the_ID(); ?>">

				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<?php the_content(); ?>
				
				<br /><hr />

		</article>

	<?php endwhile; endif; ?>
	
	</div><!-- #ona-local-locator -->

</div><!-- #content .full-page -->

<?php get_footer(); ?>