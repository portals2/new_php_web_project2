<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];

    // $con = mysqli_connect("localhost", "user", "12345", "sample");
    include "../logins/db_con.php";
    $sql = "select * from members where id='$id'";
    // 사용자의 id값 저장
    $result = mysqli_query($con, $sql);

    // 사용자의 id값이 있는 num과 카운트되는 row를 비교해서 같으면 true를 반환
    $num_match = mysqli_num_rows($result); 

    if(!$num_match) {
      echo "<script>
             window.alert('등록되지 않는 아이디입니다!')
             history.go(-1)
           </script>";
    }
    else {
        $row = mysqli_fetch_assoc($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if($pass != $db_pass) {
           echo "<script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>";
           exit;
        }
        else {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];

            // 로그인을 하면 홈페이지로 돌아간다.
            echo "<script>
                location.href = '/p2/js/web_p2/php/home_t.php';
              </script>";
        }
     }        
?>
