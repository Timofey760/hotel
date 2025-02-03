<?php
// Параметры подключения к базе данных
require_once 'config.php';


// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL-запрос для выборки данных из таблицы booking
$sql = "SELECT `id`, `clientname`, `clientphone`, `clientemail`, `datearrive`, `datedepartment`,`apartmentclass`, `additionalinfo` FROM `booking`";
$result = $conn->query($sql);

// Проверка наличия данных
if ($result->num_rows > 0) {
    // Начало вывода HTML-таблицы
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>clientname</th>
                <th>clientphone</th>
                <th>clientemail</th>
                <th>datearrive</th>
                <th>datedepartment</th>
                <th>apartmentclass</th>
                <th>additionalinfo</th>
            </tr>";

    // Вывод данных из каждой строки
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["clientname"]) . "</td>
                <td>" . htmlspecialchars($row["clientphone"]) . "</td>
                <td>" . htmlspecialchars($row["clientemail"]) . "</td>
                <td>" . htmlspecialchars($row["datearrive"]) . "</td>
                <td>" . htmlspecialchars($row["datedepartment"]) . "</td>
                <td>" . htmlspecialchars($row["apartmentclass"]) . "</td>
                <td>" . htmlspecialchars($row["additionalinfo"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Закрытие подключения
$conn->close();
?>
