<?php include("connect.php");
header("Content-type: text/html; charset=utf-8");

//**********************************************
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

		$date = date("d-m-Y в H:i:s");
		$result = mysql_query("INSERT INTO messages (author, message, date) VALUES ('$author', '$message', '$date')");
		if($result == true){
			header('Location:questions.php');
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

		$date = date("d-m-Y в H:i:s");
		$result = mysql_query("INSERT INTO messages (author, message, date) VALUES ('$author', '$message', '$date')");
		if($result == true){
			header('Location:questions.php');
		}
		// 	echo "Ваше сообшение успешно отправлено"; 
		// }else{
		// 	echo "Сообщение не отправлено. Ошибка базы данных"; 
		// }
	}else{
		echo "Нельзя отправлять пустые сообщения"; 
	}
}
?>      	
