<!--<!DOCTYPE html>-->
<!--<html lang="ru">-->
<!--<head>-->
<!--	<meta charset="UTF-8">-->
<!--	<title>Отправление, пожалуйста подождите...</title>-->
<!--	<meta http-equiv="refresh" content="3; url=http://msg-room.ru/contacts.html"> <! Редирект на главную страницу -->
<!--</head>-->
<!--<body>-->
	<!-- <div class="loader">
<!		<div class="center">-->
<!--			<h1 style="text-align: center;">С Вами свяжутся в скором времени. Спасибо!</h1>-->
<!--		</div>-->
<!--	</div> -->
<!--</body>-->
<!--</html>-->
header("Content-type: text/html; charset=utf-8");


<?php
  $name = $_POST['name']; // input name
 	$phone = $_POST['phone']; // input phone
 	$text = $_POST['text']; // input text


	$message = "Новый заказ на сайте".PHP_EOL."Имя: ".$name.PHP_EOL."Телефон: ".$phone.PHP_EOL."Текст сообщения: ".$text;

	send(185215375,$message); // id беседы с заказчиком

	function send($id , $message) {
    $url = 'https://api.vk.com/method/messages.send';
    $params = array(
      'user_id' => $id,    // Кому отправляем
      'message' => $message,   // Что отправляем
      'access_token' => '8a312fb460ef8083f89fffb11208c48107194a2b0581fc08e812f4aa13702267ac248ffe3f6683e0fc300',  
      'v' => '5.62',
    );

    $result = file_get_contents($url, false, stream_context_create(array(
        'http' => array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => http_build_query($params)
        )
    )));
    header('Location:http://msg-room.ru/contacts.html');
	}
?>
