<?php get_header();?>
<div class="main-heading">
    <h1>
        <?php the_title(); ?>
    </h1>
    <!--    хлебные крошки  -->
    <div id="breadcrumbs">
        <?php if (is_home()) { ?>
        <?php } elseif (is_single()) { ?>
        <a href="<?php echo get_option('home'); ?>">Главная</a> »
        <?php foreach((get_the_category()) as $cat) {
             $cat=$cat->cat_ID;
        echo(get_category_parents($cat, TRUE, ' » ')); } the_title(); ?>
        <?php } ?>
    </div>
</div>

<?php get_sidebar();?>

<section>
    <div class="text">
        <?php while (have_posts()): the_post();?>  
        <?php the_content();?>
        <div class="text-cont">
            <h4>Контактные данные:</h4>
            <?php echo $textInput = get_post_meta($post->ID, 'my_address', true); echo '<br>';
                echo $textInput = get_post_meta($post->ID, 'my_phone', true); echo '<br>';
                echo $textInput = get_post_meta($post->ID, 'my_site', true); echo '<br>';
        ?></div>
    </div>
    

    
<!--    ссылка на редактирование статьи для админа -->
    <?php edit_post_link('[Редактировать статью]'); ?>

<!--    рейтинг поста -->
    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>

<!--    комментарии -->
    <?php 
  if (comments_open()) {
    if (get_comments_number() == 0) { ?>
    <h3>Комментариев пока нет, но вы можете стать первым</h3>
    <?php comments_template();?>
    <?php } else { ?>
    <div class="wrap-comments">
        <?php comments_template();?>
    </div>
    <?php }
  } else { ?>
    <h3>Обсуждения закрыты для данной страницы</h3>
    <?php } 
?>
    <?php endwhile; ?>

    
    
    
<div id="interesting_articles">
    <h3>Вам понравится</h3>
    <?php
        $categories = get_the_category($post->ID); ?>
    <div class="cells">
         <?php
        if ($categories) {
             $category_ids = array();
             foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
             $args=array(
             'tag__in' => $tag_ids,  //сортировка по тегам (меткам)
             'post__not_in' => array($post->ID),
             'showposts'=>3,  //количество выводимых ячеек
             'orderby'=>'rand', // в случайном порядке
             'ignore_sticky_posts'=>1); //исключаем одинаковые записи
             $my_query = new wp_query($args);
             if( $my_query->have_posts() ) {
                echo '<ul>';
                while ($my_query->have_posts()) {
                    $my_query->the_post();   ?>
                    <li>
                        <div class="cell">
                            <a onclick="return !window.open(this.href)" href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a><br>
                            <a onclick="return !window.open(this.href)" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </div>
                    </li>
                <?php
                }
                echo '</ul>';
            }
        wp_reset_query();
    }   ?>
    </div>
</div>
    
    
</section>

<?php get_footer(); ?>
