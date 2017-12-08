<?php


namespace includes\common;


class VdmnsDefaultOption
{
    /**
     * Возвращает массив дефолтных настроек
     * @return array
     */
    public static function getDefaultOptions()
    {
        $defaults = array(
            'account' => array(
                'marker' => '',
                'token' => ''
            )
        );
        // Фильтр которому можно подключиться и изменить массив дефолтных настроек
        $defaults = apply_filters('vdmns_default_option', $defaults );
        return $defaults;
    }
}
