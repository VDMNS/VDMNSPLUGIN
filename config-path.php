<?php
define("VDMNS_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("VDMNS_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("VDMNS_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(VDMNS_PlUGIN_DIR)));
define("VDMNS_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', VDMNS_PlUGIN_SLUG ));
define("VDMNS_PlUGIN_OPTION_VERSION", VDMNS_PlUGIN_SLUG.'_version');
define("VDMNS_PlUGIN_OPTION_NAME", VDMNS_PlUGIN_SLUG.'_options');
define("VDMNS_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));
if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(VDMNS_PlUGIN_DIR.'/'.basename(VDMNS_PlUGIN_DIR).'.php', false, false);

define("VDMNS_PlUGIN_VERSION", $TPOPlUGINs['Version']);
define("VDMNS_PlUGIN_NAME", $TPOPlUGINs['Name']);
