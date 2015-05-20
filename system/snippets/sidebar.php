	<div class="uk-width-2-10">
		<nav class="uk-panel uk-panel-box uk-height-viewport" style="overflow: auto" data-uk-sticky>
			<h3 class="uk-panel-title"><?php echo $site->title ?></h3>
			<ul class="uk-nav uk-nav-side">
				<?php foreach($files as $file): ?>
				<?php if($file->num() <= 1): ?>
				<li class="uk-nav-header"><?php echo $file->catTitle() ?></li>
			<?php endif ?>
			<li>
				<a href="#<?php echo $file->id() ?>" data-uk-smooth-scroll="{offset: 40}">
					<?php echo $file->fname() ?>
					<?php if(Options::extensions()): ?>
					<small class="uk-text-muted">(<?php echo $file->extension() ?>)</small>
				<?php endif ?>
			</a>
		</li>
	<?php endforeach ?>
</ul>
</nav>
</div>