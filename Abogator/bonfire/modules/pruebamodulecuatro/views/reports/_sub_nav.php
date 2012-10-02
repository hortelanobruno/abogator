<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/reports/pruebamodulecuatro') ?>" id="list"><?php echo lang('pruebamodulecuatro_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('PruebaModuleCuatro.Reports.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/reports/pruebamodulecuatro/create') ?>" id="create_new"><?php echo lang('pruebamodulecuatro_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>