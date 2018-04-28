<?php
// $_SERVER['HTTP_REFERER'] - полный URL страницы, откуда пришел пользователь
// $url[0] - без GET параметров
// для правильных редиректов
$url = explode("?",$_SERVER['HTTP_REFERER']);
 
// подключаем WordPress
// тут указан правильный путь (profile-update.php в папке с темой)
require_once( dirname(__FILE__) . '/../../../wp-load.php' );
 
// если не авторизован, просто выходим из файла
if( !is_user_logged_in() ) exit;
 
// получаем объект пользователя с необходимыми данными
$user_ID = get_current_user_id();
$user = get_user_by( 'id', $user_ID );
 
 
// сначала обработаем пароли: если при сохранении пользователь ничего не указал ни в одном поле пароля, то пропускаем эту часть
if( $_POST['pwd1'] || $_POST['pwd2'] || $_POST['pwd3'] ) {
    
	// при этом пользователь должен заполнить все поля
	if( $_POST['pwd1'] && $_POST['pwd2'] && $_POST['pwd3'] ) {
 
		// сначала проверяем соответствие нового пароля и его подтверждения
		if( $_POST['pwd2'] == $_POST['pwd3'] ){
 
			// пароль минимум 8 символов
			if( strlen( $_POST['pwd2'] ) < 6 ) {
				// если слишком короткий - перенаправляем
				header('location:' . $url[0] . '?status=short');
				exit;
			}
 
			//проверяем, правильно ли указан старый пароль (важно!)
			if( wp_check_password( $_POST['pwd1'], $user->data->user_pass, $user->ID) ) {
				// если да, меняем на новый и заново авторизуем пользователя
				wp_set_password( $_POST['pwd2'], $user_ID );
				$creds['user_login'] = $user->user_login;
				$creds['user_password'] = $_POST['pwd2'];
				$creds['remember'] = true;
				$user = wp_signon( $creds, false );
			} else {
				// если нет, перенаправляем на ошибку
				header('location:' . $url[0] . '?status=wrong');
				exit;
			}
 
		} else {
			// новый пароль и его подтверждение не соответствуют друг другу
			header('location:' . $url[0] . '?status=mismatch');
			exit;
		}
 
	} else {
		// не все поля заполнены - перенеправляем
		header('location:' . $url[0] . '?status=required');
		exit;
	}
}
 
//Имя, Фамилия и Емайл - обязательные поля, Город - не обязательное
if( $_POST['first_name'] && $_POST['last_name'] && is_email($_POST['email']) ) {
 
	// если пользователь указал новый емайл, а кто-то уже под ним зареган - отправляем на ошибку
	if( email_exists( $_POST['email'] ) && $_POST['email'] != $user->user_email ) {
		header('location:' . $url[0] . '?status=exist');
		exit;
	}
 
	// обновляем данные пользователя
	wp_update_user( array( 
			'ID' => $user_ID, 
			'user_email' => $_POST['email'],
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'display_name' => $_POST['first_name'] . ' ' . $_POST['last_name'] ));
 
	// город обновляем
	update_user_meta( $user_ID, 'city', $_POST['city']);
} else {
	// не все поля заполнены - перенеправляем
	header('location:' . $url[0] . '?status=required');
	exit;
}
 
 
// если выполнение кода дошло до сюда - статус ок
header('location:' . $url[0] . '?status=ok');
exit;
