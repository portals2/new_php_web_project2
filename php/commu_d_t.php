<?php 
    include "../php/header_t.php";
    
    $num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "user", "12345", "sample");	// DB 접속
	$sql = "select * from memberboard where num=$num";	// 레코드 검색
	$result = mysqli_query($con, $sql);			// SQL 명령 실행

	$row = mysqli_fetch_assoc($result);			// 레코드 가져오기

	$id      = $row["id"];						// 아이디
	$name      = $row["name"];					// 이름
	$subject    = $row["subject"];				// 제목
	$regist_day   = $row["regist_day"];			// 작성일

	$content    = $row["content"];				// 내용
	$content = str_replace(" ", "&nbsp;", $content);		// 공백 변환
	$content = str_replace("\n", "<br>", $content);			// 줄바꿈 변환

	if ($row["file_name"])
		$file_image = "<img src='../img/".$row["file_name"]."'>";
	else
		$file_image = " ";	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/commu_d.css">
    <title>commu_d_ttt</title>
    <script>
        function check_password(mode, num) {
            // mode : modify(수정) delete(삭제), num : 레코드 번호
            window.open("../php/board/password_form.php?mode="+mode+"&num="+num,
            "pass_check",
            "left=700,top=300,width=550,height=150,scrollbars=no,resizable=yes");
    }
    </script>  
</head>
<body>
    <div class="container">
        <div class="main1" id="item">
            <div class="c_img">
                <a>
                    <span class="main1_img"><?=$file_image?></span>
                </a>
            </div>  
        </div>
        <div class="main2" id="item">
            <div class="detail">
                <div class="bb"><?=$name?></div>
                <div class="bb"><?=$regist_day?></div>
            </div>
            <div class="detail">
                <div><?=$content?></div>
            </div>
        </div>
    </div>
    <button onclick="location.href='../php/commu.php?page=<?=$page?>'">목록보기</button>
    <button onclick="location.href='../php/board/delete.php?num=<?=$num?>&page=<?=$page?>'">삭제하기</button>
</body>
</html>