<?php
    session_start();
   $connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');
   if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
    // Получение данных из формы
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $role = $_POST['role'];
   
    // Проверка на корректность ввода имени и фамилии (только буквы и дефисы)
if (!preg_match("/^[а-яА-ЯёЁa-zA-Z-]+$/u", $name)) {
    $_SESSION['message'] = 'Имя содержит недопустимые символы';
    header('Location: ../reg.php');
    exit();
}
if (!preg_match("/^[а-яА-ЯёЁa-zA-Z-]+$/u", $surname)) {
    $_SESSION['message'] = 'Фамилия содержит недопустимые символы';
    header('Location: ../reg.php');
    exit();
}
// Проверка на корректность ввода электронной почты
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = 'Некорректный формат электронной почты';
    header('Location: ../reg.php');
    exit();
}
// Проверка на совпадение паролей и их безопасность
if ($password !== $password_confirm) {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../reg.php');
    exit();
}
 // Проверка пароля на соответствие шаблону (только буквы и цифры)
if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
    $_SESSION['message'] = 'Пароль может содержать только буквы и цифры';
    header('Location: ../reg.php');
    exit();
}
    // Если пароли совпадают, продолжаем регистрацию
    if($password ===  $password_confirm){

        $path = 'img/avatar' . time() .$_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'],'../' . $path)){
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: ../reg.php');
        }

        $password = md5($password);
// Вставка данных пользователя в таблицу `users` базы данных
        mysqli_query($connect, "INSERT INTO `users`
    (`id`, `name`, `surname`, `email`, `password`, `avatar`) VALUES (NULL,'$name','$surname','$email','$password','$path')");
    // Вставка данных пользователя в таблицу `users` базы данных
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('Location: ../index.html');
    } else{
         // Если пароли не совпадают, устанавливаем соответствующее сообщение
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../index.html');
    }


