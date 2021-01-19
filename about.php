<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
  	<title>Контактна форма</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	
</head>
<body>
<!-- Підключаю шапку -->
<?php require "blocks/header.php"?>
<div class="container mt-5">

  <h3>Контактна форма</h3>
  <form action="check.php" method="post">
   <input type="email" name="email" placeholder="Введіть Email" class="form-control"><br>
    <textarea name="message" class="form-control" placeholder="Введіть ваше повідомлення"></textarea><br>
    <button type="submit" name="send" class="btn btn-success">Відправити</button>
  </form>
</div>
<!-- Підключаю footer -->
<?php require "blocks/footer.php"?>
</main>