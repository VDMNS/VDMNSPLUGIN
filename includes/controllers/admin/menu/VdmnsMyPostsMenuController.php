<?php

namespace includes\controllers\admin\menu;


class VdmnsMyPostsMenuController extends VdmnsBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_posts_page(
            __('Sub posts Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            __('Sub posts Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            'read',
            'vdmns_control_sub_posts_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page posts", VDMNS_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}