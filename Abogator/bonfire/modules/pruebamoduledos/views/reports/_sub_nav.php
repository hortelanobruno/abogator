<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/reports/pruebamoduledos') ?>" id="list"><?php echo lang('pruebamoduledos_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('PruebaModuleDos.Reports.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/reports/pruebamoduledos/create') ?>" id="create_new"><?php echo lang('pruebamoduledos_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>