<?php
    $id   = $_POST["id"];               // 아이디
    $pass = $_POST["pass"];             // 비밀번호
    $name = $_POST["name"];             // 이름

    $regist_day = date("Y-m-d");  // UTC 현재 '년-월-일 (시:분)'
    // 파일질라에 올릴때 db에 대해서 다시 물어보기    
    // $con = mysqli_connect("localhost", "user", "12345", "sample");  // DB 접속
    include "check_id.php"

	$sql = "insert into members (id, pass, name, regist_day) ";    // 데이터 삽입 명령
	$sql .= "values('$id', '$pass', '$name', '$regist_day')";       

	mysqli_query($con, $sql);       // SQL 명령 실행
    mysqli_close($con);     

    // 로그인 폼으로 이동
    echo "<script>
	          location.href = 'login_form.php';
	      </script>";
?>