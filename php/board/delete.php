<?php
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    include "check_id.php"
    $sql = "delete from memberboard where num=$num"; // 레코드 삭제 명령
    mysqli_query($con, $sql);     // SQL 명령 실행
    echo "<script>alert('삭제되었습니다.');</script>";
    mysqli_close($con);           // DB 접속 해제

    // 목록보기 이동
    echo "<script>
	         location.href = '../php/commu.php?page=$page';      
	     </script>";
?>
