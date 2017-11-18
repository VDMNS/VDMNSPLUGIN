<?php
/*
Plugin Name: my Plugin
Plugin URI: 
Description: my.
Version: 1.0
Author: vadimmanzhos
Author URI: 
Text Domain: 
Domain Path: 
*/
require_once dirname(__FILE__).'/includes/myplugin.php';
require_once MYPLUGIN_PlUGIN_DIR.'/includes/common/StepByStepAutoload.php';

require_once MYPLUGIN_PlUGIN_DIR.'/includes/myplugin.php';

register_activation_hook( __FILE__, array('includes\myplugin' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('includes\myplugin' ,  'deactivation' ) );
