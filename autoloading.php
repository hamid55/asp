<?php
# autoloading.php

function __autoload($clname)
{
  $filename = strtolower('class_'.$clname.'.php');
  include_once($filename);
}
?>
