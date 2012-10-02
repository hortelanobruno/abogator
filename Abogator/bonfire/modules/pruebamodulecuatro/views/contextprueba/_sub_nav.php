<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/contextprueba/pruebamodulecuatro') ?>" id="list"><?php echo lang('pruebamodulecuatro_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('PruebaModuleCuatro.Contextprueba.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/contextprueba/pruebamodulecuatro/create') ?>" id="create_new"><?php echo lang('pruebamodulecuatro_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>