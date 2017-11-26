<?php

namespace includes\controllers\admin\menu;


class VdmnsMyThemeMenuController extends VdmnsBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_theme_page(
            __('Sub theme Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            __('Sub theme Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            'read',
            'vdmns_control_sub_theme_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Theme", VDMNS_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
