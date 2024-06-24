<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Models</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.7.1.min.js"></script>
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
                    <li class="main-menu__link"><a id="openModal" class="main-menu__item">Личный кабинет</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="banner">
            <div class="text-blok">
                <h1 class="title">MOOD</h1>
                <h1 class="title">models</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="grid">
            <div class="column">
                <img class="img_column" src="img/Главная/grid-1.png"/>
                <p class="text_column">девушки</p>
            </div>
            <div class="column">
                <img class="img_column" src="img/Главная/grid-2.png"/>
                <p class="text_column">парни</p>
            </div>
            <div class="column">
                <img class="img_column" src="img/Главная/grid-3.png"/>
                <p class="text_column">дети</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="info">
            <h2 class="title_info">Mood Moddels MANAGEMENT</h2>
            <div class="info_content">
                <p class="slogan_info">В основу модельного агентства заложен принцип международных кастинг-центров — поиск новых лиц.</p>
                <p class="text_info">Наша команда опытных агентов предоставляет индивидуальное руководство возможности для роста и поддержку, необходимые нашим моделям для достижения успеха. Мы представляем наших моделей в ведущих агентствах по всему миру и обеспечиваем им доступ к высококлассным показам, редакционным съемкам и рекламным кампаниям.</p>
            </div>
        </div>    
    </div>
    <div class="container">
        <div class="img-bottom">
            <img class="img-bottom" src="img/Главная/foter.png"/>
        </div>
    </div>
    <footer class="footer">
        <img alt="arrow" src="img/footer/arrow.png"/>
        <div class="socials">
            <a href="" class="socials_link"><img alt="instagram" src="img/footer/inst.svg"/></a>
            <a href="" class="socials_link"><img alt="Vk" src="img/footer/vk.svg"/></a>
            <a href="" class="socials_link"><img alt="telegram" src="img/footer/tg.svg"/></a>
        </div>
        <p class="copyright">©Mood models 2024</p>
    </footer>


    <div id="myPopup" class="popup">
        <div class="reg">
            <div class="nav">
                <a id="switchToAuth">Вход</a> <!-- Идентификатор для переключения на окно Входа -->
                <a id="register">Регистрация</a> <!-- Идентификатор для текущего окна Регистрации -->
                <a class="close">Hide</a>
            </div>
            <div class="form">
                <form action="./vvv/ppp.php" method="post" enctype="multipart/form-data">
                    <label>
                        <input type="text" name="name" placeholder="Имя">
                    </label>
                    <label>
                        <input type="text" name="surname" placeholder="Фамилия">
                    </label>
                    <label>
                        <input type="email" name="email" placeholder="E-mail">
                    </label>
                    <label class="img">
                        Изображение профиля
                        <input type="file" name="avatar">
                    </label>
                    <label>
                        <input type="password" name="password" placeholder="Пароль">
                    </label>
                    <label>
                        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
                    </label>
                    <button type="submit">Регистрация</button>
                    

<script>
$(document).ready(function () {
    $('#registration_form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'ppp.php', //  путь к PHP скрипту обработки регистрации
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                // Отображение сообщения об ошибке
                $('#error_message').text(response).show();
            },
            error: function (response) {
                // Обработка ошибок при отправке формы
                $('#error_message').text('Произошла ошибка при отправке формы').show();
            }
        });
    });
});
</script>
                    <?php
        if($_SESSION['message']){
            echo '<p class="msg"> '. $_SESSION['message'] .' </p>';
        }
        unset($_SESSION['message']);
    ?>
                </form>
            </div>
        </div>
</div>

<div id="authPopup" class="auth">
    <div class="nav">
        <a id="switchToRegister">Регистрация</a> <!-- Идентификатор для переключения на окно Регистрации -->
        <a id="auth">Вход</a> <!-- Идентификатор для текущего окна Входа -->
        <a class="close">Hide</a>
    </div>
    <div class="form">
        <form action="vvv/nnn.php" method="post">
            <label>
                
                <input type="email" name="email" placeholder="E-mail">
            </label>
            <label>
                
                <input type="password" name="password" placeholder="Пароль">
            </label>
            <button type="submit">Вход</button>
        </form>
    </div>
</div>

    <script src="js/popup.js"></script>
</body>
</html>