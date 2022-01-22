<?php require 'database.php' ?>

<?php
header('Content-Type: application/json');//сообщаем браузеру, что ответ будет в формате JSON

$errors = [];

$query = "SELECT * FROM `users` WHERE name LIKE '" . $_POST['name'] . "'";
$query .= " AND password LIKE '" . $_POST['password'] . "' LIMIT 1";
$result = $conn->query($query);

foreach ($result as $row)
{
   echo json_encode(['success' => true]);
   session_start();
   $_SESSION['name'] = $_POST['name'];
   die();
}

$errors[] = "данные неверны";
echo json_encode(['errors' => $errors]);