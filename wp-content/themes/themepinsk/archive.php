<?php get_header(); ?>

<div class="tags">
    <?php
    //вывод тегов
    $cat_id = get_query_var('cat'); // получаем ID текущей категории   
    $tags = get_tags_in_cat($cat_id);
    foreach($tags as $tag_id => $tag_name)
        $tags_print[] = '<a href="' .get_tag_link($tag_id). '">' .$tag_name. '</a>';
    echo implode($tags_print); ?>
</div>


<?php
//          query_posts( array('paged' => get_query_var('paged') ) );
    
        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

    <div class="article">
        <h2>
            <a id="read_more" href="<?php the_permalink(); ?>" title="Читать далее">
                <?php the_title(); ?>
            </a>
        </h2>
        <!--   вывод фото-миниатюры (размер и выравнивание)-->
        <?php the_post_thumbnail(array(150,150), array('class' => 'alignleft'));?> 
        <?php the_excerpt() ?>
        <a href="<?php the_permalink(); ?>">Читать далее</a><br>
    </div>
    <?php endwhile; ?>



    <?php the_posts_pagination(); ?>

    <?php get_footer(); ?>
