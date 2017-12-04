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
     * ��������� ��� �� �����
     * ������
     * http://api.travelpayouts.com/v2/prices/month-matrix
     * ��������� �������
     * currency � ������ ��� �� ������. �������� �� ��������� � rub.
     * origin � ����� �����������. IATA ��� ������ ��� ��� ������. ����� �� ����� 2 � �� ����� 3 ��������.
     * destination � ����� ����������. IATA ��� ������ ��� ��� ������. ����� �� ����� 2 � �� ����� 3.
     *               �������� ��������! ���� �� ��������� ����� ����������� � ����������, �� API ������
     *               ������ ����� ������� �������, ������� ���� ������� �� ��������� 48 �����.
     * show_to_affiliates � false � ��� ����, true � ������ ����, ��������� � ���������� �������� (�������������).
     *                      �������� �� ��������� � true.
     * month � ������ ���� ������, � ������� �YYYY-MM-DD�.
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

