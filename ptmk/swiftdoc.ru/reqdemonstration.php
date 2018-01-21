<?php
require_once('config.php');
$fio = getParam('fio');
$email = getParam('email');
$skype = getParam('skype');
$atime = getParam('atime');
$a = array();

if(empty($fio)) $a['error'] = 'Не задано "Имя Фамилия"';
else if(empty($skype)) $a['error'] = 'Не задано "Скайп или телефон"';
else if(empty($email)) $a['error'] = 'Неверное или не задано поле "E-email"';
else {
  $to = MAIL_TO_DEMO;

  $subject = 'Заказ демонстрации';

  $headers = "From: " . MAIL_FROM . "\r\n";
  $headers .= "Reply-To: ". MAIL_FROM . "\r\n";
  //$headers .= "CC: susan@example.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

  $message = '<html><body>';
  $message .= '<h1>Заказ демонстрации</h1>';
  $message .= '<p>
    ФИО: '.htmlspecialchars($fio).'<br>
    E-mail: '.htmlspecialchars($email).'<br>
    Скайп или телефон: '.htmlspecialchars($skype).'<br>
    Удобное время: '.htmlspecialchars($atime).'<br>
    Дата: '.date('d.m.Y H:i').'<br>
    IP: '.$_SERVER['REMOTE_ADDR'].'
  </p>';
  $message .= '</body></html>';

  $rc = mail($to, $subject, $message, $headers);
  if($rc === false) $a['error'] = 'Не удалось отправить сообщение! Попробуйте, пожалуйста, позже';
  else $a['ok'] = 1;
}

echo json_encode($a);
?>