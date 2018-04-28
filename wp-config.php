<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'db_pinsk');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8Yb`NQD*`y?v7ywg[/g$;JXm~@)NZL5(FtG,9x6P%fS0S]D)rl)U PvVMG{{xsrS');
define('SECURE_AUTH_KEY',  'XAqoU;vZSc,M:8}[zc z]VQh2@fu nd1.1TyKTAzp*u!z-%?R8V-UqG7+@07zb?H');
define('LOGGED_IN_KEY',    'D3<47so9XJh~bf_a:Yc%Zeym[3vN_|wI[~EO&%jRI`42Y&FPWvEs`P;KEo,MS8~z');
define('NONCE_KEY',        'r<EP*kt@ad%RxO*~I-x@pge_L.*Kl9]m[]NU9PAA64Hrx~4%P| zJ_[wf8@huEkI');
define('AUTH_SALT',        '{3OY`+WZAR{}7~829 m[M6@L+Dg$}EuS&A,.l$|:y|(xn|UOQvg3N4hJ &u-h4C{');
define('SECURE_AUTH_SALT', 'xLzR]dJ9./P=b{C.bxv@B-6fb+M~a <?5mRT70L? kz!@#(MbkqEZDY%HZT#.<vR');
define('LOGGED_IN_SALT',   'W8+7ZZZu56L%l,mvfJ~E?$QHOL+IC^y9rJ8}3oRGJ: ~C25usgbF8$h{*E{]@.he');
define('NONCE_SALT',       '~;AZ2iufA#$=T;ll>-^3n &KyRC3/#+jCqkijfA%HEV&p E-g!//58$)x74(W(d|');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
