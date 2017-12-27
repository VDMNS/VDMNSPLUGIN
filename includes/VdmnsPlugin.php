<?php
namespace includes;

use includes\common\VdmnsDefaultOption;
use includes\common\VdmnsLoader;
use includes\custom_post_type\BookPostType;
use includes\models\admin\menu\VdmnsGuestBookSubMenuModel;

class VdmnsPlugin
{
	  private static $instance = null;

     private function __construct()  {
        VdmnsLoader::getInstance();
		  add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));

         // Создаем Custom Post Type Book
         new BookPostType();
    }
	  public static function getInstance() {
         if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
     }
	 /**
     * Если не созданные настройки установить по умолчанию
     */
    public function setDefaultOptions(){
        if( ! get_option(VDMNS_PlUGIN_OPTION_NAME) ){
            update_option( VDMNS_PlUGIN_OPTION_NAME, VdmnsDefaultOption::getDefaultOptions() );
        }
        if( ! get_option(VDMNS_PlUGIN_OPTION_VERSION) ){
            update_option(VDMNS_PlUGIN_OPTION_VERSION, VDMNS_PlUGIN_VERSION);
        }
    }
	 
	 
	 static public function activation()
    {
        // debug.log
        error_log('plugin '.VDMNS_PlUGIN_NAME.' activation');
        //Создание таблицы Гостевой книги
        VdmnsGuestBookSubMenuModel::createTable();
    }

	 static public function deactivation()
    {
        // debug.log
        error_log('plugin '.VDMNS_PlUGIN_NAME.' deactivation');
		delete_option(VDMNS_PlUGIN_OPTION_NAME);
        delete_option(VDMNS_PlUGIN_OPTION_VERSION);
    }

	 
	 
}
VdmnsPlugin::getInstance();