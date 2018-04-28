<?php

if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"), false, '3.3.1');
        wp_enqueue_script('jquery');
}

function enqueue_styles() {
 wp_enqueue_style( 'pinsk-view-style', get_stylesheet_uri());
 wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');


//function enqueue_scripts () {
// wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
// wp_enqueue_script('html5-shim');
//}
//add_action('wp_enqueue_scripts', 'enqueue_scripts');

remove_filter('the_content', 'wpautop');


//добавление меню:
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}


//кнопка НАВЕРХ
add_action( 'wp_footer', 'back_to_top' );
function back_to_top() {
    echo '<img id="totop" src="http://pinsk/wp-content/themes/themepinsk/images/icons/icon_up.png" />';
}

add_action( 'wp_head', 'back_to_top_style' );
function back_to_top_style() {
    echo '<style type="text/css">
    #totop {
        cursor:pointer;
        position: fixed;
        right: 30px;
        bottom: 30px;
        display: none;
        outline: none;
    }
    </style>';
}
 
add_action( 'wp_footer', 'back_to_top_script' );
function back_to_top_script() {
    echo '<script type="text/javascript">
    jQuery(document).ready(function($){
        $(window).scroll(function () {
            if ( $(this).scrollTop() > 90 )
            $("#totop").fadeIn();
            else
            $("#totop").fadeOut();
        });

        $("#totop").click(function () {
            $("body,html").animate({ scrollTop: 0 }, 800 );
            return false;
        });
    });
    </script>';
}

// для добавления фото в записях
add_theme_support( 'post-thumbnails' ); 
//размер миниатюр
set_post_thumbnail_size( 136, 101, true );



//-----------------------------------------------------------------------------КОММЕНТАРИИ


//подсчет сообщений пользователей
//function  bac_comment_count_per_user() {
//    global $wpdb;
//    $comment_count = $wpdb->get_var(
//    'SELECT COUNT(comment_ID) FROM '. $wpdb->comments. '
//    WHERE comment_author_email = "' . get_comment_author_email() .'"
//    AND comment_approved = "1"
//    AND comment_type NOT IN ("pingback", "trackback")'
//    );
//    if ( $comment_count == 1) {
//        echo ' 1 Сообщение';
//    }
//    else {
//        echo ' ' . $comment_count . ' Сообщений';
//    }
//}

//статус пользователя
//function get_author_class($comment_author_email,$user_id){
//    global $wpdb;
//    $adminEmail = get_option('admin_email');
//    $author_count  =  count($wpdb->get_results(
//    "SELECT comment_ID as author_count FROM  $wpdb->comments WHERE comment_author_email = '$comment_author_email' "));
//    if($comment_author_email ==$adminEmail)
//        echo '<a class="vp" target="_blank" href="http://wordsmall.ru/" title="Администратор сайта">Админ</a>';
//    if($user_id!=0 && $comment_author_email !=$adminEmail)
//        echo '<a class="vip" target="_blank" href="" title="Зарегистрированный пользователь">UseR</a>';
//    if($author_count>=1 && $author_count<50 && $comment_author_email !==$adminEmail)
//        echo '<a class="vip1" target="_blank" href="" title="Сообщений от 1 до 50">Прохожий</a>';
//    else if($author_count>=50 && $author_count<100 && $comment_author_email !==$adminEmail)
//        echo '<a class="vip2" target="_blank" href="" title="Сообщений от 50 до 100">Новичок</a>';
//    else if($author_count>=100 && $author_count<250 && $comment_author_email !==$adminEmail)
//        echo '<a class="vip3" target="_blank" href="" title="Сообщений от 100 до 250">Знающий</a>';
//    else if($author_count>=250 && $author_count<400 && $comment_author_email !==$adminEmail)
//        echo '<a class="vip4" target="_blank" href="" title="Сообщений от 250 до 400">Опытный</a>';
//    else if($author_count>=400 &&$author_count<800 && $comment_author_email !==$adminEmail)
//        echo '<a class="vip5" target="_blank" href="" title="Сообщений от 400 до 800">Бывалый</a>';
//    else if($author_count>=800 && $author_count<1200 && $comment_author_email !==$adminEmail)
//        echo '<a class="vip6" target="_blank" href="" title="Сообщений от 800 до 1200">СуперПупер</a>';
//    else if($author_count>=1200 && $comment_author_email !==$adminEmail)
//        echo '<a class="vip7" target="_blank" href="" title="Сообщений от 1200 до бесконечности">Профессор</a>';
//}



// кнопки удалить, редактировать в комментариях
function comment_manage_link($id) {
            global $comment, $post;
            $id = $comment->comment_ID;
            if(current_user_can( 'moderate_comments', $post->ID )){
                    if ( null === $link ) $link = __('Редактировать');
                    $link = '<a class="comment-edit-link" href="' . get_edit_comment_link( $comment->comment_ID ) . '" title="' . __( 'Редактировать комментарий' ) . '">' . $link . '</a>';
                    $link = $link . ' | <a href="'.admin_url("comment.php?action=cdc&c=$id").'">Удалить</a> ';
                    $link = $before . $link . $after;
                    return $link;
            }

    }
    add_filter('edit_comment_link', 'comment_manage_link');



