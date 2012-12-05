<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/settings/noticias') ?>" id="list"><?php echo lang('noticias_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Noticias.Settings.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/settings/noticias/create') ?>" id="create_new"><?php echo lang('noticias_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>