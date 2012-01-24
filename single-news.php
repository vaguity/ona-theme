<?php get_header(); ?>

	<div id="content">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
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

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php /* edit_post_link('Edit this entry.', '<p>', '</p>'); */ ?>

		</article>
		
		<?php comments_template(); ?>

		<?php endwhile; endif; ?>
		
	</div><!-- #content -->

<div id="sidebar">

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

<?php get_sidebar(); ?>
</div><!-- #sidebar -->

<?php get_footer(); ?>
