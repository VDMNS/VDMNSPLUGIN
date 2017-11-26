<?php



namespace includes\common;
class VdmnsLoaderScript
{
    private static $instance = null;

    private function __construct(){
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin' ) );
            add_action('admin_head', array(&$this, 'loadHeadScriptAdmin'));
        } else {
            add_action( 'wp_enqueue_scripts', array(&$this, 'loadScriptSite' ) );
            add_action('wp_head', array(&$this, 'loadHeadScriptSite'));
            add_action( 'wp_footer', array(&$this, 'loadFooterScriptSite'));
        }

    }

    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function loadScriptAdmin($hook){
		wp_register_script(
            VDMNS_PlUGIN_SLUG.'-AdminMain', //$handle
            VDMNS_PlUGIN_URL.'assets/admin/js/VdmnsAdminMain.js', //$src
            array(
                'jquery'
            ), //$deps
            VDMNS_PlUGIN_VERSION, //$ver
            true //$$in_footer
        );
/**
         * Добавляет скрипт, только если он еще не был добавлен и другие скрипты от которых он зависит зарегистрированы.
         * Зависимые скрипты добавляются автоматически.
         */
        wp_enqueue_script(VDMNS_PlUGIN_SLUG.'-AdminMain');

	}
    public function loadHeadScriptAdmin(){}
    public function loadScriptSite($hook){}
    public function loadHeadScriptSite(){}
    public function loadFooterScriptSite(){}
}
