<?php 
/*
    Template Name: Showplaces
*/
?>

<?php get_header(); ?>

<article>
    <?php
    
    //вывод тегов
    $cat_id = get_query_var('cat'); // получаем ID текущей категории   
    $tags = get_tags_in_cat($cat_id);
    foreach($tags as $tag_id => $tag_name)
        $tags_print[] = '<a href="' .get_tag_link($tag_id). '">' .$tag_name. '</a>';
    echo implode($tags_print);

    
     // отображение записей на разных страницах
        $temp = $wp_query; $wp_query= null;
        $wp_query = new WP_Query(); 
        $wp_query->query('showposts=1' . '&paged='.$paged); //количество записей выовдится
    
        query_posts( array( 'cat' => 5, 'paged' => get_query_var('paged') ) ); // выбор категории (рубрики) + пагинация
    
        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <h2>
            <a id="read_more" href="<?php the_permalink(); ?>" title="Читать далее">
                <?php the_title(); ?>
            </a>
        </h2><br>
        <?php the_post_thumbnail(array(150,150), array('class' => 'alignleft'));?>
        <?php the_excerpt() ?>
        <a href="<?php the_permalink(); ?>">Читать далее</a><br>
        <?php endwhile; ?>


</article>
<?php the_posts_pagination(); ?>

<?php get_footer(); ?>