//Удаление ссылки replytocom
add_filter('comment_reply_link', 'add_nofollow', 420, 4);
function add_nofollow($link, $args, $comment, $post){
return preg_replace( '/href=\'(.*(\?|&)replytocom=(\d+)#respond)/', 'href=\'#comment-$3', $link );
}
//Добавить комментарий ответ ссылки в nofollow
function add_nofollow_to_reply_link( $link ) {
    return str_replace( '")\'>', '")\' rel=\'nofollow\'>', $link );
}
add_filter( 'comment_reply_link', 'add_nofollow_to_reply_link' );


//отвечать на комментарии сразу под комментарием
function wp_comments_queue_js() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
}
add_action( 'wp_enqueue_scripts', 'wp_comments_queue_js' );



//вывод меток на странице рубрики
function get_tags_in_cat($cat_id)
{
    $posts = get_posts( array('category' => $cat_id, 'numberposts' => -1) );
    $tags = array();
  
    foreach($posts as $post)
    {
        $post_tags = get_the_tags($post->ID);
        if( !empty($post_tags) )
            foreach($post_tags as $tag)
                $tags[$tag->term_id] = $tag->name;
    }
    asort($tags);
    return $tags;
}


//убрать текст на пагинации
add_filter('navigation_markup_template', 'my_navigation_markup_template');
function my_navigation_markup_template() {
     return '
     <nav class="navigation %1$s" role="navigation">
         <div class="nav-links">%3$s</div>
     </nav>';
}


// расширенные возможности поиска: по меткам
function advanced_search_query($query) {
    if($query->is_search()) {
        // поиск по тегам (меткам)
        if (isset($_GET['taglist']) && is_array($_GET['taglist'])) {
            $query->set('tag_slug__and', $_GET['taglist']);
        }
        return $query;
    }
}
add_action('pre_get_posts', 'advanced_search_query', 1000);


//перенаправление страницы вход/регистрация на свои
//add_action('init','possibly_redirect');
//function possibly_redirect(){
// global $pagenow;
// if( 'wp-login.php' == $pagenow ) {
//  wp_redirect('http://pinsk/#modal');
//  exit();
// }
//}




// добавление дополнительного поля
function my_meta_box() {  
    add_meta_box(  
        'my_meta_box', // id
        'Контактные данные', // заголовок области с мета-полями -title
        'show_my_metabox', // вызов-callback
        'post', // отображение поля: в Записях
        'normal', 
        'high');
}  
add_action('add_meta_boxes', 'my_meta_box'); // запуск функции

// поля
$meta_fields = array(  
    array(  
        'label' => 'Адрес',  
        'desc'  => 'Город, улица, дом, оф./кв.',  
        'id'    => 'my_address', // id
        'type'  => 'text'  // тип поля
    ), 
    array(  
        'label' => 'Телефон',  
        'desc'  => 'Телефон с кодом +375 хх ххх-хх-хх.',  
        'id'    => 'my_phone', // id
        'type'  => 'text'  // тип поля
    ), 
        array(  
        'label' => 'Сайт',  
        'desc'  => 'Личный сайт/ эл. почта.',  
        'id'    => 'my_site', // id
        'type'  => 'text'  // тип поля
    ), 
);

// Вызов метаполей  
function show_my_metabox() {  
global $meta_fields; // массив с полями - глобальный
global $post;  // глобал $post для получения id создаваемого/редактируемого поста
// вывод скрытого input, для верификации
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
    // вывод таблицы с полями через цикл
    echo '<table class="form-table">';  
    foreach ($meta_fields as $field) {  
        // получение значения если оно есть для этого поля 
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // вывод таблицы
        echo '<tr> 
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                <td>';  
                switch($field['type']) {  
                    // вывод текстового поля                        
                    case 'text':  
                        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
                            <br /><span class="description">'.$field['desc'].'</span>';  
                    break;
                                    }
                            echo '</td></tr>';  
                        }  
    echo '</table>'; 
}

// функция для сохранения
function save_my_meta_fields($post_id) {  
    global $meta_fields;  // массив с полями
    
    // проверка проверочного кода
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))   
        return $post_id;  
    // проверка авто-сохранения 
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    // проверяка прав доступа  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
 
    // если все ок, то через foreach весь массив
    foreach ($meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true); // получение старых данных (если они есть), для сверки
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  // если данные новые
            update_post_meta($post_id, $field['id'], $new); // обновление данных
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old); // если данных нет, удаление мета.
        }  
    }   
}  
add_action('save_post', 'save_my_meta_fields'); // запуска функции сохранения




?>
