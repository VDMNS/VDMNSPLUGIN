<?php

namespace includes\controllers\admin\menu;


class VdmnsMyCommentsMenuController extends VdmnsStepByStepBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_comments_page(
            __('Sub comments Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            __('Sub comments Step By Step', VDMNS_PlUGIN_TEXTDOMAIN),
            'read',
            'vdmns_control_sub_comments_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Comments", VDMNS_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
