<?php



namespace includes;

class myplugin
{
    private static $instance = null;
    private function __construct() {
    }
    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }
}
myplugin::getInstance();


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
StepByStepPlugin::getInstance();