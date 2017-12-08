<?php
namespace includes\controllers\admin\menu;

use includes\common\VdmnsRequestApi;
use includes\models\admin\menu\VdmnsMainAdminMenuModel;


class VdmnsMainAdminMenuController extends VdmnsBaseAdminMenuController
{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = VdmnsMainAdminMenuModel::newInstance();
    }

    public function action()
    {
        // TODO: Implement action() method.
        /**
         * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
         *
         */
        $pluginPage = add_menu_page(
            _x(
                'Vdmns plugin',
                'admin menu page' ,
                VDMNS_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Vdmns plugin',
                'admin menu page' ,
                VDMNS_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            VDMNS_PlUGIN_TEXTDOMAIN,
            array(&$this,'render'),
            VDMNS_PlUGIN_URL .'assets/images/main-menu.png'
        );
    }

    /**
     * ����� ���������� �� ������� ��������
     */
    public function render()
    {
        // TODO: Implement render() method.
	/*_e("Hello world", VDMNS_PlUGIN_TEXTDOMAIN);
	$reuestAPI = VdmnsRequestApi::getInstance();
    var_dump($reuestAPI->getCalendarPricesMonth('RUB', 'MOW', 'LED'));*/
	  $pathView = VDMNS_PlUGIN_DIR."/includes/views/admin/menu/VdmnsMainAdminMenu.view.php";
        $this->loadView($pathView);

    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}