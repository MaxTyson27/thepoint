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
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'noreply-nedvex@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'aAJjV7BKfRECqAZdBvG7'; // Ваш пароль от почты с которой будут отправляться письма aAJjV7BKfRECqAZdBvG7 -pR1IOoIyuo1
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('noreply-nedvex@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('maxmaximsirotkin@mail.ru');       // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта The-Point.ru';
$mail->Body    = "Как вы узнали о нашем проекте?: ".$r1."\nРазмер квартиры, который вас интересует: ".$r2."\nБюджет: ".$r3."\nЯвляетесь ли вы агентом недвижимости?: ".$r4."\nПочта: ".$email."\nИмя: ".$name."\nТелефон: ".$phone;
$mail->AltBody = '';

try {
    $ok = $mail->send();
    var_dump($ok);
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?>
