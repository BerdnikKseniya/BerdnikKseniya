<?php 
/*
    Template Name: Hotels
*/
?>

<?php get_header(); ?>

<article>

    <?php // отображение записей на разных страницах
        $temp = $wp_query; $wp_query= null;
        $wp_query = new WP_Query(); $wp_query->query('showposts=4' . '&paged='.$paged); //количество записей выовдится
        query_posts('cat=4');       
    
        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <h2>
        <a id="read_more" href="<?php the_permalink(); ?>" title="Читать далее">
            <?php the_title(); ?>
        </a>
    </h2><br>
    <?php the_post_thumbnail(array(100,100), array('class' => 'alignleft'));?>
    <?php the_excerpt() ?>
    <a href="<?php the_permalink(); ?>">Читать далее</a><br>
    <?php endwhile; ?>


</article>
<?php the_posts_pagination(); ?>

<?php get_footer(); ?>
