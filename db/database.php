<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "documents";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Помилка з'єднання: " . mysqli_connect_error());
    }
?>