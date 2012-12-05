
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($info_noticias) ) {
    $info_noticias = (array)$info_noticias;
}
$id = isset($info_noticias['id']) ? $info_noticias['id'] : '';
?>
<div class="admin-box">
    <h3>Info Noticias</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('info_noticias_titulo') ? 'error' : ''; ?>">
            <?php echo form_label('titulo'. lang('bf_form_label_required'), 'info_noticias_titulo', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="info_noticias_titulo" type="text" name="info_noticias_titulo" maxlength="1000" value="<?php echo set_value('info_noticias_titulo', isset($info_noticias['info_noticias_titulo']) ? $info_noticias['info_noticias_titulo'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('info_noticias_titulo'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('info_noticias_fecha') ? 'error' : ''; ?>">
            <?php echo form_label('fecha'. lang('bf_form_label_required'), 'info_noticias_fecha', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="info_noticias_fecha" type="text" name="info_noticias_fecha"  value="<?php echo set_value('info_noticias_fecha', isset($info_noticias['info_noticias_fecha']) ? $info_noticias['info_noticias_fecha'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('info_noticias_fecha'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('info_noticias_descripcion') ? 'error' : ''; ?>">
            <?php echo form_label('descripcion'. lang('bf_form_label_required'), 'info_noticias_descripcion', array('class' => "control-label") ); ?>
            <div class="controls">

               <input id="info_noticias_descripcion" type="text" name="info_noticias_descripcion" maxlength="2000" value="<?php echo set_value('info_noticias_descripcion', isset($info_noticias['info_noticias_descripcion']) ? $info_noticias['info_noticias_descripcion'] : ''); ?>"  />
               <span class="help-inline"><?php echo form_error('info_noticias_descripcion'); ?></span>
            </div>

        </div>        <div class="control-group <?php echo form_error('info_noticias_contenido') ? 'error' : ''; ?>">
            <?php echo form_label('contenido'. lang('bf_form_label_required'), 'info_noticias_contenido', array('class' => "control-label") ); ?>
            <div class="controls">
                <?php echo form_textarea( array( 'name' => 'info_noticias_contenido', 'id' => 'info_noticias_contenido', 'rows' => '5', 'cols' => '80', 'value' => set_value('info_noticias_contenido', isset($info_noticias['info_noticias_contenido']) ? $info_noticias['info_noticias_contenido'] : '') ) )?>
                <span class="help-inline"><?php echo form_error('info_noticias_contenido'); ?></span>
            </div>

        </div>


        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create Info Noticias" />
            or <?php echo anchor(SITE_AREA .'/developer/info_noticias', lang('info_noticias_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
