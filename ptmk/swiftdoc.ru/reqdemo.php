<?php
$path = dirname(__FILE__).'/lib/PHPMailer.old/';
require $path.'class.phpmailer.php';

require_once('config.php');
$fio = getParam('fio');
$company = getParam('company');
$email = getParam('email');
$phone = getParam('phone');
$comment = getParam('comment');
$a = array();

if(empty($fio)) $a['error'] = 'Не задано "Имя Фамилия"';
else if(empty($fio)) $a['error'] = 'Не задано "Компания"';
//else if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $a['error'] = 'Неверное или не задано поле "E-email"';
else {
  $exttext = '';
  $mail = new PHPMailer(true);
  try {
    //Server settings
    $mail->CharSet = 'utf-8';
    $mail->SMTPDebug = 0;
    $mail->isMail();
    $mail->setFrom(MAIL_FROM, 'SwiftDoc');
    $mail->addAddress($email, $fio);
    $mail->AddEmbeddedImage('files/SwiftDoc-mail.jpg', 'logo');
    $a = array('Буклет SwiftDoc.pdf', 'Описание возможностей SwiftDoc.docx', 'Описание доп.возможностей SwiftDoc (2017.07).docx', 'Презентация SwiftDoc.pdf', 'Требования к техническому обеспечению.docx');
    foreach($a as $f) $mail->addAttachment('files/'.$f);
    $mail->Sender = '';
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Презентация системы документооборота SwiftDoc';
    $mail->Body    = '<html>
    <div><img src="cid:logo" alt=""></div>
    <h2>Уважаемый '.htmlspecialchars($fio).'!</h2>
<p>Спасибо за интерес к нашей системе электронного документооборота "SwiftDoc" !</p>
<p>Меня зовут Павел, я - директор компании-разработчика решения "SwiftDoc", и с удовольствием помогу Вам лучше ознакомиться с преимуществами нашей системы.</p>
<p>Вы запросили логин и пароль для входа в демонстрационную версию:</p>
<p>Логин: <b>Demo</b></p>
<p>Пароль: <b>demo123</b></p>

<p>Дополнительно отправляю Вам подробную информацию по системе электронного документооборота:</p>
<p>
1. "Презентация SwiftDoc.pdf" - основная информация о системе;<br>
2. "Буклет SwiftDoc.pdf" - на случай, если Вам потребуется краткая информация;<br>
3. "Описание возможностей SwiftDoc" - преимущества, функции, стоимость;<br>
4. "Описание доп.возможностей SwiftDoc (2017.07)"<br>
5. Технические требования.
</p>
<p>'.htmlspecialchars($fio).', чтобы рассказать о преимуществах системы и показать их в работе, а также остановиться на деталях, заинтересовавших вас, готов организовать для Вас демонстрацию работы системы и ответить на все вопросы.</p>

<p>Демонстрация проходит через Skype и занимает обычно около 40 минут.</p><br>
--<br>
С уважением,<br>
Павел Тукачев<br><br>

тел./факс (812) 305-25-74<br>
e-mail: <a href="mailto:info@ptmk.ru" target="_blank">info@ptmk.ru</a><br>
<a href="http://www.swiftdoc.ru" target="_blank">www.swiftdoc.ru</a><br>
    </html>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $exttext = '<p style="color:green;">Письмо c презентацией отправлено</p>';
  } catch (Exception $e) {
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
    $exttext = '<p style="color:red;">Ошибка при отправке презентации: '.$mail->ErrorInfo.'</p>';
  }

  $to = MAIL_TO_DEMO;

  $subject = 'Заказ демо версии';

  $headers = "From: " . MAIL_FROM . "\r\n";
  $headers .= "Reply-To: ". MAIL_FROM . "\r\n";
  //$headers .= "CC: susan@example.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

  $message = '<html><body>';
  $message .= '<h1>Заказ демо версии</h1>';
  $message .= '<p>
    ФИО: '.htmlspecialchars($fio).'<br>
    Компания: '.htmlspecialchars($company).'<br>
    E-mail: '.htmlspecialchars($email).'<br>
    Телефон: '.htmlspecialchars($phone).'<br>
    Комментарий:<br> '.str_replace("\n", '<br>', htmlspecialchars($comment)).'<br>
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