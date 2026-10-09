<?php

$frm_name  = "Youname";
$recepient = "youmail@ya.ru";
$sitename  = "Название Сайта";
$subject   = "Новая заявка с сайта \"$sitename\"";

$name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, "UTF-8");
$email = trim($_POST["email"]);
$message = htmlspecialchars(trim($_POST["message"]), ENT_QUOTES, "UTF-8");

// Адрес уходит в заголовки From/Reply-To: без проверки через \r\n можно дописать свои заголовки
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	exit;
}

$message = "
E-mail: " . htmlspecialchars($email, ENT_QUOTES, "UTF-8") . " <br>
Имя: $name <br>
Сообщение: $message
";

mail($recepient, $subject, $message, "From: $frm_name <$email>" . "\r\n" . "Reply-To: $email" . "\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" . "Content-type: text/html; charset=\"utf-8\"");
