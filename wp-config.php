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
define('DB_NAME', '697620_wp1');

/** Имя пользователя MySQL */
define('DB_USER', '697620_wp1');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'Exjg5mK2');

/** Имя сервера MySQL */
define('DB_HOST', '127.0.0.1');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'u@A3#LZ>x^YD]=sJ]-{%YxgNt3{u<%>}deSj9|0#o^K6IjQZ2>_J#`BVz`[k%I#;');
define('SECURE_AUTH_KEY',  'u y$Ze}t(B_8*/E1htcq6amd`g0=P$suFf*P0om^*8zBiNTe^ZbM4@QU|WIp0B r');
define('LOGGED_IN_KEY',    'QYNmlT@X`A-0L.0C h5<|A@ANod`Qw2O#;G5A3K?E:b}41WbP5Zk^n=jkmSu#I7;');
define('NONCE_KEY',        'n<707K%8+N6[Cd|oO>t>/ fLh#&Ln([F1~TkJO+`/Y^n_{Mp5S->r&Nj<1ClsWww');
define('AUTH_SALT',        '--g(bI}_X5jy8K{vl8Wlur}.MoWVz/+6;qlZ1<Q3-/T1v>`W`&4S)1vz@Ezefv^v');
define('SECURE_AUTH_SALT', 'A8Ru)//:}g3-8:&/rG&fq9)8`<+jDAYn5kpT%U2fH|/V9-f[rLh!hs_9:#d~j<oH');
define('LOGGED_IN_SALT',   '[X<Y6lL:[Umbo(DRP)/M&3n(e@#Ftn)Tx|5Nz59]*&x;L=hWAMVG2Zt%N0RS[_1.');
define('NONCE_SALT',       'HlM~<1!@,u>P+-B5hQZ,iL|5A)ju~mKtV#h8=+tp`[|.`genS%?thKF<<UGi:;.F');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'mt_';

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
