<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	// $con = mysqli_connect("localhost", "user", "12345", "sample");	// DB 접속
	include "../logins/db_con.php";
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
<html>
<head> 
<meta charset="utf-8">
<title>PHP+MySQL 입문</title>
<link rel="stylesheet" href="/p2/js/web_p2/css/style.css">
</head>
<body> 
	<h2>회원 게시판 > 내용보기</h2>
	<ul class="board_view">
		<li class="row1">
			<span class="col1"><b>제목 :</b> <?=$subject?></span>	<!-- 제목 출력 -->
			<span class="col2"><?=$name?> | <?=$regist_day?></span>	<!-- 이름, 작성일 출력 -->
		</li>
		<li class="row2">
		<?php
			echo $file_image;
			echo $content;     // 글 내용 출력
		?>
		</li>		
	</ul>
	<ul class="buttons">
		<li><button onclick="location.href='list.php?page=<?=$page?>'">목록보기</button></li>
		<li><button onclick="location.href='modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정하기</button></li>   
		<li><button onclick="location.href='delete.php?num=<?=$num?>&page=<?=$page?>'">삭제하기</button></li>
		<li><button onclick="location.href='form.php'">글쓰기</button></li>
	</ul>
</body>
</html>
