<?php

namespace includes\controllers\admin\menu;


class VdmnsMyPluginsMenuController extends VdmnsBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_plugins_page(
            __('Sub plugins Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            __('Sub plugins Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            'read',
            'vdmns_control_sub_plugins_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Plugins", VDMNS_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
