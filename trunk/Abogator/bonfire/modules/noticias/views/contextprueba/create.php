
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($noticias) ) {
    $noticias = (array)$noticias;
}
$id = isset($noticias['id']) ? $noticias['id'] : '';
?>
<div class="admin-box">
    <h3>Noticias</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('noticias_titulo') ? 'error' : ''; ?>">
            <?php echo form_label('titulo'. lang('bf_form_label_required'), 'noticias_titulo', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="noticias_titulo" type="text" name="noticias_titulo" maxlength="1000" value="<?php echo set_value('noticias_titulo', isset($noticias['noticias_titulo']) ? $noticias['noticias_titulo'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('noticias_titulo'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('noticias_fecha') ? 'error' : ''; ?>">
            <?php echo form_label('fecha'. lang('bf_form_label_required'), 'noticias_fecha', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="noticias_fecha" type="text" name="noticias_fecha"  value="<?php echo set_value('noticias_fecha', isset($noticias['noticias_fecha']) ? $noticias['noticias_fecha'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('noticias_fecha'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('noticias_texto') ? 'error' : ''; ?>">
            <?php echo form_label('texto'. lang('bf_form_label_required'), 'noticias_texto', array('class' => "control-label") ); ?>
            <div class="controls">
                <?php echo form_textarea( array( 'name' => 'noticias_texto', 'id' => 'noticias_texto', 'rows' => '5', 'cols' => '80', 'value' => set_value('noticias_texto', isset($noticias['noticias_texto']) ? $noticias['noticias_texto'] : '') ) )?>
                <span class="help-inline"><?php echo form_error('noticias_texto'); ?></span>
            </div>

        </div>


        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create Noticias" />
            or <?php echo anchor(SITE_AREA .'/contextprueba/noticias', lang('noticias_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
