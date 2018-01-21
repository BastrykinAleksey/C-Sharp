<?php
define('MAIL_FROM', 'info@ptmk.ru');
define('MAIL_TO_PRE', 'info@ptmk.ru');
define('MAIL_TO_DEMO', 'info@ptmk.ru');

function getParam($nm, $def = '')
{
  return isset($_REQUEST[$nm]) ? $_REQUEST[$nm] : $def;
}
?>