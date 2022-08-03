<?php
    session_start();
    if (isset($_SESSION["userid"])) 
        $userid = $_SESSION["userid"];
    else 
        $userid = "";
        
    if (isset($_SESSION["username"])) 
        $username = $_SESSION["username"];
    else 
        $username = "";
?>	

<!-- include연동확인 및 연속쌓기 확인, php작동확인 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web_p2/css/home_t.css">
    <script src="/web_p2/js/home_t.js"></script>
    <title>home</title>
</head>
<body>
    <div class="container">
        <!-- 헤더 -->
        <div class="header" id="item">
            <a class="symbol" href=""><img src="/web_p2/img/P.png" alt="asd"></a>
            <div class="menu">
                <a href="" class="but">홈</a>
                <a href="/web_p2/php/ranking_t.php" class="but">랭킹</a>
                <?php
                    if(!$userid) {
                ?>                
                                <a href="/web_p2/php/logins/form.php" class="but">회원가입</a>
                                <a href="/web_p2/php/logins/login_form.php" class="but">로그인</a>
                <?php
                    } else {
                                $logged = $username."(".$userid.")";
                ?> 
                                <a href="" class="but">마이페이지</a>
                                <a href="/web_p2/php/logins/logout.php" class="but">로그아웃</a> 
                <?php
                    }
                ?>
            </div>


        </div>
        <!-- 메인1 -->
        <div class="main1" id="item">
            <div id="main1">
                <a href="">
                    <img src="/web_p2//img/Hawaiian shirt.jpg">
                </a>
            </div>
        </div>
        <!-- 메인2 -->
        <div class="main2" id="item">
            <div id="main2">
                <a href=""><img class="slide1" src="/web_p2//img/P.png" ></a>
                <a href=""><img class="slide1" src="/web_p2//img/pp.png" height="500px"></a>
                <a href=""><img class="slide1" src="/web_p2//img/Hawaiian shirt.jpg"></a>
                
                
                
            </div>
        </div>
        <!-- 빈칸 -->
        <div class="emty" id="item">C</div>
        <!-- footer -->
        <div class="footer" id="item">제작: 임재성</div>
    </div>
</body>
</html>