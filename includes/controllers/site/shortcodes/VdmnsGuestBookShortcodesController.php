<?php
namespace includes\controllers\site\shortcodes;
// Наследуем базовый класс StepByStepShortcodesController в котором реализованый некоторый функционал для создания
// шорткода
use includes\controllers\admin\menu\VdmnsICreatorInstance;
class VdmnsGuestBookShortcodesController extends VdmnsShortcodesController
    implements VdmnsIcreatorInstance
{
    /**
     * Функция в которой будем добалять шорткоды через функцию add_shortcode( $tag , $func );
     * @return mixed
     */
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        /*
         * Добавляем щорткод [vdmns_guest_book]
         * этот шорткод будет добалять форму для добавления данных в гостевую книгу
         */
        add_shortcode( 'vdmns_guest_book', array(&$this, 'action'));
    }
    /**
     * Функция обработки шоткода
     * Функция указанная в параметре $func, получает 3 параметра, каждый из них может быть передан,
     * а может нет:
     * $atts(массив)
     *      Ассоциативный массив атрибутов указанных в шоткоде. По умолчанию пустая строка - атрибуты
     *      не переданы.
     *      По умолчанию: ''
     * $content(строка)
     *      Текст шоткода, когда используется закрывающая конструкция шотркода: [foo]текст шорткода[/foo]
     *      По умолчанию: ''
     * $tag(строка)
     *      Тег шорткода. Может пригодится для передачи в доп. функции. Пр: если шорткод - [foo],
     *      то тег будет - foo.
     *      По умолчанию: текущий тег
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return mixed
     */
    public function action($atts = array(), $content = '', $tag = '')
    {
        // TODO: Implement action() method.
        return $this->render(array());
    }
    /**
     * Функция отвечающа за вывод обработаной информации шорткодом
     * @param $data
     * @return mixed
     */
    public function render($data)
    {
        // TODO: Implement render() method.
        // В этой переменой будет view формы
        $output = '';
        $output .= '<form  method="post">
                        <label>'.__('User name', VDMNS_PlUGIN_TEXTDOMAIN ).'</label>
                        <input type="text" name="step_user_name" class="step-user-name">
                        <label>'.__('Message', VDMNS_PlUGIN_TEXTDOMAIN ).'</label>
                        <textarea name="step_message" class="step-message"></textarea>
                        <button class="vdmns-btn-add" >'.__('Add', VDMNS_PlUGIN_TEXTDOMAIN ).'</button>                   
                    </form>';
        return $output;
    }
    // Метод создает экземпляр класса
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}