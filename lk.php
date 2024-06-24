<?php
    session_start();
   if (!$_SESSION['user']){
   header('Location: file.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="lk.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"><a href="index.php"><img src="img/Главная/logo.svg"/></a></div>
            <div class="menu">
                <ul class="main-menu">
                    <li class="main-menu__link"><a href="aboutUs.html" class="main-menu__item">О нас</a></li>
                    <li class="main-menu__link"><a href="casting.html" class="main-menu__item">Кастинг</a></li>
                    <li class="main-menu__link"><a href="contacts.html" class="main-menu__item">Контакты</a></li>
                    <li class="main-menu__link"><a href="models.php" class="main-menu__item">Модели</a></li>
                    <li class="main-menu__link"><a onclick="showPopup()" class="main-menu__item">Регистрация/Вход</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="lk">
            <form>
                <!-- Форма личного кабинета -->
                <img src="<?= $_SESSION['user']['avatar'] ?>" width="300px" style="align-items: center" alt="">
                <h2 style="margin: 10px 0px"> <?= $_SESSION['user']['name'] ?> </h2>
                <a href=""><?= $_SESSION['user']['email'] ?></a>
                <a href="index.html" class="log">Выход</a>
            </form>
            <div class="options">
                <div class="paragraph">
                    <p>рост</p>
                    <input>
                </div>
                <div class="paragraph">
                    <p>вес</p>
                    <input>
                </div>
                <div class="paragraph">
                    <p>талия</p>
                    <input>
                </div>
                <div class="paragraph">
                    <p>волосы</p>
                    <input>
                </div>
                <div class="paragraph">
                    <p>глаза</p>
                    <input>
                </div>
            </div>
            <div class="photo"><button class="photo_button" type="submit">Загрузить фото</button></div>
            <div class="send"><button class="send_button" type="submit">Отправить</button></div>
        </div>
    </div>
</body>
</html>