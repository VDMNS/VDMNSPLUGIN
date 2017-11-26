<?php

namespace includes\controllers\admin\menu;


class SVdmnsMyMediaMenuController extends VdmnsBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_posts_page(
            __('Vdmns media ', VDMNS_PlUGIN_TEXTDOMAIN),
            __('Vdmns media ', VDMNS_PlUGIN_TEXTDOMAIN),
            'read',
            'vdmns_control_sub_media_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page media", VDMNS_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
