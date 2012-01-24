<div id="sidebar-posts">

	<?php rewind_posts(); ?>
	
	<?php if (have_posts()) : ?>

			<div id="sidebar-posts-header">
 			
			<h3>Latest news</h3>
			
			<hr />
			
			</div><!-- #content-header -->
			
			<ul class="sidebar-posts-list">
			
				<?php query_posts('category_name=news&posts_per_page=5'); ?>

				<?php while (have_posts()) : the_post(); ?>

				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

				<?php endwhile; ?>

			</ul>
			
	<?php else : ?>

	<?php endif; ?>
	
</div><!-- #sidebar-posts -->