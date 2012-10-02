
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($pruebamoduledos) ) {
    $pruebamoduledos = (array)$pruebamoduledos;
}
$id = isset($pruebamoduledos['id']) ? $pruebamoduledos['id'] : '';
?>
<div class="admin-box">
    <h3>PruebaModuleDos</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('pruebamoduledos_coluno') ? 'error' : ''; ?>">
            <?php echo form_label('coluno'. lang('bf_form_label_required'), 'pruebamoduledos_coluno', array('class' => "control-label") ); ?>
            <div class="controls">
                <?php echo form_textarea( array( 'name' => 'pruebamoduledos_coluno', 'id' => 'pruebamoduledos_coluno', 'rows' => '5', 'cols' => '80', 'value' => set_value('pruebamoduledos_coluno', isset($pruebamoduledos['pruebamoduledos_coluno']) ? $pruebamoduledos['pruebamoduledos_coluno'] : '') ) )?>
                <span class="help-inline"><?php echo form_error('pruebamoduledos_coluno'); ?></span>
            </div>

        </div>


        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create PruebaModuleDos" />
            or <?php echo anchor(SITE_AREA .'/reports/pruebamoduledos', lang('pruebamoduledos_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
