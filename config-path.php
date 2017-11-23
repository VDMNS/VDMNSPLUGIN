<?php

define("MY_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("MY_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("MY_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(MY_PlUGIN_DIR)));
define("MY_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', MY_PlUGIN_SLUG ));
define("MY_PlUGIN_OPTION_VERSION", MY_PlUGIN_SLUG.'_version');
define("MY_PlUGIN_OPTION_NAME", MY_PlUGIN_SLUG.'_options');
define("MY_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));

if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(MY_PlUGIN_DIR.'/'.basename(MY_PlUGIN_DIR).'.php', false, false);

define("MY_PlUGIN_VERSION", $TPOPlUGINs['Version']);
define("MY_PlUGIN_NAME", $TPOPlUGINs['Name']);
define("MY_PlUGIN_DIR_LOCALIZATION", plugin_basename(MY_PlUGIN_DIR.'/languages/'));
