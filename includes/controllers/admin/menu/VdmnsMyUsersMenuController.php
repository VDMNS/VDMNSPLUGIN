<?php


  namespace includes\controllers\admin\menu;


class VdmnsMyUsersMenuController extends VdmnsBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_users_page(
            __('Sub users Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            __('Sub users Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            'read',
            'vdmns_control_sub_users_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Users", VDMNS_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}

