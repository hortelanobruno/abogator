
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($pruebamodulecuatro) ) {
    $pruebamodulecuatro = (array)$pruebamodulecuatro;
}
$id = isset($pruebamodulecuatro['id']) ? $pruebamodulecuatro['id'] : '';
?>
<div class="admin-box">
    <h3>PruebaModuleCuatro</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('pruebamodulecuatro_coluno') ? 'error' : ''; ?>">
            <?php echo form_label('coluno'. lang('bf_form_label_required'), 'pruebamodulecuatro_coluno', array('class' => "control-label") ); ?>
            <div class="controls">
                <?php echo form_textarea( array( 'name' => 'pruebamodulecuatro_coluno', 'id' => 'pruebamodulecuatro_coluno', 'rows' => '5', 'cols' => '80', 'value' => set_value('pruebamodulecuatro_coluno', isset($pruebamodulecuatro['pruebamodulecuatro_coluno']) ? $pruebamodulecuatro['pruebamodulecuatro_coluno'] : '') ) )?>
                <span class="help-inline"><?php echo form_error('pruebamodulecuatro_coluno'); ?></span>
            </div>

        </div>


        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit PruebaModuleCuatro" />
            or <?php echo anchor(SITE_AREA .'/reports/pruebamodulecuatro', lang('pruebamodulecuatro_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('PruebaModuleCuatro.Reports.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('pruebamodulecuatro_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('pruebamodulecuatro_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
