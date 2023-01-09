<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$r1 = $_POST['project'];
$r2 = $_POST['size'];
$r3 = $_POST['price'];
$r4 = $_POST['agent'];
 $mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'no-reply@nedvex.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'eqpxaayaktuczbty'; // Ваш пароль от почты с которой будут отправляться письма aAJjV7BKfRECqAZdBvG7 -pR1IOoIyuo1
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('no-reply@nedvex.ru'); // от кого будет уходить письмо?
$mail->addAddress('A.sokolov@nedvex.ru');       // Кому будет уходить письмо
$mail->addAddress('O.rechkina@nedvex.ru');       // Кому будет уходить письмо
$mail->addAddress('E.parfenova@nedvex.ru');       // Кому будет уходить письмо
$mail->addAddress('r.galstyan@nedvex.ru');       // Кому будет уходить письмо
$mail->addAddress('i.pomigueva@apdevelopment.ru');       // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$message = '
<html>
<body>
<center>
<table border="1" cellpadding="6" cellspacing="0" width="90%" bordercolor="#DBDBDB">
<tr><td colspan="2" align="center" bgcolor="#E4E4E4"><b>Информация о клиенте</b></td></tr>
<tr>
  <td>
    <b>Как вы узнали о нашем проекте?</b>
  </td>
  <td>
    '. $r1 .'
  </td>
</tr>
<tr>
  <td>
    <b>Размер квартиры, который вас интересует?</b>
  </td>
  <td>
    '. $r2 .'
  </td>
</tr>
<tr>
  <td>
    <b>Бюджет</b>
  </td>
  <td>
    '. $r3 .'
  </td>
</tr>
<tr>
  <td>
    <b>Являетесь ли вы агентом недвижимости?</b>
  </td>
  <td>
    '. $r4 .'
  </td>
</tr>
<tr>
  <td>
    <b>Имя</b>
  </td>
  <td>
    '. $name .'
  </td>
</tr>
<tr>
  <td>
    <b>Почта</b>
  </td>
  <td>
    '. $email .'
  </td>
</tr>
<tr>
  <td>
    <b>Телефон</b>
  </td>
  <td>
    '. $phone .'
  </td>
</tr>
';

$mail->Subject = 'Заявка с сайта The-Point.ru';
// $mail->Body    = "Как вы узнали о нашем проекте?: ".$r1."\nРазмер квартиры, который вас интересует: ".$r2."\nБюджет: ".$r3."\nЯвляетесь ли вы агентом недвижимости?: ".$r4."\nПочта: ".$email."\nИмя: ".$name."\nТелефон: ".$phone;
$mail->Body = $message;
$mail->AltBody = '';

try {
    $ok = $mail->send();
    var_dump($ok);
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?>
