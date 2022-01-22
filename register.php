<?php require 'database.php' ?>

<?php
header('Content-Type: application/json');

$errors = [];


$query = "SELECT * FROM `users` WHERE name LIKE '" . $_POST['name'] . "'";
$query .= " OR phone LIKE '" . $_POST['phone'] . "'";
$query .= " OR email LIKE '" . $_POST['email'] . "'";
$result = $conn->query($query);

foreach ($result as $row)
{
    $errors[] = "ваши логин/email/номер телефона уже используются другим аккаунтом";
}

if (!empty($errors)) {
   echo json_encode(['errors' => $errors]);
   die();
}

// дальнейшие проверки, регистрация, авторизация
$query = "INSERT INTO `users` (`name`, `email`, `phone`, `password`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . $_POST['password'] . "')";
$result = $conn->query($query);

echo json_encode(['success' => true]);

session_start();
$_SESSION['name'] = $_POST['name'];