<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "play_music";

    // Kết nối MySQLi
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Lỗi kết nối cơ sở dữ liệu: " . $conn->connect_error);
    }
    // Thiết lập charset UTF-8 nếu cần
    $conn->set_charset("utf8");
?>
