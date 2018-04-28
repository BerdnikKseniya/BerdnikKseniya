<?php
/*
    Template Name: Profile
 */

get_header(); ?>
    <div class="main-heading">
        <h1>
            <?php the_title(); ?>
        </h1>
    </div>


    <?php global $user_ID;
 
// если пользователь не авторизован, отправляем его на страницу входа
if( !$user_ID ) {
	header('location:' . site_url() . '/wp-login.php');
	exit;
} else {
	$userdata = get_user_by( 'id', $user_ID );
}
?>
    <html>

    <body>

        <?php
// после сохранения профиля и смены пароля понадобятся уведомления
// если уведомлений больше двух, то оптимальнее их будет вывести через switch
if( isset($_GET['status']) ) :
	switch( $_GET['status'] ) :
		case 'ok':{
			echo '<div class="success">Сохранено.</div>';
			break;
		}
		case 'exist':{
			echo '<div class="error">Пользователь с указанным email уже существует.</div>';
			break;
		}
		case 'short':{
			echo '<div class="error">Пароль слишком короткий.</div>';
			break;
		}
		case 'mismatch':{
			echo '<div class="error">Пароли не совпадают.</div>';
			break;
		}
		case 'wrong':{
			echo '<div class="error">Старый пароль неверен.</div>';
			break;
		}
		case 'required':{
			echo '<div class="error">Пожалуйста, заполните все обязательные поля.</div>';
			break;
		}
	endswitch;
endif;
 
// profile-update.php - файл, который находится в папке с темой и обрабатывает сохранение
?>
            <form class="profile" action="<?php echo get_stylesheet_directory_uri() ?>/profile-update.php" method="POST">
                <div class="pol">
                    <label for="username">Имя пользователя:</label>
                    <input type="text" name="username" autocomplete="off" value="<?php echo $userdata->username ?>" />
                </div>
                <div class="pol">
                    <label for="email">Email:</label>
                    <input type="email" name="email" autocomplete="off" value="<?php echo $userdata->user_email ?>" />
                </div>
                <div class="pol">
                    <label for="first_name">Имя:</label>
                    <input type="text" name="first_name" placeholder="Имя" value="<?php echo $userdata->first_name ?>" />
                </div>
                <div class="pol">
                    <label for="last_name">Фамилия:</label>
                    <input type="text" name="last_name" placeholder="Фамилия" value="<?php echo $userdata->last_name ?>" />
                </div>
                <div class="pol">
                    <label for="city">Город:</label>
                    <input type="text" name="city" placeholder="Город" value="<?php echo get_user_meta($user_ID, 'city', true ) ?>" />
                </div>
                <div class="pol">
                    <label for="pwd1">Старый пароль:</label>
                    <input type="password" name="pwd1" placeholder="Старый пароль" />
                </div>
                <div class="pol">
                    <label for="pwd2">Новый пароль:</label>
                    <input type="password" name="pwd2" placeholder="Новый пароль" />
                </div>
                <div class="pol">
                    <label for="pwd3">Повторите новый пароль:</label>
                    <input type="password" name="pwd3" placeholder="Повторите новый пароль" />
                </div>
                    <button class="submit" type="submit">Сохранить</button>
            </form>
    </body>

    </html>

    <?php get_footer(); ?>
