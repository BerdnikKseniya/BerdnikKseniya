<?php get_header(); ?>
<div class="main-heading">
    <h1>Поиск</h1>
</div>
<section>
    <div class="search-content">
        <h2 class="content-heading">
            <?php printf(__('Результаты поиска: %', 'pinsk-view'), get_search_query()); ?>
        </h2>
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <h3>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <?php the_post_thumbnail(array(100,100), array('class' => 'alignleft'));?>
        <p>
            <?php the_excerpt(); ?>
        </p>
        <?php endwhile;	else:?>
        <p>
            <?php echo __('Извините, не найдено результатов по запросу', 'pinsk-view'); ?>
        </p>
        <?php endif; ?>
    </div>

    <div class="advanced-search-form">
        <form method="get" action="<?php bloginfo('url'); ?>">
            <fieldset title="ПОИСК">
                <legend>Поиск</legend>
                <input type="text" name="s" value="" placeholder="поиск..." maxlength="50" required="required" />
                <!--
            <select name="category_name">
                <?php
                // генератор списка рубрик
                $categories = get_categories();
                foreach ($categories as $category) {
                    echo '<option value="', $category->slug, '">', $category->name, "</option>\n";                   
                }
                ?>                
            </select>
-->
                <p>Уточните пожалуйста для конкретного поиска:</p>
                <?php
            // генератор списка меток
            $tags = get_tags();
            foreach ($tags as $tag) {
                echo
                    '<label>',
                    '<input type="checkbox" name="taglist[]" value="',  $tag->slug, '" /> ',
                    $tag->name,
                    "</label>\n";
            }
            ?>
                    <br><button type="submit" class="alignright">Поиск</button>
            </fieldset>
        </form>
    </div>
</section>
<?php get_footer(); ?>
