<?php
/*
Plugin Name: Register user
Author: Berdnik Kseniya
*/
?>
<?php 
function registration_form( $username, $password, $email, $first_name, $last_name) {
    echo '
    <style>
    div {
        margin-bottom:2px;
    }
      
    input{
        margin-bottom:4px;
    }
    </style>
    ';
  
    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div>
    <label for="username">Логин <strong>*</strong></label>
    <input type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    </div>
      
    <div>
    <label for="password">Пароль <strong>*</strong></label>
    <input type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    </div>
      
    <div>
    <label for="email">Email <strong>*</strong></label>
    <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    </div>
      
    <div>
    <label for="firstname">Имя</label>
    <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    </div>
    
    <div>
    <label for="lastname">Фамилия</label>
    <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    </div>
      
    <input type="submit" name="submit" value="Регистрация"/>
    </form>
    ';
}

function registration_validation( $username, $password, $email, $first_name, $last_name )  {
    global $reg_errors;
    $reg_errors = new WP_Error;
    
    if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
        $reg_errors->add('field', 'Обязательные поля не заполнены!');        
        
        if ( 4 > strlen( $username ) ) {
            $reg_errors->add( 'username_length', 'Имя короткое. Не меньше 4 символов.' );
        }
        if ( username_exists( $username ) ) 
            $reg_errors->add('user_name', 'Извините, пользователь с таким именем уже существует!');
            
        if ( ! validate_username( $username ) ) {
            $reg_errors->add( 'username_invalid', 'Извините, это имя недоступно!' );
        }
            
        if ( 5 > strlen( $password ) ) {
            $reg_errors->add( 'password', 'Пароль не может быть меньше 5 символов.' );
        }
            
        if ( !is_email( $email ) ) {
            $reg_errors->add( 'email_invalid', 'Не верно введен email.' );
        }
            
        if ( email_exists( $email ) ) {
            $reg_errors->add( 'email', 'Email используется другим пользователем.' );
        }
                        
        if ( is_wp_error( $reg_errors ) ) {  
            foreach ( $reg_errors->get_error_messages() as $error ) {      
                echo '<div>';
                echo '<strong>ОШИБКА</strong>:';
                echo $error . '<br/>';
                echo '</div>';          
            }                    
        }
    }
}

//обработка регистрации пользователя
function complete_registration() {
    global $reg_errors, $username, $password, $email, $first_name, $last_name;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        );
        $user = wp_insert_user( $userdata );
        echo 'Регистрация окончена. Можете перейти в <a href="' . get_site_url() . '/wp-login.php">профиль</a>.';   
    }
}

//Активация всех функций
function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['username'],
        $_POST['password'],
        $_POST['email'],
        $_POST['fname'],
        $_POST['lname']
        );
          
        // sanitize user form input
        global $username, $password, $email, $first_name, $last_name;
        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );
        $first_name =   sanitize_text_field( $_POST['fname'] );
        $last_name  =   sanitize_text_field( $_POST['lname'] );
  
        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $username,
        $password,
        $email,
        $first_name,
        $last_name
        );
    }
  
    registration_form(
        $username,
        $password,
        $email,
        $first_name,
        $last_name
        );
}

// Регистрируем новый shortcode: [cr_custom_registration]
add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
  
// Функция обратного вызова, которая заменит [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}
?>
