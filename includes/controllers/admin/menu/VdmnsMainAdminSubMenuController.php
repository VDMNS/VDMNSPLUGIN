<?php

namespace includes\controllers\admin\menu;


class VdmnsMainAdminSubMenuController extends VdmnsBaseAdminMenuController
{

    /**
     *
     */
    public function action()
    {
        // TODO: Implement action() method.
        $plugin_page = add_submenu_page(
            VDMNS_PlUGIN_TEXTDOMAIN,
            _x(
                'Sub Step By Step',
                'admin menu page' ,
                VDMNS_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Sub Step By Step',
                'admin menu page' ,
                VDMNS_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'vdmns_control_sub_menu',
            array(&$this, 'render'));
    }

    /**
     *
     */
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello world sub menu", VDMNS_PlUGIN_TEXTDOMAIN);
    }

    /**
     * @return VdmnsMainAdminSubMenuController
     */
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
