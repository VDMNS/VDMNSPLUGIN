<?php
/*
Plugin Name: my Plugin
Plugin URI: 
Description: my.
Version: 1.0
Author: vadimmanzhos
Author URI: 
Text Domain: vdmns-plugin
Domain Path: /languages/
*/
require_once plugin_dir_path(__FILE__) . '/config-path.php';
require_once VDMNS_PlUGIN_DIR.'/includes/common/VdmnsAutoload.php';
require_once dirname(__FILE__).'/includes/VdmnsPlugin.php';
register_activation_hook( __FILE__, array('includes\VdmnsPlugin' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('includes\VdmnsPlugin' ,  'deactivation' ) );