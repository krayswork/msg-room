<?php include("connect.php");
header("Content-type: text/html; charset=utf-8");
if (isset($_POST['g-recaptcha-response'])) {
$url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";

$secret_key = '6Ldd91gUAAAAAAex_hL4nQcxjLvAX4ZHlT_Oep2F';

$query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];

$data = json_decode(file_get_contents($query));

if ($data->success) {

	if(empty($_POST['js'])){
	if($_POST['message'] != '' && $_POST['author'] != ''){

		$author = @iconv("UTF-8", "windows-1251", $_POST['author']);
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$message = @iconv("UTF-8", "windows-1251", $_POST['message']);
		$message = addslashes($message);
		$message = htmlspecialchars($message);
		$message = stripslashes($message);
		$message = mysql_real_escape_string($message);

		$date = date("d-m-Y");
		$result = mysql_query("INSERT INTO messages (author, message, date) VALUES ('$author', '$message', '$date')");
		if($result == true){
			header('Location:../feedback.php');
		}
		// 	echo 0; //Ваше сообшение успешно отправлено
		// }else{
		// 	echo 1; //Сообщение не отправлено. Ошибка базы данных
		// }
	}else{
		echo 2; //Нельзя отправлять пустые сообщения
	}
}

//**************************************** Если отключен JavaScript ************************************

if($_POST['js'] == 'no'){
	if($_POST['message'] != '' && $_POST['author'] != ''){

		$author = $_POST['author'];
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$message = $_POST['message'];
		$message = addslashes($message);
		$message = htmlspecialchars($message);
		$message = stripslashes($message);
		$message = mysql_real_escape_string($message);

		$date = date("d-m-Y");
		$result = mysql_query("INSERT INTO messages (author, message, date) VALUES ('$author', '$message', '$date')");
		if($result == true){
			header('Location:../feedback.php');
		}
		// 	echo "Ваше сообшение успешно отправлено"; 
		// }else{
		// 	echo "Сообщение не отправлено. Ошибка базы данных"; 
		// }
	}else{
		echo "Нельзя отправлять пустые сообщения"; 
	}
}
}

else {
echo('Вы не прошли валидацию reCaptcha');
}

}


?>