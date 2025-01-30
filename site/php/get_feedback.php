<?php
// Параметры подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhotel";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL-запрос для выборки данных из таблицы feedback
$sql = "SELECT `id`, `timecode`, `name`, `email`, `rating`, `text` FROM `feedback`";
$result = $conn->query($sql);

// Проверка наличия данных
if ($result->num_rows > 0) {
    // Начало вывода HTML-таблицы
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Timecode</th>
                <th>Name</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Text</th>
            </tr>";

    // Вывод данных из каждой строки
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["timecode"]) . "</td>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["rating"]) . "</td>
                <td>" . htmlspecialchars($row["text"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Закрытие подключения
$conn->close();
?>
