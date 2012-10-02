<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/reports/pruebamoduletres') ?>" id="list"><?php echo lang('pruebamoduletres_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('PruebaModuleTres.Reports.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/reports/pruebamoduletres/create') ?>" id="create_new"><?php echo lang('pruebamoduletres_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>