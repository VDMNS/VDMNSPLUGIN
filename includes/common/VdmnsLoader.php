<?php
/**
 * Created by PhpStorm.
 * User: vdmnzs
 * Date: 
 * Time: 
 */
namespace includes\common;
use includes\controllers\admin\menu\VdmnsGuestBookSubMenuController;
use includes\controllers\admin\menu\VdmnsMainAdminMenuController;
use includes\controllers\admin\menu\VdmnsMainAdminSubMenuController;
use includes\controllers\admin\menu\VdmnsMyCommentsMenuController;
use includes\controllers\admin\menu\VdmnsMyDashboardMenuController;
use includes\controllers\admin\menu\VdmnsMyMediaMenuController;
use includes\controllers\admin\menu\VdmnsMyOptionsMenuController;
use includes\controllers\admin\menu\VdmnsMyPagesMenuController;
use includes\controllers\admin\menu\VdmnsMyPluginsMenuController;
use includes\controllers\admin\menu\VdmnsMyPostsMenuController;
use includes\controllers\admin\menu\VdmnsMyThemeMenuController;
use includes\controllers\admin\menu\VdmnsMyToolsMenuController;
use includes\controllers\admin\menu\VdmnsMyUsersMenuController;
use includes\controllers\site\shortcodes\VdmnsCalendarPricesMonthShortcodeController;
use includes\example\VdmnsExampleAction;
use includes\example\VdmnsExampleFilter;

class VdmnsLoader
{
    private static $instance = null;
    private function __construct(){
        // is_admin() Условный тег. Срабатывает когда показывается админ панель сайта (консоль или любая
        // другая страница админки).
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            // Когда в админке вызываем метод admin()
            $this->admin();
        } else {
            // Когда на сайте вызываем метод site()
            $this->site();
        }
        $this->all();
    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    /**
     * Метод будет срабатывать когда вы находитесь в Админ панеле. Загрузка классов для Админ панели
     */
    public function admin(){

		VdmnsMainAdminMenuController::newInstance();
        VdmnsGuestBookSubMenuController::newInstance();
		VdmnsMainAdminSubMenuController::newInstance();
        VdmnsMyDashboardMenuController::newInstance();
        VdmnsMyPostsMenuController::newInstance();
        VdmnsMyMediaMenuController::newInstance();
        VdmnsMyPagesMenuController::newInstance();
        VdmnsMyCommentsMenuController::newInstance();
        VdmnsMyThemeMenuController::newInstance();
        VdmnsMyPluginsMenuController::newInstance();
        VdmnsMyUsersMenuController::newInstance();
        VdmnsMyToolsMenuController::newInstance();
        VdmnsMyOptionsMenuController::newInstance();
    }
    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
		VdmnsCalendarPricesMonthShortcodeController::newInstance();
    }
    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){
       VdmnsLocalization::getInstance();
	   VdmnsLoaderScript::getInstance();

        /*$MyExampleAction = MyExampleAction::newInstance();
        $vdmnsExampleFilter = VdmnsExampleFilter::newInstance();
       $vdmnsExampleFilter->callMyFilter("Roman");
       $vdmnsExampleFilter->callMyFilterAdditionalParameter("Roman", "Softgroup", "Poltava");
      $vdmnsExampleAction = VdmnsExampleAction::newInstance();
       $vdmnsExampleAction->callMyAction();
       $vdmnsExampleAction->callMyActionAdditionalParameter( 'test1', 'test2', 'test3' );*/
	   
    }
}