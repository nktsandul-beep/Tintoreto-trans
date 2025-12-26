<?php
// Заголовок для JSON ответа
header('Content-Type: application/json; charset=utf-8');

// Настройки
$to = "info@tintoreto-trans.com"; // Ваш email
$subject = "Новая заявка с сайта TINTORETO-TRANS";

// Получение данных из формы
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$from_location = isset($_POST['from']) ? htmlspecialchars($_POST['from']) : '';
$to_location = isset($_POST['to']) ? htmlspecialchars($_POST['to']) : '';
$cargo_type = isset($_POST['cargo-type']) ? htmlspecialchars($_POST['cargo-type']) : '';
$weight = isset($_POST['weight']) ? htmlspecialchars($_POST['weight']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

// Формирование тела письма
$email_body = "Новая заявка с сайта TINTORETO-TRANS\n\n";
$email_body .= "Имя: " . $name . "\n";
$email_body .= "Email: " . $email . "\n";
$email_body .= "Телефон: " . $phone . "\n";
$email_body .= "Откуда: " . $from_location . "\n";
$email_body .= "Куда: " . $to_location . "\n";
$email_body .= "Тип груза: " . $cargo_type . "\n";
$email_body .= "Вес (кг): " . $weight . "\n";
$email_body .= "Сообщение: " . $message . "\n";

// Заголовки
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Отправка письма
if (mail($to, $subject, $email_body, $headers)) {
    echo json_encode(['success' => true, 'message' => 'Спасибо! Ваша заявка отправлена.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Ошибка при отправке. Попробуйте позже.']);
}
?>

