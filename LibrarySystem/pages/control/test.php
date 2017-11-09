<?php
require_once('booklist.php');
$contributor = query_column('book','contributor','id',1);
echo $contributor;
?>