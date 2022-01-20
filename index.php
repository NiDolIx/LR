<?php require 'database.php' ?>


<?php

    try {
        $conn = new PDO('mysql:host=localhost;dbname=filesystem', $user, $pass);
        $sql = "SELECT id, title, date FROM posts ORDER BY `date` LIMIT 2 ";
        $result = $conn->query($sql);
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
            <div id = "conteiner-title">
                <h1>Студенческий файлообменник</h1>
            </div>
    
            <button href = "#R" class = "open_register" onclick = "openReg()">Зарегистрироваться</button> 
            <button href = "#L" class = "open_login" onclick = "openLog()">Войти</button>
        </header>  

        <div class = "main" id="main_container">
            <?php foreach ($result as $row) : ?>
            <div id = "ellips">
                <a href="detailed.php?id=<?=$row['id']?>">
                    <h1><?=$row['title']?></h1>
                    <p><?=$row['date']?></p>
                </a>
            </div>
            <?php
            endforeach;
            ?>
            
        </div>
        <div id="next_button" offset = "2" onclick = "next_post()">ДАЛЕЕ</div>
        <!-- Скрипт показывания следующих постов -->
        <script> 
            function next_post() {
                let loader = document.getElementById("next_button");
                let container = document.getElementById("main_container");
                let offset = parseInt(loader.getAttribute("offset"));
                  let url = "load_posts.php?offset=" + offset;
                  offset+=2;
                  fetch(url)
                    .then((response) => response.text())
                    .then((result) => {
                      container.insertAdjacentHTML("beforeend", result);
                      loader.setAttribute("offset", offset.toString());
                    })
            }
        </script>

        <footer> 
            <div id = "conteiner-footer">
                <a href = "https://www.facebook.com/" target = "_blank"><img src = "PNG/facebook.png"></a>
                <a href = "https://vk.com/" target = "_blank"><img src = "PNG/vk.png"></a>
                <a href = "https://web.telegram.org/" target = "_blank"><img src = "PNG/telegram.png"></a>
                <p>+7 777 777 77 77</p>
            </div>
        </footer>
        
        <!-- Скрипт открытия окна регистрации -->
        <script> 
            function openReg() {
                document.getElementById("R").style.display = "block"; 
            }
            function closeReg() {
                document.getElementById("R").style.display = "none";
            }
        </script>

        <!-- Окно регистрации -->
        <div class="form_register" id="R"> 
            <form class="container_registration">
                <h1>Регистрация</h1>

                <div class = "name_reg">
                    <label for="name"><b>Имя</b></label>
                    <input type="text" class = "name_form fields" placeholder = "Ваше имя" name = "name" required>
                </div>

                <div class="password_reg">
                    <label for="password"><b>Пароль</b></label>
                    <input type="password" class = "password_form fields" placeholder = "Пароль" name = "password" required>   
                </div>

                <div class="password_reg_relod">
                    <label for="password"><b>Повторите пароль</b></label>
                    <input type="password" class = "password_relod_form fields" placeholder = "Пароль" name = "password" required>   
                </div>
                
                <div class="email">
                    <label for="email"><b>Е-мейл</b></label>
                    <input type="text" class = "email_form fields"  placeholder = "Ваш е-мейл" name = "email" required>
                </div>

                <div class="telephone">
                    <label for="telephone"><b>Телефон</b></label>
                    <input type="text" class = "telephone_form fields" placeholder = "Телефон" name = "telephone" required>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox">
                        Я согласен на обработку персональных данных сайтом
                    </label>
                </div>

                <button class="reg" type = "submit">Зарегестрироваться</button>

                <button class = "btn_close" onclick = "closeReg()">Закрыть</button>
            </form>
        </div>
        
        <!-- Скрипт открытия окна авторизации -->
        <script> 
            function openLog() {
                document.getElementById("L").style.display = "block"; 
            }
            function closeLog() {
                document.getElementById("L").style.display = "none";
            }
        </script>
        
        <!-- Окно авторизации -->
        <div class="form_login" id="L"> 
            <form class="container_login">
                <h1>Вход</h1>

                <div class = "name_reg">
                    <label for="name"><b>Имя</b></label>
                    <input type="text" class = "name_form_2 field" placeholder = "Ваше имя" name = "name" required>
                </div>

                <div class="password_reg">
                    <label for="password"><b>Пароль</b></label>
                    <input type="password" class = "password_form_2 field" placeholder = "Пароль" name = "password" required>   
                </div>

                <button class="log" type = "submit">Войти</button>
                
                <button class = "btn_close" onclick = "closeLog()">Закрыть</button>
            </form>
        </div>
   
        <script src = 'validate.js'></script>
        
    </body>
</html>>