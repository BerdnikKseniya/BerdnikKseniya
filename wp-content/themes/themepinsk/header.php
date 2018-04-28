<!doctype html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title('&laquo;', true, 'right'); ?>
        <?php bloginfo('name'); ?>
    </title>
    <!--    для связи с другими сайтами-->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <div class="logo">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1280 124" style="enable-background:new 0 0 1280 124;" xml:space="preserve">
                        <text transform="matrix(0.9767 0 0 1 493.998 88.9971)" class="logosvg">ПіНСК</text>
                </svg>

            <!-- поиск -->
            <div class="search-icon">
                <?php get_search_form(); ?>
            </div>


        </div>

        <div class="user">
            <?php if(is_user_logged_in()) {
    
            global $user_ID, $user_identity;
            get_currentuserinfo();
            if (!$user_ID):
            ?>

            <?php else: ?>
            <h3>Добро пожаловать,
               <a href="http://pinsk/userprofile"><?php echo $user_identity; ?></a>.</h3>
            <?php $current_page = $_SERVER['REQUEST_URI']; ?>
            <a href="<?php echo wp_logout_url($current_page); ?>"><img src="images/icons/icon_logout.png" id="icon-logout"></a>
            <?php endif; ?>
            <?php if (current_user_can('level_10')){ ?><br/>
            <div class="admin">
                <a href="<?php bloginfo('url'); ?>/wp-admin/">Администрирование</a> </div>
            <?php } ?>
            <?php }
            
            else 
                {?>
            <a href="http://pinsk/registraciya"><img src="images/icons/icon_user.png" id="icon-registr"></a>
            <label class="link" for="hider" id="clickme"><img src="images/icons/icon_login.png" id="icon-login"></label>
            <?php }  ?>

            <input type="checkbox" id="hider">

            <div class="lo">
                <form name="loginform" action="<?php echo get_settings('siteurl'); ?>/wp-login.php" method="post">
                    <div class="form-row">
                        <input type="text" name="log" required autocomplete="off" id="login"><label for="login">Логин</label>
                    </div>
                    <div class="form-row">
                        <input type="password" name="pwd" required autocomplete="off" id="password"><label for="password">Пароль</label>
                    </div>
                    <input id="log" type="submit" name="submit" value="Войти" id="enter"><br/>
                    <div>
                        <!--
                    <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                    <a href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=lostpassword">Забыли пароль?</a>
-->

                    </div>
                </form>
            </div>



        </div>

    </header>

    <!--    отображаем меню на странице -->
    <nav class="main-navigation">
        <? wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
    </nav>

    <div class="wrapper">
