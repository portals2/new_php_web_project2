<?php
    $servername = "localhost";          // 서버명
    $username = "user";                 // 사용자명
    $password = "12345";                // 비밀번호
    $dbname = "sample";                 // DB명

    // MySQL 연결하기
    include "../logins/db_con.php";

    // 연결 체크하기
    if (!$con) {
        die("연결 오류 : ".mysqli_connect_error());
    }
    
    echo "MySQL에 성공적으로 연결되었습니다!";
?>
