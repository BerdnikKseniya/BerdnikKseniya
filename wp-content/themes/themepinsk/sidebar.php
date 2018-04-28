<aside>
    <nav class="aside-navigation">
        <!--		<? wp_nav_menu(array('menu' => 'aside-menu', 'menu_class' => 'aside-menu')); ?>-->

<!--похожие записи исходя из рубрики и меток-->
        <?php
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args=array(
        'tag__in' => $tag_ids,
        'post__not_in' => array($post->ID),
        'showposts'=>5, // количество постов
        'caller_get_posts'=>1
        );
    $my_query = new wp_query($args);
        if( $my_query->have_posts() ) {
            echo '<h3>Похожие места отдыха</h3><ul>';
            while ($my_query->have_posts()) {
                $my_query->the_post();
                ?>
            <li>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Ссылка на <?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </li>
            <?php
            }
            echo '</ul>';
        }
    }
?>

    </nav>
    
<!--
	<h2 class="sidebar-heading"><?php echo __('Гостиницы', 'pinsk-view'); ?></h2>
	<div class="map">
		<img src="<?php bloginfo('template_url'); ?>/images/sample.png" width="230" height="180" alt="<?php echo __('Гостиницы', 'pinsk-view'); ?>">
	</div>
-->

</aside>
