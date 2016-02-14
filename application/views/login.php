<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <div id='login_form'>
        <?php if ( $this->session->flashdata( 'message' ) ) : ?>
            <p><?php echo $this->session->flashdata( 'message' ); ?></p>
        <?php endif; ?>

        <?php echo form_open( '/home_view' ); ?>
            <?php echo form_fieldset( 'Login Form' ); ?>
                <br />
                <div class="textfield">
                    <?php echo form_label( 'Username:', 'user_name' ); ?>
                    <?php echo form_error( 'user_name' ); ?>
                    <?php echo form_input( 'user_name', set_value( 'user_name' ) ); ?>
                </div>
                <br />
                <div class="buttons">
                    <?php echo form_submit( 'login', 'Login' ); ?>
                </div>
            <?php echo form_fieldset_close(); ?>
        <?php echo form_close(); ?>
    </div>
</html>


