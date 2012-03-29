<?php
/*
Template Name: Section: AP-Google
*/
get_header(); ?>

	<div id="content">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="post" id="post-<?php the_ID(); ?>">

			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

			<?php include (STYLESHEETPATH . '/_/inc/meta.php' ); ?>

			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php /* edit_post_link('Edit this entry.', '<p>', '</p>'); */ ?>

		</article>
		
		<?php /* comments_template(); */ ?>

		<?php endwhile; endif; ?>
		
	</div><!-- #content -->

<div id="sidebar">

	<div id="sidebar-section-header">
	<h3>AP-Google Scholarship</h3>
	</div><!-- #sidebar-section-header" -->

	<nav id="section-nav"><?php wp_nav_menu( array('menu' => 'Section: AP-Google' )); ?></nav>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>