
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.12.2017
 * Time: 0:01
 */

<form action="admin.php?page=vdmns_control_guest_book_menu&action=update_data" method="post">
<input type="text" name="user_name" value="<?php echo $data['user_name']; ?>">
<textarea name="message">
	<?php echo $data['message']; ?>
</textarea>
<!-- Поле id по котором будем обновлять запись в таблице -->
<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

<input type="submit" name="<?php _e('Add', VDMNS_PlUGIN_TEXTDOMAIN ); ?>">
</form>
