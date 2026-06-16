<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ваша пошта для отримання листів
    $to = "info@slpg.city"; 
    $subject = "Нове повідомлення з сайту Святошинського ЛПГ";
    
    // Очищення даних від зайвих символів та HTML-тегів для безпеки
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    
    // Формування тіла листа
    $body = "Ім'я: $name\nEmail: $email\n\nПовідомлення:\n$message";
    
    // Технічні заголовки (домен відправника має збігатися з доменом сайту)
    $headers = "From: noreply@slpg.city\r\n"; 
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
               
    // Відправка та перенаправлення назад на сайт з повідомленням
    if(mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Повідомлення успішно відправлено!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Виникла помилка при відправці. Спробуйте пізніше або напишіть нам напряму.'); window.location.href='index.html';</script>";
    }
}
?>