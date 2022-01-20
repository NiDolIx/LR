<?php require 'database.php' ?>


<?php
$id = htmlspecialchars($_GET["id"]);
$title = "";
$date = "";
$author = "";
$desc = "";
$path = "";
    try {
        $conn = new PDO('mysql:host=localhost;dbname=filesystem', $user, $pass);
        $sql = "SELECT * FROM posts WHERE id = " . $id;
        $result = $conn->query($sql);

        foreach($result as $row)
        {
            $title = $row['title'];
            $date = $row['date'];
            $author = $row['author'];
            $desc = $row['description'];
            $path = $row['path'];
        }

    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
?>

<!DOCTYPE html>

<html lang = "ru">
    <head>
        <meta charset="utf-8">
        <title>Файлообменник</title>
        <link rel="stylesheet" href="Lab_2.css">
    </head>

    <body> <!-- Разметка главной странички сайта -->
        <header>
            <a id = "conteiner-title" href="../">
                <h1>Студенческий файлообменник</h1>
            </a>
        </header>  

        <div class = "main" id="main_container">
            <h1 id="detailed_h1"><?=$title?></h1>
            <h1 id="detailed_h1">Дата добавления: <?=$date?></h1>
            <h1 id="detailed_h1">Автор: <?=$author?></h1>
            <h1 id="detailed_h1">Описание: <?=$desc?></h1>
            <a id="next_button" href="files/<?= $path?>" download>СКАЧАТЬ</a>
        </div>

        <footer> 
            <div id = "conteiner-footer">
                <a href = "https://www.facebook.com/" target = "_blank"><img src = "PNG/facebook.png"></a>
                <a href = "https://vk.com/" target = "_blank"><img src = "PNG/vk.png"></a>
                <a href = "https://web.telegram.org/" target = "_blank"><img src = "PNG/telegram.png"></a>
                <p>+7 777 777 77 77</p>
            </div>
        </footer>
        
    </body>
</html>