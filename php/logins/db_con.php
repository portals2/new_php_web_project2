<?php 
    $con = mysqli_connect("localhost", "w1004mesmg", "sunmoons1s2s3!", "w1004mesmg");

    // 연결 체크하기
    if (!$con) {
        die("연결 오류 : ".mysqli_connect_error());
    }
    
    echo "MySQL에 성공적으로 연결되었습니다!";
?>