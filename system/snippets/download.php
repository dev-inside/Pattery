<?php
file_put_contents('../../files/' . $_POST['file'], $_POST['content']);
header('Content-Type: ' . $_POST['mime']);
header('Content-Disposition: attachment; filename='.basename('../../files/'. $_POST['file']));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize('../../files/'. $_POST['file']));
readfile('../../files/'. $_POST['file']);
unlink('../../files/'. $_POST['file']);
exit;
?>