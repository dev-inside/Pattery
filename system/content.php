<?php include snippet('header') ?>
<div class="top-border"></div>
<div class="uk-grid" data-uk-margin>
	<?php include snippet('sidebar') ?>
	<section class="uk-width-8-10 uk-margin-top" style="padding-right: 20px">
		<?php foreach($files as $file): ?>
		<div class="uk-height-viewport" id="<?php echo $file->id() ?>" style="overflow: auto">
			<h1><?php echo ($file->txt('title') == TRUE ? $file->txt('title') : $file->fname()) ?></h1>
            <?php echo $file->content() ?>
            <?php echo $file->html() ?>
            <?php echo $file->code() ?>
            <?php include snippet('getraw') ?>
        </div>
    <?php endforeach ?>
</section>
</div>
<?php include snippet('footer') ?>