Title: Other languages

====

Content: If you add an another file like *.php*, *.css*, *.js* or *.less*, Pattery returns only the codeblock. If you want to add some another languages, just edit in *system/config/config.yaml* the types-list. The following example demonstrates how Pattery handles php-files.

====

Pattern:

<?php foreach ($darth as $vader): ?>
    <?php echo $vader ?>
<?php endforeach ?>