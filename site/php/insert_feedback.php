<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhotel";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$review = $_POST['review'];
$timecode = date("Y-m-d H:i:s"); // Текущее время

// Подготовка и выполнение SQL запроса
$sql = "INSERT INTO feedback (text, timecode, name, rating, email) VALUES ('$review', '$timecode','$name', '$rating', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Отзыв успешно добавлен";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие соединения
$conn->close();
?>
