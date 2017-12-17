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
        //wp_enqueue_script(VDMNS_PlUGIN_SLUG.'-AdminMain');
		
		
		 /**
         * wp_register_style( $handle, $src, $deps, $ver, $media );
         * Регистрирует CSS файл в WordPress. После регистрации файл можно добавить в html документ с помощью
         * функции wp_enqueue_style().
         *
         */
        wp_register_style(
            VDMNS_PlUGIN_SLUG.'-AdminMain', //$handle
            VDMNS_PlUGIN_URL.'assets/admin/css/StepByStepAdminMain.css', // $src
            array(), //$deps,
            VDMNS_PlUGIN_VERSION // $ver
        );
        /**
         * Правильно добавляет файл CSS стилей. Регистрирует файл стилей, если он еще не был зарегистрирован.
         */
        wp_enqueue_style(VDMNS_PlUGIN_SLUG.'-AdminMain');
    }

	
    public function loadHeadScriptAdmin(){
		
        ?>
            <script type="text/javascript">
                var vdmnsAjaxUrl;
                vdmnsAjaxUrl  = '<?php echo VDMNS_PlUGIN_AJAX_URL; ?>';
            </script>
        <?php
    }




	
    public function loadScriptSite($hook){}
    public function loadHeadScriptSite(){}
    public function loadFooterScriptSite(){}
}
