<?php if($file->showcode() != strtolower('no') AND strlen($file->raw()) != 0): ?>
    <form method="POST" class="uk-align-right" action="<?php echo snippet('download') ?>">
        <a class="uk-button uk-button-primary" data-uk-modal="{target:'#raw-<?php echo $file->id() ?>'}">
            <i class="uk-icon-code"></i> Raw
        </a>
        <input type="hidden" name="file" value="<?php echo $file->fname() . '.' . $file->extension() ?>">
        <input type="hidden" name="content" value="<?php echo htmlentities($file->select('pattern')) ?>">
        <input type="hidden" name="mime" value="<?php echo Options::mime($file->extension()) ?>">
        <button class="uk-button uk-button-success" type="submit">
            <i class="uk-icon-download"></i> Download
        </button>
    </form>
    <!-- This is the modal -->
    <div id="raw-<?php echo $file->id() ?>" class="uk-modal">
        <div class="uk-modal-dialog uk-modal-dialog-large">
            <a class="uk-modal-close uk-close"></a>
            <?php echo $file->raw() ?>
        </div>
    </div>
<?php endif ?>