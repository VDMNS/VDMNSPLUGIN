<?php
namespace includes\common;


class VdmnsRequestApi
{
    const VDMNS_API_V2 = "http://api.travelpayouts.com/v2";
    const VDMNS_TOKEN = "b2f8bef81735323aecb33e285da8e694";
    const VDMNS_MARKER = "17942";
    private static $instance = null;

    private function __construct(){

    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getToken(){
        return "&token=".self::VDMNS_TOKEN;
    }
  /**
     *  алендарь цен на мес€ц
     * «апрос
     * http://api.travelpayouts.com/v2/prices/month-matrix
     * ѕараметры запроса
     * currency Ч валюта цен на билеты. «начение по умолчанию Ч rub.
     * origin Ч пункт отправлени€. IATA код города или код страны. ƒлина не менее 2 и не более 3 символов.
     * destination Ч пункт назначени€. IATA код города или код страны. ƒлина не менее 2 и не более 3.
     *               ќбратите внимание! ≈сли не указывать пункт отправлени€ и назначени€, то API вернет
     *               список самых дешевых билетов, которые были найдены за последние 48 часов.
     * show_to_affiliates Ч false Ч все цены, true Ч только цены, найденные с партнЄрским маркером (рекомендовано).
     *                      «начение по умолчанию Ч true.
     * month Ч первый день мес€ца, в формате ЂYYYY-MM-DDї.
     */
    public function getCalendarPricesMonth($currency, $origin, $destination, $month = ""){
        $requestURL = "";
        if ($currency == false || empty($currency)){
            $currency = "currency=RUB";
        } else {
            $currency = "currency={$currency}";
        }
        if ($origin == false || empty($origin)){
            return false;
        } else {
            $origin = "&origin={$origin}";
        }
        if ($destination == false || empty($destination)){
            return false;
        } else {
            $destination = "&destination={$destination}";
        }
        if ($month == false || empty($month)){
            $month = "&month=".date('Y-m-d');
        } else {
            $month = "&month={$month}";
        }
        $requestURL = self::VDMNS_API_V2."/prices/month-matrix?{$currency}{$origin}{$destination}{$month}"
            .$this->getToken();

        return $this->requestAPI($requestURL);
    }

    public function requestAPI($requestURL){
        $response = wp_remote_get( $requestURL, array('headers' => array(
            'Accept-Encoding' => 'gzip, deflate',
        )) );
        $body = wp_remote_retrieve_body($response);
        $json = json_decode($body);
        if (!is_wp_error($json) && $json->success == true) {
            return $json->data;
        } else {
            return false;
        }

    }




}

