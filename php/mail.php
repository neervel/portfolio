<?php
//----Скрипт отправки почты через SMTP с использованием PHPMailer----
//Импорт классов PHPMailer в глобальное пространство имен. Они должны быть в верхней части скрипта, а не внутри функции
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (!empty($_POST["contact-button"])) {
$name = $_POST["name"];
$email = $_POST["contact-email"];
$subject = $_POST["contact-subject"];
$subject = check_symbol($subject, "Тема сообщения", "1", "0");
$comment = $_POST["contact-comment"];
if (!empty($GLOBALS['alert'])) {
$alert = 'Данные из формы не отправлены. Обнаружены следующие ошибки: \n'.$alert;
include "alert.php";
}
else {
//Подключение библиотеки
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(); //Инициализация класса
$from = 'feedback@avtobezugona.ru'; //Адрес почты, с которой идет отправка письма
$to = 'admin@avtobezugona.ru'; //Адрес получателя
$mail -> isSMTP(); //Применение протокола SMTP
$mail -> Host = 'smtp.yandex.ru';//Адрес почтового сервера
$mail -> SMTPAuth = true; //Включение режима авторизации
$mail -> Username = 'feedback@avtobezugona.ru'; //Логин от доменной почты, подключенной к стороннему почтовому сервису (в данном случае в Яндекс.Почта)
$mail -> Password = '27MrDon89'; //Пароль от доменной почты
$mail -> SMTPSecure = 'ssl'; //Протокол шифрования
$mail -> Port = '465'; //Порт сервера SMTP
$mail -> CharSet = 'UTF-8'; //Кодировка
$mail -> setFrom($from, 'Администратор'); //Адрес и имя отправителя
$mail -> addAddress($to, 'Администратор'); //Адрес и имя получателя
$mail -> isHTML (true); //Установка формата электронной почты в HTML
$mail -> Subject = 'Отправлена форма обратной связи'; //Тема письма (заголовок)
$mail -> Body = "
<html>
<body>
<p>Имя отправителя: $name</p>
<p>Адрес отправителя: $email</p>
<p>Тема сообщения: $subject</p>
<p>Содержание сообщения: $comment</p>
</body>
</html>
"; //Содержимое письма
$mail -> AltBody = 'Текст альтернативного письма'; //Альтернативное письмо в случае, если почтовый клиент не поддерживает формат HTML
$mail -> SMTPDebug = 0; //Включение отладки SMTP: 0 - выкл (для штатного использования), 1 = сообщения клиента, 2 - сообщения клиента и сервера
if ($mail -> send()) {
$alert = 'Сообщение отправлено'; //Вывод сообщения в диалоговом окне браузера об успешной отправке письма
}
else {
$alert = 'Ошибка, письмо не может быть отправлено: '.$mail -> ErrorInfo; //Вывод сообщения об ошибке
}
include "alert.php";
}
}
?>


  <!-- $to = "frontend@neervel.ru"; // емайл получателя данных из формы
  $tema = "Сообщение с сайта-портфолио"; // тема полученного емайла
  $message = "Имя: ".$_POST['name']."<br>";//присвоить переменной значение, полученное из формы name=name
  $message .= "E-mail: ".$_POST['email']."<br>"; //полученное из формы name=email
  $message .= "Сообщение: ".$_POST['message']."<br>"; //полученное из формы name=message
  $headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
  mail($to, $tema, $message, $headers); //отправляет получателю на емайл значения переменных'
  $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
  header("Location: $redirect");
  exit(); -->
