<?php
	if (empty($_POST["quest_message"])) {
		echo json_encode("<p id='form_message' style='color: #ff0000'>Пожалуйста, введите сообщение</p>");
	} else {
		$host = "localhost"; // адрес сервера 
		$database = "for_maket"; // имя базы данных
		$user = "root"; // имя пользователя
		$password = "12qwaszx"; // пароль
		 
		// подключаемся к серверу
		$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
		mysqli_query($link, "set names utf8");
		 
		// получаем данные из формы
		$quest_name = mysqli_real_escape_string($link, $_POST["quest_name"]);
		$quest_phone = mysqli_real_escape_string($link, $_POST["quest_phone"]);
		$quest_email = mysqli_real_escape_string($link, $_POST["quest_email"]);
		$quest_message = mysqli_real_escape_string($link, $_POST["quest_message"]);

		$query = "INSERT INTO users VALUES('$quest_name','$quest_email', '$quest_phone','$quest_message')";

		// выполняем операции с базой данных
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

		if ($result) {
			echo json_encode("<p id='form_message' style='color: #14cac2'>Благодарим Вас за сообщение!</p>");
		} else {
			echo json_encode("<p id='form_message' style='color: #ff0000'>Сообщение не отправлено</p>");
		}
		 
		// закрываем подключение
		mysqli_close($link);
	}
?>