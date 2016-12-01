<?php
/**
* Single.php
*
* Single post file for Giornalismo
*
* @author Jacob Martella
* @package Giornalismo
* @version 1.0.3
*/
get_header(); ?>
<?php get_sidebar(); ?>
<?php while(have_posts()) : the_post(); ?>
	<main class="post-single">
		<?php if (esc_attr(get_theme_mod('giornalismo-breadcrumbs')) == 1) { echo giornalismo_breadcrumbs(); } ?>
		<article id="<?php the_ID(); ?>" <?php post_class('single-story'); ?>>
			<?php if (get_post_meta($post->ID, 'giornalismo_featured_video', true)) { ?>
				<div class="featured-video">
					<?php echo wp_oembed_get(get_post_meta($post->ID, 'giornalismo_featured_video', true)); ?>
				</div>
			<?php } elseif (has_post_thumbnail()) { ?>
				<div class="featured-photo">
					<?php the_post_thumbnail('single'); ?>
				</div>
			<?php } else { } ?>
			<?php if (get_post_meta($post->ID, 'giornalismo_photo_caption', true)) { ?>
				<p class="caption"><?php echo get_post_meta($post->ID, 'giornalismo_photo_caption', true); ?></p>
			<?php } ?>
			<?php if (get_post_meta($post->ID, 'giornalismo_photo_credit', true)) { ?>
				<p class="photo-credit"><?php echo get_post_meta($post->ID, 'giornalismo_photo_credit', true); ?></p>
			<?php } ?>
			<header class="story-header">
				<h3 class="headline"><?php the_title(); ?></h3>
				<h5 class="byline"><?php echo giornalismo_author_byline(); ?><?php the_time('M j, Y');?>, <?php comments_popup_link(__('0 Comments', 'giornalismo'), __('1 Comment', 'giornalismo'), __('% Comments', 'giornalismo'),'', __('Comments Off', 'giornalismo')); ?>
			</header>
			<hr />
			<!--Grab the story lines if there are any-->
			<?php echo giornalismo_story_lines(); ?>
			<?php the_content(); ?>
			<p class="tags"><?php the_tags('<strong>' . __('Tags: ', 'giornalismo') . '</strong>'); ?></p>
		</article>
		<!--Get the comments template-->
		<section class="comments-area">
			<?php comments_template(); ?>
		</section>
		<!--Get the related stories-->
		<?php echo giornalismo_related_stories(get_the_ID()); ?>
		<!--Get the latest stories in the category-->
		<?php echo giornalismo_latest_stories(get_the_category()); ?>
		<!--Get the author bio-->
		<?php echo giornalismo_author_bio(); ?>
	</main> 
<?php endwhile; ?>
<!--Begin Mobile Sidebar-->
<section class="mobile-sidebar">
</section>
<!--End Mobile Sidebar-->
<?php get_footer(); ?>