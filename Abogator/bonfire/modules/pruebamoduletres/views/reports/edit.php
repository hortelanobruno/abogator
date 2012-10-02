
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($pruebamoduletres) ) {
    $pruebamoduletres = (array)$pruebamoduletres;
}
$id = isset($pruebamoduletres['id']) ? $pruebamoduletres['id'] : '';
?>
<div class="admin-box">
    <h3>PruebaModuleTres</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('pruebamoduletres_coluno') ? 'error' : ''; ?>">
            <?php echo form_label('coluno'. lang('bf_form_label_required'), 'pruebamoduletres_coluno', array('class' => "control-label") ); ?>
            <div class="controls">
                <?php echo form_textarea( array( 'name' => 'pruebamoduletres_coluno', 'id' => 'pruebamoduletres_coluno', 'rows' => '5', 'cols' => '80', 'value' => set_value('pruebamoduletres_coluno', isset($pruebamoduletres['pruebamoduletres_coluno']) ? $pruebamoduletres['pruebamoduletres_coluno'] : '') ) )?>
                <span class="help-inline"><?php echo form_error('pruebamoduletres_coluno'); ?></span>
            </div>

        </div>


        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit PruebaModuleTres" />
            or <?php echo anchor(SITE_AREA .'/reports/pruebamoduletres', lang('pruebamoduletres_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('PruebaModuleTres.Reports.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('pruebamoduletres_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('pruebamoduletres_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
