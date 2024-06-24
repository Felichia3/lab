<?php
    session_start();
    require_once 'connect.php';
    $connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    // Проверка на незаполненные поля
if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['message'] = 'Необходимо заполнить все поля';
    header('Location: ../index.php');
    exit();
}

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ");

    if (mysqli_num_rows($check_user) > 0 ){
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] =[
            "id" => $user['id'],
            "name" => $user['name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
            "role" => $user['role'],
        ];
        // Перенаправление на разные страницы в зависимости от роли
        if ($_SESSION['user']['role'] == 'admin') {
            header('Location: ../admin_panel.php'); // Страница администратора
        } else {
            header('Location: ../lk.php'); // Страница пользователя
        }
    } else{
        $_SESSION['message'] = 'не верный логин или пароль';
        header('Location: ../index.php');
    }

    if (isset($_SESSION['user'])) {
        echo '<a href="lk.php" class="main-menu__item">Личный кабинет</a>';
     // Дополнительная проверка для администратора
    if ($_SESSION['user']['role'] == 'admin') {
        echo '<a href="admin_page.php" class="main-menu__item">Админ-панель</a>';
    }
    } else {
        echo '<a onclick="showPopup()" class="main-menu__item">Регистрация/Вход</a>';
    }
?>
