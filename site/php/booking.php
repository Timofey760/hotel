<?php

function logAction($message, $level = 'INFO') {
    // Определите путь к файлу лога
    $logFile = 'actions.log';

    // Определите формат времени
    $timestamp = date('Y-m-d H:i:s');

    // Форматируйте сообщение
    $logMessage = sprintf("[%s] [%s] %s\n", $timestamp, $level, $message);

    // Запишите сообщение в файл лога
    file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}

// Пример использования функции
logAction('PHP starter', 'INFO');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhotel";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);
logAction('попытка доступа к базен данных', 'INFO');

// Проверка соединения
if ($conn->connect_error) {
    logAction('Ошибка при обработке запроса', 'ERROR');
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = $_POST['clientName'];
    $clientPhone = $_POST['clientPhone'];
    $clientEmail = $_POST['clientEmail'];
    $datearrive = $_POST['datearrive'];
    $datedepartment = $_POST['datedepartment'];
    $apartmentclass = $_POST['apartmentclass'];
    $additionalinfo = $_POST['additionalinfo'];

    $sql = "INSERT INTO booking (clientname, clientphone, clientemail, datearrive, datedepartment, apartmentclass, additionalinfo)
            VALUES ('$clientName', '$clientPhone', '$clientEmail', '$datearrive', '$datedepartment', '$apartmentclass', '$additionalinfo')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

$conn->close();
?>