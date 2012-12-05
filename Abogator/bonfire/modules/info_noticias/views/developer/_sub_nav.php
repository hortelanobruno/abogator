<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/developer/info_noticias') ?>" id="list"><?php echo lang('info_noticias_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Info_Noticias.Developer.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/developer/info_noticias/create') ?>" id="create_new"><?php echo lang('info_noticias_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>