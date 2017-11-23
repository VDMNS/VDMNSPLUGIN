<?php



namespace includes;
use includes\common\MyLoader;
class myplugin
{
    private static $instance = null;
    private function __construct() {
		MyLoader::getInstance();
    }
    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }




static public function activation()
    {
        // debug.log
        error_log('plugin '.myplugin.' activation');
    }

    static public function deactivation()
    {
        // debug.log
        error_log('plugin '.myplugin.' deactivation');
    }
}
MyPlugin::getInstance();