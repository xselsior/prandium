<?php
/*Капча*/
if (isset($_POST['g-recaptcha-response'])) {
    $url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";
    $secret_key = '6LenXyMTAAAAAH_hUcU-YVZy5cPqYS1-YI6oyy2M';
    $query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];
    $data = json_decode(file_get_contents($query));
    if ($data->success) {
        // Продолжаем работать с данными для авторизации из POST массива
    } else {
        exit('Вы не прошли КАПЧУ');
    }
} else {
    exit('Вы не прошли валидацию reCaptcha');
}
/*Переменные сама форма*/
if (isset($_POST["email"])){
if (isset($_POST["name"])) {$name = $_POST["name"];}
if (isset($_POST["email"])) {$email = $_POST["email"];}
if (isset($_POST["message"])) {$message = $_POST["message"];}

if($name=="" or $email=="" or $message==""){ // Проверяем на заполненность всех полей.
	echo "Заполните все поля";
}else{
	$ip=$_SERVER["REMOTE_ADDR"]; // Вычисляем ip пользователя
	$brose=$_SERVER["HTTP_USER_AGENT"]; // Вычисляем браузер пользователя
$to = "alekstreedoc@gmail.com"; // Ваш email адрес
$subject = "Сообщение c сайта"; // тема письма 
$headers .= "Content-Type: text/html; charset=UTF-8
";
$headers .= "Дробилка"; // Отправитель письма
$message = "
Имя: $name<br>
E-mail: $email<br>
Телефон: $tel<br>
Текст: $body<br><br>

--------------------------------------------------------<br>
---------------IP отправителя: $ip<br>
---------------Браузер отправителя: $brose<br>
"; 
$send = mail($to, $subject, $message, $headers);


 if ($send == "true")
 {
 echo "Ваше сообщение отправлено. Мы ответим вам в ближайшее время.";
 }
 else
 {
 echo "Не удалось отправить, попробуйте снова!";
 }
}
}
?>