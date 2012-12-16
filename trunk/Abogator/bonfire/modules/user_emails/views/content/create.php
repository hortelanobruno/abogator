
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($user_emails) ) {
    $user_emails = (array)$user_emails;
}
$id = isset($user_emails['id']) ? $user_emails['id'] : '';
?>
<div class="admin-box">
    <h3>User Emails</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('user_emails_email') ? 'error' : ''; ?>">
            <?php echo form_label('email'. lang('bf_form_label_required'), 'user_emails_email', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="user_emails_email" type="text" name="user_emails_email" maxlength="200" value="<?php echo set_value('user_emails_email', isset($user_emails['user_emails_email']) ? $user_emails['user_emails_email'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('user_emails_email'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('user_emails_fecha') ? 'error' : ''; ?>">
            <?php echo form_label('fecha'. lang('bf_form_label_required'), 'user_emails_fecha', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="user_emails_fecha" type="text" name="user_emails_fecha"  value="<?php echo set_value('user_emails_fecha', isset($user_emails['user_emails_fecha']) ? $user_emails['user_emails_fecha'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('user_emails_fecha'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('user_emails_sistema') ? 'error' : ''; ?>">
            <?php echo form_label('sistema'. lang('bf_form_label_required'), 'user_emails_sistema', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="user_emails_sistema" type="text" name="user_emails_sistema" maxlength="200" value="<?php echo set_value('user_emails_sistema', isset($user_emails['user_emails_sistema']) ? $user_emails['user_emails_sistema'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('user_emails_sistema'); ?></span>
            </div>

        </div>


        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create User Emails" />
            or <?php echo anchor(SITE_AREA .'/content/user_emails', lang('user_emails_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
