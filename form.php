<?php
use PHPMailer\PHPMailer\PHPMailer;

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName']; 
$email = $_POST['email'];
$tel = $_POST['tel'];
$message = $_POST['message'];

require_once "Mailer/PHPMailer.php";
require_once "Mailer/SMTP.php";
require_once "Mailer/Exception.php";

$mail = new PHPMailer();

// Серверные настройки
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host        = 'smtp.yandex.ru';   // Установка smtp сервера
$mail->SMTPAuth    = true;
$mail->Username    = 'login';   // Логин от почты
$mail->Password    = 'pass';           // Пароль от почты
$mail->SMTPSecure  = "ssl";            // Включение шифрования
$mail->Port        = 465;              // Порт

// Recipients
$mail->setFrom('lodin', 'Site');        // Отправитель
$mail->addAddress('exempal@gmail.com', 'Joe User');  // Получатель

// Добавление документов
// $mail->addAttachment('/var/tmp/file.tar.gz');
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

// Контент письма
$mail->isHTML(true);
$mail->Subject = 'Тема';   // Тема письма
$mail->Body    = 'Имя: ' . $firstName . '<br>Фамилия: ' . $lastName .'<br>Маил: ' . $email .'<br>Телефон: ' . $tel . '<br>Сщщбщение: ' . $message; // Тело письма
$mail->AltBody = 'This is the body in plain text for non-HTML mail clientts (Письмо без HTML)';  // Тело письма для клиентов не обрабатывающих HTML

$mail->send();

?>