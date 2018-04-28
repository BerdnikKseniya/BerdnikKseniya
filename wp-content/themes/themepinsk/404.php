<?php get_header(); ?>
<div class="main-heading">
	<h1><?php the_title(); ?></h1>
</div>
<?php get_sidebar(); ?>
<section>
	<p><?php echo __('Ошибка 404'); ?></p>
</section>
<?php get_footer(); ?>