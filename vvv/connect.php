<?php
// Попытка подключения к базе данных MySQL с использованием функции mysqli_connect
    $connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');
     // Если подключение не удалось, то скрипт завершается с сообщением об ошибке
    if(!$connect){
        die('error connect to DataBase');
    }
?>