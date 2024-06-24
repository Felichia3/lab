<?php
// Проверка, была ли форма отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Сбор введенных данных из формы
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Проверка заполнения всех полей
    if (empty($name) || empty($email) || empty($message)) {
        // Вывод сообщения об ошибке, если какие-либо поля пусты
        echo "Пожалуйста, заполните все поля.";
    } else {
        // Проверка корректности email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Некорректный email адрес.";
        } else {
            // Отправка email
            $to = 'isip_f.g.boecku@mpt.ru'; // Замените на ваш реальный email адрес
            $subject = 'Новое сообщение с вашего сайта';
            $headers = "From: " . $email . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";
            $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

            $email_content = "Имя: $name\n";
            $email_content .= "Email: $email\n\n";
            $email_content .= "Сообщение:\n$message\n";

            // Попытка отправить email
            if (mail($to, $subject, $email_content, $headers)) {
                echo "Сообщение успешно отправлено.";
            } else {
                echo "Не удалось отправить сообщение.";
            }
        }
    }
} else {
    echo "Форма не была отправлена.";
}
?>
