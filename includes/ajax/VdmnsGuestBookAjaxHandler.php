<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.12.2017
 * Time: 2:28
 */
namespace includes\ajax;
use includes\controllers\admin\menu\VdmnsICreatorInstance;
use includes\models\admin\menu\VdmnsGuestBookSubMenuModel;
class VdmnsGuestBookAjaxHandler implements VdmnsICreatorInstance
{
    public function __construct(){
        if( defined('DOING_AJAX') && DOING_AJAX ){
            add_action('wp_ajax_guest_book', array( &$this, 'ajaxHandler'));
            add_action('wp_ajax_nopriv_guest_book',  array( &$this, 'ajaxHandler'));
        }
    }
    /**
     * Обработчик для ajax действия guest_book (wp_ajax_guest_book, wp_ajax_nopriv_guest_book)
     */
    public function ajaxHandler(){
        error_log('ajaxHandler');
        // Проверка наличия данных
        if ($_POST){
            //Добавляем данные
            $id = VdmnsGuestBookSubMenuModel::insert(array(
                'user_name' => $_POST['user_name'],
                'date_add' => time(), // time() стандартная php функция получения времени
                'message' => $_POST['message']
            ));
            $return = array(
                'message'   => 'Сохранено',
                'ID'        => $id
            );
            // Возвращаем ответ
            wp_send_json_success( $return );
        }
        wp_send_json_error();
        wp_die();
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
